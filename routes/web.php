<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * shopping - cart , stripe payment
 */
Route::get('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/addToCart/{product}', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('cart.add');
Route::get('/shopping-cart', [App\Http\Controllers\ProductController::class, 'showCart'])->name('cart.show');
Route::get('/checkout/{amount}', [App\Http\Controllers\ProductController::class, 'checkout'])->name('cart.checkout');
Route::post('/charge', [App\Http\Controllers\ProductController::class, 'charge'])->name('cart.charge');



