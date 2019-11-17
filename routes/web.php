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
//     return view('dashboard');
// });
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','HomeController@index')->name('home');
Route::resource('/anggota','AnggotaController');
Route::resource('/simpanan','SimpananController');
Route::resource('/users','UsersController');
Route::put('anggota/{anggotum}','AnggotaController@aktif');
Route::patch('anggota/{anggotum}','AnggotaController@nonaktif');
Route::put('users/{user}','UsersController@aktif');
Route::patch('users/{user}','UsersController@nonaktif');
Auth::routes();
Route::put('/simpanan', 'SimpananController@indexAS');
Route::resource('/bunga','BungaController');

Route::get('tambahSimpanan', 'simpananControllerlama@createTS')->name('tambahSimpanan');
Route::post('tambahSimpanan/store', 'simpananControllerlama@storeTS')->name('tambahSimpanan.store');
Route::get('dataSimpanan', 'simpananControllerlama@indexDS')->name('dataSimpanan');
Route::get('anggotaSimpanan', 'simpananControllerlama@indexAS')->name('anggotaSimpanan');
Route::delete('dataSimpanan', 'simpananControllerlama@deleteDS')->name('dataSimpanan.delete');
Route::get('dataSimpanan/{id}', 'simpananControllerlama@editDS')->name('dataSimpanan.edit');
Route::put('dataSimpanan/{id}', 'simpananControllerlama@updateDS')->name('dataSimpanan.update');