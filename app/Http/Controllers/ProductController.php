<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::orderBy('created_at','desc')->paginate(6);
        $user=auth()->user();
        return view('product.index', compact('products', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 投稿バリデーション
        $inputs = $request->validate([
          'product_name' => 'required|max:255',
          'detail' => 'required|max:1000',
          'product_image' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
          'price' => 'required|numeric|digits_between:1,7',
        ]);
        // 投稿を保存
        $product = new Product();
        $product->user_id = auth()->user()->id;
        $product->product_name = $request->product_name;
        $product->detail = $request->detail;
        $product->product_image = $request->product_image;
        $product->price = $request->price;
        // 画像保存
        if (request('product_image')){
            $original = request()->file('product_image')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$original;
            request()->file('product_image')->move('storage/images', $name);
            $product->product_image = $name;
        }

        $product->save();
        return redirect()->route('product.create')->with('message', '商品を登録しました！');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // $product = Product::find($id);
        $user = auth()->user();
        return view('product.edit', compact('product', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // 投稿バリデーション
        $inputs = $request->validate([
          'product_name' => 'required|max:255',
          'detail' => 'required|max:1000',
          'product_image' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
          'price' => 'required|numeric|digits_between:1,7',
        ]);
        // 投稿を保存
        $product->user_id = auth()->user()->id;
        $product->product_name = $request->product_name;
        $product->detail = $request->detail;
        // $product->product_image = $request->product_image;
        $product->price = $request->price;
        // 画像保存
        if ($request->product_image != null){
          $original = request()->file('product_image')->getClientOriginalName();
           // 日時追加
          $name = date('Ymd_His').'_'.$original;
          request()->file('product_image')->move('storage/images', $name);
          $product->product_image = $name;
        }
        $product->save();

        return redirect()->route('product.edit', $product)->with('message', '商品を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('message', '商品を削除しました');
    }

    // カート機能

    public function myCart(Cart $cart) {
        $data = $cart->showCart();
        return view('cart.mycart', $data);
    }

    public function addMycart(Request $request, Cart $cart)
   {
       // カートに追加の処理
       $product_id=$request->product_id;
       $message = $cart->addCart($product_id);

       // 追加後の情報を取得
       $data = $cart->showCart();

       return view('cart.mycart', $data)->with('message' , $message);
   }

   public function deleteCart(Request $request, Cart $cart)
   {
       // カートから削除の処理
       $product_id = $request->product_id;
       $message = $cart->deleteCart($product_id);

       // 追加後の情報を取得
       $data = $cart->showCart();

       return view('cart.mycart', $data)->with('message', $message);
   }

   // お気に入り機能
   public function favorite(Product $product)
     {
         Auth::user()->togglefavorite($product);

         return back();
     }

}
