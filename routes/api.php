<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->namespace('v1')
    ->as('v1.')
    ->group(__DIR__ . '/v1/all.php');
