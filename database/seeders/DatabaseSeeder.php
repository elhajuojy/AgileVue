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
        \App\Models\User::factory(1)->create([
            'full_name' => 'ELMAHDI ELHJUOJY',
            'email' => 'test@test.com',
            'password'=> bcrypt('password'),
        ]);


    }
}
