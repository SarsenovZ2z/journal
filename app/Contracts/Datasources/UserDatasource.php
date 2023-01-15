<?php

namespace App\Contracts\Datasources;

use App\Contracts\Entities\User;

interface UserDatasource extends Datasource
{

    public function findOrCreateByEmail(string $email) : User;

}