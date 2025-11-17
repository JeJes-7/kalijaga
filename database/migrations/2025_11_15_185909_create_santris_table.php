<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            // Relasi One-to-One ke tabel users
            $table->foreignIdFor(App\Models\User::class)->constrained()->onDelete('cascade');
            $table->string('kamar');
            $table->enum('status', ['Aktif', 'Cuti'])->default('Aktif');
            $table->date('tanggal_masuk');
            $table->string('no_telpon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};