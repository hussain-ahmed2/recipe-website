<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Hussain Ahmed',
            'email' => 'hussain@example.com',
            'is_admin' => true
        ]);
        
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);

        $this->call([
            CategorySeeder::class,
            RecipeSeeder::class,
            FeaturedRecipeSeeder::class,
            ReviewRatingSeeder::class
        ]);
    }
}
