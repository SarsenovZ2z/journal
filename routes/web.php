<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('test', function() {
    $authRepository = app(\App\Contracts\Repositories\AuthRepository::class);

    $email = 'nurik9293709@gmail.com';
    $user = \App\Models\User::firstOrCreate([
        'email' => $email,
    ]);


    $response = $authRepository->sendTemporaryVerificationCode($email);

    dd($authRepository->checkTemporaryVerificationCode($email, $response['code']));
    

});