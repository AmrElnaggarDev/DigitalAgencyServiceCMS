<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticatedGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $guard = 'web'): Response
    {
        if (Auth::guard($guard)->check()) {
            $homeRoute = config("auth.guard_routes.$guard.home", 'dashboard');
            return redirect()->route($homeRoute);
        }
        return $next($request);
    }
}
