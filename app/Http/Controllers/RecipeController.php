<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function create() 
    {
        $categories = Category::all();

        return view('recipes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'ingredients' => 'required|array|min:1',
            'instructions' => 'required|array|min:1',
            'prepTimeMinutes' => 'required|integer',
            'cookTimeMinutes' => 'required|integer',
            'servings' => 'required|integer',
            'difficulty' => 'required',
            'cuisine' => 'required',
            'caloriesPerServing' => 'required|integer',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        dd($request->all());

        $recipe = new Recipe();
        $recipe->name = $request->name;
        $recipe->ingredients = json_encode($request->ingredients);
        $recipe->instructions = json_encode($request->instructions);
        $recipe->prepTimeMinutes = $request->prepTimeMinutes;
        $recipe->cookTimeMinutes = $request->cookTimeMinutes;
        $recipe->servings = $request->servings;
        $recipe->difficulty = $request->difficulty;
        $recipe->cuisine = $request->cuisine;
        $recipe->caloriesPerServing = $request->caloriesPerServing;
        $recipe->description = $request->description;
        $recipe->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $recipe->image = $imageName;
        }

        $recipe->save();

        return redirect()->route('profile')->with('success', 'Recipe created successfully.');
    }

    public function edit(Recipe $recipe)
    {
        if ($recipe->user_id !== Auth::user()->id) {
            abort(403);
        }
        $categories = Category::all();
        return view('recipes.edit', compact('recipe', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        if ($recipe->user_id !== Auth::user()->id) {
            abort(403);
        }

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'ingredients' => 'required|array|min:1',
            'instructions' => 'required|array|min:1',
            'prepTimeMinutes' => 'required|integer',
            'cookTimeMinutes' => 'required|integer',
            'servings' => 'required|integer',
            'difficulty' => 'required',
            'cuisine' => 'required',
            'caloriesPerServing' => 'required|integer',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $recipe->name = $request->name;
        $recipe->ingredients = json_encode($request->ingredients);
        $recipe->instructions = json_encode($request->instructions);
        $recipe->prepTimeMinutes = $request->prepTimeMinutes;
        $recipe->cookTimeMinutes = $request->cookTimeMinutes;
        $recipe->servings = $request->servings;
        $recipe->difficulty = $request->difficulty;
        $recipe->cuisine = $request->cuisine;
        $recipe->caloriesPerServing = $request->caloriesPerServing;
        $recipe->description = $request->description;
        $recipe->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($recipe->image) {
                unlink(public_path('images/' . $recipe->image));
            }

            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $recipe->image = $imageName;
        }

        $recipe->save();

        return redirect()->route('profile')->with('success', 'Recipe updated successfully.');
    }

    public function destroy(Recipe $recipe)
    {
        if ($recipe->user_id !== Auth::user()->id) {
            abort(403);
        }
        
        $recipe->delete();

        return redirect('/profile')->with('success', 'Recipe deleted successfully.');
    }
}
