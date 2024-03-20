<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user is an admin
        if ($request->user() && $request->user()->role_id === 2) {
            return $next($request);
        }

        // If not an admin, redirect to login or handle unauthorized access
        return redirect('/'); // or any other response, such as abort(403)
    }
}
