<?php

/* Forms */
Route::get('login', 'Taskforcedev\User\Controllers\UserController@loginForm');
Route::get('register', 'Taskforcedev\User\Controllers\UserController@registerForm');
Route::get('profile', 'Taskforcedev\User\Controllers\UserController@profile');

/* Actions */
Route::post('login', 'Taskforcedev\User\Controllers\UserController@login');
Route::post('register', 'Taskforcedev\User\Controllers\UserController@registration');
