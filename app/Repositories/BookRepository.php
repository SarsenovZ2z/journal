<?php

namespace App\Repositories;

use App\Contracts\Datasources\BookDatasource;
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

    public function getBookById(int $id)
    {
        return $this->bookDatasource->getBookById($id);
    }
}
