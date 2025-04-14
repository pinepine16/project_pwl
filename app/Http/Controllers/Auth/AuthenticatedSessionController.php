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

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('id', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'id' => __('ID atau password salah.'),
            ]);
        }

        $user = Auth::user();

        $request->session()->regenerate();

        $role = $user->role->role_name ?? null;

        switch ($role) {
            case 'admin':
                return redirect()->route('adminList');
            case 'kaprodi':
                return redirect()->intended('kaprodi.index');
            case 'mahasiswa':
                return redirect()->intended('mahasiswaList');
            default:
                Auth::logout();
                return redirect('/login')->with('error', 'Role tidak dikenali.');
        }
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
