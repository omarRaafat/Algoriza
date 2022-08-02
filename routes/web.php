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

Route::group(['middleware' => 'auth'] , function(){
    Route::get('/home', [App\Http\Controllers\ProductController::class, 'index'])->name('home');
    Route::get('/product/create',[App\Http\Controllers\ProductController::class,'create'])->name('product.create');
    Route::post('/product/store',[App\Http\Controllers\ProductController::class,'store'])->name('product.store');
    Route::get('/product/show/{product_id}',[App\Http\Controllers\ProductController::class,'show'])->name('product.show');
    Route::post('/product/edit/{product_id}',[App\Http\Controllers\ProductController::class,'edit'])->name('product.edit');
    Route::get('/categories',[App\Http\Controllers\CategoryController::class,'index'])->name('categories.index');
    Route::get('/category/create',[App\Http\Controllers\CategoryController::class,'create'])->name('categories.create');
    Route::get('/category/delete/{category_id}',[App\Http\Controllers\CategoryController::class,'delete'])->name('categories.delete');
    Route::post('/category/store',[App\Http\Controllers\CategoryController::class,'store'])->name('category.store');
    Route::get('/category/edit/{category_id}',[App\Http\Controllers\CategoryController::class,'show'])->name('category.show');
    Route::post('/category/update/{category_id}',[App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit');
    Route::get('/product/filter/category/{category_id}',[App\Http\Controllers\CategoryController::class,'filter'])->name('category.filter');
    Route::post('/product/filter2/category',[App\Http\Controllers\ProductController::class,'filter'])->name('category.filter');
    
});



