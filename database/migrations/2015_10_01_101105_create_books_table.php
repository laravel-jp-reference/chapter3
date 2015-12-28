<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isbn', 13)->unique(); // (1) ユニークキーを設定
            $table->string('title', 100);
            $table->integer('price')->unsigned();
            $table->integer('pages')->unsigned();
            $table->date('published_date');
            $table->integer('author_id')->unsigned();
            $table->integer('publisher_id')->unsigned();
            $table->timestamps();

            // (2) 外部キー制約の設定
            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('publisher_id')->references('id')->on('publishers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books');
    }
}
