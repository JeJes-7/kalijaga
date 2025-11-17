<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdministrasiController extends Controller
{
    /**
     * Display the Santri Administration (Keuangan) page.
     */
    public function index(): View
    {
        $santri = Auth::user()->santri;

        // Riwayat pembayaran
        $riwayatPembayaran = $santri->transaksis()->orderBy('created_at', 'desc')->get();

        // Total data keuangan
        $totalTunggakan = $santri->transaksis()
            ->where('status', 'Tertunggak')
            ->sum('jumlah');

        $totalPembayaranLunas = $santri->transaksis()
            ->where('status', 'Lunas')
            ->sum('jumlah');

        // Tentukan Status SPP
        $statusAdministrasi = $totalTunggakan > 0 ? 'Tertunggak' : 'Lunas';

        return view('santri.administrasi', compact(
            'santri',
            'riwayatPembayaran',
            'totalTunggakan',
            'totalPembayaranLunas',
            'statusAdministrasi'
        ));
    }
}