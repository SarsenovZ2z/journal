<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'profile',
    'middleware' => [
        'auth:sanctum',
    ],
], function() {
    Route::get('me', 'UserController@getCurrentUser');
});