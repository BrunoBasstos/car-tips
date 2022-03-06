<?php

namespace Database\Seeders;

use App\Models\Make;
use App\Models\Model;
use Illuminate\Database\Seeder;

class ModelSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::factory()
            ->count(15)
            ->create([
                'make_id' => Make::all()->random()->id
            ]);
    }

}
