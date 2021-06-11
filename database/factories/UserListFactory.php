<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Videogame;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $enum = ['Jugando','Abandonado','Planeado','Completado','Inactivo'];

        return [
            'user_id' => User::all()->random()->id,
            'videogame_id' => Videogame::all()->unique()->random()->id,
            'score' => $this->faker->biasedNumberBetween(1,10),
            'status' => $enum[rand(0,count($enum)-1)],
        ];
    }
}
