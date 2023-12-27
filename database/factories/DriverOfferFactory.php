<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DriverOffer>
 */
class DriverOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'driver_id' => fake()->numberBetween(1, 30),
            'offer_date' => fake()->dateTimeBetween('now','+1 year'),
            'offer_on_place' => fake()->address(),
            'offer_on_time' => '00:00',
            'offer_off_place' => fake()->address(),
            'offer_off_time' => '23:59',
            'offer_car' => fake()->word(),
            'offer_capacity' => fake()->numberBetween(1, 7),
            'offer_fee' => fake()->numberBetween(200, 2000),
        ];
    }
}
