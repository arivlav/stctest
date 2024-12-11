<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class BookAuthorModel extends Model
{
    protected $table = 'book_author';

    public static function createBaseQuery(array $filters): Builder
    {
        $tableName = (new self)->getTable();
        $query = self::query()
            ->select([
                "$tableName.book_id",
                'books.name as book_name'
            ])
            ->selectRaw('GROUP_CONCAT(authors.name SEPARATOR \', \')  as authors_names')
            ->selectRaw("count($tableName.book_id) as count_authors")
            ->whereRaw("$tableName.deleted_at is null")
            ->where(
                function ($query) use ($filters, $tableName) {
                    if (isset($filters['author']) ) {
                        $query->where("$tableName.author_id", '=', $filters['author']);
                    }
                }
            )
            ->leftJoin('books', 'books.id_book', '=', "$tableName.book_id")
            ->leftJoin('authors', 'authors.id_author', '=', "$tableName.author_id")
            ->orderBy('book_name')
            ->groupBy("$tableName.book_id", 'book_name')
            ;
        return $query->getQuery();
    }

    public static function getBooks(array $filters = []): ?array
    {
        return self::createBaseQuery($filters)
            ->get()
            ->toArray();
    }
}
