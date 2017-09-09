<?php

Route::group(['middleware' => 'web', 'prefix' => 'user', 'namespace' => 'Modules\User\Http\Controllers'], function () {
    Route::get('/', 'UserController@index');
});

// Api v1
Route::group(['middleware' => 'api', 'prefix' => 'v1/users', 'namespace' => 'Modules\User\Http\Controllers'], function () {
    Route::post('/', 'Auth\RegisterController@register');
    Route::get('/{id}', 'UserController@show');
});
