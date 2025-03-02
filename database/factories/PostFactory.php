<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            // Assign a random existing user, or create one if none exist.
            'user_id' => User::factory(), 
            'title'   => $this->faker->sentence,
            'content' => $this->faker->paragraph,
        ];
    }
}