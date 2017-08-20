<?php

Route::group(['middleware' => 'web', 'prefix' => 'user', 'namespace' => 'Modules\User\Http\Controllers'], function(){
    Route::get('/', 'UserController@index');
});

Route::group(['middleware' => 'api', 'prefix' => 'v1', 'namespace' => 'Modules\User\Http\Controllers'], function() {
    //
});