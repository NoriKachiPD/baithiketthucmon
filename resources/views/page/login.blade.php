@extends('layout.master')

@section('title', 'Log In')

@section('favicon', asset('images/Key.png'))

@section('content')
<div class="container">
    <h2>Đăng Nhập</h2>
    <form action="{{ route('postlogin') }}" method="post" class="beta-form-checkout">
    @csrf
        <div class="row">
            <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session::has('flag'))
                        <div class="alert alert {{ Session::get('flag') }}">{{ Session::get('message') }}</div>
                    @endif
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="form-block">
                        <label for="password">Password*</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <div class="form-block">
                        <a href="{{ route('getResetPassword') }}">Quên mật khẩu?</a>
                    </div>
                </div>
            <div class="col-sm-3"></div>
        </div>
    </form>
</div>
@endsection