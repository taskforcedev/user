<?php namespace Taskforcedev\User\Http\Controllers;

use \Auth;
use \Config;
use \Input;
use \Redirect;
use \Request;
use \Hash;
use Taskforcedev\LaravelSupport\Http\Controllers\Controller;

class UserController extends Controller
{
    public function loginForm()
    {
        $default_route = $this->getDefaultRoute();
        if (Auth::check()) {
            return redirect()->route($default_route);
        }

        /* Config */
        $data = $this->buildData();
        $data['fields'] = $this->getLoginFields();
        $data['flash'] = \Session::get('taskforce_user_message');


        return \View::make('laravel-user::login', $data);
    }

    /**
     * Login functionality (POST)
     * @return mixed
     */
    public function login()
    {
        $default_route = $this->getDefaultRoute();

        $fields = ['name', 'email', 'password'];
        $data = Request::only('name', 'email', 'password');

        /* If any field is null remove it from the array to enable authentication. */
        foreach ($fields as $field) {
            if (array_key_exists($field, $data)) {
                $value = $data[$field];
                if (!isset($value)) {
                    unset($data[$field]);
                }
            }
        }

        // Attempt to authenticate
        if (Auth::attempt($data))
        {
            return redirect()->route($default_route);
        } else {
            return redirect()->route('laravel-user.login.form');
        }
    }

    /**
     * Login functionality (GET)
     * @return mixed
     */
    public function logout()
    {
        Auth::logout();
        return \Redirect::route('laravel-user.login.form');
    }

    public function isDebugging()
    {
        return config('laravel-user::user.views.layout');
    }

    /**
     * Registration Form (GET)
     * @return mixed
     */
    public function registerForm()
    {
        // Get the fields from the config

        $flash = \Session::get('taskforce_user_message');

        $data = $this->buildData();
        $data['fields'] = $this->getRegistrationFields();
        $data['flash'] = $flash;
        $data['flash_type'] = 'error';

        return view('laravel-user::register', $data);
    }

    /**
     * Registration (POST)
     * @return mixed
     */
    public function registration()
    {
        $data = Request::only(['name', 'password', 'confirm_password', 'email']);

        $this->createUser($data);

        if (Auth::attempt($data))
        {
            $default_route = $this->getDefaultRoute();
            return Redirect::route($default_route);
        } else {
            return Redirect::route('laravel-user.register.form');
        }
    }

    public function createUser($data)
    {
        $newdata = $data;
        $newdata['password'] = Hash::make($data['password']);
        $model = $this->getUserModel();
        $user = $model::create($newdata);
        return $user;
    }

    public function profile()
    {
        if (!Auth::check()) {
            return Redirect::route('laravel-user.login');
        }

        $user = Auth::user();
        $data = $this->buildData();
        $data['user'] = $user;
        return view('laravel-user::profile', $data);
    }

    public function getAuthType()
    {
        return config('laravel-user.auth_type');
    }

    private function getDefaultRoute()
    {
        return config('laravel-user.default_route');
    }

    private function getRegistrationFields()
    {
        $type = $this->getAuthType();
        return config('laravel-user.registration_fields.' . $type);
    }

    private function getLoginFields()
    {
        $type = $this->getAuthType();
        return config('laravel-user.login_fields.' . $type);
    }

    public function getDefaultLayout()
    {
        return config('laravel-user::user.views.layout');
    }
}
