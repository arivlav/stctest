<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('books.index');
});

Route::prefix('api')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::get('/books', [BookController::class, 'index'])->name('books');
    });
});
