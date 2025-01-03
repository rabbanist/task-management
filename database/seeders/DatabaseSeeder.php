<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);
        
       \App\Models\User::factory(10)->create();
       \App\Models\Project::factory(10)->create();
       \App\Models\Task::factory(10)->create();
    
    }
}
