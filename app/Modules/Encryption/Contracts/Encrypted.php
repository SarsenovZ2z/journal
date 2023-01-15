<?php

namespace App\Modules\Encryption\Contracts;

use App\Modules\Encryption\Contracts\EncryptionAlgorithm;

interface Encrypted
{

    public function setEncryptionAlgorithm(EncryptionAlgorithm $encryptionAlgorithm): void;

    public function getEncryptionAlgorithm():? EncryptionAlgorithm;

}