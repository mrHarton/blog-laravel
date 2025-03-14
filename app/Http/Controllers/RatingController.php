<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate(['rating' => 'required|integer|min:1|max:5']);

        $user = auth()->user();
        $ipAddress = $request->ip();

        // Check if user (or guest with same IP) has already rated
        $existingRating = Rating::where('post_id', $post->id)
            ->when($user, fn($query) => $query->where('user_id', $user->id))
            ->when(!$user, fn($query) => $query->where('ip_address', $ipAddress))
            ->first();

        if ($existingRating) {
            return back()->with('error', 'You have already rated this post.');
        }

        // Save new rating
        Rating::create([
            'post_id' => $post->id,
            'user_id' => $user ? $user->id : null,
            'rating' => $request->rating,
            'ip_address' => $ipAddress,
        ]);

        return back()->with('success', 'Thank you for rating!');
    }
}
