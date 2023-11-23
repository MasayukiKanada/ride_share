<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'tel' => fake()->phoneNumber(),
            'zip' => fake()->postcode(),
            'pref' => fake()->prefecture(),
            'town' => fake()->city(),
            'address' => fake()->streetAddress(),
            'birthday' => fake()->date(),
            'gender' => fake()->numberBetween(0, 2),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'driver_licence' => fake()->numberBetween(11111111111, 999999999999),
            'own_car' => fake()->word(),
            'own_capacity' => fake()->numberBetween(1, 7),
            'accident' => fake()->numberBetween(0, 5),
            'rank' => fake()->numberBetween(0, 5),
            'basic_fee' =>fake()->numberBetween(200, 2000),
            'bank_name' => fake()->word(),
            'bank_branch' => fake()->word(),
            'bank_account' => fake()->bankAccountNumber(),
            'account_name' => fake()->kanaName(),
            'remember_token' => Str::random(10),
        ];
    }
}
