@extends('layout.master')

@section('title', 'Sản phẩm')

@section('favicon', asset('images/Cart.jpg'))

@section('content')
<style>/* Style cho dropdown menu */
#product-filter {
    width: 250px;
    margin: 20px auto;
    padding: 10px;
    font-size: 16px;
    font-weight: bold;
    background-color: #f8f8f8;
    border: 1px solid #ccc;
    border-radius: 5px;
    cursor: pointer;
    position: relative; /* Để có thể điều chỉnh vị trí dễ dàng */
    left: 20px; /* Đẩy dropdown ra khỏi cạnh trái */
    transition: background-color 0.3s ease, transform 0.3s ease;
}

#product-filter:hover {
    background-color: #e0e0e0;
    transform: scale(1.05); /* Tạo hiệu ứng phóng to nhẹ khi hover */
}

#product-filter option {
    padding: 10px;
    background-color: #fff;
    border-bottom: 1px solid #ddd;
    color: #333;
    transition: background-color 0.3s ease;
}

#product-filter option:hover {
    background-color: #f7f7f7; /* Hiệu ứng khi hover vào option */
    color: #007bff; /* Đổi màu chữ khi hover */
}

/* Style cho sản phẩm */
.beta-products-list {
    margin-top: 30px;
}

.single-item {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    background-color: #fff;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    margin-bottom: 20px; /* Đảm bảo có khoảng cách giữa các sản phẩm */
}

.single-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.single-item-header img {
    width: 100%;
    height: auto;
    transition: transform 0.3s ease-in-out;
}

.single-item-header img:hover {
    transform: scale(1.05);
}

.single-item-body {
    padding: 15px;
    text-align: center;
}

.single-item-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
    color: #333;
    transition: color 0.3s ease;
}

.single-item-title:hover {
    color: #ef4444; /* Đổi màu chữ khi hover */
}

.single-item-price {
    font-size: 16px;
    font-weight: 600;
    color: #e74c3c;
    margin-bottom: 10px;
}

.single-item-price .flash-del {
    text-decoration: line-through;
    color: #999;
    margin-right: 10px;
}

.single-item-caption {
    text-align: center;
    padding: 10px;
    background-color: #f7f7f7;
    border-top: 1px solid #ddd;
}

/* Nút "Thêm vào giỏ hàng" */
.add-to-cart {
    background-color: #28a745;
    color: #fff;
    padding: 12px 20px;
    border-radius: 5px;
    font-size: 16px;
    display: flex;
    align-items: center; /* Căn giữa icon và text */
    justify-content: center;
    transition: background-color 0.3s ease, transform 0.3s ease;
    height: 37px;
}

.add-to-cart:hover {
    background-color: #218838;
    transform: scale(1.05); /* Phóng to nhẹ khi hover */
}

.add-to-cart:active {
    background-color: #1e7e34; /* Đổi màu khi click */
}

.add-to-cart i {
    margin-right: 8px; /* Khoảng cách giữa icon và chữ */
    font-size: 18px; /* Kích thước icon */
}

/* Cải thiện nút "Chi tiết" */
.beta-btn.primary {
    background-color: #ef4444;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s ease, transform 0.3s ease;
	border: none;
}

.beta-btn.primary:hover {
    background-color: #b91c1c;
    transform: scale(1.05); /* Phóng to nhẹ khi hover */
}

.beta-btn.primary:active {
    background-color:rgb(110, 3, 3); /* Đổi màu khi click */
}

/* Responsive design */
@media (max-width: 768px) {
    .beta-products-list .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .col-sm-2 {
        width: 100%;
        margin: 10px 0;
        padding: 10px;
    }

    #product-filter {
        width: 80%;
    }
}
.single-item-header img {
    width: 100%;              /* Làm cho hình ảnh chiếm hết chiều rộng của phần chứa */
    height: 200px;            /* Đảm bảo chiều cao đồng nhất */
    object-fit: cover;        /* Cắt ảnh để không bị méo */
    object-position: center;  /* Đảm bảo hình ảnh luôn được canh giữa */
    transition: transform 0.3s ease-in-out;
}

.single-item-header img:hover {
    transform: scale(1.05);   /* Tạo hiệu ứng phóng to khi hover */
}
.filter-container {
    display: inline-block; /* Để hai dropdown nằm ngang */
    margin-right: 10px; /* Khoảng cách giữa các dropdown */
}

