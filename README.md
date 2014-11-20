User Laravel Package
====
Task Force Development Studio
----

![Travis Build](https://travis-ci.org/taskforcedev/user.svg?branch=master) [![Latest Stable Version](https://poser.pugx.org/taskforcedev/user/v/stable.svg)](https://packagist.org/packages/taskforcedev/user) [![Total Downloads](https://poser.pugx.org/taskforcedev/user/downloads.svg)](https://packagist.org/packages/taskforcedev/user) [![Latest Unstable Version](https://poser.pugx.org/taskforcedev/user/v/unstable.svg)](https://packagist.org/packages/taskforcedev/user) [![License](https://poser.pugx.org/taskforcedev/user/license.svg)](https://packagist.org/packages/taskforcedev/user)


A laravel package providing routes, controller and views for user login/register, etc.

The package follows convention over configuration, examples of this are using the User model that ships with laravel, it is assumed you will create your own migrations etc for this.
Also the convention assumes you have a views/layouts/master file which all the views provided by this package extend.  You can of course override these.

### Installation ###

To install the package add the following line to your composer.json

<code>
"require": {
    "taskforcedev/user": "dev-master"
}
</code>

After doing this you should run composer update, then a dump autoload preferably using artisan

<code>php artisan dump-autoload</code>


### Service Provider ###

After this you should add the following service provider to your app/config/app.php

<code>'Taskforcedev\User\UserServiceProvider',</code>


### Overwriting Config ###
The package comes with default config however you will likely wish to publish this and overwrite with your own config settings.

<code>php artisan config:publish Taskforcedev/user</code>


### Views ###
The package comes with some default views however you can publish these to overwrite them using the following command

<code>php artisan view:publish Taskforcedev/user</code>




### Common Problems ###
####Illuminate \ Database \ Eloquent \ MassAssignmentException  username #####
For this you need to add the following to your App/Models/User.php
<code>protected $fillable = ['username', 'password'];</code>
