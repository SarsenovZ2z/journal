<?php

namespace App\Modules\Encryption\Contracts;

interface EncryptionAlgorithm
{

    public function encrypt(string $str, ...$params) : string;

    public function decrypt(string $str, ...$params) : string;

}