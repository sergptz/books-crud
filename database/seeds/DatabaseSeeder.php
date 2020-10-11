<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PublishersSeeder::class);
        $this->call(AuthorsSeeder::class);
        $this->call(BooksSeeder::class);
    }
}
