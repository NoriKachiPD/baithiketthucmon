<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <!-- <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i>99 Tô Hiến Thành, Phước Mỹ, Sơn Trà, Đà Nẵng 550000</a></li>
                    <li><a href=""><i class="fa fa-phone"></i>0935370171</a></li>
                </ul> -->
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                @if(Auth::check())
                <li>
                    <a href="{{ route('profile') }}">
                        <img src="{{ asset('images/' . (Auth::user()->Image ? Auth::user()->Image : 'user.png')) }}" 
                            alt="Avatar" 
                            style="width: auto; height: 49px; border-radius:50%; object-fit:cover;">
                    </a>
                </li>
                    <li><a href="{{ route('profile') }}"><i class="fa fa-user"></i>Chào bạn {{ Auth::user()->full_name }}</a></li>
                    <li><a href="{{ route('getlogout') }}"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
                @else
                    <li><a href="{{ route('getsignin') }}">Đăng kí</a></li>
                    <li><a href="{{ route('getlogin') }}">Đăng nhập</a></li>
                @endif
                    <!-- <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
                    <li><a href="{{ route('getsignin') }}">Đăng kí</a></li>
                    <li><a href="{{ route('getlogin') }}">Đăng nhập</a></li> -->
                <!-- @if(Auth::check() && Auth::user()->level == 1)
                    <li><a id="Admin" style="background:fixed; border: none;" href="{{ route('admin.category.list') }}" class="btn btn-primary"><i class="fa fa-user"></i>Admin Page</a></li>
                @endif
                <style>
                    #Admin{
                        color: #3392d0;
                    }
                    #Admin:hover{
                        text-decoration: underline; /* Khi hover vào sẽ có gạch chân */
                        color: #23527c;
                    }
                </style> -->
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{ route('banhang.index') }}" id="logo"><img src="{{ asset('images/3.png')}}" width="90px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                <!-- <form role="search" method="get" id="searchform" action="{{ route('home') }}">
                    <input style="margin-top: 16px;" type="text" value="{{ request('keyword') }}" name="keyword" id="s" placeholder="Nhập từ khóa..." />
                    <button class="fa fa-search" type="submit" id="searchsubmit" style="margin-top: 16px;"></button>
                </form> -->
                </div>
 
<!--                <div class="beta-comp">
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
                                                {{-- Hiển thị số lượng --}}
                                                <b><span>{{ $product['qty'] }}</span>✕</b>
                                                {{-- Nút tăng --}}
                                                <a href="{{ route('banhang.tangsoluong', $product['item']['id']) }}" style="font-size: 18px; background: linear-gradient(45deg, #004d00, #006400, #008000, #00b300, #00e600, #1aff66, #66ff99, #99ffcc, #ccffe6, #e6fff2); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent; color: transparent;">
                                                    <i class="fa fa-chevron-up"></i>
                                                </a>
                                                {{-- Nút giảm --}}
                                                <a href="{{ route('banhang.giamsoluong', $product['item']['id']) }}" style="font-size: 18px;background: linear-gradient(45deg, #8B0000, #B22222, #DC143C, #FF4500, #FF6347, #FF7F7F, #FFA07A, #FFC1C1, #FFD5D5, #FFE5E5); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent; color: transparent;">
                                                    <i class="fa fa-chevron-down"></i>
                                                </a>
                                                @if($product['item']['promotion_price'] == 0)
                                                    <h6>{{ number_format($product['item']['unit_price']) }}đ</h6>
                                                @else
                                                    <h6>{{ number_format($product['item']['promotion_price']) }}đ</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <a class="" href="{{ route('banhang.xoagiohang',$product['item']['id']) }}">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                                @endforeach
                            </div>

                            <div class="cart-summary">
                                <div class="cart-total">
                                    <span>Tổng tiền:</span>
                                    @if(Session::has('cart'))
                                        <span class="total-price">{{ number_format(Session::get('cart')->totalPrice) }}đ</span>
                                    @else
                                        <span class="total-price">0đ</span>
                                    @endif                                  
                                </div>
                                <a href="{{ route('banhang.getdathang') }}" class="btn-checkout">
                                    Đặt hàng <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div> -->
            </div> <!-- .beta-components -->
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    
    <div class="header-bottom" style="background-color: #0277b8; margin-top: -10px;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{ route('banhang.index') }}">Trang chủ</a></li>
                    <!-- <li><a href="#">Sản phẩm</a>
                        <ul class="sub-menu">
                            <li><a href="product_type.html">Nothing Here</a></li>
                            <li><a href="product_type.html">NOTHING HERE!!</a></li>
                            <li><a href="product_type.html">GO AWAY!!!!!</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">Giới thiệu</a></li> -->
                    <!-- <li><a href="{{ route('contacts') }}">Liên hệ</a></li> -->
                    </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->