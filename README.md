User Package
====
A package for Laravel 5 (4 branch also available) which provides routes, views and controllers for authentication including register, login, logout and home.

![Travis Build](https://travis-ci.org/taskforcedev/user.svg?branch=master) [![Latest Stable Version](https://poser.pugx.org/taskforcedev/user/v/stable.svg)](https://packagist.org/packages/taskforcedev/user) [![Total Downloads](https://poser.pugx.org/taskforcedev/user/downloads.svg)](https://packagist.org/packages/taskforcedev/user) [![Latest Unstable Version](https://poser.pugx.org/taskforcedev/user/v/unstable.svg)](https://packagist.org/packages/taskforcedev/user) [![License](https://poser.pugx.org/taskforcedev/user/license.svg)](https://packagist.org/packages/taskforcedev/user)

### About ###

A Laravel package providing routes, controller and views for user login/register, etc.

The package follows convention over configuration, examples of this are using the User model that ships with laravel, it is assumed you will create your own migrations etc for this.

What this package provides is an out-of-the-box authentication system built on top of the Laravel model.

Routes:

    get   /login       shows the login form.
    get   /register    shows the registration form.
    post  /login       logs the user in.
    post  /register    registers the user (creates their account).
    get   /user        the default page once the user is logged in.
    get   /logout      logs the user out (takes them to the login page).

### Installation ###

To install the package add the following line to your composer.json

<code>
"require": {
    "taskforcedev/user": "5.*"
}
</code>

After doing this you should run composer update, then a dump autoload preferably using artisan

<code>php artisan dump-autoload</code>


#### Service Provider ####

After this you should add the following service provider to your config/app.php

<code>Taskforcedev\User\ServiceProvider::class,</code>

Also if not present please also add the following service provider.

<code>Taskforcedev\LaravelSupport\ServiceProvider::class,</code>

#### Overwriting Config ####
The package comes with default config however you will likely wish to publish this and overwrite with your own config settings.

<code>php artisan vendor:publish --tag="user-config"</code>

### Common Problems ###

#### Illuminate \ Database \ Eloquent \ MassAssignmentException  username #####
For this you need to add the following to your App/Models/User.php

<code>protected $fillable = ['username', 'password'];</code>
