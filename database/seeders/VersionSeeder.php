<?php

namespace Database\Seeders;

use App\Models\version;
use Database\Factories\VersionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        version::factory()->count(20)->create([
            'project_id'=> 1,
        ]);

    }
}
