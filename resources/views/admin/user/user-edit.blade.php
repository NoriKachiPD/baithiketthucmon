@extends('admin.master')

@section('title', 'Edit User')

@section('favicon', asset('images/user.png'))

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khách hàng
                    <small>Sửa</small>
                </h1>
            </div>

            <div class="col-lg-7" style="padding-bottom:120px">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="full_name" value="{{ $user->full_name }}" required />
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type="email" value="{{ $user->email }}" required />
                    </div>

                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" name="phone" value="{{ $user->phone }}" required />
                    </div>

                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="address" value="{{ $user->address }}" required />
                    </div>

                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <br>
                    <a href="{{ route('admin.user.list') }}" class="btn btn-secondary" style="margin-top: 20px;">Quay lại danh sách</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection