
<!-- namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnlyMiddleware
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (!Auth::check() || Auth::user()->level !== 1) {
            return redirect('/page.dangnhap')->with('error', 'Bạn không có quyền truy cập trang này.');
        }

        return $next($request);
    }
} -->