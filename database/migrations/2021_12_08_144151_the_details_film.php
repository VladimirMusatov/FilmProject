<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TheDetailsFilm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catalogs', function (Blueprint $table) {
            //Оригинальное название
            $table->string('OrigTitle')->comment('Оригинальное название')->after('title')->default(NULL);
            //Режиссер
            $table->string('Director')->comment('Режиссер')->default(NULL);
            //Длительность фильма
            $table->integer('Duration')->comment('Длительность фильма')->default(NULL);
            //Дата выхода
            $table->string('CreatDate')->comment('Дата выхода')->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
