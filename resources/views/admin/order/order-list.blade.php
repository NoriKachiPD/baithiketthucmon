@extends('admin.master')

@section('title', 'Danh sách đơn hàng')

@section('favicon', asset('images/Cart.jpg'))

@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="page-header">Đơn hàng
                        <small>Danh sách</small>
                    </h1>
                    <a href="{{ url()->current() }}" class="btn btn-success" style="border-radius: 20px;">
                        🔄 Refresh
                    </a>
                </div><br>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="margin-left: -40px;">
                    <thead>
                        <tr align="center">
                            <th>Mã đơn</th>
                            <th>Họ tên</th>
                            <th>Giới tính</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>SĐT</th>
                            <th>Hình thức thanh toán</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Ngày đặt</th>
                            <th>Cập nhật trạng thái</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $order->order_code }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->gender }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->phone_number }}</td>
                                <td>{{ $order->payment_method }}</td>
                                <td>{{ $order->product_quantity }}</td>
                                <td>{{ number_format($order->total_price, 0, ',', '.') }} đ</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->order_date }}</td>
                                <td>
                                    <form action="{{ route('admin.order.update', $order->order_code) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div style="min-width: 270px;">
                                            @php
                                                $statuses = [
                                                    'Đã nhận đơn' => ['📝', '#6f42c1', 'white'],
                                                    'Đang xử lý' => ['⚙️', '#17a2b8', 'white'],
                                                    'Đang vận chuyển' => ['🚚', '#007bff', 'white'],
                                                    'Giao hàng thành công' => ['✅', '#28a745', 'white'],
                                                    'Đơn hàng bị hủy' => ['❌', '#dc3545', 'white'],
                                                    'Giao hàng không thành công' => ['📦✖️', '#ffc107', 'black'],
                                                ];
                                            @endphp
                                            <select name="status" onchange="this.form.submit()" class="form-control" style="border-radius: 20px; padding: 6px 10px;">
                                                @foreach($statuses as $text => [$icon, $bgColor, $textColor])
                                                    <option value="{{ $text }}"
                                                        @if(mb_strtolower(trim($order->status)) == mb_strtolower(trim($text))) selected @endif
                                                        style="background-color: {{ $bgColor }}; color: {{ $textColor }};">
                                                        {{ $icon }} {{ $text }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </td>

                                <td>
                                    <form action="{{ route('admin.order.delete', $order->id) }}" method="POST" onsubmit="return confirm('Xóa đơn hàng này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
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