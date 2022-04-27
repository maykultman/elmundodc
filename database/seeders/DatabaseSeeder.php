<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.php
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Provider::truncate();
        // \App\Models\Provider::factory()->count(6)->create();

        // // \App\Models\Branch::truncate();
        // \App\Models\Branch::factory(10)->create();

        // // \App\Models\Customer::truncate();
        // \App\Models\Customer::factory()->count(5)->create();

        // // \App\Models\Discount::truncate();
        // \App\Models\Discount::factory()->count(3)->create();

        // \App\Models\Product::truncate();
        // \App\Models\Product::factory(30)->create();
        // \App\Models\BranchProduct::factory(300)->create();

        // \App\Models\UserRoles::factory(6)->create();

        // \App\Models\User::truncate();
        // \App\Models\User::factory(8)->create();

        // \App\Models\RolUserBranch::factory(1)->create();
        \App\Models\Rol::factory(1)->create();

    }
}