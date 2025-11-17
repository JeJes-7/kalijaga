<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            // If user is not logged in, redirect to login
            return redirect('login');
        }

        foreach ($roles as $role) {
            // If user has one of the required roles, let them pass
            if ($request->user()->role == $role) {
                return $next($request);
            }
        }

        // If user doesn't have the role
        abort(403, 'ANDA TIDAK PUNYA AKSES.');
    }
}