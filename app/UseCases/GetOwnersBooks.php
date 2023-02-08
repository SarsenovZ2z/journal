<?php

namespace App\UseCases;

use App\Core\UseCase;
use App\Contracts\Entities\BookOwner;
use App\Contracts\Repositories\BookRepository;

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
