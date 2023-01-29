<?php

namespace App\Repositories;

use App\Modules\Auth\Repositories\AuthRepository as AuthRepositoryContract;
use App\Contracts\Datasources\UserDatasource;
use App\Modules\Auth\AuthToken;
use App\Modules\Verification\Verification;
use Illuminate\Support\Facades\Log;

class AuthRepository implements AuthRepositoryContract
{

    public function __construct(
        protected UserDatasource $userDatasource,
    ) {
        $this->userDatasource = $userDatasource;
    }

    /**
     * @param string $email
     * 
     * @return string
     */
    public function sendTemporaryPassword(string $email): string
    {
        $code = Verification::start($email, 6, 10, 300);

        Log::info("$email verification code is $code");
        // TODO: send to email

        return (string)$code;
    }

    /**
     * @param string $email
     * @param string $code
     * 
     * @return AuthToken
     */
    public function authenticateByTemporaryPassword(string $email, string $code):? AuthToken
    {
        if (!Verification::check($email, $code)) {
            return null;
        }

        $user = $this->userDatasource->findOrCreateByEmail($email);

        return new AuthToken($user->createToken('AuthToken')->plainTextToken);
    }
}
