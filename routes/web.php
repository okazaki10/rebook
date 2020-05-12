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
Route::resource('daftar','DaftarController');

Route::middleware('penjual')->group(function () {
Route::resource('penjual/','PenjualPageController');
Route::resource('penjual/penjualan/','DetailBukuController');
Route::resource('penjual/listbuku','ListBukuController');
});
Route::middleware('pembeli')->group(function () {
    Route::resource('pembeli/','PembeliPageController');
    Route::resource('pembeli/pembelian','PembelianController');
    Route::resource('pembeli/keranjang','KeranjangBelanjaController');
});
Route::get('logout/','DaftarController@logout');
Route::post('validasi','DaftarController@validasi');