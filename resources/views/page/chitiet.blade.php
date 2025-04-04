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
								<select class="wc-select" name="size">
									<option>Size</option>
									<option value="XS">XS</option>
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
								</select>
								<select class="wc-select" name="size" id="quantity">
									<option>Số lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="{{ route('banhang.addtocart',$sanpham->id) }}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
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
					</div>
				</div>
				
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="{{ asset('source/image/product/a3.jpg') }}" alt=""></a>
									<div class="media-body">
									Food
										<span class="beta-sales-price">1đ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="{{ asset('source/image/product/a4.jpg') }}" alt=""></a>
									<div class="media-body">
									Food
										<span class="beta-sales-price">1đ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="{{ asset('source/image/product/a5.jpg') }}" alt=""></a>
									<div class="media-body">
									Food
										<span class="beta-sales-price">1đ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="{{ asset('source/image/product/a10.jpg') }}" alt=""></a>
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
									<a class="pull-left" href="product.html"><img src="{{ asset('source/image/product/a2.jpg') }}" alt=""></a>
									<div class="media-body">
									Food
										<span class="beta-sales-price">1đ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="{{ asset('source/image/product/a6.jpg') }}" alt=""></a>
									<div class="media-body">
									Food
										<span class="beta-sales-price">1đ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="{{ asset('source/image/product/a7.jpg') }}" alt=""></a>
									<div class="media-body">
									Food
										<span class="beta-sales-price">1đ</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="{{ asset('source/image/product/a10.jpg') }}" alt=""></a>
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