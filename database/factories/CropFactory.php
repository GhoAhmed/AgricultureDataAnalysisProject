<?php

namespace Database\Factories;

use App\Models\Crop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crop>
 */
class CropFactory extends Factory
{
    protected $model = Crop::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'yield' => $this->faker->randomFloat(2, 0, 1000),
            'planting_date' => $this->faker->date,
            'user_id' => $this->faker->randomElement([1, 2]),
        ];
    }
}
