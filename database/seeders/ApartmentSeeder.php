<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    public function run()
    {
        // Get all users
        $users = User::all();

        //Create 20 apartments in total
        for ($i = 0; $i < 20; $i++) {
            // Get a random user
            $user = $users->random();

            // Create an apartment for that user
            Apartment::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
