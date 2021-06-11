<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Videogame;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $enum = ['physical','digital'];

        return [
            'videogame_id' => Videogame::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'price' => $this->faker->biasedNumberBetween(9,69),
            'platform' => $enum[rand(0,1)],
        ];
    }
}