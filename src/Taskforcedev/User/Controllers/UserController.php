<?php

namespace Taskforcedev\User\controllers;

class UserController extends \Controller
{
    public function login()
    {
        // Get the fields from the config
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

    public function register()
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

    public function getPageConfig($page)
    {
        // get main config
        $config = \Config::get('taskforcedev::user');
        $auth_type = $config['auth_type'];
        $fields = $config[$page . '_fields'][$auth_type];
        return $fields;
    }
}