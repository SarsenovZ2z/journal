<?php

namespace App\Modules\Auth\Entities;

interface Authenticatable {

    public function createToken(string $tokenName);

}