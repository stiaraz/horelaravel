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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'IndexController@index')->name('index');

Auth::routes();

Route::get('/home', 'IndexController@home')->name('home');
Route::get('/grafik', 'IndexController@grafik');
Route::get('/absen', 'Absensi@absen');Route::get('/detail', 'RecogController@detail');
Route::post('/detail_change', 'RecogController@detail_change');
Route::post('/graf_change', 'RecogController@graf_change')->name('graf');

Route::get('/absen/{id}', 'Absensi@detail_absen');
Route::post('/detail_tgl', 'Absensi@detail_tgl');

