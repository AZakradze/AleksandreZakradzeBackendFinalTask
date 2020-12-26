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

Route::get('/', [App\Http\Controllers\ProductsController::class, 'findex' ]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('category', 'App\Http\Controllers\CategoriesController');
Route::resource('subcategory', 'App\Http\Controllers\SubcategoriesController');
Route::resource('product', 'App\Http\Controllers\ProductsController');
Route::resource('comment', 'App\Http\Controllers\CommentsController');


Route::get('/auth/facebook', [App\Http\Controllers\Auth\LoginController::class, 'facebook'])->name('fb');
Route::get('/auth/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'facebookcallback']);
Route::get('/auth/google', [App\Http\Controllers\Auth\LoginController::class, 'google'])->name('google');
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'googlecallback']);

