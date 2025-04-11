@extends('admin.master')

@section('title', 'Danh sách khách hàng')

@section('favicon', asset('images/user.png'))

@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center mb-3" style=" margin-bottom: 20px">
                    <h1 class="page-header" style="margin-bottom: 0;">Khách hàng
                        <small>Danh sách</small>
                    </h1>
                    <div>
                        <a href="{{ url()->current() }}" class="btn btn-success" style="border-radius: 20px; margin-right: 10px;">
                            🔄 Refresh
                        </a>
                        <a href="{{ route('admin.user.add') }}" class="btn btn-primary" style="border-radius: 20px;">
                            ➕ Thêm khách hàng
                        </a>
                    </div>
                </div>
            </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>Hình ảnh</th> <!-- Thêm cột hình ảnh -->
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Địa chỉ</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                            <tr class="odd gradeX" align="center">
                                <td>
                                    @if($u->Image)
                                        <img src="{{ asset('images/'.$u->Image) }}" style="width: 50px; height: 50px; border-radius: 50%;">
                                    @else
                                        <span>No image</span>
                                    @endif
                                </td>
                                <td>{{ $u->id }}</td>
                                <td>{{ $u->full_name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->phone }}</td>
                                <td>{{ $u->address }}</td>
                                <td class="center">
                                    <a href="{{ route('admin.user.edit', $u->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil fa-fw"></i> Sửa
                                    </a>
                                </td>
                                <td class="center">
                                    <a href="{{ route('admin.user.delete', $u->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Xóa khách hàng này?')">
                                        <i class="fa fa-trash-o fa-fw"></i> Xóa
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
@endsection