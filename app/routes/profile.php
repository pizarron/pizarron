<?php

Route::group(array('before'=>'auth'), function() {
    Route::get('profile/edit', 'ProfileController@edit');
    Route::get('profile/{id?}', 'ProfileController@index')->where('id', '[0-9]+');;
    Route::post('profile/edit', 'ProfileController@doEdit');
    Route::post('profile/security/edit', 'ProfileController@doEditSecurity');
    Route::post('profile/upload', 'ProfileController@uploadImage');
});
