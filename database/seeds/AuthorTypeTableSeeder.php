<?php

use Illuminate\Database\Seeder;

class AuthorTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DatabaseSeeder::truncateTable('author_author_type');
        DatabaseSeeder::truncateTable('author_types');

        try {
            factory(\App\AuthorType::class, 10)->create();
        } catch (\Illuminate\Database\QueryException $e) {
            // name カラムの unique index の無視
        }

        $authors = \App\Author::all();

        /** @var \App\Author $author */
        foreach ($authors as $author) {
            $author_types = \App\AuthorType::all()->random(rand(2, 5));
            $author->types()->sync($author_types);
        }

    }
}
