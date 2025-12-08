<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if (!in_array($user->role->name, $roles)) {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Accès refusé. Rôle invalide.'
            ]);
        }

        return $next($request);
    }
}
