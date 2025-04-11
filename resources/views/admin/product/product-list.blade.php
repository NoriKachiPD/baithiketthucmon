@extends('admin.master')

@section('title', 'Sản phẩm')

@section('favicon', asset('images/Dish.jpg'))

@section('content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">

                <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between align-items-center mb-3" style=" margin-bottom: 20px">
                        <h1 class="page-header" style="margin-bottom: 0;">Product
                            <small>List</small>
                        </h1>
                        <div>
                            <a href="{{ url()->current() }}" class="btn btn-success" style="border-radius: 20px; margin-right: 10px;">
                                🔄 Refresh
                            </a>
                            <a href="{{ route('admin.product.add') }}" class="btn btn-primary" style="border-radius: 20px;">
                                ➕ Add New Product
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
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;">ID</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Type</th>
                                <th style="text-align: center;">Unit Price</th>
                                <th style="text-align: center;">Promotion Price</th>
                                <th style="text-align: center;">Unit</th>
                                <th style="text-align: center;">New</th>
                                <th style="text-align: center;">Top</th>
                                <th style="text-align: center;">Description</th> <!-- ✅ Thêm dòng này -->
                                <th style="text-align: center;">Edit</th>
                                <th style="text-align: center;">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr class="odd gradeX" align="center">
                                    <td>
                                        @if($product->image)
                                            <img src="{{ asset('source/image/product/'.$product->image) }}" style="width: 100px; height: auto;">
                                        @else
                                            <span>No image</span>
                                        @endif
                                    </td>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->id_type }}</td>
                                    <td>{{ number_format($product->unit_price, 0, ',', '.') }} đ</td>
                                    <td>{{ number_format($product->promotion_price, 0, ',', '.') }} đ</td>
                                    <td>{{ $product->unit }}</td>
                                    <td>{{ $product->new ? 'Yes' : 'No' }}</td>
                                    <td>{{ $product->top ? 'Yes' : 'No' }}</td>
                                    <td>{!! Str::limit($product->description, 50) !!}</td> <!-- ✅ Thêm dòng này -->
                                    <td class="center">
                                        <a href="{{ route('admin.product.edit', $product->id) }}">
                                            <i class="fa fa-pencil fa-fw"></i> Edit
                                        </a>
                                    </td>
                                    <td class="center">
                                        <a href="{{ route('admin.product.delete', $product->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
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