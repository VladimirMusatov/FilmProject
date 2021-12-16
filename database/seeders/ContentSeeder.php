<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('films')->insert([
            'category_id' => '1',
            'title'=>'Волк с Уолл-стрит',
            'OrigTitle' => 'The wolf of wall street',
            'CreatDate' => '13 февраля 2014',
            'description'=> 'Джордан Белфорт основал одну из крупнейших брокерских контор в 1987 году, но десять лет спустя был осужден за отмывание денег и ряд прочих финансовых преступлений. Автор справился с алкогольной и наркотической зависимостью, выработанной за время махинаций на Уолл-стрит, написал две книги и теперь читает лекции о том, как достичь успеха.',
            'image' => 'orig.jfif',

            ]);

       DB::table('det_films')->insert([
        'director' => 'Мартин Скорсезе',
        'duration' => '180',
        'film_id'  => '1',
       ]);
    }
}
