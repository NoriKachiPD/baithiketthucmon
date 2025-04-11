@extends('layout.master')

@section('title', 'Quên Mật Khẩu')

@section('favicon', asset('images/Key.png'))

@section('content')
<div class="container">
    <h2>Quên mật khẩu</h2>
    <form action="{{ route('postResetPassword') }}" method="post" class="beta-form-checkout">
        @csrf
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                @if(Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                <div class="form-block">
                    <label for="email" style="margin-top: 7px; font-weight: 900;">Nhập Email đã đăng ký*:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-block">
                    <button type="submit" class="btn btn-primary">Gửi lại mật khẩu</button>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </form>
</div>
@endsection