<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminArea
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
              if (!auth()->check()) {
            // Kembalikan ke halaman depan atau tampilkan 404
            return response()->view('landing.404', [], 404);
            // atau bisa juga: return redirect('/');
        }

        // Jika sudah login tapi bukan admin
       if (!isset(auth()->user()->role) || auth()->user()->role !== 'admin') {
            // Kembalikan tampilan custom 403
            return response()->view('landing.404');
        }
        


        return $next($request);



    }
}
