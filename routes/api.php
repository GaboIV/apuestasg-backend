<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'auth'], function () {
    // Login de jugador y administrador
    Route::post('/login', 'Auth\LoginController@login');

    // Registro de jugador
    Route::post('/register', 'Auth\RegisterController@createPlayer');
});

// Obtener hora
Route::get('/hora', 'General\GeneralController@hora');

//Número de juegos por categoría
Route::get('/showgamesbycategory', 'General\GeneralController@showGamesByCategory');

// Ver juegos por categoría
Route::get('/showgames/{id}', 'General\GeneralController@GamesByCategory');

// Ver juegos destacados
Route::get('/showgamesoutstanding', 'General\GeneralController@GamesOutstanding');

Route::group(['middleware' => 'auth:api'], function () {
	// Cerrar sesión
	Route::get('auth/logout', 'Auth\LoginController@logout');

	// Ligas
	Route::post('leagues/category/country', 'Api\LeagueController@byCategory');
    Route::resource('leagues', 'Api\LeagueController')->except([
	    'create', 'edit'
	]);
	Route::get('updates', 'Admin\AdminController@loadUpdatesLeagues');	

    // Partidos
	Route::put('games/updateOutstanding/{id}', 'Api\GameController@updateOutstanding');
	Route::post('games/byFilters', 'Api\GameController@byFilters');
	Route::resource('games', 'Api\GameController')->except([
	    'create', 'edit'
	]);

	// Equipos
	Route::get('teams/byleague/{id}', 'Api\TeamController@byLeague');
	Route::resource('teams', 'Api\TeamController')->except([
	    'create', 'edit'
	]);

	// Categorías
	Route::get('categories', 'Admin\AdminController@loadCategories');

	//Paises
	Route::get('countries', 'Admin\AdminController@loadCountries');

	// Jugadores
	Route::group(['prefix' => 'player'], function () {
        Route::get('/selections/load', 'Api\SessionController@loadSelections');
        Route::post('/selections/add', 'Api\SessionController@select');
        Route::delete('/selections/delete/{id}', 'Api\SessionController@deleteSelect');
        Route::post('/login', 'Api\SessionController@login');
        Route::post('/ticket/add', 'Api\TicketController@add');
    });
});