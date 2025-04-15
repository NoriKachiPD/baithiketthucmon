<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MustLogin
{
    public function handle($request, Closure $next): mixed
    {
        if (!Auth::check()) {
            return redirect('/trangchu');
        }

        return $next($request);
    }
}