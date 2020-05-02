<?php

use Illuminate\Database\Seeder;

class CategoryDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'code' => 'Carrot',
                'description' => 'dfsdf'
            ],
            [
                'code' => 'Banana',
                'description' => 'A asd asd'
            ],

        ]);
    }
}
