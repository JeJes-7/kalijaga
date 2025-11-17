<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jadwal>
 */
class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hari' => fake()->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']),
            'kitab' => fake()->randomElement(['Bulughul Marom', 'Tafsir Jalalain', 'Uqudul Jain', 'Imriti', 'Fathul Qorib']),
            'ustadz' => 'Ustadz ' . fake()->firstName(),
            'waktu' => fake()->randomElement(['Subuh', 'Maghrib', 'Isya']),
        ];
    }
}