<?php

namespace Database\Seeders;

use App\Models\ProcessingProduct;
use Illuminate\Database\Seeder;

class ProcessingProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $processingList = [
            "Honey White",
            "Natural",
            "Honey Gold",
            "Honey Yellow",
        ];


        foreach ($processingList as $processing) {
            $findProcessing = ProcessingProduct::where('name', $processing)->first();
            if (blank($findProcessing)) {
                 $createProcessing = ProcessingProduct::create([
                    "name" => $processing
                ]);
            }
        }
    }
}
