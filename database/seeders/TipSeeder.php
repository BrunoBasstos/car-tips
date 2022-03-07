<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Tip;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class TipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tip::factory()
            ->count(50)
            ->create([
                'user_id'    => fn() => User::all()->random()->id,
                'vehicle_id' => fn() => Vehicle::all()->random()->id,
                'tag_id'     => fn() => Tag::all()->random()->id
            ]);
    }
}
