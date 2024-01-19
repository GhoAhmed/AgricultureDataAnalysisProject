<?php

namespace Database\Seeders;

use App\Models\Engine;
use Illuminate\Database\Seeder;

class EngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Engine::factory(10)->create();
    }
}
