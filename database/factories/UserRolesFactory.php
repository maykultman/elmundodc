<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserRolesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        $rol = $faker->randomElement(['admin', 'cajero']);
                
        return [
            'user_id' => $faker->numberBetween(1,6),
            'branch_id' => $faker->numberBetween(1,10),
            'rol' => $rol,
            'display_rol_name' => ucfirst($rol)
        ];
        
    }
}
