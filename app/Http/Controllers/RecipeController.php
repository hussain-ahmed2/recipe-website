<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {        
        $query = Recipe::query();
        $categories = Category::all();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('sort')) {
            $sort = [
                'name_asc' => ['name', 'asc'],
                'name_desc' => ['name', 'desc'],
                'latest' => ['created_at', 'desc'],
                'oldest' => ['created_at', 'asc'],
            ];

            [$sortBy, $order] = $sort[$request->sort];
            $query->orderBy($sortBy, $order);
        }

        $recipes = $query->paginate(12)->withQueryString();

        return view('recipes.index', compact('recipes', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'ingredients' => ['required'],
            'instructions' => ['required'],
            'prepTimeMinutes' => ['required'],
            'cookTimeMinutes' => ['required'],
            'servings' => ['required'],
            'difficulty' => ['required'],
            'cuisine' => ['required'],
            'caloriesPerServing' => ['required'],
            'tags' => ['required'],
            'image' => ['required'],
            'mealType' => ['required']
        ]);
        $recipe = Recipe::create($request->all());

        return redirect('/recipes/' . $recipe->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.show', [
            'recipe' => $recipe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', [
            'recipe' => $recipe
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        $recipe->update($request->all());

        return redirect('/recipes/' . $recipe->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect('/');
    }
}
