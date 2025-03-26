<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $favourites = Auth::user()->favourites()->orderByDesc('favourites.created_at')->with('favouritedBy')->paginate(3);

        $recipes = Auth::user()->recipes()->orderByDesc('recipes.created_at')->with('user')->paginate(3);

        return view('profile.index', compact('favourites', 'recipes'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $request->validate([
                'password' => ['required', 'max:6', 'confirmed']
            ]);

            $user->password = $request->password;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
