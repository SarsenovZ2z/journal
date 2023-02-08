<?php

namespace App\Datasources\Eloquent;

use App\Contracts\Datasources\BookDatasource as BookDatasourceContract;
use App\Contracts\Entities\BookOwner;

class BookDatasource extends EloquentDatasource implements BookDatasourceContract
{

    public function getOwnersBooks(BookOwner $owner)
    {
        return $owner->books;
    }

}