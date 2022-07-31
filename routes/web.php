<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\CheckController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\OrderController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index']);
Route::get('/front_category', [FrontendController::class, 'category']);
Route::get('/view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('/categoryFront/{cat_slug}/{product_slug}', [FrontendController::class, 'viewproduct']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::post('addCart', [CartController::class, 'addToProduct'])->name('cart.store');
    Route::get('cart', [CartController::class, 'viewCart']);
    Route::delete('cart-delete/{cart_id}', [CartController::class, 'cartDelete']);
    Route::post('update-cart', [CartController::class, 'updatecart']);
    Route::get('checkout-process', [CheckController::class, 'checkout']);
    Route::get('wishlist',[WishlistController::class,'wishshow']);
    Route::post('add-to-wish',[WishlistController::class,'wishstore']);
    Route::delete('wish-delete/{wish_id}', [WishlistController::class, 'wishDelete']);
    Route::post('addtoCart',[WishlistController::class,'addtoCart']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    // Route::get('/dashboard', [DashController::class, 'index']);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::get('ordershow', [OrderController::class, 'ordershow']);
    Route::post('orderstore', [OrderController::class, 'orderstore']);
    Route::get('order-view', [OrderController::class, 'orderview']);
    Route::get('user-show', [DashController::class, 'usershow']);
});
