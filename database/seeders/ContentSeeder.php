<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Film::factory()->count(5)->create();
    }
}
