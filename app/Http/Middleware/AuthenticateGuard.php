<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $guard = 'web'): Response
    {
        if (! Auth::guard($guard)->check()) {
            $loginRoute = config("auth.guard_routes.$guard.login", 'login');
            return redirect()->route($loginRoute)
                ->with('error', 'Please log in to continue.');
        }
        // Make this guard the default for the rest of the request lifecycle,
        // so auth() / Auth::user() resolve to the correct authenticated entity.
        Auth::shouldUse($guard);
        return $next($request);
    }
}
