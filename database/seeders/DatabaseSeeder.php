<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. Create 1 specific user
        $user = User::factory()->create([
            'name' => 'Lawrence Cunanan',
            'email' => 'lawrence@gmail.com',
            'password' => bcrypt('lawrence123'),
        ]);

        // 2. Create 5 tasks for that user
        Task::factory()->count(5)->create([
            'user_id' => $user->id,
        ]);

        // 3. Optionally, create 3 random users with 2 tasks each
        User::factory(3)->create()->each(function ($user) {
            Task::factory(2)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
