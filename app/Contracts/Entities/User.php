<?php

namespace App\Contracts\Entities;

interface User
{

    public function createToken(string $tokenName);

}