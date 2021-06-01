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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth','admin'], 'prefix'=>'admin'], function() {
    Route::resource('category','Admin\CategoryController');
    Route::resource('subcategory','Admin\SubCategoryController');
    Route::resource('product','Admin\ProductController');        
    Route::get('subcategories/{id}','Admin\ProductController@loadSubCategories');
    Route::get('/','Admin\AdminController@index')->name('admin');

    });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Front\PuppieController::class, 'index'])->name('puppie');
Route::get('/product/{id}', [App\Http\Controllers\Front\PuppieController::class, 'show'])->name('puppie.show');
Route::get('/category/{name}',[App\Http\Controllers\Front\PuppieController::class, 'allProduct'])->name('product.list');
Route::get('/addtocart/{product}','Front\\CardController@addToCard')->name('add.card');


Route::get('/switch','Admin\CategoryController@switch')->name('switch');
Route::get('/kategoriler/siralama','Admin\CategoryController@orders')->name('category.orders');
Route::get('/card','Front\\CardController@cardshow')->name('card.show');
Route::post('/products/{product}','Front\\CardController@cardupdate')->name('card.update');
Route::post('/product/{product}','Front\\CardController@cardremove')->name('card.remove');






