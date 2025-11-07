<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login dengan guard admin
        if (!auth()->guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}