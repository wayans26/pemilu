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
Route::get('/logout', 'Login\loginController@logout');
Route::get('/', 'Login\loginController@index');
Route::post('/', 'Login\loginController@prosesLogin');
Route::post('/vote', 'Dashboard\dashboardController@vote');

Route::get('/status', 'Dashboard\statusController@index');
Route::post('/status', 'Dashboard\statusController@getStatus');

Route::get('/kandidat', 'Dashboard\kandidatController@index');
Route::post('/kandidat/update', 'Dashboard\kandidatController@updateKandidat');
Route::post('/kandidat/tambah', 'Dashboard\kandidatController@tambahKandidat');
Route::post('/kandidat/hapus', 'Dashboard\kandidatController@hapusKandidat');

Route::get('/pemilih', 'Dashboard\pemilihController@index');
Route::post('/pemilih/update', 'Dashboard\pemilihController@updatePemilih');
Route::post('/pemilih/tambah', 'Dashboard\pemilihController@tambahPemilih');
Route::post('/pemilih/hapus', 'Dashboard\pemilihController@hapusPemilih');
Route::post('/pemilih/active', 'Dashboard\pemilihController@activePemilih');

Route::get('/perolehansuara', 'Dashboard\perolehansuaraController@index');
Route::post('/perolehansuara/get', 'Dashboard\perolehansuaraController@getPerolehansuara');

Route::get('/example', 'Dashboard\dashboardController@example');