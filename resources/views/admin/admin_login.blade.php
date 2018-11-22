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
        <link rel="stylesheet" href="{{ asset('backend_files/css/matrix-login.css') }}" />
        <link href="{{ asset('backend_files/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        <!--End-CSS-Part-->

        <!--MYCSS-Part-->
        <link rel="stylesheet" href="{{ asset('backend_files/css/mycss.css') }}" />
        <!--End-MYCSS-Part-->

    </head>
    <body style="overflow: hidden;">
        <!--Flash-->
        @include('layouts.adminLayout.admin_flash')
        <!--End-Flash-->
        <div id="loginbox"> 
            <form id="loginform" class="form-vertical" method="post" action="{{ url('admin') }}" name="admin_login" id="admin_login" novalidate="novalidate">{{ csrf_field() }}
				 <div class="control-group normal_text"> <h3><img src="{{ asset('backend_files/img/logo.png') }}" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="email" placeholder="Email" name="email" id="email"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="password" id="password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <!-- <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span> -->
                    <center>
                        <span class=""><input type="submit" value="Login" class="btn btn-success" style="width: 90%;" /></span>
                    </center>
                </div>
            </form>
            <form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
                </div>
            </form>
        </div>
        
        <!--JS-Part-->
        <script src="{{ asset('backend_files/js/jquery.min.js') }}"></script>  
        <script src="{{ asset('backend_files/js/matrix.login.js') }}"></script>
        <script src="{{ asset('backend_files/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('backend_files/js/myjs.js') }}"></script>  
        <!--End-JS-Part-->
    </body>
</html>