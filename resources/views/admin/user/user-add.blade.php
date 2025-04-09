@extends('admin.master')

@section('title', 'Add User')

@section('favicon', asset('images/user.png'))

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khách hàng
                    <small>Thêm</small>
                </h1>
            </div>

            <div class="col-lg-7" style="padding-bottom:120px">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('admin.user.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="full_name" placeholder="Nhập họ tên khách hàng" required />
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type="email" placeholder="Nhập email" required />
                    </div>

                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" name="phone" placeholder="Nhập số điện thoại" required />
                    </div>

                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="address" placeholder="Nhập địa chỉ" required />
                    </div>

                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input class="form-control" name="password" type="password" placeholder="Nhập mật khẩu" required />
                    </div>

                    <button type="submit" class="btn btn-success">Thêm khách hàng</button>
                    <br>
                    <a href="{{ route('admin.user.list') }}" class="btn btn-secondary" style="margin-top: 20px;">Quay lại danh sách</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection