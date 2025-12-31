<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin) { // افترض عندك حقل is_admin في جدول users
            return $next($request);
        }

        return redirect()->route('contact'); // لو مش admin يروح للـ landing page
    }
}
