<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index()
    {
        $users = User::whereIn('level', [1, 3])->get();
        return view('admin.user.user-list', compact('users'));
    }

    public function create()
    {
        return view('admin.user.user-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'nullable',
            'password' => 'required|min:6',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['full_name', 'email', 'phone', 'address']);
        $data['level'] = 3;
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images/'), $filename);
            $data['Image'] = $filename;
        }

        User::create($data);

        return redirect()->route('admin.user.list')->with('success', 'Thêm khách hàng thành công!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.user-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|min:6', // ✅ validate mật khẩu nếu có nhập
        ]);

        $user->full_name = $request->full_name;
    
        $data = $request->only(['full_name', 'email', 'phone', 'address']);
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images/'), $filename);
        
            if ($user->Image && file_exists(public_path('images/' . $user->Image))) {
                unlink(public_path('images/' . $user->Image));
            }
        
            $data['Image'] = $filename; // vẫn giữ 'Image' vì trong DB bạn dùng cột đó
        }
    
        // ✅ Nếu người dùng nhập mật khẩu mới thì cập nhật
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
    
        $user->update($data);
    
        return redirect()->route('admin.user.list')->with('success', 'Cập nhật khách hàng thành công!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->Image && file_exists(public_path('images/' . $user->Image))) {
            unlink(public_path('images/' . $user->Image));
        }

        $user->delete();

        return redirect()->route('admin.user.list')->with('success', 'Xóa khách hàng thành công!');
    }

    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

    public function handleChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng']);
        }

        // Tạo mã xác nhận
        $code = Str::upper(Str::random(6));
        Session::put('verify_code', $code);
        Session::put('new_password_hash', bcrypt($request->new_password));
        Session::put('verify_user_id', $user->id);

        // Gửi mail
        Mail::to($user->email)->send(new \App\Mail\VerifyCodeMail($user, $code));

        return redirect()->route('password.verify.form')->with('message', 'Đã gửi mã xác nhận đến email của bạn.');
    }

    public function showVerifyForm()
    {
        return view('auth.verify-code');
    }

    public function verifyCodeAndUpdatePassword(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        if ($request->code !== Session::get('verify_code')) {
            return back()->withErrors(['code' => 'Mã xác nhận không đúng']);
        }

        $userId = Session::get('verify_user_id');
        $passwordHash = Session::get('new_password_hash');

        if (!$userId || !$passwordHash) {
            return redirect()->route('password.change.form')->with('error', 'Phiên làm việc đã hết hạn!');
        }

        $user = User::findOrFail($userId);
        $user->password = $passwordHash;
        $user->save();

        // Xoá session
        Session::forget(['verify_code', 'new_password_hash', 'verify_user_id']);

        return redirect()->route('profile')->with('success', 'Đổi mật khẩu thành công!');
    }

    public function profile()
    {
        return view('auth.profile', ['user' => Auth::user()]);
    }
}