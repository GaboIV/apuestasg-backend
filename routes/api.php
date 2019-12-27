<?php

use Illuminate\Http\Request;

// Obtener hora
Route::get('/hora', 'General\GeneralController@hora');

//Número de juegos por categoría
Route::get('/showgamesbycategory', 'General\GeneralController@showGamesByCategory');

// Ver juegos por categoría
Route::get('/showgames/{id}', 'General\GeneralController@GamesByCategory');

// Ver juegos destacados
Route::get('/showgamesoutstanding', 'General\GeneralController@GamesOutstanding');

// Ver equipos por búsqueda de nombre
Route::post('games/byName', 'General\GeneralController@GamesBySearch');

// Ver cuentas de banco disponibles
Route::get('accounts', 'General\GeneralController@getAccounts');

// Ver cuentas de banco disponibles
Route::get('banks', 'General\GeneralController@getBanks');

// Subida de imágenes
Route::post('images', 'General\GeneralController@imageUploadPost')->name('image.upload.post');

Route::group(['prefix' => 'auth'], function () {
    // Login de jugador y administrador
    Route::post('/login', 'Auth\LoginController@login');

    // Registro de jugador
    Route::post('/register', 'Auth\RegisterController@createPlayer');
});


Route::group(['middleware' => 'auth:api'], function () {
	// Cerrar sesión
	Route::get('auth/logout', 'Auth\LoginController@logout');

	// Chagelog
	Route::get('changelogs', 'Admin\AdminController@getChangelog');

	// Ligas
	Route::post('leagues/category/country', 'Api\LeagueController@byCategory');
    Route::resource('leagues', 'Api\LeagueController')->except([
	    'create', 'edit'
	]);
	Route::get('updates', 'Admin\AdminController@loadUpdatesLeagues');	

    // Partidos
	Route::put('games/updateOutstanding/{id}', 'Api\GameController@updateOutstanding');
	Route::post('games/byFilters', 'Api\GameController@byFilters');
	Route::get('games/{id}', 'Api\GameController@one');
	Route::resource('games', 'Api\GameController')->except([
	    'create', 'edit'
	]);

	// Resultados
	Route::post('results/gamesByFilters', 'Api\ResultController@byFilters');
	Route::post('results', 'Api\ResultController@resultCharge');

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
        Route::get('/transactions', 'Api\PlayerController@getTransactions');
        Route::post('/selections/add', 'Api\SessionController@select');
        Route::delete('/selections/delete/{id}', 'Api\SessionController@deleteSelect');
        Route::post('/login', 'Api\SessionController@login');
        Route::post('/ticket/add', 'Api\TicketController@add');
        Route::get('/ticket/load', 'Api\TicketController@loadTickets');
        Route::put('/updates/personal', 'Api\PlayerController@updatePersonal');
        Route::put('/updates/complement', 'Api\PlayerController@updatePersonal');
		Route::post('/pays', 'Api\PlayerController@registerPay');
		Route::get('/pays', 'Api\PlayerController@getPays');
	});
	
	// Caballos
	Route::group(['prefix' => 'horses'], function () {
        Route::get('', 'Api\HorseController@getHorses');
        Route::put('/{id}', 'Api\HorseController@update');

        Route::get('/madrillasui', 'Api\HorseController@getMadrillasUi');
        Route::post('/madrillas', 'Api\HorseController@addMadrilla');

        Route::get('/padrillosui', 'Api\HorseController@getPadrillosUi');
        Route::post('/padrillos', 'Api\HorseController@addPadrillo');

        Route::get('/haras', 'Api\HorseController@getHaras');
    });
});