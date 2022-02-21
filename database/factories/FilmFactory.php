<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        Storage::makeDirectory('/public/image/films');

        return [
            'category_id' => $this->faker->numberBetween(1,5),
            'status' => '0',
            'title' =>  $this->faker->word,
            'OrigTitle' => $this->faker->word,
            'description' => $this->faker->text($maxNbChars = 330),
            'image' => $this->faker->image('public/storage/image/films',300,450, null, false),
            'link' => '//89.svetacdn.in/RrK8iSzp6H1F/movie/10452',
            'view_count' => $this->faker->numberBetween(0, 145),
            'Premiere_date' => $this->faker->dateTime($max = 'now', $timezone = null),

        ];
    }
}
