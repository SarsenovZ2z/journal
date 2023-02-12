<?php

namespace App\Modules\Auth\UseCases;

use App\Core\UseCase;
use App\Modules\Auth\Repositories\AuthRepository;

final class SendTemporaryPassword extends UseCase
{

    public function __construct(
        protected AuthRepository $authRepository,
    ) {
    }

    public function __invoke(string $email)
    {
        return $this->authRepository->sendTemporaryPassword($email);
    }
}
