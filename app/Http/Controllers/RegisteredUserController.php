<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register'); // show the register view
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:2'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', 'confirmed', Password::min(6)]
        ]); // validate the user credentials 

        $user = User::create($attributes); // create a new user

        Auth::login($user); // login in the user

        return redirect('/profile'); // redirect to user profile page
    }
}
