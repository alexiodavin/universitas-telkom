<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMahasiswa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role_id != IS_MAHASISWA){
            abort(404);
        }
        return $next($request);
    }
}
