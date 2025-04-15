@extends('layout.master')

@section('title', 'Chi tiết sản phẩm')

@section('favicon', asset('images/2.jpg'))

@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Chi tiết sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="http://localhost:8000/trangchu">Trang chủ</a> / <span>Chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">
					<div class="row">
						<div class="col-sm-4">
							<img src="{{ asset('source/image/product/a2.jpg') }}" alt="{{ $sanpham->name }}" class="img-responsive">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{ $sanpham->name }}</p>
								<br>
								<p class="single-item-price">
									@if($sanpham->promotion_price == 0)
										<span class="flash-sale">{{ number_format($sanpham->unit_price, 2) }}đ</span>
									@else
										<span class="flash-del">{{ number_format($sanpham->unit_price) }}đ</span>
										<br>
										<br>
										<span class="flash-sale">{{ number_format($sanpham->promotion_price) }}đ</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{ $sanpham->description }}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-options">
								<!-- <select class="wc-select" name="size">
									<option>Size</option>
									<option value="XS">XS</option>
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
								</select> -->
								<form action="{{ route('banhang.addtocart', $sanpham->id) }}" method="POST">
									@csrf
									<div class="single-item-options">
										<select class="wc-select" name="quantity" id="quantity">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
										</select>
										@if(Auth::check())
											<button type="submit" class="add-to-cart pull-left">
												<i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
											</button>
										@else
											<a class="add-to-cart pull-left" href="javascript:void(0)" onclick="chuaDangNhap(event)">
												<i class="fa fa-shopping-cart"></i>
											</a>
										@endif
										<script>
											function chuaDangNhap(event) {
												// Ngừng hành động mặc định của liên kết (không thêm vào giỏ hàng)
												event.preventDefault();
												
												// Hiển thị thông báo yêu cầu đăng nhập
												alert("Vui lòng đăng nhập để sử dụng tính năng này!");
											}
										</script>
									</div>
								</form>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{ $sanpham->description }}</p>
						</div>
						<!-- Bảng thông tin loại sản phẩm đẹp mắt -->
						<div class="product-type-info" style="margin-top: 30px;">
							<table style="
								width: 100%;
								border-collapse: collapse;
								font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
								box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
								background: linear-gradient(to right, #fdfbfb, #ebedee);
								border-radius: 10px;
								overflow: hidden;
							">
								<thead>
									<tr style="background: linear-gradient(to right, #667eea, #764ba2);">
										<th colspan="2" style="
											color: white;
											font-size: 22px;
											padding: 20px;
											text-align: center;
											letter-spacing: 1px;
										">
											🛍️ Thông tin loại sản phẩm
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td style="
											padding: 15px 20px;
											font-weight: bold;
											font-size: 18px;
											width: 200px;
											color: #333;
										">
											Loại sản phẩm:
										</td>
										<td style="
											padding: 15px 20px;
											font-size: 18px;
											color: #444;
										">
											{{ $sanpham->typeProduct->name }}
										</td>
									</tr>
									<tr style="background-color: #f9f9f9;">
										<td style="
											padding: 15px 20px;
											font-weight: bold;
											font-size: 18px;
											color: #333;
										">
											Mô tả loại sản phẩm:
										</td>
										<td style="
											padding: 15px 20px;
											font-size: 18px;
											color: #444;
										">
											{{ $sanpham->typeProduct->description }}
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- Kết thúc bảng -->
					</div>
				</div>			
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="#"><img src="{{ asset('source/image/product/a3.jpg') }}" alt=""></a>
									<div class="media-body">
									Food
										<span class="beta-sales-price">1đ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="#"><img src="{{ asset('source/image/product/a4.jpg') }}" alt=""></a>
									<div class="media-body">
									Food
										<span class="beta-sales-price">1đ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="#"><img src="{{ asset('source/image/product/a5.jpg') }}" alt=""></a>
									<div class="media-body">
									Food
										<span class="beta-sales-price">1đ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="#"><img src="{{ asset('source/image/product/a10.jpg') }}" alt=""></a>
									<div class="media-body">
									Food
										<span class="beta-sales-price">1đ</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="#"><img src="{{ asset('source/image/product/a2.jpg') }}" alt=""></a>
									<div class="media-body">
									Food
										<span class="beta-sales-price">1đ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="#"><img src="{{ asset('source/image/product/a6.jpg') }}" alt=""></a>
									<div class="media-body">
									Food
										<span class="beta-sales-price">1đ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="#"><img src="{{ asset('source/image/product/a7.jpg') }}" alt=""></a>
									<div class="media-body">
									Food
										<span class="beta-sales-price">1đ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="#"><img src="{{ asset('source/image/product/a10.jpg') }}" alt=""></a>
									<div class="media-body">
									Food
										<span class="beta-sales-price">1đ</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- new products widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection

@section('js')
	<!--customjs-->
	<script type="text/javascript">
		$(function() {
			// this will get the full URL at the address bar
			var url = window.location.href;

			// passes on every "a" tag
			$(".main-menu a").each(function() {
				// checks if its the same on the address bar
				if (url == (this.href)) {
					$(this).closest("li").addClass("active");
					$(this).parents('li').addClass('parent-active');
				}
			});
		});
	</script>

	<script>
		jQuery(document).ready(function($) {
			'use strict';

			// color box
			//color
			jQuery('#style-selector').animate({
				left: '-213px'
			});

			jQuery('#style-selector a.close').click(function(e){
				e.preventDefault();
				var div = jQuery('#style-selector');
				if (div.css('left') === '-213px') {
					jQuery('#style-selector').animate({
						left: '0'
					});
					jQuery(this).removeClass('icon-angle-left');
					jQuery(this).addClass('icon-angle-right');
				} else {
					jQuery('#style-selector').animate({
						left: '-213px'
					});
					jQuery(this).removeClass('icon-angle-right');
					jQuery(this).addClass('icon-angle-left');
				}
			});
		});
	</script>
@endsection