<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Vendedor
{
    /**
     * Handle an incoming request.
     * @return mixed
     * @internal param \Illuminate\Http\Request $request
     * @internal param Closure $next
     */
    public function handle($request, Closure $next)
    {
        if ( Auth::check() && !Auth::user()->isAdmin() )
        {
            return $next($request);
        }
        return redirect('/Administrador');
    }
}
