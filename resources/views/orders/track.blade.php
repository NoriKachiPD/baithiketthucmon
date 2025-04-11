@extends('layout.master')

@section('title', 'Track Orders')

@section('favicon', asset('images/Cart.jpg'))

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center" style="margin-top: 20px; margin-bottom: 20px;">Tra cứu đơn hàng</h2>

    <form method="GET" action="{{ route('track') }}" class="row g-3 justify-content-center mb-4">
        <div class="col-md-6">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                class="form-control" 
                placeholder="Nhập mã đơn hàng"
            >
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>

    <hr>

@if(isset($orders) && $orders->isEmpty())
    <div class="alert alert-warning text-center">Không tìm thấy đơn hàng nào.</div>
@elseif(isset($orders) && $orders->count())
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center">
                <thead class="table-light">
                    <tr>
                        <th>Mã đơn</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Tổng tiền</th>
                        <th>Họ tên</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                        <th>Thanh toán</th>
                        <th>Số lượng</th>
                        <th>Ngày cập nhật</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->order_code }}</td>
                            <td>{{ $order->order_date }}</td>
                            <td>
                                @php
                                    $status = strtolower($order->status);
                                    $icon = '';
                                    $style = '';

                                    switch ($status) {
                                        case 'giao hàng thành công':
                                            $icon = '✔️';
                                            $style = 'background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb;';
                                            break;
                                        case 'đơn hàng bị hủy':
                                            $icon = '❌';
                                            $style = 'background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;';
                                            break;
                                        case 'giao hàng không thành công':
                                            $icon = '⚠️';
                                            $style = 'background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba;';
                                            break;
                                        case 'đang xử lý':
                                            $icon = '🔄';
                                            $style = 'background-color: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb;';
                                            break;
                                        case 'đang vận chuyển':
                                            $icon = '🚚';
                                            $style = 'background-color: #cce5ff; color: #004085; border: 1px solid #b8daff;';
                                            break;
                                        case 'đã nhận đơn':
                                            $icon = '📦';
                                            $style = 'background-color: #e2d9f3; color: #4b0082; border: 1px solid #d6c3f1;';
                                            break;
                                        default:
                                            $icon = '⏳';
                                            $style = 'background-color: #e2e3e5; color: #383d41; border: 1px solid #d6d8db;';
                                            break;
                                    }
                                @endphp
                                <span style="display: inline-block; padding: 6px 12px; border-radius: 20px; font-weight: 500; {{ $style }}">
                                    {{ $icon }} {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>{{ number_format($order->total_price, 0, ',', '.') }}đ</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->phone_number }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->payment_method }}</td>
                            <td>{{ $order->product_quantity }}</td>
                            <td>{{ $order->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection