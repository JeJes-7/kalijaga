<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Santri>
 */
class SantriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // user_id provided by UserFactory
            'kamar' => fake()->numerify('Kalijaga-0#'),
            'status' => fake()->randomElement(['Aktif', 'Cuti']),
            'tanggal_masuk' => fake()->dateTimeBetween('-3 years', 'now'),
            'no_telpon' => fake()->phoneNumber(),
        ];
    }
}