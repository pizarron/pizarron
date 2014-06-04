<?php
Route::group(array('before'=>'auth'), function() {
    Route::get('course/{id}/admin', [
        'before'=>'courseTeacher',
        'uses'=>'CourseController@admin'
    ]);
    Route::post('course/{id}/edit', [
        'before'=>'courseTeacher',
        'uses'=>'CourseController@doEdit'
    ]);
    Route::post('course/{id}/admin/upload',[
        'before'=>'courseTeacher',
        'uses'=>'CourseController@uploadImage'
    ]);
    Route::get('course/{id}', [
        'uses'=>'CourseController@index'
    ])->where('id', '[0-9]+');
});
