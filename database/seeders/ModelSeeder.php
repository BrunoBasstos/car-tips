<?php

namespace Database\Seeders;

use App\Models\Model;
use App\Models\Trim;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class ModelSeeder extends Seeder
{

    private Collection $trims;

    public function __construct()
    {
        $this->trims = Trim::all();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files[1] = fopen(base_path("database/seeders/source-files-seeder/modelos-motos.csv"), "r");
        $files[2] = fopen(base_path("database/seeders/source-files-seeder/modelos-carros.csv"), "r");
        $files[3] = fopen(base_path("database/seeders/source-files-seeder/modelos-caminhao.csv"), "r");
        for ($i = 1; $i <= 3; $i++) {
            $firstline = true;
            while (($data = fgetcsv($files[$i], 2000, ";")) !== FALSE) {
                if (!$firstline) {
                    $this->proccessData($data, $i);
                }
                $firstline = false;
            }
            fclose($files[$i]);
        }
    }

    public function proccessData($data, $type_id)
    {
        $model = Model::firstOrCreate([
            "id"      => $data[0],
            "make_id" => $data[1],
            "name"    => $data[2]
        ]);

        Vehicle::create([
            'type_id'  => $type_id,
            'model_id' => $model->id,
            'trim_id'  => $this->trims->random()->id
        ]);
    }
}
