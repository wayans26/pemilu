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
// Route::post('/kandidat', 'Dashboard\kandidatController@getStatus');

Route::get('/example', 'Dashboard\dashboardController@example');