<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/password', 'PasswordController@change');
Route::put('/password/update', 'PasswordController@update');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/{id}/detail', 'UserController@show');
Route::post('/user/{id}/update', 'UserController@update');

Route::group(['middleware' => ['auth','checkRole:ADMIN']], function () {
    Route::get('/bagian', 'BagianController@index');
    Route::post('/bagian/create', 'BagianController@create');
    Route::get('/bagian/{id}/edit', 'BagianController@edit');
    Route::post('/bagian/{id}/update', 'BagianController@update');
    Route::delete('/bagian/{id}/delete', 'BagianController@destroy');

    Route::get('/kategori', 'KategoriController@index');
    Route::post('/kategori/create', 'KategoriController@create');
    Route::get('/kategori/{id}/edit', 'KategoriController@edit');
    Route::post('/kategori/{id}/update', 'KategoriController@update');
    Route::delete('/kategori/{id}/delete', 'KategoriController@destroy');

    Route::get('/satuan', 'SatuanController@index');
    Route::post('/satuan/create', 'SatuanController@create');
    Route::get('/satuan/{id}/edit', 'SatuanController@edit');
    Route::post('/satuan/{id}/update', 'SatuanController@update');
    Route::delete('/satuan/{id}/delete', 'SatuanController@destroy');
});

Route::group(['middleware' => ['auth','checkRole:ADMIN,CREW']], function () {
    Route::get('/karyawan', 'KaryawanController@index');
    Route::get('/karyawan/form', 'KaryawanController@form');
    Route::post('/karyawan/create', 'KaryawanController@create');
    Route::get('/karyawan/{id}/detail', 'KaryawanController@show');
    Route::get('/karyawan/{id}/edit', 'KaryawanController@edit');
    Route::post('/karyawan/{id}/update', 'KaryawanController@update');
    Route::delete('/karyawan/{id}/delete', 'KaryawanController@destroy');

    Route::get('/barang', 'BarangController@index');
    Route::post('/barang/create', 'BarangController@create');
    Route::get('/barang/{id}/edit', 'BarangController@edit');
    Route::post('/barang/{id}/update', 'BarangController@update');
    Route::delete('/barang/{id}/delete', 'BarangController@destroy');

    Route::get('/bmasuk', 'BmasukController@index');
    Route::get('/bmasuk/form', 'BmasukController@form');
    Route::post('/bmasuk/create', 'BmasukController@create');
    Route::get('/bmasuk/{id}/edit', 'BmasukController@edit');
    Route::post('/bmasuk/{id}/update', 'BmasukController@update');
    Route::delete('/bmasuk/{id}/delete', 'BmasukController@destroy');

    Route::get('/bkeluar', 'BkeluarController@index');
    Route::get('/bkeluar/form', 'BkeluarController@form');
    Route::post('/bkeluar/create', 'BkeluarController@create');
    Route::get('/bkeluar/{id}/edit', 'BkeluarController@edit');
    Route::post('/bkeluar/{id}/update', 'BkeluarController@update');
    Route::delete('/bkeluar/{id}/delete', 'BkeluarController@destroy');

});
