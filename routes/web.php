<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopifyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->middleware(['verify.shopify'])->name('home');

Route::get('/hi', [ShopifyController::class, 'getDetails'])->name('hi')->middleware(['verify.shopify']);


// Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])
//     ->middleware(['verify.shopify'])->name('product.index');
