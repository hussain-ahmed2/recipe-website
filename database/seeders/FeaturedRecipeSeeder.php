<?php

namespace Database\Seeders;

use App\Models\FeaturedRecipe;
use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeaturedRecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FeaturedRecipe::insert([
            'recipe_id' => Recipe::all()->random()->id
        ]);
    }
}
