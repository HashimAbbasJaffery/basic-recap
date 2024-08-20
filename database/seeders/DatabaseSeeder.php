<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Program;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(50)->create();
        Program::factory(50)->create();
        Course::factory(50)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Course::create([
            "course" => "DSA",
            "program_id" => 1
        ]);
        
        Course::create([
            "course" => "Linear Algebra",
            "program_id" => 1
        ]);
        
        Course::create([
            "course" => "Discrete Structure",
            "program_id" => 1
        ]);
        
        Course::create([
            "course" => "Mathematics",
            "program_id" => 1
        ]);

    }
}
