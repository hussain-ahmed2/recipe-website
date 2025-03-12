<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\User;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        // Load the JSON data
        $recipes = json_decode(file_get_contents(database_path('data/recipes.json')), true);

        foreach ($recipes as $recipe) {
            // Find the category ID based on the first mealType
            $category = Category::where('name', $recipe['mealType'][0])->first();

            Recipe::create([
                'name' => $recipe['name'],
                'description' => fake()->paragraph, // Add a description if needed
                'ingredients' => json_encode($recipe['ingredients']),
                'instructions' => json_encode($recipe['instructions']),
                'prepTimeMinutes' => $recipe['prepTimeMinutes'],
                'cookTimeMinutes' => $recipe['cookTimeMinutes'],
                'servings' => $recipe['servings'],
                'difficulty' => $recipe['difficulty'],
                'cuisine' => $recipe['cuisine'],
                'caloriesPerServing' => $recipe['caloriesPerServing'],
                'image' => $recipe['image'],
                'user_id' => User::factory()->create()->id,
                'category_id' => $category->id, // Associate with the category
            ]);
        }
    }
}
