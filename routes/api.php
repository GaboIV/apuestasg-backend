<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'auth'], function () {
    // Login
    Route::post('/login', 'Auth\LoginController@login');

    // Registro de jugador
    Route::post('/register', 'Auth\RegisterController@createPlayer');
});

Route::get('/hora', 'General\GeneralController@hora');
Route::get('/showgamesbycategory', 'General\GeneralController@showGamesByCategory');
Route::get('/showgames/{id}', 'General\GeneralController@GamesByCategory');

Route::group(['middleware' => 'auth:api'], function () {
	Route::get('auth/logout', 'Auth\LoginController@logout');
    Route::resource('leagues', 'Api\LeagueController')->except([
	    'create', 'edit'
	]);
	Route::resource('games', 'Api\GameController')->except([
	    'create', 'edit'
	]);
});