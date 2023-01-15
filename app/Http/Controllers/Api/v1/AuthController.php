<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Auth\GetVerificationCodeRequest;
use App\Http\Requests\Api\v1\Auth\CheckVerificationCodeRequest;
use App\Repositories\AuthRepository;

class AuthController extends Controller
{

    public function getVerificationCode(
        GetVerificationCodeRequest $request,
        AuthRepository $authRepository,
    ) {
        return $authRepository->sendTemporaryVerificationCode($request->email);
    }

    public function checkVerificationCode(
        CheckVerificationCodeRequest $request,
        AuthRepository $authRepository,
    ) {
        return $authRepository->checkTemporaryVerificationCode($request->email, $request->code);
    }
}
