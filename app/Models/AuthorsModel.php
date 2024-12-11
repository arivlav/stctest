<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class AuthorsModel extends Model
{
    protected $table = 'authors';

    public static function getAuthorsList(): ?array
    {
        return self::query()
            ->select(['id_author', 'name'])
            ->whereRaw('deleted_at IS NULL')
            ->get()
            ->toArray();
    }
}
