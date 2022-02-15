<?php

use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\Product\ProductController;
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
    return redirect()->route('categories.index');
});


Route::resource('/categories', CategoryController::class);
Route::get('/products/{id}', [ProductController::class, 'getProductById'] )->name('getProductById');


Route::group(['prefix'=>'products','as'=>'products.'], function(){
    Route::get('/', [ProductController::class, 'createProduct'] )->name('create');
    Route::get('/show/{id}', [ProductController::class, 'showProduct'] )->name('show');
    Route::post('/store', [ProductController::class, 'storeProduct'] )->name('store');
    Route::put('/update/{id}', [ProductController::class, 'updateProduct'] )->name('update');
    Route::delete('/delete/{id}', [ProductController::class, 'deleteProduct'] )->name('destroy');
});
