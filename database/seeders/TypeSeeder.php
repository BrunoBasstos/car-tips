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
            ['name' => 'moto', 'css_color' => 'green-100','created_at' => now()],
            ['name' => 'carro', 'css_color' => 'indigo-100', 'created_at' => now()],
            ['name' => 'caminhão', 'css_color' => 'red-100', 'created_at' => now()],
        ];

        Type::query()->insert($types);
    }

}
