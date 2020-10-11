<?php

use App\Publisher;
use Illuminate\Database\Seeder;

class PublishersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publishers = [
            [
                'name' => 'Sombra corp.',
            ],
            [
                'name' => 'Эксмо',
            ],
            [
                'name' => 'Просвещение',
            ]
        ];

        foreach ($publishers as $publisher) {
            Publisher::create($publisher);
        }

    }
}
