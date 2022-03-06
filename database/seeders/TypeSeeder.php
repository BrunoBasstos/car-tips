<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'moto', 'created_at' => now()],
            ['name' => 'carro', 'created_at' => now()],
            ['name' => 'caminhão', 'created_at' => now()],
        ];

        Type::query()
            ->insert($types);
    }

}
