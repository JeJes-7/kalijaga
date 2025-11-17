<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggaran;
use App\Models\Santri;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(): View
    {
        $totalSantri = Santri::where('status', 'Aktif')->count();

        $totalTunggakan = Santri::whereHas('transaksis', function ($query) {
            $query->where('status', 'Tertunggak');
        })->distinct()->count();

        $totalPelanggaran = Pelanggaran::whereMonth('tanggal_pelanggaran', now()->month)
                                        ->whereYear('tanggal_pelanggaran', now()->year)
                                        ->count();

        $totalPendapatan = Transaksi::where('status', 'Lunas')
                                    ->whereMonth('updated_at', now()->month)
                                    ->whereYear('updated_at', now()->year)
                                    ->sum('jumlah');

        // Nanti, kita akan buat file view ini
        return view('admin.dashboard', compact(
            'totalSantri',
            'totalTunggakan',
            'totalPelanggaran',
            'totalPendapatan'
        ));
    }
}