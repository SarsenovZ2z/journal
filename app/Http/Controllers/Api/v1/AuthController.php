<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Auth\GetVerificationCodeRequest;
use App\Http\Requests\Api\v1\Auth\CheckVerificationCodeRequest;
use App\Modules\Auth\UseCases\AuthenticateByTemporaryPassword;
use App\Modules\Auth\UseCases\SendTemporaryPassword;

class AuthController extends Controller
{

    public function getVerificationCode(
        GetVerificationCodeRequest $request,
        SendTemporaryPassword $sendTemporaryPassword,
    ) {

        $code = $sendTemporaryPassword(email: $request->email);

        if (!$code) {
            abort(400, 'Oops... Something went wrong. Please, try again.');
        }

        return [
            ...(config('app.env') == 'local' ? ['code' => $code] : []),
        ];
    }

    public function checkVerificationCode(
        CheckVerificationCodeRequest $request,
        AuthenticateByTemporaryPassword $authenticateByTemporaryPassword,
    ) {

        $authToken = $authenticateByTemporaryPassword(email: $request->email, code: $request->password);
        
        if (!$authToken) {
            return abort(400, 'Invalid credentials');
        }

        return [
            'access_token' => $authToken->access_token,
            'refresh_token' => $authToken->refresh_token,
        ];
    }
}
