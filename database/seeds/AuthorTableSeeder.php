<?php

use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // (1) データを一旦削除する
        DatabaseSeeder::truncateTable('authors');

        // (2) DBファサードを利用したデータの挿入
        $authors = [];
        $now = \Carbon\Carbon::now();
        for ($i = 1; $i <= 10; $i++) {
            $authors[] = [
                'name' => '著者名' . $i,
                'furigana' => 'フリガナ' . $i,
                'romaji' => 'Romaji' . $i,
            ];
        }
        foreach ($authors as $author) {
            $author['created_at'] = $now;
            $author['updated_at'] = $now;
            DB::table('authors')->insert($author);
        }

        // (3) Eloquentを利用したデータの挿入
        for ($i = 11; $i <= 20; $i++) {
            \App\Author::create([
                'name' => '著者名' . $i,
                'furigana' => 'フリガナ' . $i,
                'romaji' => 'Romaji' . $i,
            ]);
        }

    }
}
