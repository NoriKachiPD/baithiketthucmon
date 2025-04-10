@extends('admin.master')

@section('title', 'Danh sách liên hệ')

@section('favicon', asset('images/Contact.jpg'))

@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Liên hệ
                        <small>Danh sách</small>
                    </h1>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Phản hồi</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $c)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->email }}</td>
                                <td>{{ $c->subject }}</td>
                                <td>{{ Str::limit($c->message, 50) }}</td>
                                <td class="center">
                                    <a href="{{ route('admin.contact.replyForm', $c->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-reply fa-fw"></i> Phản hồi
                                    </a>
                                </td>
                                <td class="center">
                                    <form action="{{ route('admin.contact.destroy', $c->id) }}" method="POST" onsubmit="return confirm('Xóa liên hệ này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o fa-fw"></i> Xóa
                                        </button>
                                    </form>
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