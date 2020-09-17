<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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


Route::get('/profile/{user}', 'App\Http\Controllers\ProfilesController@index')->name('profile.index');

Route::get('/profile/{user}/edit', 'App\Http\Controllers\ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'App\Http\Controllers\ProfilesController@update')->name('profile.update');


Route::get('/product/create', [ProductsController::class, 'create'])->name('product.create');
Route::post('/product/create', [ProductsController::class, 'store'])->name('product.store');
Route::get('/product/{product}', [ProductsController::class, 'show'])->name('product.show');