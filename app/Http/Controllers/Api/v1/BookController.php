<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\BookResource;
use App\UseCases\GetBookById;
use App\UseCases\GetOwnersBooks;
use Illuminate\Http\Request;
use App\Http\Requests\Api\v1\Book\CreateBookRequest;
use App\UseCases\CreateBook;

class BookController extends Controller
{

    public function getCurrentUserBooks(Request $request, GetOwnersBooks $getOwnersBooks)
    {
        $books = $getOwnersBooks($request->user());

        return BookResource::collection($books);
    }

    public function getBookById(Request $request, GetBookById $getBookById)
    {
        $book = $getBookById($request->id);
        $this->authorize('view', $book);

        return BookResource::make($book);
    }

    public function createBook(CreateBookRequest $request, CreateBook $createBook)
    {
        $book = $createBook($request->user(), $request->name, $request->password);

        return BookResource::make($book);
    }
}
