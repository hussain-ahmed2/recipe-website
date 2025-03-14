<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    public function definition()
    {
        // Load the JSON data
        $recipes = json_decode(file_get_contents(database_path('data/recipes.json'), true));

        // Randomly pick a recipe from the JSON data
        $recipe = $this->faker->randomElement($recipes);

        return [
            'name' => $recipe['name'],
            'description' => $this->faker->paragraph, // Add a description if needed
            'ingredients' => json_encode($recipe['ingredients']),
            'instructions' => json_encode($recipe['instructions']),
            'prepTimeMinutes' => $recipe['prepTimeMinutes'],
            'cookTimeMinutes' => $recipe['cookTimeMinutes'],
            'servings' => $recipe['servings'],
            'difficulty' => $recipe['difficulty'],
            'cuisine' => $recipe['cuisine'],
            'caloriesPerServing' => $recipe['caloriesPerServing'],
            'image' => $recipe['image'],
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }
}