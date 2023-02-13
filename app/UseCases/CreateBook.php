<?php

namespace App\UseCases;

use App\Contracts\Entities\BookOwner;
use App\Contracts\Repositories\BookRepository;
use App\Core\UseCase;

class CreateBook extends UseCase
{

    public function __construct(
        protected BookRepository $bookRepository,
    ) {
    }

    /**
     * @param string $name
     */
    public function __invoke(BookOwner $owner, string $name, string $password)
    {
        return $this->bookRepository->createBook($owner, $name, $password);
    }

}