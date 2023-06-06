<?php

namespace Database\Seeders;

use App\Models\RoastLevelProduct;
use Illuminate\Database\Seeder;

class RoastLevelProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roastList = [
            "Light Roast",
            "Medium Roast",
            "Dark Roast",
            "Light to Medium Roast",
        ];


        foreach ($roastList as $roast) {
            $findRoast = RoastLevelProduct::where('name', $roast)->first();
            if (blank($findRoast)) {
                 $createRoast = RoastLevelProduct::create([
                    "name" => $roast
                ]);
            }
        }
    }
}
