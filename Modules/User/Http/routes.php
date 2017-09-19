<?php

Route::group(['middleware' => 'web', 'prefix' => 'users', 'namespace' => 'Modules\User\Http\Controllers'], function () {
    Route::get('/', 'UserController@index');
});

Route::group(['middleware' => 'web', 'namespace' => 'Modules\User\Http\Controllers'], function () {
    // Reset Passwords
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('/password-reset', 'Auth\ResetPasswordController@passwordReset');
});

// Api v1
Route::group(['middleware' => 'api', 'prefix' => 'v1', 'namespace' => 'Modules\User\Http\Controllers'], function () {
    Route::post('/users', 'Auth\RegisterController@register');
    Route::get('/users/{id}', 'UserController@show');

    // Password Reset
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
});
