<?php

namespace Database\Seeders;

use App\Models\Pool;
use Illuminate\Database\Seeder;

class PoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pool::factory(10)->create();
    }
}
