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

                <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="full_name" placeholder="Nhập họ tên khách hàng" required />
                    </div>

                    <div class="form-group">
                        <label>Cấp độ tài khoản</label>
                        <select class="form-control" name="level" id="level" required>
                            <option value="1" {{ old('level') == 1 ? 'selected' : '' }}>Admin</option>
                            <option value="3" {{ old('level') == 3 ? 'selected' : '' }}>Khách hàng</option>
                        </select>
                    </div>

                    <script>
                        document.getElementById('level').addEventListener('change', function() {
                            const userIdGroup = document.getElementById('user-id-group');
                            if (this.value == '1') {
                                userIdGroup.style.display = 'block'; // Hiển thị trường ID khi chọn Admin
                            } else {
                                userIdGroup.style.display = 'none'; // Ẩn trường ID khi chọn Khách hàng
                            }
                        });

                        // Kiểm tra lựa chọn ban đầu khi trang được load
                        if (document.getElementById('level').value == '1') {
                            document.getElementById('user-id-group').style.display = 'block';
                        }
                    </script>

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

                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input class="form-control" type="file" name="image" accept="image/*" />
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