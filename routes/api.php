<?php

use Illuminate\Support\Facades\Route;

// Subida de imágenes
Route::post('images', 'General\GeneralController@imageUploadPost')->name('image.upload.post');

Route::group(['prefix' => 'auth'], function () {
    // Login de jugador y administrador
    Route::post('/login', 'Auth\LoginController@login');

    // Registro de jugador
    Route::post('/register', 'Auth\RegisterController@createPlayer');
});

Route::group(['prefix' => 'public'], function () {
    // Obtener hora
    Route::get('/hora', 'General\GeneralController@hora');

    // Sidebar
    Route::get('/sidebar', 'General\SidebarController@getLeagues');

    //Número de juegos por categoría
    Route::get('/showgamesbycategory', 'General\GeneralController@showGamesByCategory');

    // Ver juegos por categoría
    Route::get('/showgames/{id}', 'General\GeneralController@GamesByCategory');

    // Ver juegos destacados
    Route::get('/showgamesoutstanding', 'General\GeneralController@GamesOutstanding');

    // Ver equipos por búsqueda de nombre
    Route::post('games/byName', 'General\GeneralController@GamesBySearch');

    // Ver partidos por liga
    Route::get('games/byleague/{id}', 'General\GeneralController@GamesByLeague');

    // Ver cuentas de banco disponibles
    Route::get('accounts', 'General\GeneralController@getAccounts');

    // Ver cuentas de banco disponibles
    Route::get('banks', 'General\GeneralController@getBanks');

    // Carreras
    Route::group(['prefix' => 'racecourses'], function () {
        Route::get('', 'General\GeneralController@getRacecourses');
    });

    // Carreras
    Route::group(['prefix' => 'careers'], function () {
        Route::get('/{id}', 'General\GeneralController@getCareers');
    });

    // Promociones
    Route::group(['prefix' => 'promos'], function () {
        Route::get('next', 'Api\PromoController@getNextPromo');
    });
});

Route::group(['middleware' => 'auth:api'], function () {
	// Cerrar sesión
    Route::get('auth/logout', 'Auth\LoginController@logout');

    // Rutas de Administrador
    Route::group(['prefix' => 'admin'], function () {
        // Chagelog
        Route::resource('changelogs', 'Admin\ChangelogController')->except([
            'create', 'edit'
        ]);

        // Ligas
        Route::patch('leagues/{id}/attach', 'Admin\LeagueController@attachNameUk');
        Route::patch('leagues/{id}/dettach', 'Admin\LeagueController@dettachNameUk');
        Route::post('leagues/category/country', 'Api\LeagueController@byCategory');
        Route::post('leagues/{id}/sync', 'Admin\LeagueController@sync');
        Route::post('leagues/sync48', 'Admin\LeagueController@syncLeagues48');
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

        // Tickets
        Route::post('tickets/verify', 'Api\TicketController@verify');

        // Resultados
        Route::post('results/gamesByFilters', 'Api\ResultController@byFilters');
        Route::post('results/careersByFilters', 'Api\ResultController@byHipismFilters');
        // Route::post('results', 'Api\ResultController@resultCharge');
        Route::post('results', 'Api\ResultController@resultSections');
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
        Route::put('countries/{id}', 'Admin\AdminController@updateCountry');

        // Studs
        Route::resource('studs', 'Admin\Horses\StudController')->except([
            'create', 'edit'
        ]);

        // Players
        Route::resource('players', 'Admin\PlayerController')->except([
            'create', 'edit'
        ]);

        // Usuarios internos
        Route::resource('users', 'Admin\UserController')->except([
            'create', 'edit'
        ]);

        // Caballos
        Route::group(['prefix' => 'horses'], function () {
            Route::patch('horses/jacket_url/{id}', 'Admin\Horses\HorseController@changeJacketUrl');
            Route::get('', 'Api\HorseController@getHorses');
            Route::put('/{id}', 'Api\HorseController@update');

            Route::get('/madrillasui', 'Api\HorseController@getMadrillasUi');
            Route::post('/madrillas', 'Api\HorseController@addMadrilla');

            Route::get('/padrillosui', 'Api\HorseController@getPadrillosUi');
            Route::post('/padrillos', 'Api\HorseController@addPadrillo');

            Route::resource('haras', 'Admin\Horses\HarasController')->except([
                'create', 'edit'
            ]);

            Route::resource('jockeys', 'Admin\Horses\JockeyController')->except([
                'create', 'edit'
            ]);

            Route::resource('trainers', 'Admin\Horses\TrainerController')->except([
                'create', 'edit'
            ]);

            Route::post('/racecourses/{id}/sync/{date}', 'Admin\Horses\RacecourseController@syncCareers');
            Route::post('/racecourses/sync', 'Admin\Horses\RacecourseController@syncRacecoursesByDate');
            Route::resource('racecourses', 'Admin\Horses\RacecourseController')->except([
                'create', 'edit'
            ]);

            Route::post('/careers/sync', 'Admin\Horses\CareerController@sync');
            Route::resource('careers', 'Admin\Horses\CareerController')->except([
                'create', 'edit'
            ]);

            Route::resource('horses', 'Admin\Horses\HorseController')->except([
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
