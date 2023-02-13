<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('login', function() {
    return redirect('http://journal.z2z.kz/');
})->name('login');