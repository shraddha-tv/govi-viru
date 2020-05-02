<?php

use Illuminate\Database\Seeder;

class VegetableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vegetables')->insert([
            [
                'vegId' => 1,
                'grade' => 'A2',
                'rate' => 2.3,
                'quantity' => 400,
                'date' => date('Y/m/d'),
                'freeQuantity' => 50,
                'farmerId' => 2,
            ],
            [
                'vegId' => 2,
                'grade' => 'B2',
                'rate' => 2.6,
                'quantity' => 200,
                'date' => date('Y/m/d'),
                'freeQuantity' => 50,
                'farmerId' => 2,
            ],

        ]);
    }
}
