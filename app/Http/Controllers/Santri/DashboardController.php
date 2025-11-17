<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the santri dashboard.
     */
    public function index(): View
    {
        $user = Auth::user();
        $santri = $user->santri;

        // 1. Status Administrasi
        $hasTunggakan = $santri->transaksis()->where('status', 'Tertunggak')->exists();
        $statusAdministrasi = $hasTunggakan ? 'Tertunggak' : 'Lunas';

        // 2. Pelanggaran Bulan Ini (Card + List)
        $pelanggaranBulanIni = $santri->pelanggarans()
                                    ->whereMonth('tanggal_pelanggaran', now()->month)
                                    ->whereYear('tanggal_pelanggaran', now()->year)
                                    ->get();
        
        $jumlahPelanggaranBulanIni = $pelanggaranBulanIni->count();

        // Kita pakai view 'dashboard' bawaan Breeze
        return view('dashboard', compact(
            'santri',
            'statusAdministrasi',
            'pelanggaranBulanIni',
            'jumlahPelanggaranBulanIni'
        ));
    }
}