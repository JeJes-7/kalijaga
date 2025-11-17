<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat User Admin (PENTING)
        // Kita nggak pakai factory biar datanya pasti
        User::create([
            'name' => 'Admin Pondok',
            'email' => 'admin@ponpes.com',
            'password' => Hash::make('password'), // password-nya 'password'
            'role' => 'admin',
        ]);

        // 2. Buat 50 Santri (User + Profil Santri)
        // Ini akan memanggil UserFactory
        User::factory(50)->create();

        // 3. Buat 10 data Jadwal (panggil JadwalFactory)
        Jadwal::factory(10)->create();

        // 4. Buat 20 data Barang (panggil BarangFactory)
        Barang::factory(20)->create();
    }
}