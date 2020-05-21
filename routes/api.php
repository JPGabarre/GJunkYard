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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users','APIController@indexUsers');

Route::get('/users/show/{id}','APIController@showUser');

Route::get('/rols','APIController@indexRols');

Route::get('/rols/show/{id}','APIController@showRols');

Route::get('/tipus_vehicles','APIController@indexTipusVehicles');

Route::get('/tipus_vehicles/show/{id}','APIController@showTipusVehicle');

Route::get('/vehicles','APIController@indexVehicles');

Route::get('/vehicles/show/{id}','APIController@showVehicle');

Route::get('/peces','APIController@indexPeces');

Route::get('/peces/show/{id}','APIController@showPece');

Route::get('/tipus_treball','APIController@indexTipusTreballs');

Route::get('/tipus_treball/show/{id}','APIController@showTipusTreball');

Route::get('/treballs','APIController@indexTreballs');

Route::get('/treballs/show/{id}','APIController@showTreball');
