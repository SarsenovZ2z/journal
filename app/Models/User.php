<?php

namespace App\Models;

use App\Contracts\Entities\User as UserEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Auth\Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Book;

class User extends Model implements UserEntity, AuthorizableContract, AuthenticatableContract
{
    use Authenticatable, Authorizable, HasApiTokens;
    use HasFactory, Notifiable;

    protected $rememberTokenName = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

}