.filter-select {
    width: 200px; /* Đặt chiều rộng cố định cho các dropdown */
    padding: 5px 10px; /* Thêm padding để tạo khoảng trống */
    font-size: 14px; /* Kích thước font */
    border-radius: 5px; /* Bo tròn các góc */
    border: 1px solid #ccc; /* Viền xung quanh */
    appearance: none; /* Loại bỏ kiểu mặc định của trình duyệt */
    background-color: #f9f9f9; /* Màu nền nhẹ */
    cursor: pointer; /* Thêm con trỏ khi hover */
}

.filter-select:focus {
    outline: none; /* Loại bỏ viền khi focus */
    border-color: #007bff; /* Thêm màu viền khi focus */
    background-color: #ffffff; /* Thay đổi màu nền khi focus */
}
</style>

<div class="beta-products-list">
    <div class="beta-products-details">
        <form action="{{ route('banhang.sanpham') }}" method="get">
            <div class="filter-container">
                <!-- Bộ lọc sản phẩm -->
                <select id="product-filter" name="filter" onchange="this.form.submit()" class="filter-select">
                    <option value="all" {{ $filter == 'all' ? 'selected' : '' }}>Tất cả sản phẩm</option>
                    <option value="new" {{ $filter == 'new' ? 'selected' : '' }}>Sản phẩm mới</option>
                    <option value="top" {{ $filter == 'top' ? 'selected' : '' }}>Sản phẩm nổi bật</option>
                    <option value="discount" {{ $filter == 'discount' ? 'selected' : '' }}>Sản phẩm giảm giá</option>
                    <option value="no_discount" {{ $filter == 'no_discount' ? 'selected' : '' }}>Sản phẩm không giảm giá</option>
                </select>
            </div>

            <div class="filter-container">
                <!-- Bộ lọc loại sản phẩm -->
                <select id="product-filter" name="type" onchange="this.form.submit()" class="filter-select">
                    <option value="all" {{ $type == 'all' ? 'selected' : '' }}>Tất cả loại sản phẩm</option>
                    @foreach($types as $typeProduct)
                        <option value="{{ $typeProduct->id }}" {{ $type == $typeProduct->id ? 'selected' : '' }}>
                            {{ $typeProduct->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

    <div class="row">
        @php
            $stt = 0;
        @endphp
        @foreach($new_products as $new_product)
            @php $stt++; @endphp
            <div class="col-sm-2" style="margin-right: -40px; margin-bottom: 20px; padding: 20px;">
                <div class="single-item">
                    @if($new_product->promotion_price != 0)
                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                    @endif
                    <div class="single-item-header">
                        <a href="{{ route('banhang.chitiet', $new_product->id) }}">
                            <img src="{{ asset('source/image/product/'.$new_product->image) }}" alt="" height="250px">
                        </a>
                    </div>
                    <div class="single-item-body">
                        <p class="single-item-title">{{ $new_product->name }}</p>
                        <p class="single-item-price" style="font-size: 15px; font-weight: bold;">
                            @if($new_product->promotion_price == 0)
                                <span class="flash-sale">{{ number_format($new_product->unit_price) }}đ</span>
                            @else
                                <span class="flash-del">{{ number_format($new_product->unit_price) }}đ</span>
                                <span class="flash-sale">{{ number_format($new_product->promotion_price) }}đ</span>
                            @endif
                        </p>
                    </div>
                    <div class="single-item-caption">
                        @if(Auth::check())
                            <a class="add-to-cart pull-left" href="{{ route('banhang.addtocart', $new_product->id) }}">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        @else
                            <a class="add-to-cart pull-left" href="{{ route('banhang.addtocart', $new_product->id) }}" onclick="chuaDangNhap(event)">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        @endif
                        <a class="beta-btn primary" href="{{ route('banhang.chitiet', $new_product->id) }}">
                            Chi tiết <i class="fa fa-chevron-right"></i>
                        </a>
                        <div class="clearfix"></div>
                    </div>

                    <script>
                        function chuaDangNhap(e) {
                            e.preventDefault(); // Chặn truy cập
                            alert("Vui lòng đăng nhập để sử dụng chức năng này.");
                            location.reload(); // Reload trang
                        }
                    </script>
                </div>
            </div>
            @if($stt % 4 == 0)
                <div class="space40">&nbsp;</div>
            @endif
        @endforeach
    </div>
</div>
@endsection