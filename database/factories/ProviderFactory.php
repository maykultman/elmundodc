<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
class ProviderFactory extends Factory
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
            'name' => $faker->name(),
            'phone' => $faker->phoneNumber(),
            'email' => $faker->unique()->email(),
            'address' => $faker->address()
        ];
    }
}
