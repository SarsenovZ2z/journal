<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'auth',
    'middleware' => [
        // captcha
    ],
], function() {
    Route::get('check', 'AuthController@checkToken')->middleware('auth:sanctum');

    Route::get('signin', 'AuthController@getVerificationCode');
    Route::post('signin', 'AuthController@checkVerificationCode');
});
