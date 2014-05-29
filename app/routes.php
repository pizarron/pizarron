<?php
// TODO: this file will need scale, separate routes in files,
// or even use Route::resource

Route::get('/', 'HomeController@index');

Route::group(array('before'=>'guest'), function() {
    Route::get('login', 'HomeController@login');
    Route::post('login', 'HomeController@doLogin');

    Route::get('register', 'HomeController@register');
    Route::post('register', 'HomeController@doRegister');
});

Route::group(array('before'=>'auth'), function() {
    Route::get('profile/edit', 'ProfileController@edit');
    Route::get('profile/{id?}', 'ProfileController@index')->where('id', '[0-9]+');;
    Route::post('profile/edit', 'ProfileController@doEdit');
    Route::post('profile/security/edit', 'ProfileController@doEditSecurity');
    Route::post('profile/upload', 'ProfileController@uploadImage');

    Route::get('organization/{id}/admin', [
        'before'=>'organizationAdmin',
        'uses'=>'OrganizationController@admin'
    ]);
    Route::post('organization/{id}/admin/upload', [
        'before'=>'organizationAdmin',
        'uses'=>'OrganizationController@uploadImage'
    ]);
    Route::post('organization/{id}/edit', [
        'before'=>'organizationAdmin',
        'uses'=>'OrganizationController@doEdit'
    ]);
    Route::get('organization/{id}', 'OrganizationController@index')->where('id', '[0-9]+');

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
View::composer('profile.edit', 'ComposerHelper@getCountries');

/**
 * All html macros are added here
 * TODO: the same as composers, there should be a way to put them
 * in other file such as macros.php
 */
Form::macro('country', function($code) {
    return FormHelper::getCountry($code);
});
Form::macro('formatDate', function($date) {
    // month name day, year
    return date('F d, o', $date->getTimeStamp());
});
