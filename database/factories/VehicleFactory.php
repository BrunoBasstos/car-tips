<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Trim;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
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
        return [
            'active'   => true,
            'type_id'  => fn() => Type::factory()->create()->id,
            'model_id' => fn() => Model::factory()->create()->id,
            'trim_id'  => fn() => Trim::factory()->create()->id
        ];
    }
}
