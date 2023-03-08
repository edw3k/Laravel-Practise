<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            PlatformSeeder::class,
            ApartmentSeeder::class,
            PlatformApartmentSeeder::class,

        ]);
    }
}
