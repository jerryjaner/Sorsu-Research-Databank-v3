<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     * Accepts a comma or pipe-separated list of roles.
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $rolesArray = preg_split('/[|,]/', $roles);

        // Using Spatie role check
        if (!$user->hasAnyRole($rolesArray)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
