<?php

namespace Database\Factories;

use App\Models\Make;
use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class MakeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new Fakecar($this->faker));

        return [
            'name'   => $this->faker->unique()->vehicleBrand,
            'active' => true
        ];
    }
}
