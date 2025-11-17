<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pelanggarans = Pelanggaran::with('santri.user')->latest()->paginate(10);
        return view('admin.pelanggaran.index', compact('pelanggarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $santris = Santri::with('user')->get();
        return view('admin.pelanggaran.create', compact('santris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'pelanggaran' => 'required|string|max:255',
            'bidang' => 'required|string|max:100',
            'tingkat' => 'required|in:Berat,Sedang,Ringan',
            'status' => 'required|in:Selesai,Menunggu',
            'tanggal_pelanggaran' => 'required|date',
        ]);

        Pelanggaran::create($validated);

        return redirect()->route('admin.pelanggaran.index')->with('success', 'Data pelanggaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggaran $pelanggaran)
    {
        // Not really used
        return view('admin.pelanggaran.show', compact('pelanggaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggaran $pelanggaran): View
    {
        $santris = Santri::with('user')->get();
        return view('admin.pelanggaran.edit', compact('pelanggaran', 'santris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggaran $pelanggaran): RedirectResponse
    {
        $validated = $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'pelanggaran' => 'required|string|max:255',
            'bidang' => 'required|string|max:100',
            'tingkat' => 'required|in:Berat,Sedang,Ringan',
            'status' => 'required|in:Selesai,Menunggu',
            'tanggal_pelanggaran' => 'required|date',
        ]);

        $pelanggaran->update($validated);

        return redirect()->route('admin.pelanggaran.index')->with('success', 'Data pelanggaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggaran $pelanggaran): RedirectResponse
    {
        $pelanggaran->delete();
        return redirect()->route('admin.pelanggaran.index')->with('success', 'Data pelanggaran berhasil dihapus.');
    }
}