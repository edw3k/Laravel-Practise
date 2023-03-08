<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PlatformApartment;

class PlatformApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create 50 relations between platforms and apartments
        for ($i = 0; $i < 50; $i++) {
            // Create a relation between a random platform and a random apartment
            PlatformApartment::factory()->create();
        }
    }
}
