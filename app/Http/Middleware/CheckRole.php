<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Jika user belum login, redirect ke login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Jika role user tidak termasuk dalam yang diizinkan
        if (!in_array(auth()->user()->role, $roles)) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
