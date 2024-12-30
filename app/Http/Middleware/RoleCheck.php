<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek apakah user sudah login dan statusnya sesuai dengan role yang diminta
        if (!Auth::check() || Auth::user()->status !== $role) {
            return redirect()->route('login')->with('failed', 'Akses ditolak. Role tidak cocok.');
        }

        return $next($request);
    }
}


