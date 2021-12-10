<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title'=>'Кино',
            'slug'=>'kino',
            ]);
       DB::table('categories')->insert([
            'title'=>'Сериал',
            'slug'=>'serial',
            ]);
       DB::table('categories')->insert([
            'title'=>'Мультфильм',
            'slug'=>'Cartoon',
            ]);
       DB::table('categories')->insert([
            'title'=>'Мультсериал',
            'slug'=>'animated_series',
            ]);
       DB::table('categories')->insert([
            'title'=>'Аниме',
            'slug'=>'anime',
            ]);        
    }
}
