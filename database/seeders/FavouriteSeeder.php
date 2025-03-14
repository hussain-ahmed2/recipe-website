<?php

namespace Database\Seeders;

use App\Models\Favourite;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavouriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users and recipes
        $users = User::all();
        $recipes = Recipe::all();

        // Loop through each user
        foreach ($users as $user) {
            // Randomly select 5 recipes for the user to favorite
            $randomRecipes = $recipes->random(5);

            // Create favorites for the selected recipes
            foreach ($randomRecipes as $recipe) {
                Favourite::create([
                    'user_id' => $user->id,
                    'recipe_id' => $recipe->id,
                ]);
            }
        }
    }
}
