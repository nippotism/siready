<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistFirst
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->user()->status != 'Aktif') {

            return redirect()->route('registration')->with('error', 'Silahkan lengkapi data diri anda terlebih dahulu');
        }
        return $next($request);
    }
}
