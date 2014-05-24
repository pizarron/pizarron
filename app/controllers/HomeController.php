<?php

class HomeController extends BaseController {

	public function index() {
        return View::make('home.index');
	}

    public function logout() {
        Auth::logout();

        return Redirect::to('/');
    }

    public function login() {
        return View::make('home.login');
    }

    public function doLogin() {
        if (!Auth::attempt(Input::only(array('email', 'password')))) {
            return Redirect::back()
                ->withInput()
                ->with('error', 'Invalid credentials');
        }
        return Redirect::intended('/');
    }

    public function register() {
        return View::make('home.register');
    }

    public function doRegister() {
        $results = Validator::make(Input::all(), User::getRules());
        if ($results->fails()) {
            return Redirect::back()
                ->withInput(Input::only(['name', 'email', 'country']))
                ->withErrors($results);
        }

        $user = new User(Input::all());
        $user->password = Hash::make(Input::get('password'));
        $user->picture_url = 'user.png';
        $user->save();

        return Redirect::to('/')
            ->with('message', 'Successfully registered, please login.');
    }
}
