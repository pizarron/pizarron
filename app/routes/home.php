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
