<?php

namespace App\Repositories;

use App\Contracts\Datasources\BookDatasource;
use App\Contracts\Entities\Book;
use App\Contracts\Entities\BookOwner;
use App\Contracts\Repositories\BookRepository as BookRepositoryContract;

class BookRepository implements BookRepositoryContract
{

    public function __construct(
        protected BookDatasource $bookDatasource,
    ) {
    }

    public function getOwnersBooks(BookOwner $owner)
    {
        return $this->bookDatasource->getOwnersBooks($owner);
    }

    public function getBookById(int $id): Book
    {
        return $this->bookDatasource->getBookById($id);
    }

    public function createBook(BookOwner $owner, string $name, string $password): Book
    {
        return $this->bookDatasource->createBook($owner, $name, $password);
    }
}
