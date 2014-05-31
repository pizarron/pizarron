<?php

Route::group(array('before'=>'auth'), function() {
    // index page
    Route::get('organization/{id}/admin', [
        'before'=>'organizationAdmin',
        'uses'=>'OrganizationController@admin'
    ]);
    // for asynchronous uploading
    Route::post('organization/{id}/admin/upload', [
        'before'=>'organizationAdmin',
        'uses'=>'OrganizationController@uploadImage'
    ]);
    // for saving data
    Route::post('organization/{id}/edit', [
        'before'=>'organizationAdmin',
        'uses'=>'OrganizationController@doEdit'
    ]);
    // ajax admin addition
    Route::post('organization/{id}/add-admin',[
        'before'=>'organizationAdmin',
        'uses'=>'OrganizationController@addAdmin'
    ]);
    // ajax admin deletion
    Route::post('organization/{id}/remove-admin',[
        'before'=>'organizationAdmin',
        'uses'=>'OrganizationController@removeAdmin'
    ]);
    // ajax admin search
    Route::get('organization/{id}/admins', [
        'before'=>'organizationAdmin',
        'uses'=>'OrganizationController@searchAdmins'
    ]);

    Route::post('organization/{id}/add-teacher', [
        'before'=>'organizationAdmin',
        'uses'=>'OrganizationController@addTeacher'
    ]);

    Route::post('organization/{id}/remove-teacher', [
        'before'=>'organizationAdmin',
        'uses'=>'OrganizationController@removeTeacher'
    ]);

    Route::get('organization/{id}/teachers', [
        'before'=>'organizationAdmin',
        'uses'=>'OrganizationController@searchTeachers'
    ]);
    Route::get('organization/{id}', [
        'uses'=>'OrganizationController@index'
    ])->where('id', '[0-9]+');
});
