<?php

namespace App\Datasources\Eloquent;

use App\Contracts\Datasources\UserDatasource;
use App\Contracts\Entities\User;

class UserEloquentDatasource extends EloquentDatasource implements UserDatasource
{

    public function __construct(
        protected \App\Models\User $model,
    ) {
    }

    public function findOrCreateByEmail(string $email): User
    {
        return $this->model
            ->firstOrCreate(['email' => $email]);
    }

}
