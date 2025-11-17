<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $santris = Santri::with('user')->latest()->paginate(10);
        
        return view('admin.santri.index', compact('santris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.santri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'kamar' => 'required|string|max:50',
            'status' => 'required|in:Aktif,Cuti',
            'tanggal_masuk' => 'required|date',
            'no_telpon' => 'nullable|string|max:20',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'santri',
        ]);

        $user->santri()->create([
            'kamar' => $validated['kamar'],
            'status' => $validated['status'],
            'tanggal_masuk' => $validated['tanggal_masuk'],
            'no_telpon' => $validated['no_telpon'],
        ]);

        return redirect()->route('admin.santri.index')->with('success', 'Santri baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Santri $santri): View
    {
        $santri->load('user', 'transaksis', 'pelanggarans');
        return view('admin.santri.show', compact('santri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Santri $santri): View
    {
        $santri->load('user');
        return view('admin.santri.edit', compact('santri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Santri $santri): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($santri->user_id),
            ],
            'password' => 'nullable|string|min:8',
            'kamar' => 'required|string|max:50',
            'status' => 'required|in:Aktif,Cuti',
            'tanggal_masuk' => 'required|date',
            'no_telpon' => 'nullable|string|max:20',
        ]);

        $santri->user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        if (!empty($validated['password'])) {
            $santri->user->update([
                'password' => Hash::make($validated['password'])
            ]);
        }

        $santri->update([
            'kamar' => $validated['kamar'],
            'status' => $validated['status'],
            'tanggal_masuk' => $validated['tanggal_masuk'],
            'no_telpon' => $validated['no_telpon'],
        ]);

        return redirect()->route('admin.santri.index')->with('success', 'Data santri berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Santri $santri): RedirectResponse
    {
        $santri->user->delete();

        return redirect()->route('admin.santri.index')->with('success', 'Data santri berhasil dihapus.');
    }
}