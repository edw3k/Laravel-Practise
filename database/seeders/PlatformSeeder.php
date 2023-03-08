<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    public function run()
    {
        Platform::factory()->create(['name' => 'Plataforma 1']);
        Platform::factory()->create(['name' => 'Plataforma 2']);
        Platform::factory()->create(['name' => 'Plataforma 3']);
    }
}
