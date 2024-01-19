<?php

namespace Database\Factories;

use App\Models\Weather;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Weather>
 */
class WeatherFactory extends Factory
{
    protected $model = Weather::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date,
            'temperature' => $this->faker->randomFloat(2, -20, 40),
            'humidity' => $this->faker->randomFloat(2, 0, 100),
            'precipitation' => $this->faker->randomFloat(2, 0, 50),
            'user_id' => $this->faker->randomElement([1, 2]),
        ];
    }
}
