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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
Route::get('/', [App\Http\Controllers\Front\PuppieController::class, 'index'])->name('puppie');

//Route::resource('category', [App\Http\Controllers\Admin\CategoryController::class]);
Route::resource('category','Admin\CategoryController');

Route::get('/switch','Admin\CategoryController@switch')->name('switch');
Route::get('/kategoriler/siralama','Admin\CategoryController@orders')->name('category.orders');




