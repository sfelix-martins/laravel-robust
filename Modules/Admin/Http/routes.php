<?php

Route::group(['middleware' => 'api', 'prefix' => 'v1/admins', 'namespace' => 'Modules\Admin\Http\Controllers'], function () {
    Route::post('/', 'Auth\RegisterController@registerAdmin');
    Route::get('/me', 'AdminController@me')->middleware('admin');
});
