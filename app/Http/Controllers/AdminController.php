<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function recipes(Request $request)
    {
        $query = Recipe::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $recipes = $query->paginate(12);
        
        return view('admin.recipes', compact('recipes'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
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

        return redirect()->route('admin.recipes')->with('success', 'Recipe created successfully.');
    }

    public function edit(Recipe $recipe)
    {
        $categories = Category::all();
        return view('admin.edit', compact('recipe', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

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

        return redirect()->route('admin.recipes')->with('success', 'Recipe updated successfully.');
    }

    public function destroy(Recipe $recipe) 
    {
        $recipe->delete();

        return redirect('/admin/recipes');
    }

    public function users(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereLike('name', "%$search%", false)->orWhereLike('email', "%$search%", false);
        }

        $users = $query->paginate(12);

        return view('admin.users', compact('users'));
    }
}
