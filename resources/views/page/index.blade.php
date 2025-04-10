@extends('layout.master')

@section('title', 'Trang Chủ')

@section('favicon', asset('images/1.jpg'))

@section('content')

<head>
    <!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>
<!-- Swiper Slider -->
<div class="swiper hero-slider" style="width: 100%; height: 500px;">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="source/assets/dest/images/thumbs/banner1.jpg" style="width:100%; height:100%; object-fit: cover;">
        </div>
        <div class="swiper-slide">
            <img src="source/assets/dest/images/thumbs/banner2.jpg" style="width:100%; height:100%; object-fit: cover;">
        </div>
        <div class="swiper-slide">
            <img src="source/assets/dest/images/thumbs/banner3.jpg" style="width:100%; height:100%; object-fit: cover;">
        </div>
        <div class="swiper-slide">
            <img src="source/assets/dest/images/thumbs/banner4.jpg" style="width:100%; height:100%; object-fit: cover;">
        </div>
    </div>

  <!-- Pagination -->
  <div class="swiper-pagination"></div>

  <!-- Navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const heroSwiper = new Swiper('.hero-slider', {
            loop: true, 
            autoplay: {
                delay: 5000, 
                disableOnInteraction: false, 
            },
            pagination: {
                el: '.swiper-pagination', 
                clickable: true,          
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            effect: 'cube',
            grabCursor: true, // Hiện con trỏ hình bàn tay khi rê chuột, cho biết có thể kéo
            cubeEffect: {
            shadow: true, // Hiển thị bóng đổ của khối cube (trông thật hơn)
            slideShadows: true, // Hiển thị bóng đổ trên các mặt slide
            shadowOffset: 20, // Khoảng cách bóng đổ chính (px)
            shadowScale: 1, // Tỉ lệ bóng đổ (0-1)
            },
            
            });
    });
</script>


	<!-- <div class="beta-products-list"> -->
                        <!-- <h4 style="margin-left: 20px; margin-top: 20px;">New Products</h4>
                        <div class="beta-products-details">
                            <p style="margin-left: 20px;" class="pull-left">{{count($new_products)}} sản phẩm được tìm thấy</p>
                            <div class="clearfix"></div>
                        </div> -->

        <!-- <div class="row">
        @php
            $new_products = $new_products->shuffle();
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
                        <a href="{{ route('product') }}">
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
                        <a class="add-to-cart pull-left" href="{{ route('banhang.addtocart', $new_product->id) }}">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <a class="beta-btn primary" href="{{ route('banhang.chitiet', $new_product->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            @if($stt % 4 == 0)
                <div class="space40">&nbsp;</div>
            @endif
        @endforeach
    </div>
</div> -->

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
    color: #007bff; /* Đổi màu chữ khi hover */
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
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.beta-btn.primary:hover {
    background-color: #0056b3;
    transform: scale(1.05); /* Phóng to nhẹ khi hover */
}

.beta-btn.primary:active {
    background-color: #004085; /* Đổi màu khi click */
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
</style>

<div class="beta-products-list">
    <div class="beta-products-details">
        <form action="{{ route('home') }}" method="get">
            <select id="product-filter" name="filter" onchange="this.form.submit()">
                <option value="all" {{ $filter == 'all' ? 'selected' : '' }}>Tất cả sản phẩm</option>
                <option value="new" {{ $filter == 'new' ? 'selected' : '' }}>Sản phẩm mới</option>
                <option value="top" {{ $filter == 'top' ? 'selected' : '' }}>Sản phẩm nổi bật</option>
                <option value="discount" {{ $filter == 'discount' ? 'selected' : '' }}>Sản phẩm giảm giá</option>
                <option value="no_discount" {{ $filter == 'no_discount' ? 'selected' : '' }}>Sản phẩm không giảm giá</option>
            </select>
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
                        <a href="{{ route('product') }}">
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
                        <a class="add-to-cart pull-left" href="{{ route('banhang.addtocart', $new_product->id) }}">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <a class="beta-btn primary" href="{{ route('banhang.chitiet', $new_product->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            @if($stt % 4 == 0)
                <div class="space40">&nbsp;</div>
            @endif
        @endforeach
    </div>
</div>
@endsection