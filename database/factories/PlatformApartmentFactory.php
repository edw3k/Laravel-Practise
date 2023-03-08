<?php

namespace Database\Factories;

use App\Models\Apartment;
use App\Models\Platform;
use App\Models\PlatformApartment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlatformApartmentFactory extends Factory
{
    protected $model = PlatformApartment::class;

    public function definition()
    {
        return [
            'register_date' => $this->faker->date(),
            'premium' => $this->faker->boolean(),
            'platform_id' => Platform::factory()->create()->id,
            'apartment_id' => Apartment::factory()->create()->id,
        ];
    }
}
