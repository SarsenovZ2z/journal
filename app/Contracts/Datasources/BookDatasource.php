<?php

namespace App\Contracts\Datasources;

use App\Modules\Book\Entities\BookOwner;

interface BookDatasource extends Datasource
{
 
    public function getOwnersBooks(BookOwner $owner);

}