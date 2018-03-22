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

Route::get('/dashboard', function () {
	$judul = 'Beranda';
    return view('home')->with('judul',$judul);
});

Route::get('/', function () {
    return view('welcome');
});

//layouts
Route::get('/layouts', function () {
    return view('layouts/index');
});

//Form Login
Route::get('/auth', function () {
    return view('auth/login');
});

//Form Data Dosen
/*Route::get('/DataDosen', function () {
    return view('DataDosen/tabeldosen');
});
/*Route::get('/DataDosen', function () {
    return view('DataDosen/tabelriwayatp');
});
Route::get('/DataDosen', function () {
    return view('DataDosen/tabeljadwald');
});*/

Route::get('/masuk', 'SessionsController@create')->name('login');
//Route::post('/login', 'SessionsController@store');
//Route::get('/logout', 'SessionsController@destroy');

//Route Dosen
/*Route::get('/DataDosen', 'DosenController@index');
Route::get('/DataDosen/add','DosenController@create');
Route::post('/DataDosen/simpan','DosenController@store');
Route::get('/DataDosen/edit/{nidn}','DosenController@edit');
Route::post('/DataDosen/update/{nidn}','DosenController@update');
Route::get('/DataDosen/hapus/{nidn}','DosenController@destroy');
*/
//Route Dosen
Route::get('/Data_Dosen', 'DosenController@index');
Route::get('/Data_Dosen/add','DosenController@create');
Route::post('/Data_Dosen/simpan','DosenController@store');
Route::get('/Data_Dosen/edit/{nidn}','DosenController@edit');
Route::post('/Data_Dosen/update/{nidn}','DosenController@update');
Route::get('/Data_Dosen/hapus/{nidn}','DosenController@delete');

//Route Admin
Route::get('/Data_Admin', 'AdminController@index');
Route::get('/Data_Admin/add','AdminController@create');
Route::post('/Data_Admin/simpan','AdminController@store');
Route::get('/Data_Admin/edit/{nidn}','AdminController@edit');
Route::post('/Data_Admin/update/{nidn}','AdminController@update');
Route::get('/Data_Admin/hapus/{nidn}','AdminController@delete');

//Route Fakultas
Route::get('/Data_Fakultas', 'FakultasController@index');
Route::get('/Data_Fakultas/add','FakultasController@create');
Route::post('/Data_Fakultas/simpan','FakultasController@store');
Route::get('/Data_Fakultas/edit/{nidn}','FakultasController@edit');
Route::post('/Data_Fakultas/update/{nidn}','FakultasController@update');
Route::get('/Data_Fakultas/hapus/{nidn}','FakultasController@delete');