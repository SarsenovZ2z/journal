<?php

use Illuminate\Support\Facades\Route;

Route::as('auth.')->group(__DIR__ . '/auth.php');

Route::as('book.')->group(__DIR__ . '/book.php');

Route::as('profile.')->group(__DIR__ . '/profile.php');
