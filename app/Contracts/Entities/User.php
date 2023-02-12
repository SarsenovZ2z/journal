<?php

namespace App\Contracts\Entities;

use Laravel\Sanctum\NewAccessToken;

interface User
{

    public function createToken(string $name): NewAccessToken;
}
