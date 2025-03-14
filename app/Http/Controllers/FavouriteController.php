<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{

    public function index()
    {
        $favourites = Auth::user()->favourites()->orderByDesc('favourites.created_at')->with('favouritedBy')->paginate(12);

        return view('favourites.index', compact('favourites'));
    }

    public function toggle(Request $request)
    {
        Auth::user()->favourites()->toggle($request->recipe);

        return back();
    }
}
