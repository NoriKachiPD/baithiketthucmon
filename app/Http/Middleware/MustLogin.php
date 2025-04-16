<?php

// app/Http/Middleware/MustLogin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MustLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/trangchu');  // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
        }

        return $next($request);
    }
}