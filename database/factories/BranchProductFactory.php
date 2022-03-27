<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BranchProductFactory extends Factory
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
            'branch_id' => $faker->numberBetween(1,10),
            'product_id' => $faker->numberBetween(1,30),
            'stock' => $faker->numberBetween(2,250),
            'devolution' => 0
        ];
    }
}
