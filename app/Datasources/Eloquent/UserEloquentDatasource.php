<?php

namespace App\Datasources\Eloquent;

use App\Contracts\Datasources\UserDatasource;
use App\Contracts\Entities\User;
use App\Models\User as UserModel;

class UserEloquentDatasource extends EloquentDatasource implements UserDatasource
{

    public function __construct(
        protected UserModel $userModel,
    ) {
    }

    public function findOrCreateByEmail(string $email): User
    {
        return $this->userModel
            ->firstOrCreate(['email' => $email]);
    }
    
}
