@extends('admin.master')

@section('title', 'Danh mục')

@section('favicon', asset('images/Dish.jpg'))

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">

                <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="margin-bottom: 10px;">Category
                        <small>List</small>
                    </h1>
                </div>

                <div class="col-lg-12" style="margin-bottom: 20px;">
                    <a href="{{ url()->current() }}" class="btn btn-success" style="border-radius: 999px;">
                        🔄 Refresh
                    </a>
                    <a href="{{ route('admin.category.add') }}" class="btn btn-primary" style="border-radius: 999px; margin-left: 10px;">
                        ➕ Add New Category
                    </a>
                </div>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Image</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cates as $cate)
                                <tr class="odd gradeX" align="center">
                                    <td>
                                        @if($cate->image)
                                            <img src="{{ asset('source/image/product/'.$cate->image) }}" style="width: 100px; height: auto;">
                                        @else
                                            <span>No image</span>
                                        @endif
                                    </td>
                                    <td>{{ $cate->id }}</td>
                                    <td>{{ $cate->name }}</td>
                                    <td>{{ $cate->description }}</td>
                                    <td class="center">
                                        <a href="{{ route('admin.category.edit', $cate->id) }}">
                                            <i class="fa fa-pencil fa-fw"></i> Edit
                                        </a>
                                    </td>
                                    <td class="center">
                                        <a href="{{ route('admin.category.delete', $cate->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            <i class="fa fa-trash-o fa-fw"></i> Delete
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

    {{-- JavaScript --}}
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>
    <script src="{{ asset('dist/js/sb-admin-2.js') }}"></script>
    <script src="{{ asset('bower_components/DataTables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
@endsection