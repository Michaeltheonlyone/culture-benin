<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    // Show login page
    public function create(): View|RedirectResponse
    {
        
        return view('login');
    }

    // Handle login
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (! Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors([
                'email' => 'Email ou mot de passe incorrect',
            ])->withInput();
        }

        $request->session()->regenerate();
        return $this->redirectUserByRole(Auth::user());
    }

    // Logout
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Helper redirect function (avoids repetition)
    private function redirectUserByRole($user): RedirectResponse
    {
        $role = optional($user->role)->name;  // safe reading

        if (in_array($role, ['Administrateur', 'Manageur'])) {
            return redirect()->intended(route('backend.dashboard.index'));
        }

        if (in_array($role, ['Auteur', 'Lecteur'])) {
            return redirect()->intended(route('frontend.contenus.feed'));
        }

        Auth::logout();
        return redirect()->route('login')->withErrors([
            'email' => 'Role non reconnu, contactez un administrateur.',
        ]);
    }
}
