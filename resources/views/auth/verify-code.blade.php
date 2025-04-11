@extends('layout.master')

@section('title', 'Xác minh mã')

@section('favicon', asset('images/Key.png'))

@section('content')
<div class="container">
    <h2>Xác minh mã</h2>
    <form action="{{ route('password.verify.submit') }}" method="POST" class="beta-form-checkout">
        @csrf
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                @if(Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                <div class="form-block">
                    <label for="code" style="margin-top: 7px; font-weight: 900;">Nhập mã xác nhận đã gửi qua email:</label>
                    <input type="text" name="code" id="code" required>
                </div>

                <div class="form-block">
                    <button type="submit" class="btn btn-success">Xác nhận mã</button>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </form>
</div>
@endsection