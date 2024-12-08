<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogOfBooksSeeder extends Seeder
{
    public static array $books = [
        [
            'name' => 'Совершенный код', //1
        ],
        [
            'name' => 'PHP глазами хакера', //2
        ],
        [
            'name' => 'Laravel. Полное руководство', //3
        ],
        [
            'name' => 'PHP. Рецепты программирования', //4
        ],
        [
            'name' => 'MySQL по максимуму', //5
        ],
        [
            'name' => 'Паттерны объектно-ориентированного проектирования', //6
        ]
    ];

    public static array $authors = [
        [
            'name' => 'Стив Макконнелл', //1
        ],
        [
            'name' => 'Михаил Фленов', //2
        ],
        [
            'name' => 'Мэтт Стаффер', //3
        ],
        [
            'name' => 'Дэвид Скляр', //4
        ],
        [
            'name' => 'Адам Трахтенберг', //5
        ],
        [
            'name' => 'Бэрон Шварц', //6
        ],
        [
            'name' => 'Вадим Ткаченко', //7
        ],
        [
            'name' => 'Петр Зайцев', //8
        ],
        [
            'name' => 'Ральф Джонсон', //9
        ],
        [
            'name' => 'Джон Влиссидес', //10
        ],
        [
            'Ричард Хелм', //11
        ],
        [
            'name' =>
                'Эрих Гамма', //12
        ],
    ];

    public static array $bookAuthor = [
        [
            'book_id' => 1,
            'author_id' => 1,
        ],
        [
            'book_id' => 2,
            'author_id' => 2,
        ],
        [
            'book_id' => 3,
            'author_id' => 3,
        ],
        [
            'book_id' => 4,
            'author_id' => 4,
        ],
        [
            'book_id' => 4,
            'author_id' => 5,
        ],
        [
            'book_id' => 5,
            'author_id' => 6,
        ],
        [
            'book_id' => 5,
            'author_id' => 7,
        ],
        [
            'book_id' => 5,
            'author_id' => 8,
        ],
        [
            'book_id' => 6,
            'author_id' => 9,
        ],
        [
            'book_id' => 6,
            'author_id' => 10,
        ],
        [
            'book_id' => 6,
            'author_id' => 11,
        ],
        [
            'book_id' => 6,
            'author_id' => 12,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert(self::$books);
        DB::table('authors')->insert(self::$authors);
        DB::table('book_author')->insert(self::$bookAuthor);
    }
}
