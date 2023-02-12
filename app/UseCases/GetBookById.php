<?php

namespace App\UseCases;

use App\Contracts\Repositories\BookRepository;
use App\Core\UseCase;

class GetBookById extends UseCase
{

    public function __construct(
        protected BookRepository $bookRepository,
    ) {
    }


    /**
     * @param int $id
     */
    public function __invoke(int $id)
    {
        return $this->bookRepository->getBookById($id);
    }
}
