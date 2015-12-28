<?php

use Illuminate\Database\Seeder;

class PublisherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DatabaseSeeder::truncateTable('publishers');

        factory(\App\Publisher::class, 50)->create();

        factory(\App\Publisher::class, 200)->create()->each(function (\App\Publisher $publisher, $key) {
            // ローマ字に連番を付与
            $publisher->update(['romaji' => $publisher->romaji . ' ' . ($key + 1)]);
        });
    }
}
