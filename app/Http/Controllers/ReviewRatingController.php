<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\ReviewRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ReviewRatingController extends Controller
{
    public function store(Request $request, Recipe $recipe)
    {
        $request->validate([
            'rating' => ['required', Rule::in([1, 2, 3, 4, 5])],
            'review' => ['string'],
        ]);

        $review = new ReviewRating();
        $review->recipe_id = $recipe->id;
        $review->user_id = Auth::user()->id;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }

    public function update(Request $request, ReviewRating $review) {
        $request->validate([
            'rating' => ['required', Rule::in([1, 2, 3, 4, 5])],
            'review' => ['string'],
        ]);

        if ($review->user_id != Auth::user()->id) {
            return redirect()->back()->with('error', 'You do not have permission to update this review.');
        }

        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->save();

        return redirect()->back()->with('success', 'Review updated successfully.');
    }

    public function destroy(ReviewRating $review) {
        if ($review->user_id != Auth::user()->id) {
            return redirect()->back()->with('error', 'You do not have permission to delete this review.');
        }

        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully.');
    }
}
