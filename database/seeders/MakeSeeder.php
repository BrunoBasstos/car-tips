<?php

namespace Database\Seeders;

use App\Models\Make;
use Illuminate\Database\Seeder;

class MakeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvCaminhoes = fopen(base_path("database/seeders/source-files-seeder/marcas-caminhao.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvCaminhoes, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Make::firstOrCreate([
                    "id" => $data[0],
                    "name" => $data[1]
                ]);
            }
            $firstline = false;
        }
        fclose($csvCaminhoes);

        $csvCarros = fopen(base_path("database/seeders/source-files-seeder/marcas-carros.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvCarros, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Make::firstOrCreate([
                    "id" => $data[0],
                    "name" => $data[1],
                ]);
            }
            $firstline = false;
        }
        fclose($csvCarros);

        $csvMotos = fopen(base_path("database/seeders/source-files-seeder/marcas-motos.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvMotos, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Make::firstOrCreate([
                    "id" => $data[0],
                    "name" => $data[1]
                ]);
            }
            $firstline = false;
        }
        fclose($csvMotos);

    }

}
