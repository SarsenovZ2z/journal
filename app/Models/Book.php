<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Entities\Book as BookEntity;

use App\Models\User;
use App\Models\Chapter;

class Book extends Model implements BookEntity
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image_id',
        'name',
    ];

    protected $hidden = [
        'password',
    ];

    protected $with = [
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

}
