<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockPublicAuthRoutes
{
    public function handle(Request $request, Closure $next): Response
    {
        // daftar route auth yang ingin diblokir dari publik
        $sensitiveRoutes = [
            'login',
            'register',
            'logout',
            'password/reset',
            'forgot-password',
            'verify-email',
        ];

        // jika user akses salah satu route auth pakai GET
        foreach ($sensitiveRoutes as $route) {
            if ($request->is($route) && $request->isMethod('get')) {
                return response()->view('landing.404', [], 404);
            }
        }

        // jika akses logout tapi bukan POST (misal GET), tetap arahkan 404
        if ($request->is('logout') && !$request->isMethod('post')) {
            return response()->view('landing.404', [], 404);
        }

        return $next($request);
    }
}
