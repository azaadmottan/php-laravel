<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectAuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->check()) {
            return redirect(route('adminDashboard'));
        }

        if (Auth::guard('mentor')->check()) {
            return redirect(route('mentorDashboard'));
        }

        if (Auth::guard('mentee')->check()) {
            return redirect(route('menteeDashboard'));
        }

        return $next($request);
    }
}
