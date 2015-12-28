<?php

use Illuminate\Database\Seeder;

class PhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DatabaseSeeder::truncateTable('phones');

        $authors = \App\Author::all();

        foreach ($authors as $author) {
            \App\Phone::create([
                'author_id' => $author->id,
                'phone_number' => '0' . (string)(9099990000 + $author->id),
            ]);
        }

    }
}
