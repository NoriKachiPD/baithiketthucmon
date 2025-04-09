<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/trangchu')->with('error', 'Bạn cần đăng nhập!');
        }

        $user = Auth::user();
        if ($user->level == 1) {
            return $next($request);
        }

        return redirect('/trangchu')->with('error', 'Bạn không có quyền truy cập!');
    }
}

