<?php

namespace Database\Seeders;

use App\Models\Trim;
use Illuminate\Database\Seeder;

class TrimSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trim::factory()
            ->count(10)
            ->create();
    }

}
