<?php

namespace Database\Seeders;

use App\Models\OriginProduct;
use Illuminate\Database\Seeder;

class OriginProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $originList = [
            "Aceh",
            "Semarang",
            "Bandung",
            "Jawa",
            "Amerika Selatan",
            "Dan Lain-Lain",
        ];


        foreach ($originList as $origin) {
            $findOrigin = OriginProduct::where('name', $origin)->first();
            if (blank($findOrigin)) {
                 $createOrigin = OriginProduct::create([
                    "name" => $origin
                ]);
            }
        }
    }
}
