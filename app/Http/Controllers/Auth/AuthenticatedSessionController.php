<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Digunakan untuk logging
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = $request->user();

        // Log aktivitas login
        Log::info('User logged in', [
            'user_id' => $user->id,
            'email' => $user->email,
            'role' => $user->role,
            'ip' => $request->ip(),
        ]);

        // ===== LOGIKA PENCEGATAN SANTRI TIDAK AKTIF =====
        if ($user->role === 'santri') {
            
            // 1. Cek: Apakah profil Santri (di tabel 'santris') sudah ada?
            if (!$user->santri) {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Akun belum terdaftar di sistem. Silakan hubungi Admin Pesantren.',
                ])->withInput($request->only('email'));
            }

            // 2. Cek: Status santri harus 'Aktif'
            if ($user->santri->status !== 'Aktif') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Akun tidak aktif (Status: ' . $user->santri->status . '). Silakan hubungi admin.',
                ])->withInput($request->only('email'));
            }
        }
        // ===== AKHIR LOGIKA PENCEGATAN =====

        // Redirect berdasarkan role
        $route = match($user->role) {
            'admin' => route('admin.dashboard', absolute: false),
            default => route('dashboard', absolute: false), // Default adalah santri
        };

        return redirect()->intended($route)
            ->with('success', 'Selamat datang kembali!');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Log aktivitas logout
        if ($user) {
            Log::info('User logged out', [
                'user_id' => $user->id,
                'email' => $user->email,
            ]);
        }

        return redirect('/')->with('status', 'Anda telah berhasil logout.');
    }
}