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

Auth::routes();

//custom
Route::get('/barang/cetak', 'BarangCOntroller@cetak');
Route::get('/botol/cetak', 'BotolController@cetak');
Route::get('/penjualan/cetak', 'PenjualanController@cetak');
Route::get('/penjualan_parfum/cetak', 'PenjualanParfumController@cetak');
Route::get('/pembelian/cetak', 'PembelianController@cetak');
Route::get('/pembelian_botol/cetak', 'PembelianBotolController@cetak');
Route::get('/supplier/cetak', 'SupplierController@cetak');

Route::get('/final_pembelian/cetak', 'FinalPembelianController@cetak');
Route::get('/final_pembelian_botol/cetak', 'FinalPembelianBotolController@cetak');



Route::get('/home', 'HomeController@index')->name('home');

//person
Route::resource('supplier', 'SupplierController');
Route::resource('pelanggan', 'PelangganController');

//goods
Route::resource('barang', 'BarangController');
Route::resource('botol', 'BotolController');

//pemesanan
Route::resource('pembelian', 'PembelianController');
Route::resource('pembelian_botol', 'PembelianBotolController');

//pemesanan
Route::resource('final_pembelian', 'FinalPembelianController');
Route::resource('final_pembelian_botol', 'FinalPembelianBotolController');

//sale
Route::resource('penjualan', 'PenjualanController');
Route::resource('penjualan_parfum', 'PenjualanParfumController');

//delivery
Route::resource('pengiriman', 'PengirimanController');
