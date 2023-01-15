<?php

namespace App\Modules\Encryption\Algorithms;

use App\Modules\Encryption\Contracts\EncryptionAlgorithm;

class DummyEncryption implements EncryptionAlgorithm
{

    public function encrypt(string $str, ...$params): string
    {
        return $str;
    }

    public function decrypt(string $str, ...$params): string
    {
        return $str;        
    }

}