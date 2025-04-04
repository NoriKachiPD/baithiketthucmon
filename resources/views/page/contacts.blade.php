@extends('layout.masters')

@section('title', 'Contact')

@section('favicon', asset('images/2.jpg'))

@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Contacts</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Contacts</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.121407074183!2d108.24093447550486!3d16.05918848461886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142177f2ced6d8b%3A0xe282c779264f7088!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIE5naOG7gSDEkMOgIE7hurVuZw!5e0!3m2!1svi!2s!4v1743044980705!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Contact Form</h2>
					<div class="space20">&nbsp;</div>
					<p>Để đi đến chi tiết nhỏ nhất, không ai nên thực hiện bất kỳ loại công việc nào trừ khi anh ta thu được lợi ích nào đó từ nó. Đừng tức giận với nỗi đau trong sự khiển trách trong niềm vui mà anh ấy muốn được thoát khỏi nỗi đau với hy vọng rằng không có sự sinh sản. Trừ khi họ bị dục vọng làm cho mù quáng, nếu không họ sẽ không bước ra, họ có lỗi nếu bỏ rơi bổn phận và mềm lòng, đó là lao nhọc.</p>
					<div class="space20">&nbsp;</div>
					<form action="#" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Your Name (required)">
						</div>
						<div class="form-block">
							<input name="your-email" type="email" placeholder="Your Email (required)">
						</div>
						<div class="form-block">
							<input name="your-subject" type="text" placeholder="Subject">
						</div>
						<div class="form-block">
							<textarea name="your-message" placeholder="Your Message"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Send Message <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Contact Information</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Address</h6>
					<p>
						99 Tô Hiến Thành, Phước Mỹ, Sơn Trà, Đà Nẵng 550000.
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Business Enquiries</h6>
					<p>
					Còn nỗi đau của người khen ngợi, tôi sẽ mở ra toàn bộ sự việc,
					người tìm ra sự thật may mắn.<br>
						<a href="phatchau16520@gmail.com">phatchau16520@gmail.com</a>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Employment</h6>
					<p>
					Chúng tôi luôn tìm kiếm những người tài năng để
					tham gia vào nhóm của chúng tôi.
						<!-- <a href="hr@betadesign.com">hr@betadesign.com</a> -->
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->	

	<!-- include js files -->
	<script src="assets/dest/js/jquery.js"></script>
	<script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="assets/dest/vendors/animo/Animo.js"></script>
	<script src="assets/dest/vendors/dug/dug.js"></script>
	<script src="assets/dest/vendors/utils/beta.utils.js"></script>
	<script src="assets/dest/js/scripts.min.js"></script>
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