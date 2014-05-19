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
        return Redirect::to('/');
    }

    public function register() {
        return View::make('home.register');
    }

    public function doRegister() {
        return Redirect::to('/');
    }
}
