<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexBooksRequest;
use App\Models\BookAuthorModel;

class BookController extends Controller
{
    function index(IndexBooksRequest $request)
    {
        $filters = $request->all();
        return response()->json([
            'books' => BookAuthorModel::getBooks($filters),
        ]);
    }
}
