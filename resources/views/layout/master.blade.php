<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield(section: 'title')</title>
    <link rel="icon" href="@yield('favicon')" type="image/jpg">

    
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Local CSS -->
    <link rel="stylesheet" href="{{ asset('source/assets/dest/vendors/colorbox/example3/colorbox.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/rs-plugin/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/css/huong-style.css') }}">

    <!-- Load jQuery early for plugins -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    @include('layout.header')
    @yield('content')
    @include('layout.footer')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js') }}"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    
    <!-- Plugin Scripts -->
    <script src="{{ asset('source/assets/dest/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('source/assets/dest/vendors/colorbox/jquery.colorbox-min.js') }}"></script>
    <script src="{{ asset('source/assets/dest/vendors/animo/Animo.js') }}"></script>
    <script src="{{ asset('source/assets/dest/vendors/dug/dug.js') }}"></script>
    
    <!-- Main Scripts -->
    <script src="{{ asset('source/assets/dest/js/scripts.min.js') }}"></script>
    <script src="{{ asset('source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('source/assets/dest/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('source/assets/dest/js/wow.min.js') }}"></script>
    <script src="{{ asset('source/assets/dest/js/custom2.js') }}"></script>

    <script>
    $(document).ready(function($) {    
        $(window).scroll(function(){
            if($(this).scrollTop()>150){
                $(".header-bottom").addClass('fixNav')
            } else {
                $(".header-bottom").removeClass('fixNav')
            }
        });
    });
    </script>

    {{-- JS --}}
<script>
    $(document).ready(function () {
        $('.dropdown-toggle').on('click', function () {
            const submenu = $(this).next('.nav-second-level');
            const arrow = $(this).find('.arrow-icon');
            const isVisible = submenu.is(':visible');

            // Ẩn tất cả submenu khác & reset tất cả icon
            $('.nav-second-level').not(submenu).slideUp();
            $('.arrow-icon').not(arrow).removeClass('rotate-down');

            // Toggle submenu hiện tại
            submenu.slideToggle();

            // Xoay icon tương ứng
            arrow.toggleClass('rotate-down');
        });
    });
</script>

    @yield('js')
</body>
</html>