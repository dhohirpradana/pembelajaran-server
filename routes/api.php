<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get("login",        "Api\AuthController@login");

Route::get("materi",        "Api\MateriController@index");
Route::get("materi/{id}",   "Api\MateriController@show");

Route::get("game",          "Api\GameController@index");
Route::get("game/{id}",     "Api\GameController@show");

Route::get("tugas",         "Api\TugasController@index");
Route::get("tugas/{id}",     "Api\TugasController@show");
