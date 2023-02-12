<?php

namespace App\Datasources\Eloquent;

use App\Contracts\Datasources\BookDatasource as BookDatasourceContract;
use App\Contracts\Entities\Book;
use App\Contracts\Entities\BookOwner;

class BookDatasource extends EloquentDatasource implements BookDatasourceContract
{

    public function __construct(
        protected \App\Models\Book $model,
    ) {
    }

    public function getOwnersBooks(BookOwner $owner)
    {
        return $owner->books;
    }

    public function getBookById(int $id): Book
    {
        return $this->model->findOrFail($id);
    }
}
