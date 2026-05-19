<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        // ############ PERUBAHAN ADA DI SINI ############
        // Cek apakah user yang login adalah admin
        if (Auth::user()->is_admin) {
            // Jika ya, arahkan ke route 'admin.dashboard'
            return redirect()->route('admin.dashboard');
        }

        // Jika bukan admin, arahkan ke halaman utama seperti biasa
        return redirect()->intended(RouteServiceProvider::HOME);
        // ############ AKHIR PERUBAHAN ############
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}