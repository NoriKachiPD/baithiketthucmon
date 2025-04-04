<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="description" content="Cafe Amian">
    <meta name="author" content=""> -->

    <title>@yield(section: 'title')</title>
    <link rel="icon" href="@yield('favicon')" type="image/jpg">
    <!-- <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
    <link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/css/style.css') }}"> -->

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
    @yield('styles')
    <!-- <title>Admin Bán hàng</title> -->
    <!--Bootstrap Core CSS -->
    <!-- <link href="{{ asset('source/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet"> -->
    <!--MetisMenu CSS -->
    <link href="{{ asset('source/admin/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">
    <!--Custom CSS -->
    <link href="{{ asset('source/admin/dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <!--Custom Fonts -->
    <link href="{{ asset('source/admin/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!--DataTables CSS -->
    <link href="{{ asset('source/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
    <!--DataTables Responsive CSS -->
    <link href="{{ asset('source/admin/bower_components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="wrapper">
        @include('admin.header')
        @include('admin.sidebar')
        @yield('content')
    </div>
    <!--/#wrapper -->
    @yield('script')
    <!--jQuery -->
   
   

    <!--Bootstrap Core JavaScript -->
    <script src="{{ asset('source/admin/bower_components/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('source/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
   
    <!--Metis Menu Plugin JavaScript -->
    <script src="{{ asset('source/admin/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>
    <!--Custom Theme JavaScript -->
    <script src="{{ asset('source/admin/dist/js/sb-admin-2.js') }}"></script>
    <!--DataTables JavaScript -->
    <!--<script src="{{ asset('source/admin/bower_components/DataTables/media/js/jquery.dataTables.min.js') }}"></script> -->
    <!--<script src="{{ asset('source/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script> -->
    <!--Page-Level Demo Scripts
Tables
Use for reference -->
    <!--<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('source/assets/dest/js/jquery.js') }}"></script>
    @yield('scripts')
</body>
</html>