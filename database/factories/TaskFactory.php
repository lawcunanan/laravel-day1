<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class TaskFactory extends Factory
{
   
    public function definition(): array
    { 
        

        return [
            'TaskTitle' => fake()->sentence(),
            'TaskDescription' => fake()->paragraph(),
            'TaskStatus' => fake()->randomElement(['Incomplete', 'Complete']),
            'user_id' => User::factory(), 
        ];
    }
}
