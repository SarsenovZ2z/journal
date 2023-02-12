<?php

namespace App\Modules\Auth;

class AuthToken
{

    public function __construct(
        public string $access_token,
        public string|null $refresh_token = null,
    ) {
    }
}
