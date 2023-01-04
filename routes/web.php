<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('users/cart_history', [RegisteredUserController::class, 'cart_history_index'])->name('cart_history');
    // Route::get('users/cart_history/{num}', [RegisteredUserController::class, 'cart_history_show'])->name('cart_history_show');
    Route::get('users/register_card', [RegisteredUserController::class, 'register_card'])->name('register_card');
    Route::post('users/token', [RegisteredUserController::class, 'token'])->name('users.token');
    Route::get('users/favorite', [RegisteredUserController::class, 'favorite'])->name('users.favorite');
    Route::get('/carts', [CartController::class, 'index'])->name('carts.index');
    Route::post('/carts', [CartController::class, 'store'])->name('carts.store');
    Route::delete('/carts', [CartController::class, 'destroy'])->name('carts.destroy');
    Route::post('/carts/{rowId}', [CartController::class, 'remove'])->name('carts.delete');
    Route::get('product/{product}/favorite', [ProductController::class, 'favorite'])->name('products.favorite');
});

Route::group(['middleware' => 'can:admin'], function() {
    Route::get('user/index', [RegisteredUserController::class, 'index'])->name('user.index');
    Route::get('user/edit/{id}', [RegisteredUserController::class, 'edit'])->name('user.edit');
    Route::patch('user/edit/{id}', [RegisteredUserController::class, 'update'])->name('user.update');
    Route::delete('user/{id}', [RegisteredUserController::class, 'destroy'])->name('user.destroy');
    Route::get('users/sales', [RegisteredUserController::class, 'salesTotal'])->name('users.sales');
});

Route::group(['middleware' => 'can:admin'], function() {
    Route::get('users/orders', [OrderController::class, 'index'])->name('orders');
});
Route::group(['middleware' => 'can:shop'], function() {
    Route::get('users/orders', [OrderController::class, 'index'])->name('orders');
});

// ルートのmiddlewareにadminを追加し、管理者権限でしかアクセスできない領域を作成可
// Route::group(['middleware' => ['auth', 'admin']], function () {
//     Route::resource('admin/post', 'AdminPostController');
// });

require __DIR__.'/auth.php';

// レビュー投稿のルート設定
Route::resource('review', PostController::class);

// 商品登録のルート設定
Route::resource('product', ProductController::class);
