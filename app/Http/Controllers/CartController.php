<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 追加したカートの中身を保存
        $cart = Cart::instance(Auth::user()->id)->content();

         $total = 0;
        // 合計金額を計算して$total変数に保存
         foreach ($cart as $c) {
             $total += $c->qty * $c->price;
         }

         return view('carts.index', compact('cart', 'total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cart::instance(Auth::user()->id)->add(
             [
                 'id' => $request->id,
                 'name' => $request->name,
                 'qty' => $request->qty,
                 'price' => $request->price,
                 'weight' => $request->weight,
                 'options' => [
                    'image' => $request->image,
                ]
             ]
         );
         return to_route('product.show', $request->get('id'))->with('message', 'カートに追加しました');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $user_shoppingcarts = DB::table('shoppingcart')->get();
         $number = DB::table('shoppingcart')->where('instance', Auth::user()->id)->count();
        // ユーザーが注文したカートの数を取得
         $count = $user_shoppingcarts->count();

         // 新しくDBに登録するカートのデータ用にカートのIDを一つ増やす
         $count += 1;
         $number += 1;
         // ユーザーのIDを使ってカート内の商品情報などを保存
         $cart = Cart::instance(Auth::user()->id)->content();

         $price_total = 0;
         $qty_total = 0;

         foreach ($cart as $c) {
             $price_total += $c->qty * $c->price;
             $qty_total += $c->qty;
         }

         Cart::instance(Auth::user()->id)->store($count);

         DB::table('shoppingcart')->where('instance', Auth::user()->id)
             ->where('number', null)
             ->update(
                 [
                     'code' => substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 10),
                     'number' => $number,
                     'price_total' => $price_total,
                     'qty' => $qty_total,
                     'buy_flag' => true,
                     'updated_at' => date("Y/m/d H:i:s")
                 ]
             );

             $pay_jp_secret = env('PAYJP_SECRET_KEY');
              \Payjp\Payjp::setApiKey($pay_jp_secret);

              $user = Auth::user();

              $res = \Payjp\Charge::create(
                  [
                      "customer" => $user->token,
                      "amount" => $price_total,
                      "currency" => 'jpy'
                  ]
              );

         Cart::instance(Auth::user()->id)->destroy();

         return to_route('carts.index')->with('message', '購入決済が完了しました');
    }

    // カートから削除
    public function remove($rowId)
    {
        Cart::content()->where('rowId', $rowId);
        Cart::instance(Auth::user()->id)->remove($rowId);

       return to_route('carts.index')->with('message', 'カートから商品を削除しました');
    }
}
