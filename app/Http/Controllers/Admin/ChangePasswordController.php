<!-- 

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Session;
// use App\Models\User;

// class ChangePasswordController extends Controller
// {
//     public function showVerifyForm()
//     {
//         return view('auth.verify-code');
//     }

//     public function verifyCode(Request $request)
//     {
//         $enteredCode = $request->verify_code;
//         $sessionCode = session('verify_code');
//         $newPassword = session('new_password');
//         $userId = session('verify_user_id');

//         if (!$sessionCode || !$newPassword || !$userId) {
//             return redirect()->route('password.change.form')->with('error', 'Phiên làm việc đã hết hạn!');
//         }

//         if ($enteredCode !== $sessionCode) {
//             return back()->with('error', 'Mã xác nhận không chính xác!');
//         }

//         // Đổi mật khẩu
//         $user = User::findOrFail($userId);
//         $user->password = Hash::make($newPassword);
//         $user->save();

//         // Xóa session
//         Session::forget(['verify_code', 'new_password', 'verify_user_id']);

//         return redirect()->route('profile')->with('success', 'Đổi mật khẩu thành công!');
//     }
// } -->