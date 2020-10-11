<?php

use App\Author;
use Illuminate\Database\Seeder;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            [
                'first_name' => "Стивен",
                'surname' => "Кинг",
                'birth_country' => "США",
            ],
            [
                'first_name' => "Анджей",
                'surname' => "Сапковский",
                'birth_country' => "Польша",
            ],
            [
                'first_name' => "Рэй",
                'surname' => "Брэдбери",
                'birth_country' => "США",
            ]
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}
