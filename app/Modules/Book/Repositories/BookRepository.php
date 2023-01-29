<?php

namespace App\Modules\Book\Repositories;

use App\Modules\Book\Entities\BookOwner;

interface BookRepository
{

    public function getOwnersBooks(BookOwner $owner);

}