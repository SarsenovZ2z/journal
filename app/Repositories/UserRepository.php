<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepository as UserRepositoryContract;
use App\Contracts\Datasources\UserDatasource;
use Illuminate\Http\Request;

class UserRepository implements UserRepositoryContract
{

    public function __construct(
        protected UserDatasource $userDatasource,
    ) {
        $this->userDatasource = $userDatasource;
    }

    public function getUserFromRequest(Request $request)
    {
        // return $this->userDatasource
        //     ->castToEntity(\App\Models\User::factory()->make());
    }


}
