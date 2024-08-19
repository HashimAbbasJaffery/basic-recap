<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Course::create([
            "course" => "DSA"
        ]);
        
        Course::create([
            "course" => "Linear Algebra"
        ]);
        
        Course::create([
            "course" => "Discrete Structure"
        ]);
        
        Course::create([
            "course" => "Mathematics"
        ]);

    }
}
