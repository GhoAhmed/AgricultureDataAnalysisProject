<?php

namespace Database\Seeders;

use App\Models\Soil;
use Illuminate\Database\Seeder;

class SoilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Soil::factory(10)->create();
    }
}
