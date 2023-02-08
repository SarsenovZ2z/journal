<?php

namespace App\Contracts\Datasources;

use App\Contracts\Entities\BookOwner;

interface BookDatasource extends Datasource
{
 
    public function getOwnersBooks(BookOwner $owner);

}