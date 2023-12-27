<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(1, 30),
            'driver_id' => fake()->numberBetween(1, 30),
            'con_date' => fake()->dateTimeBetween('-1 week','+30 days'),
            'con_on_place' => fake()->address(),
            'con_on_time' => fake()->time(),
            'con_off_place' => fake()->address(),
            'con_off_time' => fake()->time(),
            'con_number' => fake()->numberBetween(1, 7),
            'con_car' => fake()->realText(10, 5),
            'con_fee' => fake()->numberBetween(200, 2000),
        ];
    }
}
