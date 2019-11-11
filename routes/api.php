<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'auth'], function () {
    // Login de jugador y administrador
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
	Route::get('categories', 'Admin\AdminController@loadCategories');
	Route::get('countries', 'Admin\AdminController@loadCountries');
	Route::get('updates', 'Admin\AdminController@loadUpdates');
});