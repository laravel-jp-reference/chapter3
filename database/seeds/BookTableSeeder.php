<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DatabaseSeeder::truncateTable('books');
        DatabaseSeeder::truncateTable('dvds');

        factory(\App\Book::class, 200)->create()->each(function (\App\Book $book, $i) {
            // 書籍名に連番を付与
            $book->update(['title' => $book->title . ($i + 1)]);
        });

        factory(\App\Dvd::class, 200)->create()->each(function (\App\Dvd $dvd, $i) {
            // 書籍名に連番を付与
            $dvd->update(['title' => $dvd->title . ($i + 1)]);
        });
    }
}
