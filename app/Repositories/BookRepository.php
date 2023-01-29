<?php

namespace App\Repositories;

use App\Contracts\Datasources\BookDatasource;
use App\Modules\Book\Entities\BookOwner;
use App\Modules\Book\Repositories\BookRepository as BookRepositoryContract;

class BookRepository implements BookRepositoryContract
{

    protected BookDatasource $bookDatasource;

    public function __construct(
        BookDatasource $bookDatasource,
    )
    {
        $this->bookDatasource = $bookDatasource;
    }

    public function getOwnersBooks(BookOwner $owner)
    {
        return $this->bookDatasource->getOwnersBooks($owner);
    }

}