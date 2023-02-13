<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'book',
    'middleware' => [
        'auth:sanctum',
    ],
], function () {
    Route::post('', 'BookController@createBook');
    Route::get('my', 'BookController@getCurrentUserBooks');
    Route::get('{id}', 'BookController@getBookById')
        ->where('id', '[0-9]+');
});
