<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        return redirect('/admin/recipes')->with('success', 'Recipe deleted successfully.');
    }

    public function users(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $query->whereLike('name', "%$request->search%", false)->orWhereLike('email', "%$request->search%", false);
        }

        $users = $query->paginate(12);

        return view('admin.users', compact('users'));
    }

    public function edit_user(User $user) 
    {
        return view('admin.edit-user', compact('user'));
    }

    public function update_user(Request $request, User $user) 
    {
        $request->validate([
            'name' => ['required', 'min:2'],
            'email' => ['required', 'email', 'max:254']
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->filled('password')) {
            $request->validate([
                'password' => ['required', 'min:6', 'confirmed']
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'User updated successfully.');
    }

    public function delete_user(User $user) 
    {
        $user->delete();

        return redirect('/admin/users')->with('success', 'User deleted successfully.');
    }

    public function categories(Request $request) 
    {
        $query = Category::query();

        if ($request->filled('search')) {
            $query->whereLike('name', "%$request->search%", false);
        }

        $categories = $query->paginate(12);

        return view('admin.categories', compact('categories'));
    }
}
