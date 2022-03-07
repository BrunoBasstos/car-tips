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
        $trims = ['LT', 'LTZ', 'GL', 'GLS', 'XEI', 'SEG', 'GTX', 'GTI', 'XT', 'XTZ', 'XR3', 'XRS', 'SS', 'GT', 'AT', 'L', 'LS'];
        foreach($trims as $trim){
            Trim::create(['name' => $trim]);
        }

    }

}
