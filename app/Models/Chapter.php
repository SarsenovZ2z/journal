<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Book;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'name',
        'content',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
