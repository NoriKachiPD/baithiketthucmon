@extends('layout.master')

@section('title', 'Thanh Toán')

@section('favicon', asset('images/2.jpg'))

@section('content')
    <div class="container">
        <div id="content">
            <form action="{{ route('banhang.postdathang') }}" method="post" class="beta-form-checkout" style="margin-bottom: 100px; font-weight: 900; margin-left: 150px;">
                @csrf
                <div class="row">
                    <!-- session('success') sinh ra từ hàm postDatHang trong PageController -->
                    @if(Session::has('success'))
                        {{ Session::get('success') }}
                    @endif
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Đặt hàng</h4>
                        <div class="space20">&nbsp;</div>

                        <div class="form-block">
                            <label for="name">Họ tên*</label>
                            <input type="text" id="name" placeholder="Họ tên" name="name" required value="{{ isset($user) ? $user->full_name : '' }}">
                        </div>
                        <div class="form-block">
                            <label>Giới tính</label>
                            <input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                            <input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>        
                        </div>
                        <div class="form-block">
                            <label for="email">Email*</label>
                            <input type="email" id="email" required placeholder="expample@gmail.com" name="email" value="{{ isset($user) ? $user->email : '' }}">
                        </div>

                        <div class="form-block">
                            <label for="adress">Địa chỉ*</label>
                            <input type="text" id="adress" placeholder="Address" name="address" required value="{{ isset($user) ? $user->address : '' }}">
                        </div>

                        <div class="form-block">
                            <label for="phone">Điện thoại*</label>
                            <input type="text" id="phone" name="phone_number" required value="{{ isset($user) ? $user->phone : '' }}">
                        </div>

                        <div class="form-block">
                            <label for="notes">Ghi chú</label>
                            <textarea id="notes" name="note"></textarea>
                        </div>

                        <!-- Hidden total_price -->
                        <input type="hidden" name="total_price" value="{{ $cart ? $cart->totalPrice : 0 }}">
                    </div>
                    <div class="col-sm-6">
                        <div class="your-order">
                            <div class="your-order-head"><h5 style="margin-left: -30px;">Đơn hàng của bạn</h5></div>
                            <div class="your-order-body" style="padding: 0px 10px">
                                <div class="your-order-item">
                                    <div>

                                    <!-- @if(Session::has('cart'))
                                        @foreach($productCarts as $product)
                                        one item
                                    <div class="media">
                                        <img width="25%" src="/source/image/product/{{ $product['item']['image'] }}" alt="" class="pull-left">
                                        <div class="media-body">
                                            <p class="font-large">{{ $product['item']['name'] }}</p>
                                            <span class="cart-item-amount">{{ $product['qty'] }}*</span>
                                            @if($product['item']['promotion_price']==0)
                                                {{ number_format($product['item']['unit_price']) }}@else
                                                {{ number_format($product['item']['promotion_price']) }}
                                            @endif
                                        </div>
                                    </div>
                                    end one item
                                    @endforeach
                                </div>
                                @endif -->

                                <!-- Sửa điều kiện hiển thị giỏ hàng -->
                                @if ($cart && $cart->items)
                                    @foreach ($cart->items as $product)
                                        <!-- one item -->
                                        <div class="media">
                                            <img width="25%" src="/source/image/product/{{ $product['item']['image'] }}" alt="" class="pull-left">
                                            <div class="media-body">
                                                <p class="font-large">{{ $product['item']['name'] }}</p>
                                                <span class="cart-item-amount">{{ $product['qty'] }}*</span>
                                                @if ($product['item']['promotion_price'] == 0)
                                                    {{ number_format($product['item']['unit_price']) }}
                                                @else
                                                    {{ number_format($product['item']['promotion_price']) }}
                                                @endif
                                            </div>
                                        </div>
                                        <!-- end one item -->
                                    @endforeach
                                @endif

                                    </div>
                                </div>
                                <div class="your-order-item">
                                    <div class="pull-left"><p class="your-order-f18" style="margin-top: 19px;">Tổng tiền:</p></div>
                                    <div class="pull-right"><h5 class="color-black" style="margin-top: 10px;">{{ number_format($cart ? $cart->totalPrice : 0) }}₫</h5></div>
                                </div>
                            </div>

                            <div class="your-order-head"><h5 style="margin-top: 65px;">Hình thức thanh toán</h5></div>

                            <div class="your-order-body" style="margin-top: 20px;">
                                <ul class="payment_methods methods">
                                    <li class="payment_method_cash">
                                        <input id="payment_method_cash" type="radio" class="input-radio" name="payment_method" value="Tiền Mặt" checked="checked" data-order_button_text="">
                                        <label for="payment_method_cash">Thanh toán khi nhận hàng </label>
                                    </li>

                                    <li class="payment_method_cheque">
                                    <li class="payment_method_cheque">
    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="Chuyển Khoản" data-order_button_text="">
    <label for="payment_method_cheque">Chuyển khoản</label>

    <!-- Thông tin tài khoản ngân hàng -->
    <div id="bank-info" style="display: none; margin-top: 20px; opacity: 0; transition: opacity 0.5s ease-in-out;">
        <h3>Thông tin tài khoản ngân hàng</h3>
        
        <!-- Bảng thông tin ngân hàng -->
        <table class="table table-bordered" style="width: 100%; margin-top: 20px; border-radius: 10px; background: linear-gradient(135deg, #6e7dff, #00d2ff); color: white;">
            <thead>
                <tr>
                    <th colspan="2" class="text-center" style="background: linear-gradient(to right, #667eea, #764ba2);">Thông tin chuyển khoản</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Tên chủ tài khoản:</strong></td>
                    <td style="color: gray; font-weight: 900">CHAU DUC PHAT</td>
                </tr>
                <tr>
                    <td><strong>Ngân hàng:</strong></td>
                    <td style="color: gray; font-weight: 900">Vietcombank</td>
                </tr>
                <tr>
                    <td><strong>Số tài khoản:</strong></td>
                    <td style="color: gray; font-weight: 900">1031389206</td>
                </tr>
            </tbody>
        </table>

        <!-- Mã QR chuyển khoản -->
        <div class="text-center" style="margin-top: 20px;">
            <h4>Mã QR chuyển khoản</h4>
            <img src="{{ asset('images/qr2.jpg') }}" alt="QR Code chuyển khoản" width="200" height="200">
        </div>
    </div>
