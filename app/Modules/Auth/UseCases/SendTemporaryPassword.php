<?php

namespace App\Modules\Auth\UseCases;

use App\Core\UseCase;
use App\Core\UseCaseParam;
use App\Modules\Auth\Repositories\AuthRepository;

final class SendTemporaryPassword extends UseCase
{

    protected AuthRepository $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function __invoke(string $email)
    {
        return $this->authRepository->sendTemporaryPassword($email);
    }
}
