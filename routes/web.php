<?php

use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Auth;
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
    return view('layouts.app');
});

Route::get('/jam', "JamController@index");
Route::post('/jam', "JamController@store");

Route::get('/materi', "MateriController@index");
Route::get('/materi/create', "MateriController@create");
Route::post('/materi', "MateriController@store");
Route::get('/materi/{id}', "MateriController@show");


Route::get('/tugas', "TugasController@index");
Route::get('/tugas/create', "TugasController@create");
Route::post('/tugas', "TugasController@store");
Route::delete('/tugas/{id}', "TugasController@destroy");

Route::get('/game', "GameController@index");
Route::get('/game/create', "GameController@create");
Route::post('/game', "GameController@store");
Route::get('/game/{id}', "GameController@show");
Route::put('/game/{id}', "GameController@update");
Route::delete('/game/{id}', "GameController@destroy");

Route::get('/siswa', "SiswaController@index");
Route::get('/siswa/create', "SiswaController@create");
Route::post('/siswa', "SiswaController@store");
Route::put('/siswa/{id}', "SiswaController@update");
Route::delete('/siswa/{id}', "SiswaController@destroy");

Route::get('/tugas-siswa', "TugasSiswaController@index");
Route::put('/tugas-siswa/{id}', "TugasSiswaController@update");

Route::get('/hasil-tugas',"TugasSiswaController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
