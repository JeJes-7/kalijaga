<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Kontroler untuk Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\LaporanController as AdminLaporanController; // BARU: Controller Laporan Admin
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\TransaksiController;

// Kontroler untuk Santri
use App\Http\Controllers\Santri\DashboardController as SantriDashboardController;
use App\Http\Controllers\Santri\AdministrasiController;
use App\Http\Controllers\Santri\JadwalController as SantriJadwalController;
use App\Http\Controllers\Santri\PelanggaranController as SantriPelanggaranController;
use App\Http\Controllers\Santri\LaporanController as SantriLaporanController;

/*
|--------------------------------------------------------------------------
| Rute Publik
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('login');
});

/*
|--------------------------------------------------------------------------
| Rute Role Santri
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified', 'role:santri'])->group(function () {
    // Dashboard & Profil
    Route::get('/dashboard', [SantriDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Modul Santri
    Route::get('/administrasi', [AdministrasiController::class, 'index'])->name('santri.administrasi');
    Route::get('/jadwal', [SantriJadwalController::class, 'index'])->name('santri.jadwal');
    Route::get('/pelanggaran', [SantriPelanggaranController::class, 'index'])->name('santri.pelanggaran');
    Route::get('/laporan', [SantriLaporanController::class, 'index'])->name('santri.laporan');
});

/*
|--------------------------------------------------------------------------
| Rute Role Admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Modul CRUD Admin
    Route::resource('santri', SantriController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('pelanggaran', PelanggaranController::class);
    Route::resource('barang', BarangController::class);
    
    // Modul Laporan Admin (Baru)
    Route::get('laporan', [AdminLaporanController::class, 'index'])->name('laporan.index');
});

/*
|--------------------------------------------------------------------------
| Rute Autentikasi (Login, Register, dll.)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';