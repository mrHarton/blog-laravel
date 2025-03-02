<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesSeeder::class);

        // Ensure the admin user exists and assign the role without deleting users
        $admin = User::where('email', 'admin@example.com')->first();
        if (!$admin) {
            $admin = User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password123')
            ]);
        }
        $admin->assignRole('admin');

        $author = User::where('email', 'author@example.com')->first();
        if (!$author) {
            $author = User::create([
                'name' => 'Author User',
                'email' => 'author@example.com',
                'password' => bcrypt('password123')
            ]);
        }
        $author->assignRole('author');
    }
}
