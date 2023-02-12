<?php

namespace App\Models;

use App\Modules\Auth\Entities\Authenticatable as AuthenticatableUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Auth\Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Book;
use App\Contracts\Entities\BookOwner;
use App\Contracts\Entities\User as UserContract;
use Laravel\Sanctum\NewAccessToken;

class User extends Model implements AuthenticatableUser, AuthorizableContract, AuthenticatableContract, BookOwner, UserContract
{
    use Authenticatable, Authorizable, HasApiTokens;
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function createAuthToken(string $name): NewAccessToken
    {
        return $this->createToken($name);
    }
}
