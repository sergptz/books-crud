<?php

use App\Book;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            [
                'name' => 'Тёмная башня',
                'author_id' => 1,
                'pages_count' => 1000,
                'year' => 1999,
                'publisher_id' => 1,
                'cover_type' => 'hard'
            ],
            [
                'name' => 'Сага о ведьмаке',
                'author_id' => 2,
                'pages_count' => 1200,
                'year' => 1990,
                'publisher_id' => 2,
                'cover_type' => 'hard'
            ],
            [
                'name' => '451 градус по Фаренгейту',
                'author_id' => 3,
                'pages_count' => 250,
                'year' => 1958,
                'publisher_id' => 3,
                'cover_type' => 'soft'
            ]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
