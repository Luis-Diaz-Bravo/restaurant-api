<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->has(
                Restaurant::factory()
                    ->count(2)
                    ->has(
                        Dish::factory()->count(15)
                    )
            )
            ->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()
            ->count(10)
            ->has(
                Restaurant::factory()
                    ->count(2)
                    ->has(
                        Dish::factory()->count(15)
                    )
            )
            ->create();
    }
}
