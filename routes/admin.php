<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'auth'], function () {
        // Admin login
        Route::post('/login', 'Auth\LoginController@login');
    });
});
