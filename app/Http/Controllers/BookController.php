<?php

namespace App\Http\Controllers;

use App\Models\BookAuthorModel;

class BookController extends Controller
{
    function index()
    {
        return response()->json([
            'books' => BookAuthorModel::getBooks(),
        ]);
    }
}
