<?php

return array(
    /*
    |--------------------
    | Authentication Type
    |--------------------
    |
    | Allows you to choose the type of authentication required by the application
    |
    | Allowed Values:
    |  'username',  provides a username/password style of registration/login (does not send email)
    |  'email',  provides an email/password style of registration/login (sends email)
    |  'profile',  a full registration, username, email and personal details are required (configure on the views)
    |
    |
    */
    'auth_type' => 'profile',

    // The page that the user is taken to after successful login

    'default_route' => 'laravel-user.home',

    /*
    |--------------------
    | Registration Fields
    |--------------------
    |
    | Provides Configuration to allow views to populate the required fields
    | eg. username => text  would create a text input with the id "username" and label "Username"
    |
    */

    'views' => array(
        'layout' => 'laravel-user::layouts.master',
    ),

    'registration_fields' => array(
        'username' => array(
            'name' => 'text',
            'password' => 'password',
            'confirm_password' => 'password',
        ),
        'email' => array(
            'email' => 'text',
            'password' => 'password',
            'confirm_password' => 'password',
        ),
        'profile' => array(
            'name' => 'text',
            'email' => 'text',
            'password' => 'password',
            'confirm_password' => 'password',
        )
    ),

    'login_fields' => array(
        'username' => array(
            'name' => 'text',
            'password' => 'password',
        ),
        'email' => array(
            'email' => 'text',
            'password' => 'password',
        ),
        'profile' => array(
            'name' => 'text',
            'password' => 'password',
        )
    )
);
