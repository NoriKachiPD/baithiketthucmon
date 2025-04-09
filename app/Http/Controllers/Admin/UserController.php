<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('level', 3)->get();
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
        ]);

        $data = $request->only(['full_name', 'email', 'phone', 'address']);

        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images/'), $filename);

            // Xoá ảnh cũ nếu có
            if ($user->Image && file_exists(public_path('images/' . $user->Image))) {
                unlink(public_path('images/' . $user->Image));
            }

            $data['Image'] = $filename;
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

}