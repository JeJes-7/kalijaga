<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Eager load relasi santri & user untuk ambil nama
        $transaksis = Transaksi::with('santri.user')->latest()->paginate(10);
        
        return view('admin.transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Ambil semua santri untuk dropdown
        $santris = Santri::with('user')->get();
        return view('admin.transaksi.create', compact('santris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'jenis' => 'required|string|max:100',
            'status' => 'required|in:Lunas,Tertunggak',
            'jumlah' => 'required|numeric|min:0',
        ]);

        Transaksi::create([
            'santri_id' => $validated['santri_id'],
            'id_transaksi' => Str::upper(Str::random(10)), // Buat ID unik
            'jenis' => $validated['jenis'],
            'status' => $validated['status'],
            'jumlah' => $validated['jumlah'],
        ]);

        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        // Tidak dipakai di UI admin, tapi bisa untuk 'Detail' di santri
        return view('admin.transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi): View
    {
        $santris = Santri::with('user')->get();
        return view('admin.transaksi.edit', compact('transaksi', 'santris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi): RedirectResponse
    {
        $validated = $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'jenis' => 'required|string|max:100',
            'status' => 'required|in:Lunas,Tertunggak',
            'jumlah' => 'required|numeric|min:0',
        ]);

        $transaksi->update($validated);

        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi): RedirectResponse
    {
        $transaksi->delete();
        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}