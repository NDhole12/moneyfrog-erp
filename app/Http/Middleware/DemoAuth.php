<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DemoAuth
{
    /**
     * Handle an incoming request for demo authentication.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated in demo mode
        if (!session('demo_user_authenticated')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}