<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleAnggota
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah user sudah login dan memiliki role anggota
        if (Auth::check() && Auth::user()->role === 'anggota') {
            return $next($request);
        }

        // Jika admin mencoba akses halaman anggota, arahkan ke halaman admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect('/admin');
        }

        return redirect('/login');
    }
}