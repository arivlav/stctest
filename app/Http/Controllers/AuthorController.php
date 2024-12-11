<?php

namespace App\Http\Controllers;

use App\Models\AuthorsModel;
use App\Models\BookAuthorModel;

class AuthorController extends Controller
{
    function index()
    {
        return response()->json([
            'authors' => AuthorsModel::getAuthorsList(),
        ]);
    }
}
