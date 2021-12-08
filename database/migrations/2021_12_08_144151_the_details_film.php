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
            $table->string('OrigTitle')->comment('Оригинальное название')->after('title');
            //Режиссер
            $table->string('Director')->comment('Режиссер');
            //Длительность фильма
            $table->integer('Duration')->comment('Длительность фильма');
            //Дата выхода
            $table->string('CreatDate')->comment('Дата выхода');
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
