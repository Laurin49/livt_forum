<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory(8)->create();

        $admin = User::factory()
            ->create([
                'name' => 'Admin',
                'email' => 'admin@hsv.de',
                'email_verified_at' => now(),
                'password' => bcrypt('hsv1887tv'),
                'remember_token' => Str::random(10),
            ]);

        $elfadli = User::factory()
            ->create([
                'name' => 'Elfadli',
                'email' => 'elfadli@hsv.de',
                'email_verified_at' => now(),
                'password' => bcrypt('hsv1887tv'),
                'remember_token' => Str::random(10),
            ]);

        $users->push($admin, $elfadli);

        $posts = Post::factory(200)->recycle($users)->create();

        $comments = Comment::factory(100)->recycle($users)->recycle($posts)->create();

        $users2 = new Collection([$admin, $elfadli]);
        $posts2 = Post::factory(20)->recycle($users2)->create();
        Comment::factory(20)->recycle($users2)->recycle($posts2)->create();

    }
}
