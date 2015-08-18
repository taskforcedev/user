<?php

Route::group(['namespace' => 'Taskforcedev\User\Http\Controllers'], function() {
    /* Forms */
    Route::get('login',     ['as' => 'laravel-user.login.form',    'uses' => 'UserController@loginForm']);
    Route::get('register',  ['as' => 'laravel-user.register.form', 'uses' => 'UserController@registerForm']);
    Route::get('user',      ['as' => 'laravel-user.home',          'uses'=> 'UserController@profile']);

    /* Logout */
    Route::get('logout',    ['as' => 'laravel-user.logout',        'uses' => 'UserController@logout']);

    /* Actions */
    Route::post('login',    ['as' => 'laravel-user.login',         'uses' => 'UserController@login']);
    Route::post('register', ['as' => 'laravel-user.registration',  'uses' => 'UserController@registration']);
});
