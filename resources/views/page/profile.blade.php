@extends('layout.master')

@section('title', 'Thông tin cá nhân')

@section('favicon', asset('images/user.png'))

@section('content')
<div class="container mt-4">
<h2 style="margin-top: 50px; margin-left: -1px;">Thông tin cá nhân</h2>
    <div>
        <label for="image" style="margin-top: 10px;"><strong>Ảnh đại diện:</strong></label><br>
        @if($user->Image)
            <img src="{{ asset('images/' . $user->Image) }}"
                alt="Avatar"
                class="rounded-circle"
                style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #ccc; margin-top: 10px;">
        @endif
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="full_name" class="form-label" style="margin-top: 20px;">Họ tên</label>
            <input type="text" class="form-control" id="full_name" name="full_name"
                value="{{ old('full_name', $user->full_name) }}" style="margin-top: 10px;">
            @error('full_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label" style="margin-top: 10px;">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                value="{{ old('email', $user->email) }}" style="margin-top: 10px;">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label" style="margin-top: 10px;">Số điện thoại</label>
            <input type="text" class="form-control" id="phone" name="phone"
                value="{{ old('phone', $user->phone) }}" style="margin-top: 10px;">
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label" style="margin-top: 10px;">Địa chỉ</label>
            <input type="text" class="form-control" id="address" name="address"
                value="{{ old('address', $user->address) }}" style="margin-top: 10px;">
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Ảnh đại diện</label>
            <input type="file" class="form-control" id="image" name="image" style="margin-top: 10px;">
            @if($user->image)
                <img src="{{ asset('uploads/users/' . $user->image) }}" width="100" style="margin-top: 10px;">
            @endif
        </div>
        <a href="{{ route('password.change.form') }}" class="btn btn-warning mt-3" style="margin-bottom: 50px; margin-top: 10px;">
            Đổi mật khẩu
        </a>
        <button type="submit" class="btn btn-primary" style="margin-bottom: 50px; margin-top: 10px;">Cập nhật</button>
    </form>
</div>
@endsection