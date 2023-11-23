<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'driver_licence' => fake()->randomNumber(9),
            'own_car' => fake()->words(),
            'own_capacity' => fake()->numberBetween(1, 7),
            'accident' => fake()->numberBetween(0, 5),
            'basic_fee' =>fake()->numberBetween(200, 2000),
            'bank_name' => fake()->words(),
            'bank_branch' => fake()->words(),
            'bank_account' => fake()->bankAccountNumber(),
            'account_name' => fake()->kananame(),
            'remember_token' => Str::random(10),
        ];
    }
}
