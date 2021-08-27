<!DOCTYPE html>
<!-- Template Name: School Management system - Responsive Admin  build with Twitter Bootstrap 3.x Version: 1.2 Author: Mashura develeoped By Khaled Bakr~/ -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- start: HEAD -->

<head>
    <title>ZH</title>
    <!-- start: META -->
    <meta charset="utf-8" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- end: META -->
    <!-- start: MAIN CSS -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,200,100,800' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/all.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/animate.min.css')}}">
    <!-- end: MAIN CSS -->
    <!-- start: CSS REQUIRED FOR SUBVIEW CONTENTS -->
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/summernote.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/fullcalendar.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/bootstrap-switch.min.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/DT_bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/bootstrap-fileupload.min.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/daterangepicker-bs3.css')}}">
    <!-- end: CSS REQUIRED FOR THIS SUBVIEW CONTENTS-->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/weather-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/nv.d3.min.css')}}">
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CORE CSS -->
    <link rel="stylesheet" href="{{asset('panel/assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/css/styles-responsive.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/css/themes/theme-style7.css')}}" type="text/css" id="skin_color">
    <link rel="stylesheet" href="{{asset('panel/assets/css/print.css')}}" type="text/css" media="print" />
    <link rel="stylesheet" href="{{asset('panel/assets/css/custom-style.css')}}" type="text/css" />

    <!-- end: CORE CSS -->
    <link rel="shortcut icon" href="~/favicon.ico" />
</head>
<!-- end: HEAD -->
<!-- start: BODY -->

<body class="login">
<div class="row">
    <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="logo">
            <img src="{{asset('panel/assets/images/ZH.png')}}">
        </div>
        <!-- start: LOGIN BOX -->
        <div class="box-login" style="display: block;">
            <h3>Sign in to your account</h3>
            <p>
                Please enter your code and password to log in.
            </p>
            <form class="form-login" action="{{url('login')}}" method="post" novalidate="novalidate">
                @if($errors->any())
                    @foreach($errors->all() as $err)
                <div class="errorHandler alert alert-danger">
                    <i class="fa fa-remove-sign"></i>
                    {{$err}}
                </div>
                    @endforeach
                @endif


                <fieldset>
                    <div class="form-group">
							<span class="input-icon">
								<input type="text" class="form-control" name="code" value="{{old('code')}}" placeholder="ID">
								<i class="fa fa-user"></i> </span>
                    </div>
                    <div class="form-group form-actions">
							<span class="input-icon">
								<input type="password" class="form-control password" name="password"
                                       placeholder="Password">
								<i class="fa fa-lock"></i>
                            </span>

                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-actions">
                        <label for="remember" class="checkbox-inline">
                            <div class="icheckbox_minimal-grey" style="position: relative;"><input type="checkbox"
                                                                                                   class="grey remember" id="remember" name="remember"
                                                                                                   style="position: absolute; top: -10%; left: -10%; display: block; width: 120%; height: 120%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                    class="iCheck-helper"
                                    style="position: absolute; top: -10%; left: -10%; display: block; width: 120%; height: 120%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                            </div>
                            Keep me signed in
                        </label>
                        <button type="submit" class="btn btn-green pull-right">
                            Login <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>
                </fieldset>
            </form>
            <!-- start: COPYRIGHT -->
            <div class="copyright">
                2021 ©  by Minescore.
            </div>
            <!-- end: COPYRIGHT -->
        </div>
    </div>
</div>
<!-- start: MAIN JAVASCRIPTS -->
<!--[if lt IE 9]>
<script src="{{asset('panel/assets/assets/plugins/respond.min.js')}}"></script>
<script src="{{asset('panel/assets/assets/plugins/excanvas.min.js')}}"></script>
<script type="text/javascript" src="{{asset('panel/assets/assets/plugins/jQuery/jquery-1.11.1.min.js')}}"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script src="{{asset('panel/assets/assets/plugins/jQuery/jquery-2.1.1.min.js')}}"></script>
<!--<![endif]-->
<script src="{{asset('panel/assets/assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js')}}"></script>
<script src="{{asset('panel/assets/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('panel/assets/assets/plugins/iCheck/jquery.icheck.min.js')}}"></script>
<script src="{{asset('panel/assets/assets/plugins/jquery.transit/jquery.transit.js')}}"></script>
<script src="{{asset('panel/assets/assets/plugins/TouchSwipe/jquery.touchSwipe.min.js')}}"></script>
<script src="{{asset('panel/assets/assets/js/main.js')}}"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="{{asset('panel/assets/assets/plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('panel/assets/assets/js/login.js')}}"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script>
    jQuery(document).ready(function () {
        Main.init();
        Login.init();
    });
</script>

<!-- end: BODY -->
</body>
<!-- end: BODY -->

</html>
