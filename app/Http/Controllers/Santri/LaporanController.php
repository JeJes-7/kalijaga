<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LaporanController extends Controller
{
    /**
     * Display the Santri Laporan page.
     */
    public function index(): View
    {
        // Data yang dibutuhkan di sini minimal, biasanya cuma data santri untuk header
        // dan status kelulusan (jika ada).
        $santri = auth()->user()->santri;

        return view('santri.laporan', compact('santri'));
    }
}