<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory(10)->create();

        $posts = Post::factory(200)->recycle($users)->create();

        $comments = Comment::factory(100)->recycle($users)->recycle($posts)->create();

        $admin = User::factory()
            ->has(Post::factory(20))
            ->has(Comment::factory(40)->recycle($posts))
            ->create([
                'name' => 'Admin',
                'email' => 'admin@hsv.de',
                'email_verified_at' => now(),
                'password' => bcrypt('hsv1887tv'),
                'remember_token' => Str::random(10),
        ]);

        $elfadli = User::factory()
            ->has(Post::factory(20))
            ->has(Comment::factory(40)->recycle($posts))
            ->create([
                'name' => 'Elfadli',
                'email' => 'elfadli@hsv.de',
                'email_verified_at' => now(),
                'password' => bcrypt('hsv1887tv'),
                'remember_token' => Str::random(10),
            ]);

    }
}
