<?php

namespace Wdi\Http\Middleware;

use Auth;
use Closure;

/**
 * Class RedirectIfAuthenticated
 * @package Wdi\Http\Middleware
 */
final class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect()->route("home");
        }
        
        return $next($request);
    }
}
