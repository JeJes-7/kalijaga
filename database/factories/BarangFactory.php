<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang' => fake()->randomElement(['Meja Belajar', 'Sound Kecil', 'Al-Quran', 'Sapu', 'Piring', 'Lemari']),
            'jumlah' => fake()->numberBetween(1, 50),
            'kategori' => fake()->randomElement(['Furniture', 'Elektronik', 'Kitab', 'Alat Kebersihan', 'Perabotan Dapur']),
            'kondisi' => fake()->randomElement(['Baik', 'Rusak Ringan', 'Rusak Berat']),
            'tanggal_tercatat' => fake()->dateTimeBetween('-2 years', 'now'),
        ];
    }
}