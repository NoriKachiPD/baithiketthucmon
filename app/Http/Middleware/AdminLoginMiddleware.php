<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->level == 1 || $user->level == 2) {
                return $next($request); // Cho phép đi tiếp
            } else {
                return redirect('/trangchu')->with('error', 'Bạn không có quyền truy cập!');
            }
        } else {
            return redirect('/trangchu')->with('error', 'Bạn cần đăng nhập!');
        }
    }
}
