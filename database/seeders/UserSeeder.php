<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@hsv.de',
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('hsv1887tv'),
        //     'remember_token' => Str::random(10),
        // ]);
    }
}
