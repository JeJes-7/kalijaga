<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PelanggaranController extends Controller
{
    /**
     * Display the Santri Pelanggaran page.
     */
    public function index(): View
    {
        $santri = Auth::user()->santri;

        // Ambil semua riwayat pelanggaran
        $riwayatPelanggaran = $santri->pelanggarans()
            ->orderBy('tanggal_pelanggaran', 'desc')
            ->get();

        // Hitung statistik
        $totalPelanggaran = $riwayatPelanggaran->count();
        $sedangBerlangsung = $riwayatPelanggaran->where('status', 'Menunggu')->count();
        $hukumanSelesai = $riwayatPelanggaran->where('status', 'Selesai')->count();

        return view('santri.pelanggaran', compact(
            'riwayatPelanggaran',
            'totalPelanggaran',
            'sedangBerlangsung',
            'hukumanSelesai'
        ));
    }
}