<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Chapter;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
    ];

    protected $hidden = [
        'password',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

}
