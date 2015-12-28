<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Author::class, function ($faker) {
    $romaji = $faker->name;
    $faker = \Faker\Factory::create('ja_JP');

    return [
        'name' => $faker->name,
        'furigana' => $faker->kananame,
        'romaji' => $romaji,
    ];
});

$factory->define(App\Phone::class, function ($faker) {
    $faker = \Faker\Factory::create('ja_JP');
    return [
        'phone' => $faker->phoneNumber,
    ];
});

$factory->define(App\Publisher::class, function ($faker) {
    $faker_jp = \Faker\Factory::create('ja_JP');
    return [
        'name' => $faker_jp->company . '出版',
        'furigana' => $faker_jp->lastKanaName . 'シュッパン',
        'romaji' => $faker->company,
    ];
});

$factory->define(App\Book::class, function ($faker) {
    $faker = \Faker\Factory::create('ja_JP');

    return [
        'isbn' => $faker->isbn13,
        'title' => '書籍名',
        'price' => rand(450, 15000),
        'published_date' => $faker->date(),
        'pages' => rand(50, 600),
        'author_id' => \App\Author::get()->random()->id,
        'publisher_id' => \App\Publisher::get()->random()->id,
    ];
});

$factory->define(App\Dvd::class, function ($faker) {
    $faker = \Faker\Factory::create('ja_JP');

    return [
        'isbn' => $faker->isbn13,
        'title' => 'DVDタイトル',
        'price' => rand(450, 15000),
        'published_date' => $faker->date(),
        'time' => rand(5, 180),
        'author_id' => \App\Author::get()->random()->id,
        'publisher_id' => \App\Publisher::get()->random()->id,
    ];
});

$factory->define(App\AuthorType::class, function ($faker) {
    $faker = \Faker\Factory::create('ja_JP');

    return [
        'name' => $faker->word,
    ];
});
