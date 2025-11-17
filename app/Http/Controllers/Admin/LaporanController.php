<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use App\Models\Transaksi;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LaporanController extends Controller
{
    /**
     * Display the Admin Laporan Keuangan page.
     */
    public function index(): View
    {
        // Ambil data untuk ringkasan laporan
        $totalSantriAktif = Santri::where('status', 'Aktif')->count();
        $totalPelanggaranSelesai = Pelanggaran::where('status', 'Selesai')->count();
        $totalPelanggaranMenunggu = Pelanggaran::where('status', 'Menunggu')->count();
        $totalPemasukan = Transaksi::where('status', 'Lunas')->sum('jumlah');

        // Kita akan kirim data ke view untuk ditampilkan dan filter
        return view('admin.laporan.index', compact(
            'totalSantriAktif',
            'totalPelanggaranSelesai',
            'totalPelanggaranMenunggu',
            'totalPemasukan'
        ));
    }
    
    // Nanti bisa ditambahkan method exportPDF(Request $request) di sini
}