<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Post $post): bool
    {
        return true; // Allow anyone (even guests) to view posts
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine if the given post can be updated by the user.
     */
    public function update(User $user, Post $post)
    {
        // Admin can update all posts
        if ($user->hasRole('admin')) {
            return true;
        }

        // Author can update only their own posts
        if ($user->hasRole('author') && $user->id === $post->user_id) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given post can be deleted by the user.
     */
    public function delete(User $user, Post $post)
    {
        // Admin can delete all posts
        if ($user->hasRole('admin')) {
            return true;
        }

        // Author can delete only their own posts
        if ($user->hasRole('author') && $user->id === $post->user_id) {
            return true;
        }

        return false;
    }


    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        return false;
    }
}
