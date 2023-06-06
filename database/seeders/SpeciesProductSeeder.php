<?php

namespace Database\Seeders;

use App\Models\SpeciesProduct;
use Illuminate\Database\Seeder;

class SpeciesProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $speciesList = [
            "Arabika",
            "Robusta",
            "Blend",
        ];


        foreach ($speciesList as $species) {
            $findSpecies = SpeciesProduct::where('name', $species)->first();
            if (blank($findSpecies)) {
                 $createSpecies = SpeciesProduct::create([
                    "name" => $species
                ]);
            }
        }
    }
}
