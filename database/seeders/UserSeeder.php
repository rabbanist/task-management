<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Manager',
            'email' => 'manager@example.com',
            'employee_id' => 'MGR-001',
            'position' => 'Manager',
            'role' =>'manager',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Teammate',
            'email' => 'teammate@example.com',
            'employee_id' => 'TM-001',
            'position' => 'Teammate',
            'role' =>'teammate',
            'password' => bcrypt('password'),
        ]);
    }
}
