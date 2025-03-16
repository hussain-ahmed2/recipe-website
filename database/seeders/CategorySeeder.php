<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Load the JSON data
        $recipes = json_decode(file_get_contents(database_path('data/recipes.json')), true);

        // Extract unique meal types
        $mealTypes = [];
        foreach ($recipes as $recipe) {
            foreach ($recipe['mealType'] as $mealType) {
                if (!in_array($mealType, $mealTypes)) {
                    $mealTypes[] = $mealType;
                }
            }
        }

        // Map meal types to emojis
        $mealTypeEmojis = [
            'Dinner' => '🍽️',
            'Lunch' => '🥪',
            'Snack' => '🍿',
            'Dessert' => '🍰',
            'Breakfast' => '🥞',
            'Beverage' => '🥤',
            'Appetizer' => '🍤',
            'Side Dish' => '🥗',
            'Snacks' => '🍟',
        ];

        // Insert meal types as categories with emojis
        foreach ($mealTypes as $mealType) {
            Category::create([
                'name' => $mealType,
                'slug' => strtolower($mealType),
                'icon' => $mealTypeEmojis[$mealType] ?? '🍴', // Default emoji if not found
            ]);
        }
    }
}