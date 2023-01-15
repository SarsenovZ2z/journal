<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => [
        // captcha
    ],
], function() {
    Route::get('signin', 'AuthController@getVerificationCode');
    Route::post('signin', 'AuthController@checkVerificationCode');
});
