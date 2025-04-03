<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReviewRating;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReviewRatingSeeder extends Seeder
{
    public function run()
    {
        DB::table('review_ratings')->truncate(); // Clear previous data

        $users = User::all();
        $recipes = Recipe::all();
        $faker = Faker::create();

        if ($users->isEmpty() || $recipes->isEmpty()) {
            $this->command->warn("Users or Recipes table is empty! Seed them first.");
            return;
        }

        foreach ($users as $user) {
            $recipeSamples = $recipes->random(rand(3, 7)); // Each user reviews 3-7 random recipes

            foreach ($recipeSamples as $recipe) {
                ReviewRating::create([
                    'user_id' => $user->id,
                    'recipe_id' => $recipe->id,
                    'rating' => rand(1, 5),
                    'review' => $faker->sentence(rand(10, 20)),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
