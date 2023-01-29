<?php

namespace App\Modules\Auth\Repositories;

use App\Modules\Auth\AuthToken;

interface AuthRepository
{

    /**
     * @param string $email
     * 
     * @return string
     */
    public function sendTemporaryPassword(string $email): string;


    /**
     * @param string $email
     * @param string $code
     * 
     * @return AuthToken|null
     */
    public function authenticateByTemporaryPassword(string $email, string $code):? AuthToken;


}