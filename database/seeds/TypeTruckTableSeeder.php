<?php

use App\Models\TypeTruck;
use Illuminate\Database\Seeder;

class TypeTruckTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            "Tranvías",
            "Furgones",
            "Camiones",
            "Autocar",
            "Remolques y semirremolques",
            "Autobuses",
            "Tren de carretera"
        ];

        foreach ($types as $item) {
            TypeTruck::create(['name' => $item]);
        }

        return true;
    }
}
