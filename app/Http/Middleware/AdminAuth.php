<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $userRole = auth()->user()->role;
            
            // Allow access to the login and logout pages for all roles
            if ($request->route()->getName() === 'getLogin' || $request->route()->getName() === 'logout') {
                return $next($request);
            }

            // 'Super Admin' can access all routes
            if ($userRole === 'Super Admin') {
                return $next($request);
            }

            // 'Administrator' can access all routes except 'user'
            if ($userRole === 'Administrator' && $request->route()->getName() !== 'user') {
                return $next($request);
            }

            // 'Viewer' can only access 'crime'
            if ($userRole === 'Viewer' && $request->route()->getName() === 'crime') {
                return $next($request);
            }

            // For other routes, return a 403 Forbidden response
            abort(403, 'Unauthorized');
        }

        // Allow access to the login page for unauthenticated users
        if ($request->route()->getName() === 'getLogin') {
            return $next($request);
        }

        return redirect()->route('getLogin')->with('error', 'You must be logged in to access this page.');
    }
}








