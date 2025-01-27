<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create()->each(function ($user){
            Post::factory(1)->create(['user_id' => $user->id, 'title' => fake()->sentence(),
        'body' => fake()->paragraph(10)]);
        });
        
    }
}
