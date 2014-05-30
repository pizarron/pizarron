<?php

Route::group(array('before'=>'auth'), function() {
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
    Route::post('organization/{id}/add-admin',[
        'before'=>'organizationAdmin',
        'uses'=>'OrganizationController@addAdmin'
    ]);
    Route::post('organization/{id}/remove-admin',[
        'before'=>'organizationAdmin',
        'uses'=>'OrganizationController@removeAdmin'
    ]);
    Route::get('organization/{id}/admins', [
        'before'=>'organizationAdmin',
        'uses'=>'OrganizationController@searchAdmins'
    ]);
    Route::get('organization/{id}', [
        'uses'=>'OrganizationController@index'
    ])->where('id', '[0-9]+');
});
