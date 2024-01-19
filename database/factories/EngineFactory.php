<?php

namespace Database\Factories;

use App\Models\Engine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Engine>
 */
class EngineFactory extends Factory
{
    protected $model = Engine::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'user_id' => $this->faker->randomElement([1, 2]),
        ];
    }
}
