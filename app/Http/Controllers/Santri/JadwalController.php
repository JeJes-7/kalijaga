<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JadwalController extends Controller
{
    /**
     * Display the Santri Jadwal Pesantren page.
     */
    public function index(): View
    {
        // Ambil semua data jadwal, urutkan berdasarkan hari (custom sort bisa ditambahkan nanti)
        $jadwals = Jadwal::orderBy('hari')->get();
        
        return view('santri.jadwal', compact('jadwals'));
    }
}