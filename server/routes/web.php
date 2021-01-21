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

Route::get('', 'AuthenticationController@index')->name('login');

Route::post('login', 'AuthenticationController@login');

Route::post('register', 'AuthenticationController@register');

Route::middleware('auth')->group(function () {

    Route::get('logout', 'AuthenticationController@logout');

    Route::resource('pages', 'DashboardController');

    Route::resource('daftarBuku', 'BukuController');

    Route::resource('anggota', 'AnggotaController');

    Route::resource('user', 'UserController');

    Route::resource('bukuDipinjam', 'bukuDipinjamController');
    Route::get('bukuDipinjam-showBuku', 'bukuDipinjamController@showBuku');
    Route::get('bukuDipinjam-showAnggota', 'bukuDipinjamController@showAnggota');
    Route::get('bukuDipinjam-perpanjang', 'bukuDipinjamController@perpanjang');


});

