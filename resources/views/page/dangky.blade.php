@extends('layout.master')

@section('title', 'Sign Up')

@section('favicon', asset('images/2.jpg'))

@section('content')
<div class="container">
    <h2>Đăng Ký Tài Khoản</h2>
    <form action="{{ route('postsignin') }}" method="post" class="beta-form-checkout">
    @csrf
        <div class="row">
            <div class="col-sm-3"></div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <div class="col-sm-6">
                <h4>Đăng kí</h4>
                <div class="form-block">
                    <label for="fullname">Họ và tên*</label>
                    <input type="text" name="fullname" id="fullname" required>
                </div>
                <div class="form-block">
                    <label for="email">Email address*</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-block">
                    <label for="phone">Phone*</label>
                    <input type="text" name="phone" id="phone" required>
                </div>
                <div class="form-block">
                    <label for="address">Address*</label>
                    <input type="text" name="address" id="address" required>
                </div>
                <div class="form-block">
                    <label for="password">Password*</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form-block">
                    <label for="repassword">Re Password*</label>
                    <input type="password" name="repassword" id="repassword" required>
                </div>
                <div class="form-block">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </form>
</div>
@endsection