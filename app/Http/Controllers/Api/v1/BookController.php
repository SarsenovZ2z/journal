<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\BookResource;
use App\Modules\Book\UseCases\GetOwnersBooks;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function getCurrentUserBooks(Request $request, GetOwnersBooks $getOwnersBooks)
    {
        $books = $getOwnersBooks($request->user());

        return BookResource::collection($books);
    }

}
