<?php

namespace App\Contracts\Repositories;

use App\Contracts\Entities\Book;
use App\Contracts\Entities\BookOwner;

interface BookRepository
{

    public function getOwnersBooks(BookOwner $owner);

    public function getBookById(int $id): Book;

    public function createBook(BookOwner $owner, string $name, string $password): Book;

}