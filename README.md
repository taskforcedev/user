Task Force Dev User Laravel Package
====
![Travis Build](https://travis-ci.org/taskforcedev/user.svg?branch=master)


A laravel package providing routes, controller and views for user login/register, etc.

### Installation ###

To install the package add the following line to your composer.json

<code>
"require": {
    "taskforcedev/user": "dev-master"
}
</code>

After doing this you should dump autoload preferably using artisan

<code>php artisan dump-autoload</code>


### Service Provider ###

After this you should add the following service provider to your app/config/app.php

<code>'Taskforcedev\User\UserServiceProvider',</code>


### Overwriting Config ###
The package comes with default config however you can publish this to overwrite with your own

<code>php artisan config:publish Taskforcedev/user</code>


### Views ###
The package comes with some default views however you can publish these to overwrite them using the following command

<code>php artisan view:publish Taskforcedev/user</code>