</li>

<script>
    // Lắng nghe sự thay đổi của phương thức thanh toán
    document.getElementById('payment_method_cheque').addEventListener('change', function () {
        if (this.checked) {
            document.getElementById('bank-info').style.display = 'block'; // Hiển thị thông tin chuyển khoản
            setTimeout(function() {
                document.getElementById('bank-info').style.opacity = '1'; // Thêm animation fade-in
            }, 50); // Thêm delay nhẹ để animation hoạt động
        }
    });

    document.getElementById('payment_method_cash').addEventListener('change', function () {
        if (this.checked) {
            document.getElementById('bank-info').style.opacity = '0'; // Ẩn thông tin chuyển khoản
            setTimeout(function() {
                document.getElementById('bank-info').style.display = 'none'; // Ẩn hoàn toàn sau khi animation xong
            }, 500); // Thời gian khớp với animation fade-out
        }
    });
</script>

<style>
    #bank-info table {
    border-collapse: collapse;
    width: 100%;
}

#bank-info table th, #bank-info table td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

#bank-info table th {
    background-color: #f2f2f2;
}

#bank-info table td {
    background-color: #ffffff;
}

#bank-info img {
    max-width: 100%;
    height: auto;
}
</style>

                                    <!-- <li class="payment_method_cheque"><input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="VNPAY" data-order_button_text="">
                                        <label for="payment_method_cheque">Thanh toán online</label>
                                    </li>                                                                        -->
                                </ul>
                            </div>

                            <div class="text-center"><button type="submit" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
                        </div> <!-- .your-order -->
                    </div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection