<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ['name' => 'manutenção', 'created_at' => now()],
            ['name' => 'elétrica', 'created_at' => now()],
            ['name' => 'mecânica', 'created_at' => now()],
            ['name' => 'acessórios', 'created_at' => now()],
            ['name' => 'segurança', 'created_at' => now()],
        ];

        Tag::query()->insert($tags);
    }

}
