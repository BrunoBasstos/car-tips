<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            TrimSeeder::class,
            TypeSeeder::class,
            MakeSeeder::class,
            ModelSeeder::class,
            TagSeeder::class,
//            VehicleSeeder::class,
            TipSeeder::class
        ]);
    }

}
