<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Videogame;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'videogame_id' => Videogame::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'score' => $this->faker->biasedNumberBetween(1,10),
            'title' => $this->faker->sentence(),
            'review' => $this->faker->text(),
        ];
    }
}
