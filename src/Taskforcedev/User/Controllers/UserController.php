<?php

namespace Taskforcedev\User\controllers;

use \Auth;
use \Input;
use \Redirect;
use \Hash;

class UserController extends \Controller
{
    public function loginForm()
    {
        /* Config */
        $fields = $this->getPageConfig('login');
        $layout = \Config::get('taskforcedev::user.views.layout');
        $section = \Config::get('taskforcedev::user.views.section');

        $flash = $flash = \Session::get('taskforce_user_message');

        $data = [
            'fields' => $fields,
            'layout' => $layout,
            'section' => $section,
            'flash' => $flash,
            'flash_type' => 'error'
        ];
        return \View::make('taskforcedev::login', $data);
    }

    /**
     * Login functionality (POST)
     * @return mixed
     */
    public function login()
    {
        $fields = $this->getPageConfig('login');
        foreach ($fields as $field => $type) {
            if (!Input::has($field))
            {
                return \Redirect::route('tfdev.login.form');
            }
        }

        $data = $this->populateInput();

        // Attempt to authenticate
        $default_route = $this->getDefaultRoute();
        if (Auth::attempt($data))
        {
            return \Redirect::route($default_route);
        }
    }

    /**
     * Login functionality (GET)
     * @return mixed
     */
    public function logout()
    {
        Auth::logout();
        return \Redirect::route('tfdev.login.form');
    }

    public function isDebugging()
    {
        return \Config::get('taskforcedev::user.views.layout');
    }

    /**
     * Registration Form (GET)
     * @return mixed
     */
    public function registerForm()
    {
        // Get the fields from the config
        $fields = $this->getPageConfig('registration');
        $layout = \Config::get('taskforcedev::user.views.layout');
        $section = \Config::get('taskforcedev::user.views.section');

        $flash = \Session::get('taskforce_user_message');

        $data = [
            'fields' => $fields,
            'layout' => $layout,
            'section' => $section,
            'flash' => $flash,
            'flash_type' => 'error'
        ];
        return \View::make('taskforcedev::register', $data);
    }

    /**
     * Registration (POST)
     * @return mixed
     */
    public function registration()
    {
        $fields = $this->getPageConfig('registration');

        foreach ($fields as $field => $type) {
            if (!Input::has($field))
            {
                return \Redirect::route('tfdev.register.form');
            }
        }

        $data = $this->populateInput();

        $this->createUser($data);

        // Attempt to authenticate

        if (Auth::attempt($data))
        {
            $default_route = $this->getDefaultRoute();
            return \Redirect::route($default_route);
        } else {
            return \Redirect::route('tfdev.register.form');
        }
    }

    public function createUser($data)
    {
        $newdata = $data;
        $newdata['password'] = Hash::make($data['password']);
        $user = \User::create($newdata);
        return $user;
    }

    public function getPageConfig($page)
    {
        // get main config
        $config = \Config::get('taskforcedev::user');
        $auth_type = $this->getAuthType();
        $fields = $config[$page . '_fields'][$auth_type];
        return $fields;
    }

    public function getAuthType()
    {
        $config = \Config::get('taskforcedev::user');
        return $config['auth_type'];
    }

    public function getDefaultRoute()
    {
        $config = \Config::get('taskforcedev::user');
        return $config['default_route'];
    }


    public function populateInput()
    {
        switch ($this->getAuthType()) {
            case 'email':
                $data = [
                    'email' => Input::get('email'),
                    'password' => Input::get('password')
                ];
                break;
            case 'username':
                $data = [
                    'username' => Input::get('username'),
                    'password' => Input::get('password')
                ];
                break;
            case 'profile':
                $data = [
                    'username' => Input::get('username'),
                    'email' => Input::get('email'),
                    'password' => Input::get('password')
                ];
                break;
            default:
                $data = [
                    'username' => Input::get('username'),
                    'password' => Input::get('password')
                ];
                break;
        }

        return $data;
    }

    public function profile()
    {
        $user = Auth::user();
        $data = [
            'user' => $user
        ];
        return \View::make('taskforcedev::profile', $data);
    }
}
