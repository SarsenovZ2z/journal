<?php

namespace App\Modules\Book\UseCases;

use App\Core\UseCase;
use App\Modules\Book\Entities\BookOwner;
use App\Modules\Book\Repositories\BookRepository;

class GetOwnersBooks extends UseCase
{

    protected BookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * @param BookOwner $owner
     */
    public function __invoke(BookOwner $owner)
    {
        return $this->bookRepository->getOwnersBooks($owner);
    }

}