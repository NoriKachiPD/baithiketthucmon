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
            <div>
                <label for="image" style="margin-top: 0px;"><strong>Ảnh đại diện:</strong></label><br>
                @if($user->Image)
                    <img src="{{ asset('images/' . $user->Image) }}"
                        alt="Avatar"
                        class="rounded-circle"
                        style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #ccc; margin-top: 10px;">
                @else
                    <img src="{{ asset('images/user.png') }}"
                        alt="Default Avatar"
                        class="rounded-circle"
                        style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #ccc; margin-top: 10px;">
                @endif
            </div>

            <div class="col-lg-7" style="padding-bottom:120px">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
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

                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input class="form-control" type="file" name="image" accept="image/*" />
                        @if($user->image)
                            <br>
                            <img src="{{ asset('images/'.$user->image) }}" style="width: 100px; height: auto;" alt="User Image" />
                        @else
                            <span>No image uploaded</span>
                        @endif
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