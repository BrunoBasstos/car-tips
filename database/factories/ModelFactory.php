<?php

namespace Database\Factories;

use App\Models\Make;
use App\Models\Model;
use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ModelFactory extends Factory
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
            'name'    => $this->faker->unique()->vehicleModel,
            'make_id' => fn() => Make::factory()->create()->id,
            'active'  => true
        ];
    }
}
