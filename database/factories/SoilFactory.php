<?php

namespace Database\Factories;

use App\Models\Soil;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Soil>
 */
class SoilFactory extends Factory
{
    protected $model = Soil::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date,
            'moisture_level' => $this->faker->randomFloat(2, 0, 100),
            'nutrient_content' => $this->faker->randomFloat(2, 0, 100),
            'user_id' => $this->faker->randomElement([1, 2]),
        ];
    }
}
