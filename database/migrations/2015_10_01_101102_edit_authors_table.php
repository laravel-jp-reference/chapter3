<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EditAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->string('name', 100)->change();
            $table->string('furigana', 100)->after('name');
            $table->string('romaji', 100)->after('furigana')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
            $table->dropColumn('romaji'); // (4)
            $table->dropColumn('furigana'); // (4)
            $table->string('name', 50)->change(); // (3)
        });
    }
}
