<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Tip;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class TipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content'    => $this->faker->paragraph(50),
            'user_id'    => fn() => ser::factory()->createOne()->id,
            'vehicle_id' => fn() => Vehicle::factory()->createOne()->id,
            'tag_id'     => fn() => Tag::factory()->createOne()->id,
            'created_at' => $this->faker->dateTimeBetween(now(), now()->addMinute())
        ];
    }
}
