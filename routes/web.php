<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\FeaturedRecipe;
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $featuredRecipe = FeaturedRecipe::first()->recipe;
    $recipes = Recipe::where('id', '!=', optional($featuredRecipe)->id)->inRandomOrder()->take(6)->get();
    $categories = Category::inRandomOrder()->take(6)->get();

    return view('index', compact('featuredRecipe', 'recipes', 'categories'));
}); // Home page

Route::resource('recipes', RecipeController::class); // Recipes page

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']); // show register form page
    Route::post('/register', [RegisteredUserController::class, 'store']); // store the new user

    Route::get('/login', [SessionController::class, 'create']); // show login form page
    Route::post('/login', [SessionController::class, 'store']); // authenticate the new user login attempt
});

Route::middleware('auth')->group(function () {
    Route::delete('/logout', [SessionController::class, 'destroy']); // logout the user
});