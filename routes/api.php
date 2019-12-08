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
Route::get('/showgamesoutstanding', 'General\GeneralController@GamesOutstanding');

Route::group(['middleware' => 'auth:api'], function () {
	Route::get('auth/logout', 'Auth\LoginController@logout');
    Route::resource('leagues', 'Api\LeagueController')->except([
	    'create', 'edit'
	]);
	Route::put('games/updateOutstanding/{id}', 'Api\GameController@updateOutstanding');
	Route::resource('games', 'Api\GameController')->except([
	    'create', 'edit'
	]);
	Route::resource('teams', 'Api\TeamController')->except([
	    'create', 'edit'
	]);
	Route::get('categories', 'Admin\AdminController@loadCategories');
	Route::get('countries', 'Admin\AdminController@loadCountries');
	Route::get('updates', 'Admin\AdminController@loadUpdates');	

	Route::group(['prefix' => 'player'], function () {
        Route::get('/selections/load', 'Api\SessionController@loadSelections');
        Route::post('/selections/add', 'Api\SessionController@select');
        Route::delete('/selections/delete/{id}', 'Api\SessionController@deleteSelect');
        Route::post('/login', 'Api\SessionController@login');
        Route::post('/ticket/add', 'Api\TicketController@add');
    });
});