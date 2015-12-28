<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * 外部キー制約を持ったテーブルをtruncateするため
     *
     * @param $table
     */
    public static function truncateTable($table)
    {
        DB::statement('SET foreign_key_checks = 0');
        DB::table($table)->truncate();
        DB::statement('SET foreign_key_checks = 1');
    }

    public function run()
    {
        Model::unguard(); // EloquentのMass Assignment制約を解除

        $this->call(PrefectureTableSeeder::class);
        $this->call(AuthorTableSeeder::class);
        $this->call(PhoneTableSeeder::class);
        $this->call(PublisherTableSeeder::class);
        $this->call(BookTableSeeder::class);
        $this->call(DvdTableSeeder::class);
        $this->call(AuthorTypeTableSeeder::class);
    }
}
