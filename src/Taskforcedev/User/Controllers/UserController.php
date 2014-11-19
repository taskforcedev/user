<?php

namespace Taskforcedev\User\controllers;

use \Auth;
use \Input;
use \Redirect;

class UserController extends \Controller
{
    public function loginForm()
    {
        /* Config */
        $fields = $this->getPageConfig('login');
        $layout = \Config::get('taskforcedev::user.views.layout');
        $section = \Config::get('taskforcedev::user.views.section');

        $data = [
            'fields' => $fields,
            'layout' => $layout,
            'section' => $section,
        ];
        return \View::make('taskforcedev::login', $data);
    }

    public function login()
    {
        $fields = $this->getPageConfig('login');
        foreach ($fields as $field => $type) {
            if (!Input::has($field))
            {
                Redirect::to('login');
            }
        }

        $data = $this->populateInput();

        // Attempt to authenticate
        $default_page = $this->getDefaultPage();
        if (Auth::attempt($data))
        {
            return Redirect::intended($default_page);
        }
    }

    public function registerForm()
    {
        // Get the fields from the config
        $fields = $this->getPageConfig('registration');
        $layout = \Config::get('taskforcedev::user.views.layout');
        $section = \Config::get('taskforcedev::user.views.section');

        $data = [
            'fields' => $fields,
            'layout' => $layout,
            'section' => $section,
        ];
        return \View::make('taskforcedev::register', $data);
    }

    public function registration()
    {
        $fields = $this->getPageConfig('registration');

        foreach ($fields as $field => $type) {
            if (!Input::has($field))
            {
                Redirect::to('register');
            }
        }

        $data = $this->populateInput();

        User::create($data);

        // Attempt to authenticate
        $default_page = $this->getDefaultPage();
        if (Auth::attempt($data))
        {
            return Redirect::intended($default_page);
        }
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

    public function getDefaultPage()
    {
        $config = \Config::get('taskforcedev::user');
        return $config['default_page'];
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
}