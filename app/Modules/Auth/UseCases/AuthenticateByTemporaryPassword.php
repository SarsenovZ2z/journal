<?php

namespace App\Modules\Auth\UseCases;

use App\Core\UseCase;
use App\Modules\Auth\Repositories\AuthRepository;

class AuthenticateByTemporaryPassword extends UseCase
{

    public function __construct(
        protected AuthRepository $authRepository,
    ) {
    }

    public function __invoke(string $email, string $code)
    {
        return $this->authRepository->authenticateByTemporaryPassword($email, $code);
    }
}
