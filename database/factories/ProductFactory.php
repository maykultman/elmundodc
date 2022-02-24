<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// use Faker\Generator as Faker;
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        return [
            'provider_id' => $faker->numberBetween(1,6),
            'code' => $faker->unique()->ean13(),
            'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
            'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 3),
            'stock' => $faker->randomNumber(),
        ];
    }
}
