<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'number_of_players' => $this->faker->numberBetween(2,4),
            'minimum_age' => $this->faker->numberBetween(6,15),
            'game_duration_minimum' => $this->faker->numberBetween(5, 10),
            'game_duration_maximum' => $this->faker->numberBetween(20,40),
            'release_year' => $this->faker->numberBetween(1998,2021),
        ];
    }
}
