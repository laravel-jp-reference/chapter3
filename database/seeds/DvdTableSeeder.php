<?php

use Illuminate\Database\Seeder;

class DvdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DatabaseSeeder::truncateTable('dvds');

        factory(\App\Dvd::class, 200)->create()->each(function (\App\Dvd $dvd, $i) {
            // 書籍名に連番を付与
            $dvd->update(['title' => $dvd->title . ($i + 1)]);
        });
    }
}
