<?php

use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'auth'], function () {
    // Login de jugador y administrador
    Route::post('/login', 'Auth\LoginController@login');

    // Registro de jugador
    Route::post('/register', 'Auth\RegisterController@createPlayer');
});

Route::group(['prefix' => 'public'], function () {
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

    // Carreras
    Route::group(['prefix' => 'careers'], function () {
        Route::get('/{id}', 'General\GeneralController@getCareers');
    });
});











// Subida de imágenes
Route::post('images', 'General\GeneralController@imageUploadPost')->name('image.upload.post');






Route::group(['middleware' => 'auth:api'], function () {
	// Cerrar sesión
    Route::get('auth/logout', 'Auth\LoginController@logout');
    
    // Rutas de Administrador
    Route::group(['prefix' => 'admin'], function () {
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
        Route::post('results/careersByFilters', 'Api\ResultController@byHipismFilters');
        Route::post('results', 'Api\ResultController@resultCharge');
        Route::post('resultshipism', 'Api\ResultController@resultHipismCharge');

        // Equipos
        Route::get('teams/byleague/{id}', 'Api\TeamController@byLeague');
        Route::resource('teams', 'Api\TeamController')->except([
            'create', 'edit'
        ]);

        // Categorías
        Route::get('categories', 'Admin\AdminController@loadCategories');

        //Paises
        Route::get('countries', 'Admin\AdminController@loadCountries');

        // Studs
        Route::resource('studs', 'Admin\Horses\StudController')->except([
            'create', 'edit'
        ]);

        // Caballos
        Route::group(['prefix' => 'horses'], function () {
            Route::get('', 'Api\HorseController@getHorses');
            Route::put('/{id}', 'Api\HorseController@update');

            Route::get('/madrillasui', 'Api\HorseController@getMadrillasUi');
            Route::post('/madrillas', 'Api\HorseController@addMadrilla');

            Route::get('/padrillosui', 'Api\HorseController@getPadrillosUi');
            Route::post('/padrillos', 'Api\HorseController@addPadrillo');

            Route::resource('haras', 'Admin\Horses\HarasController')->except([
                'create', 'edit'
            ]);
            
            Route::resource('horses/jockeys', 'Admin\Horses\JockeyController')->except([
                'create', 'edit'
            ]);
        });
    });	

	// Jugadores
	Route::group(['prefix' => 'player'], function () {
        Route::get('/selections/load', 'Api\SessionController@loadSelections');
        Route::get('/transactions', 'Api\PlayerController@getTransactions');
        Route::post('/selections/add', 'Api\SessionController@select');
        Route::post('/selections/addhipism', 'Api\SessionController@selectHipism');
        Route::delete('/selections/delete/{id}', 'Api\SessionController@deleteSelect');
        Route::post('/login', 'Api\SessionController@login');
        Route::post('/ticket/add', 'Api\TicketController@add');
        Route::post('/ticket/addhipism', 'Api\TicketController@addHipism');
        Route::get('/ticket/load', 'Api\TicketController@loadTickets');
        Route::put('/updates/personal', 'Api\PlayerController@updatePersonal');
        Route::put('/updates/complement', 'Api\PlayerController@updatePersonal');
		Route::post('/pays', 'Api\PlayerController@registerPay');
		Route::get('/pays', 'Api\PlayerController@getPays');
	});
});