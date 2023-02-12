<?php

namespace App\UseCases;

use App\Core\UseCase;
use App\Contracts\Entities\BookOwner;
use App\Contracts\Repositories\BookRepository;

class GetOwnersBooks extends UseCase
{

    public function __construct(
        protected BookRepository $bookRepository,
    ) {
    }

    /**
     * @param BookOwner $owner
     */
    public function __invoke(BookOwner $owner)
    {
        return $this->bookRepository->getOwnersBooks($owner);
    }
}
