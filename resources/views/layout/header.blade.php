<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
                    <li><a href="#">Đăng kí</a></li>
                    <li><a href="#">Đăng nhập</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="index.html" id="logo"><img src="{{ asset('source/assets/dest/images/logo-cake.png')}}" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="/">
                        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    <div class="cart">
                        <div class="beta-select">
                            <i class="fa fa-shopping-cart"></i> Giỏ hàng 
                            ({{ Session::has('cart') ? Session('cart')->totalQty : 'Trống' }}) 
                            <i class="fa fa-chevron-down"></i>
                        </div>
                        
                        @if(Session::has('cart'))
                        <div class="beta-dropdown cart-body">
                            <div class="cart-items-wrapper">
                                @foreach($productCarts ?? [] as $product)
                                <div class="cart-item">
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img src="{{ asset('source/image/product/'.$product['item']['image']) }}" alt="{{ $product['item']['name'] }}">
                                        </a>
                                        <div class="media-body">
                                            <div class="cart-item-title">{{ $product['item']['name'] }}</div>
                                            <div class="cart-item-price">
                                                {{ $product['qty'] }} × 
                                                @if($product['item']['promotion_price'] == 0)
                                                    {{ number_format($product['item']['unit_price']) }}đ
                                                @else
                                                    {{ number_format($product['item']['promotion_price']) }}đ
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <a class="cart-item-delete" href="{{ route('banhang.xoagiohang',$product['item']['id']) }}">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                                @endforeach
                            </div>

                            <div class="cart-summary">
                                <div class="cart-total">
                                    <span>Tổng tiền:</span>
                                    <span class="total-price">{{ number_format($cart->totalPrice) }}đ</span>
                                </div>
                                <a href="{{ route('banhang.getdathang') }}" class="btn-checkout">
                                    Đặt hàng <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div> <!-- .beta-components -->
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="http://localhost:8000/trangchu">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a>
                        <ul class="sub-menu">
                            <li><a href="product_type.html">Nothing Here</a></li>
                            <li><a href="product_type.html">NOTHING HERE!!</a></li>
                            <li><a href="product_type.html">GO AWAY!!!!!</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">Giới thiệu</a></li>
                    <li><a href="{{ route('contacts') }}">Liên hệ</a></li>
                    </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->