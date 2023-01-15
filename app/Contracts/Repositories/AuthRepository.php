<?php

namespace App\Contracts\Repositories;

interface AuthRepository
{

    public function sendTemporaryVerificationCode(string $email): array;

    public function checkTemporaryVerificationCode(string $email, string $code): array;

}