<?php
Route::get('/', 'HomeController@index');

Route::group(array('before'=>'guest'), function() {
    Route::get('login', 'HomeController@login');
    Route::post('login', 'HomeController@doLogin');

    Route::get('register', 'HomeController@register');
    Route::post('register', 'HomeController@doRegister');
});

Route::group(array('before'=>'auth'), function() {
    Route::get('logout', 'HomeController@logout');
});

/**
 * All view composers will be added here, as index and register
 * has the same register widget, both need a composer.
 *
 * More than one composers can be added to the same view ;)
 */
View::composer('home.index', 'ComposerHelper@getCountries');
View::composer('home.register', 'ComposerHelper@getCountries');
