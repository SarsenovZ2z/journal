<?php

namespace App\Contracts\Datasources;

use App\Contracts\Entities\Book;
use App\Contracts\Entities\BookOwner;

interface BookDatasource extends Datasource
{
 
    public function getOwnersBooks(BookOwner $owner);

    public function getBookById(int $id) : Book;

    public function createBook(BookOwner $owner, string $name, string $password) : Book;

}