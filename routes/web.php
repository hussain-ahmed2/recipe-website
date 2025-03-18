<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\ProfileController;
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
})->name('home'); // Home page

Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index'); // show recipes page
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show'); // show recipe page

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index'); // show categories page

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register'); // show register form page
    Route::post('/register', [RegisteredUserController::class, 'store']); // store the new user

    Route::get('/login', [SessionController::class, 'create'])->name('login'); // show login form page
    Route::post('/login', [SessionController::class, 'store']); // authenticate the new user login attempt
});

Route::middleware('auth')->group(function () {
    Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout'); // logout the user

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile'); // show user profile page
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit'); // show edit user profile page
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // update user profile

    Route::get('/favourites', [FavouriteController::class, 'index'])->name('favourites.index'); // show favourites page
    Route::post('/favourites/{recipe}', [FavouriteController::class, 'toggle'])->name('favourites.toggle'); // toggle favourite
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::redirect('/admin', '/admin/dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
    
    Route::get('/admin/recipes', [AdminController::class, 'recipes'])->name('admin.recipes');
    Route::get('/admin/recipes/create', [AdminController::class, 'create'])->name('admin.recipes.create');
    Route::post('/admin/recipes', [AdminController::class, 'store'])->name('admin.recipes.store');
    Route::get('/admin/recipes/{recipe}/edit', [AdminController::class, 'edit'])->name('admin.recipes.edit');
    Route::put('/admin/recipes/{recipe}', [AdminController::class, 'update'])->name('admin.recipes.update');
    Route::delete('/admin/recipes/{recipe}', [AdminController::class, 'destroy'])->name('admin.recipes.destroy');
    
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users.index');
});