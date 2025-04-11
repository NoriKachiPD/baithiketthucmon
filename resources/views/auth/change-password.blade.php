@extends('layout.master')

@section('title', 'Đổi mật khẩu')
@section('favicon', asset('images/Key.png'))

@section('content')
<div class="container mt-5">
    <h2 class="mb-4" style="margin-bottom: 20px; margin-top: 20px;">Đổi mật khẩu</h2>

    @if(session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                <div>{{ $err }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('password.change.submit') }}">
        @csrf

        <div class="mb-3" style="margin-bottom: 10px; margin-top: 10px;">
            <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
        </div>

        <div class="mb-3" style="margin-bottom: 10px; margin-top: 10px;">
            <label for="new_password" class="form-label">Mật khẩu mới</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>

        <div class="mb-3" style="margin-bottom: 10px; margin-top: 10px;">
            <label for="new_password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-bottom: 50px; margin-top: 10px;">Xác nhận</button>
    </form>
</div>
@endsection