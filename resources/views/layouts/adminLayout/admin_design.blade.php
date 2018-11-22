<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Food App</title>

    <!--Fav-Icon-->
    <link rel="shortcut icon" href="{{ asset('backend_files/img/FoodApp.png') }}" />
    <!--End-Fav-Icon-->

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--CSS-Part-->
    <link rel="stylesheet" href="{{ asset('backend_files/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend_files/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend_files/css/uniform.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend_files/css/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend_files/css/matrix-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend_files/css/matrix-media.css') }}" />
    <link href="{{ asset('backend_files/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />

    <link rel="stylesheet" href="{{ asset('backend_files/css/jquery.gritter.css') }}" />
    <!--End-CSS-Part-->

    <!--MYCSS-Part-->
    <link rel="stylesheet" href="{{ asset('backend_files/css/mycss.css') }}" />
    <!--End-MYCSS-Part-->
    
  </head>

  <body>

  <!--Header-->
  @include('layouts.adminLayout.admin_header')
  <!--End-Header-->

  <!--Sidebar-Menu-->
  @include('layouts.adminLayout.admin_sidebar')
  <!--Sidebar-Menu-->

  <!--Flash-->
  @include('layouts.adminLayout.admin_flash')
  <!--End-Flash-->

  <!--Content-Part-->
  @yield('content')
  <!--End-Content-Part-->

  <!--Footer-Part-->
  @include('layouts.adminLayout.admin_footer')
  <!--End-Footer-Part-->

  <!--JS-Part-->
  <script src="{{ asset('backend_files/js/jquery.min.js') }}"></script> 
  <script src="{{ asset('backend_files/js/jquery.ui.custom.js') }}"></script> 
  <script src="{{ asset('backend_files/js/bootstrap.min.js') }}"></script> 
  <script src="{{ asset('backend_files/js/jquery.uniform.js') }}"></script> 
  <script src="{{ asset('backend_files/js/select2.min.js') }}"></script> 
  <script src="{{ asset('backend_files/js/jquery.dataTables.min.js') }}"></script> 
  <script src="{{ asset('backend_files/js/matrix.js') }}"></script> 
  <script src="{{ asset('backend_files/js/matrix.tables.js') }}"></script>

  <script src="{{ asset('backend_files/js/jquery.validate.js') }}"></script> 
  <script src="{{ asset('backend_files/js/matrix.form_validation.js') }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  <script src="{{ asset('backend_files/js/jquery.gritter.min.js') }}"></script> 
  <script src="{{ asset('backend_files/js/jquery.peity.min.js') }}"></script> 
  <script src="{{ asset('backend_files/js/matrix.interface.js') }}"></script> 
  <script src="{{ asset('backend_files/js/matrix.popover.js') }}"></script>

  <script src="{{ asset('backend_files/js/myjs.js') }}"></script>
  <!--End-JS-Part-->
  </body>

</html>