<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function getCurrentUser(Request $request)
    {
        return new UserResource($request->user());
    }

    

}
