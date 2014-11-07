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
        'layout' => 'layouts/master',
        'section' => 'content'
    ),

    'registration_fields' => array(
        'username' => array(
            'username' => 'text',
            'password' => 'password',
            'confirm_password' => 'password',
        ),
        'email' => array(
            'email' => 'text',
            'password' => 'password',
            'confirm_password' => 'password',
        ),
        'profile' => array(
            'username' => 'text',
            'email' => 'text',
            'password' => 'password',
            'confirm_password' => 'password',
        )
    ),

    'login_fields' => array(
        'username' => array(
            'username' => 'text',
            'password' => 'password',
        ),
        'email' => array(
            'email' => 'text',
            'password' => 'password',
        ),
        'profile' => array(
            'username' => 'text',
            'email' => 'text',
            'password' => 'password',
        )
    )
);