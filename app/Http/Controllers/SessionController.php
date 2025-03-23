<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $user = $request->validate([
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', 'min:6']
        ]);

        if (! Auth::attempt($user)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry those credentials do not match'
            ]);
        }

        return redirect('/profile')->with('success', 'You have successfully logged in.');
    }

    public function destroy() 
    {
        Auth::logout();

        return redirect('/')->with('success', 'You have successfully logged out.');
    }
}
