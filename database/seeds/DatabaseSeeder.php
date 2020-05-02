<?php

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
            RoleDataSeeder::class,
            UserSeeder::class,
            CategoryDataSeeder::class,
            VegetableDataSeeder::class,
        ]);
    }
}
