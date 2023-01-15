<?php

namespace App\Repositories;

use App\Contracts\Repositories\AuthRepository as AuthRepositoryContract;
use App\Contracts\Datasources\UserDatasource;
use App\Modules\Verification\Verification;

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
     * @return array
     */
    public function sendTemporaryVerificationCode(string $email): array
    {
        $code = Verification::start($email, 6, 10, 300);

        return [
            'success' => true,
            'tries' => Verification::getTries($email),
            ...(config('app.env') == 'local' ? ['code' => $code] : []),
        ];
    }

    /**
     * @param string $email
     * @param string $code
     * 
     * @return array
     */
    public function checkTemporaryVerificationCode(string $email, string $code): array
    {
        if (Verification::check($email, $code)) {
            $user = $this->userDatasource->findOrCreateByEmail($email);
            return [
                'success' => true,
                'token' => $user->createToken('AuthToken')->plainTextToken,
            ];
        }

        return [
            'success' => false,
            'tries' => Verification::getTries($email),
        ];
    }
}
