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
    return view('auth.login');
});
Route::get('/test', 'TestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//person
Route::resource('pelanggan', 'PelangganController')->name('*', 'pelanggan');
Route::resource('supplier', 'SupplierController')->name('*', 'supplier');

//goods
Route::resource('barang', 'BarangController')->name('*', 'barang');
Route::resource('botol', 'BotolController')->name('*', 'botol');

//purchase
Route::resource('pembelian', 'PembelianController')->name('*', 'pembelian');
Route::resource('pembelian_botol', 'PembelianBotolController')->name('*', 'pembelian_botol');

//sale
Route::resource('penjualan', 'PenjualanController')->name('*', 'penjualan');
