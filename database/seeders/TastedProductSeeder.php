<?php

namespace Database\Seeders;

use App\Models\TastedProduct;
use Illuminate\Database\Seeder;

class TastedProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tastedList = [
            "Aceh",
            "Semarang",
            "Bandung",
            "Jawa",
            "Amerika Selatan",
            "Dan Lain-Lain",
        ];


        foreach ($tastedList as $tasted) {
            $findTasted = TastedProduct::where('name', $tasted)->first();
            if (blank($findTasted)) {
                 $createTasted = TastedProduct::create([
                    "name" => $tasted
                ]);
            }
        }
    }
}
