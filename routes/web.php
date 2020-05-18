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

Route::get('/', 'HomePageController@index');
Route::resource('daftar', 'DaftarController');

Route::middleware('penjual')->group(function () {
    Route::resource('penjual/', 'PenjualPageController');
    Route::resource('penjual/penjualan', 'DetailBukuController');
    Route::resource('penjual/listbuku', 'ListBukuController');
    Route::resource('penjual/konfirmasi', 'StatusKonfirmasiController');
    Route::resource('penjual/profile', 'ProfilePenjualController');
    Route::resource('penjual/chat', 'ChatPenjualController');
    Route::get('penjual/chat/handlechat/{id}/', 'ChatPenjualController@handle');
    Route::get('penjual/chat/handlechat/kirim/{id_penjual}/{chats}/', 'ChatPenjualController@kirim');
    Route::middleware('admin')->group(function () {
        Route::resource('penjual/konfirmasisaldo', 'KonfirmasiSaldoController');
    });
});
Route::middleware('pembeli')->group(function () {
    Route::resource('pembeli/', 'PembeliPageController');
    Route::get('pembeli/pembelian.cari', 'PembelianController@cari');
    Route::resource('pembeli/pembelian', 'PembelianController');
    Route::resource('pembeli/profile', 'ProfilePembeliController');
    Route::resource('pembeli/keranjang', 'KeranjangBelanjaController');
    Route::resource('pembeli/keranjangsewa', 'KeranjangSewaController');
    Route::resource('pembeli/isisaldo', 'TransaksiSaldoController');
    Route::resource('pembeli/konfirmasi', 'StatusPengirimanController');
    Route::resource('pembeli/chat', 'ChatController');
    Route::get('pembeli/chat/handlechat/{id}/', 'ChatController@handle');
    Route::get('pembeli/chat/handlechat/kirim/{id_penjual}/{chats}/', 'ChatController@kirim');
});

Route::get('logout/', 'DaftarController@logout');
Route::post('validasi', 'DaftarController@validasi');
