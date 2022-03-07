<?php

namespace Database\Factories;

use App\Models\Trim;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class TrimFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(5)
        ];
    }
}
