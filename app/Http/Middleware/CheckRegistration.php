<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRegistration
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            return redirect('/home');
        }
        return $next($request);
    }
}
