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
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.show', [
            'recipe' => $recipe
        ]);
    }
}
