<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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

// Ostad First Assignment Routes
Route::get('/', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');

Route::get('/shop',[\App\Http\Controllers\OstadFirstAssignment::class, 'shopDetails'])
    ->middleware(['verify.shopify'])->name('shop');

Route::get('/collections',[\App\Http\Controllers\OstadFirstAssignment::class, 'collectionsDetails'])
    ->middleware(['verify.shopify'])->name('collections');

Route::get('/collections/create', [\App\Http\Controllers\OstadFirstAssignment::class, 'createCollection'])
    ->middleware(['verify.shopify'])->name('showCreateCollection');

Route::post('/collections/create', [\App\Http\Controllers\OstadFirstAssignment::class, 'createCollection'])
    ->middleware(['verify.shopify'])->name('createCollection');

Route::get('/collections/edit/{collectionId}', [\App\Http\Controllers\OstadFirstAssignment::class, 'showEditForm'])
    ->middleware(['verify.shopify'])->name('showEditForm');

Route::post('/collections/edit/{collectionId}', [\App\Http\Controllers\OstadFirstAssignment::class, 'editCollection'])
    ->middleware(['verify.shopify'])->name('editCollection');

Route::get('/collections/{collectionId}/products', [\App\Http\Controllers\OstadFirstAssignment::class, 'collectionProducts'])
        ->middleware(['verify.shopify'])->name('collectionProducts');

Route::post('/products/edit/{productId}', [\App\Http\Controllers\OstadFirstAssignment::class, 'updateProduct'])
    ->middleware(['verify.shopify'])->name('updateProduct');

Route::get('/products/create', [\App\Http\Controllers\OstadFirstAssignment::class, 'createProduct'])
    ->middleware(['verify.shopify'])->name('storeProduct');



// End


Route::get('/products',[\App\Http\Controllers\ProductController::class, 'index'])
    ->middleware(['verify.shopify'])->name('product.index');

Route::get('/groups', [\App\Http\Controllers\FaqController::class, 'groupIndex'])
	->middleware(['verify.shopify'])
    ->name('group.index');

Route::post('/groups', [\App\Http\Controllers\FaqController::class, 'groupStore'])
    ->middleware(['verify.shopify'])
    ->name('group.store');

