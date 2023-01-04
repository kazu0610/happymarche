<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\ShoppingCart;
use App\Models\Sales;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    public function index()
    {
      $users = User::All();
      return view('user.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->validate([
            'image' => ['image', 'mimes:jpg,png,jpeg,gif', 'max:2048'],
            'name' => ['string', 'max:255'],
            'email' => ['string', 'required', 'email', 'max:255', 'unique:users,email,' . $request->id . ',id'],
            'tel' => ['numeric', 'digits_between:10,11', 'nullable'],
            'postcode' => ['numeric', 'digits:7', 'nullable'],
            'address' => ['string', 'max:255', 'nullable'],
            'area' => ['string', 'max:255', 'nullable'],
            'role' => ['required'],
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->postcode = $request->postcode;
        $user->address = $request->address;
        $user->area = $request->area;
        $user->role = $request->role;

        // 画像保存
        if ($request->image != null){
          $original = request()->file('image')->getClientOriginalName();
           // 日時追加
          $name = date('Ymd_His').'_'.$original;
          request()->file('image')->move('storage/images', $name);
          $user->image = $name;
        }
        $user->save();

        return redirect()->route('user.edit', $user)->with('message', 'ユーザー情報を更新しました');
    }

    public function destroy($id)
    {
      $user = User::find($id);
      $user->delete();
      return redirect()->route('user.index')->with('message', 'ユーザーを削除しました');
    }

    // 注文履歴一覧を表示
    public function cart_history_index(Request $request)
     {
         $page = $request->page != null ? $request->page : 1;
         $user_id = Auth::user()->id;
         $billings = ShoppingCart::getCurrentUserOrders($user_id);
         $total = count($billings);
         $billings = new LengthAwarePaginator(array_slice($billings, ($page - 1) * 15, 15), $total, 15, $page, array('path' => $request->url()));

         return view('user.cart_history_index', compact('billings', 'total'));
     }

     // 注文履歴詳細を表示
     // public function cart_history_show(Request $request)
     // {
     //     $num = $request->num;
     //     $user_id = Auth::user()->id;
     //     $cart_info = DB::table('shoppingcart')->where('instance', $user_id)->where('number', $num)->get()->first();
     //     Cart::instance($user_id)->restore($num);
     //     $cart_contents = Cart::content();
     //     Cart::instance($user_id)->store($num);
     //     Cart::destroy();
     //
     //
     //     DB::table('shoppingcart')->where('instance', $user_id)
     //         ->where('number', null)
     //         ->update(
     //             [
     //                 'code' => $cart_info->code,
     //                 'number' => $num,
     //                 'price_total' => $cart_info->price_total,
     //                 'qty' => $cart_info->qty,
     //                 'buy_flag' => $cart_info->buy_flag,
     //                 'updated_at' => $cart_info->updated_at
     //             ]
     //         );
     //
     //     return view('user.cart_history_show', compact('cart_contents', 'cart_info'));
     // }

     // クレジットカード登録
     public function register_card(Request $request)
     {
         $user = Auth::user();

         $pay_jp_secret = env('PAYJP_SECRET_KEY');
         \Payjp\Payjp::setApiKey($pay_jp_secret);

         $card = [];
         $count = 0;

         if ($user->token != "") {
             $result = \Payjp\Customer::retrieve($user->token)->cards->all(array("limit"=>1))->data[0];
             $count = \Payjp\Customer::retrieve($user->token)->cards->all()->count;

             $card = [
                 'brand' => $result["brand"],
                 'exp_month' => $result["exp_month"],
                 'exp_year' => $result["exp_year"],
                 'last4' => $result["last4"]
             ];
         }

         return view('user.register_card', compact('card', 'count'));
     }

     public function token(Request $request)
     {
         $pay_jp_secret = env('PAYJP_SECRET_KEY');
         \Payjp\Payjp::setApiKey($pay_jp_secret);

         $user = Auth::user();
         $customer = $user->token;

         if ($customer != "") {
             $cu = \Payjp\Customer::retrieve($customer);
             $delete_card = $cu->cards->retrieve($cu->cards->data[0]["id"]);
             $delete_card->delete();
             $cu->cards->create(array(
                 "card" => request('payjp-token')
             ));
         } else {
             $cu = \Payjp\Customer::create(array(
                 "card" => request('payjp-token')
             ));
             $user->token = $cu->id;
             $user->update();
         }

         return to_route('dashboard');
     }

     public function salesTotal(Request $request)
      {
          $page = $request->page != null ? $request->page : 1;
          $sort = $request->sort;
          $billings = [];
          if ($request->sort == 'month') {
              $billings = Sales::getMonthlyBillings();
          } else {
              $billings = Sales::getDailyBllings();
          }
          $total = count($billings);
          $paginator = new LengthAwarePaginator(array_slice($billings, ($page - 1), 15), $total, 15, $page, ['path' => 'dashboard']);

          return view('user.sales', compact('billings', 'total', 'paginator', 'sort'));
      }

      public function favorite()
     {
         $user = Auth::user();

         $favorites = $user->favorites(Product::class)->get();

         return view('user.favorite', compact('favorites'));
     }
}
