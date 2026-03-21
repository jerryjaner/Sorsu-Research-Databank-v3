<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();

        // If student → go to homepage
        if ($user->hasRole('student')) {
            return redirect()->intended(route('homepage', absolute: false));
        }

        // If admin (super-admin or campus admin)
        if ($user->hasAnyRole(['super-admin', 'bulan-admin', 'sorsogon-admin', 'castilla-admin', 'magallanes-admin', 'graduate-admin'])) {
            return redirect()->intended(route('admin.dashboard', absolute: false));
        }

        // fallback (optional)
        return redirect('/');
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
