<?php

namespace App\Contracts\Entities;

use Laravel\Sanctum\NewAccessToken;

interface User
{

    public function createAuthToken(string $name): NewAccessToken;
}
