<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => "Admin",
                'email' => 'admin@gmail.com',
                'address' => 'road road road',
                'password' => Hash::make('Admin'),
                'lat' => 1.111111,
                'long' => 22.222222,
                'phoneNo' => 0123232323,
                'whatsappNo' => 0123232323,
                'role' => 1,
            ],
            [
                'name' => "Farmer01",
                'email' => null,
                'address' => 'road road road',
                'password' => Hash::make('password'),
                'lat' => 1.111114,
                'long' => 22.222242,
                'phoneNo' => 0123232324,
                'whatsappNo' => 0123232324,
                'role' => 2,
            ],

        ]);
    }
}
