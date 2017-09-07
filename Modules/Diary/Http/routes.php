<?php

Route::group(['middleware' => 'web', 'prefix' => 'diary', 'namespace' => 'Modules\Diary\Http\Controllers'], function()
{
    Route::get('/', 'DiaryController@index');
});

Route::group(['middleware' => ['api', 'auth:api'], 'prefix' => 'diary', 'namespace' => 'Modules\Diary\Http\Controllers'], function() {
    Route::post('/', 'DiaryController@store');
});
