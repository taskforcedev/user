<?php

/* Forms */
Route::get('login', ['as' => 'tfdev.login.form', 'uses' => 'Taskforcedev\User\Controllers\UserController@loginForm']);
Route::get('register', ['as' => 'tfdev.register.form', 'uses' => 'Taskforcedev\User\Controllers\UserController@registerForm']);
Route::get('profile', ['as' => 'tfdev.profile', 'uses'=> 'Taskforcedev\User\Controllers\UserController@profile']);

/* Logout */
Route::get('logout', ['as' => 'tfdev.logout', 'uses' => 'Taskforcedev\User\Controllers\UserController@logout']);

/* Actions */
Route::post('login', ['as' => 'tfdev.login', 'uses' => 'Taskforcedev\User\Controllers\UserController@login']);
Route::post('register', ['as' => 'tfdev.registration', 'uses' => 'Taskforcedev\User\Controllers\UserController@registration']);
