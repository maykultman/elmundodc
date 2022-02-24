<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'percent' => $this->faker->randomNumber(1,2),
            'conditional' => '>',
            'volume' => $this->faker->randomNumber(1,3),
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
        ];
    }
}
