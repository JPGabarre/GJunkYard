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

Route::get('/','HomeController@getHome');

/* Rutes per administrar el inventari */
Route::get('/inventari','InventariController@getInventari')->middleware('auth');

Route::get('/inventari/show/{id}','InventariController@getVehicle')->middleware('auth');

Route::get('/inventari/create','InventariController@getCreateVehicle')->middleware('auth');

Route::get('/inventari/edit/{id}','InventariController@getEditVehicle')->middleware('auth');

Route::post('/inventari/create','InventariController@postCreateTVehicle')->middleware('auth');

Route::put('/inventari/edit/{id}','InventariController@putEditTVehicle')->middleware('auth');

Route::put('/inventari/delete/{id}','InventariController@deleteVehicle')->middleware('auth');

//Peces
Route::get('/inventari/create/{id}/peces','InventariController@getCreatePece')->middleware('auth');

Route::post('/inventari/create/{id}/peces','InventariController@CreatePeceSelect')->middleware('auth');

Route::get('/peces/edit/{id}','InventariController@getEditPece')->middleware('auth');

Route::put('/peces/edit/{id}','InventariController@putEditPece')->middleware('auth');

Route::put('/peces/delete/{id}','InventariController@deletePece')->middleware('auth');

/* Rutes per administrar les tasques*/
Route::get('/treballs','TreballsController@getTreballs')->middleware('auth');

Route::get('/treballs/show/{id}','TreballsController@getTreball')->middleware('auth');

Route::get('/treballs/create','TreballsController@getCreateTreball')->middleware('auth');

Route::get('/treballs/edit/{id}','TreballsController@getEditTreball')->middleware('auth');

Route::post('/treballs/create','TreballsController@postCreateTreball')->middleware('auth');

Route::put('/treballs/edit/{id}','TreballsController@putEditTreball')->middleware('auth');

Route::put('/treballs/delete/{id}','TreballsController@deleteTreball')->middleware('auth');

/* Rutes per administrar usuaris (només podra accedir el admin) */
Route::get('/users','UsersController@getUsers')->middleware('auth');

Route::get('/users/show/{id}','UsersController@getUser')->middleware('auth');

Route::get('/users/create','UsersController@getCreateUser')->middleware('auth');

Route::get('/users/edit/{id}','UsersController@getEditUser')->middleware('auth');

Route::post('/users/create','UsersController@postCreateUser')->middleware('auth');

Route::put('/users/edit/{id}','UsersController@putEditUser')->middleware('auth');

Route::put('/users/delete/{id}','UsersController@deleteUser')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
