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

Route::view('/contact', 'contact')->name('contact'); // Contact page
Route::view('/about', 'about-us')->name('about-us'); // About page
Route::view('/blog', 'blog')->name('blog'); // Blog page

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
    Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update'); // update user profile

    Route::get('/favourites', [FavouriteController::class, 'index'])->name('favourites.index'); // show favourites page
    Route::post('/favourites/{recipe}', [FavouriteController::class, 'toggle'])->name('favourites.toggle'); // toggle favourite

    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create'); // show create recipe page
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store'); // store new recipe
    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit'); // show edit recipe page
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update'); // update recipe
});

Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index'); // show recipes page
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show'); // show recipe page

Route::middleware(['auth', 'admin'])->group(function () {
    Route::redirect('/admin', '/admin/dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index'); // admin dashboard
    
    Route::get('/admin/recipes', [AdminController::class, 'recipes'])->name('admin.recipes'); // admin show all recipes
    Route::get('/admin/recipes/create', [AdminController::class, 'create'])->name('admin.recipes.create'); //  admin create recipe
    Route::post('/admin/recipes', [AdminController::class, 'store'])->name('admin.recipes.store'); // admin store new recipe
    Route::get('/admin/recipes/{recipe}/edit', [AdminController::class, 'edit'])->name('admin.recipes.edit'); // admin edit recipe
    Route::put('/admin/recipes/{recipe}', [AdminController::class, 'update'])->name('admin.recipes.update'); // admin update recipe
    Route::delete('/admin/recipes/{recipe}', [AdminController::class, 'destroy'])->name('admin.recipes.destroy'); // admin delete recipe
    
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users.index'); // admin show all users
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'edit_user'])->name('admin.user.edit'); // admin users edit credentials
    Route::put('/admin/users/{user}', [AdminController::class, 'update_user']); // admin update user credentials
    Route::delete('/admin/users/{user}', [AdminController::class, 'delete_user']); // admin delete user

    Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories.index'); // admin show all categories
});