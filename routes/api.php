<?php
URL::forceSchema('https');

Route::group(['namespace' => 'Api', 'as' => 'api.'], function () {
    # Yachts
    Route::resource('yachts', 'YachtsController');
    Route::resource('photos', 'PhotosController');
});
