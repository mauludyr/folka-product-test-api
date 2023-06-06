<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            OriginProductSeeder::class,
            ProcessingProductSeeder::class,
            RoastLevelProductSeeder::class,
            SpeciesProductSeeder::class,
            TastedProductSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
