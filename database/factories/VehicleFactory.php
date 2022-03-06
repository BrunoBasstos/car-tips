<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Trim;
use App\Models\Type;
use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
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
            'active' => true,
            'type_id' => Type::factory()->create()->id,
            'model_id' => Model::factory()->create()->id,
            'trim_id' => Trim::factory()->create()->id
        ];

//'type_id' => Type::query()->get()->random()->id,
//'model_id' => Model::all()->random()->id,
//'trim_id' => rand(Trim::all()->random()->id, null)
    }
}
