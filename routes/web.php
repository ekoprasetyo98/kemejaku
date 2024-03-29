<?php

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

Route::get('/', 'Controller@produk');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pesan/barang/{id}','PesanController@index');
Route::post('/pesan/order/{id}','PesanController@pesan');
Route::get('/keranjang','PesanController@keranjang');
Route::get('/delete/keranjang/{id}','PesanController@delete');
Route::get('/checkout','PesanController@checkout');
Route::get('/profile','ProfileController@index');
Route::post('/profile/update','ProfileController@update');
Route::get('/history','HistoryController@index');
Route::get('/history/detail/{id}','HistoryController@detail');