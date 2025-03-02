<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        // Create 50 posts using the factory
        Post::factory()->count(50)->create(
            [
                'user_id' => 1,
            ]
        );
    }
}