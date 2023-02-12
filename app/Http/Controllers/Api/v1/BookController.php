<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\BookResource;
use App\UseCases\GetBookById;
use App\UseCases\GetOwnersBooks;
use Illuminate\Http\Request;

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

        return BookResource::make($book);
    }

}
