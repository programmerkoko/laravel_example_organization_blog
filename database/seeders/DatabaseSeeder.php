<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Comment;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
User::truncate();
Post::truncate();
Comment::truncate();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Post::factory()->count(85)->create();
        Comment::factory()->count(85)->create();
    }
}