<?php
Route::group(array('before'=>'auth'), function() {
    Route::get('course/{id}/admin', [
        'before'=>'courseTeacher',
        'uses'=>'CourseController@admin'
    ]);
    Route::get('course/{id}', [
        'uses'=>'CourseController@index'
    ])->where('id', '[0-9]+');
});
