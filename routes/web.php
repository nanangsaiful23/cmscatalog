<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product', 'ProductController@lihat')->name('product');
Route::get('/getimagepro/{directory}/{url}', 'ProductController@getimagepro' );
Route::get('/opencreateproduct', 'ProductController@opencreateproduct')->name('opencreateproduct');
Route::post('/createproduct', 'ProductController@createproduct')->name('createproduct');
Route::get('/download', 'HomeController@getDownload')->name('download');
