<!DOCTYPE html>
<!-- Template Name: School Management system - Responsive Admin  build with Twitter Bootstrap 3.x Version: 1.2 Author: Mashura develeoped By Khaled Bakr~/ -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- start: HEAD -->

<head>
    <title>Zh - @yield('title')</title>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('css')
    <!-- end: CORE CSS -->
    <link rel="shortcut icon" href="~/favicon.ico" />
</head>
<!-- end: HEAD -->
<!-- start: BODY -->

<body>
<!-- start: SLIDING BAR (SB) -->

<!-- end: SLIDING BAR -->
<div class="main-wrapper">
    <!-- start: TOPBAR -->
    <header class="topbar navbar navbar-inverse navbar-fixed-top inner">
        <!-- start: TOPBAR CONTAINER -->
        <div class="container">
            <div class="navbar-header">
                <a class="sb-toggle-left hidden-md hidden-lg" href="#main-navbar">
                    <i class="fa fa-bars"></i>
                </a>
                <!-- start: LOGO -->
                <!--a class="navbar-brand" href="#">
                    <img src="{{asset('panel/assets/images/logo.png')}}" alt="Rapido" />
                </a-->
                <!-- end: LOGO -->
            </div>
            <div class="topbar-tools">


                <!--============================ Start: Navigation men  ===========================
	              ================================================================================= -->


                <!-- start: TOP NAVIGATION MENU -->
                <ul class="nav navbar-right">
                    <!-- start: USER DROPDOWN -->
                    <li class="dropdown current-user">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle"
                           data-close-others="true" href="#">
                            <img src="{{asset('panel/assets/images/avatar-1-small.jpg')}}" class="img-circle" alt=""> <span
                                    class="username hidden-xs">{{Auth()->user()->name}}</span> <i class="fa fa-caret-down "></i>
                        </a>
                        <ul class="dropdown-menu dropdown-dark">
                            <li>
                                <a href="{{url('logout')}}">
                                    Log Out
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end: USER DROPDOWN -->
                </ul>
                <!-- end: TOP NAVIGATION MENU -->
            </div>
        </div>
        <!-- end: TOPBAR CONTAINER -->
    </header>
    <!-- end: TOPBAR -->
    <!-- start: PAGESLIDE LEFT -->
    <a class="closedbar inner hidden-sm hidden-xs" href="#">
    </a>
    @yield('sidebar')

    <!-- end: PAGESLIDE LEFT -->
    <!-- start: PAGESLIDE RIGHT -->
    <div id="pageslide-right" class="pageslide slide-fixed inner">
        <div class="right-wrapper">
            <ul class="nav nav-tabs nav-justified" id="sidebar-tab">
                <li class="active">
                    <a href="#users" role="tab" data-toggle="tab"><i class="fa fa-users"></i></a>
                </li>
                <li>
                    <a href="#notifications" role="tab" data-toggle="tab"><i class="fa fa-bookmark "></i></a>
                </li>
                <li>
                    <a href="#settings" role="tab" data-toggle="tab"><i class="fa fa-gear"></i></a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="users">
                    <div class="users-list">
                        <h5 class="sidebar-title">On-line</h5>
                        <ul class="media-list">
                            <li class="media">
                                <a href="#">
                                    <i class="fa fa-circle status-online"></i>
                                    <img alt="..." src="{{asset('panel/assets/images/avatar-2.jpg')}}" class="media-object">
                                    <div class="media-body">
                                        <h4 class="media-heading">Nicole Bell</h4>
                                        <span> Content Designer </span>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="#">
                                    <div class="user-label">
                                        <span class="label label-default">3</span>
                                    </div>
                                    <i class="fa fa-circle status-online"></i>
                                    <img alt="..." src="{{asset('panel/assets/images/avatar-3.jpg')}}" class="media-object">
                                    <div class="media-body">
                                        <h4 class="media-heading">Steven Thompson</h4>
                                        <span> Visual Designer </span>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="#">
                                    <i class="fa fa-circle status-online"></i>
                                    <img alt="..." src="{{asset('panel/assets/images/avatar-4.jpg')}}" class="media-object">
                                    <div class="media-body">
                                        <h4 class="media-heading">Ella Patterson</h4>
                                        <span> Web Editor </span>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="#">
                                    <i class="fa fa-circle status-online"></i>
                                    <img alt="..." src="{{asset('panel/assets/images/avatar-5.jpg')}}" class="media-object">
                                    <div class="media-body">
                                        <h4 class="media-heading">Kenneth Ross</h4>
                                        <span> Senior Designer </span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <h5 class="sidebar-title">Off-line</h5>
                        <ul class="media-list">
                            <li class="media">
                                <a href="#">
                                    <img alt="..." src="{{asset('panel/assets/images/avatar-6.jpg')}}" class="media-object">
                                    <div class="media-body">
                                        <h4 class="media-heading">Nicole Bell</h4>
                                        <span> Content Designer </span>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="#">
                                    <div class="user-label">
                                        <span class="label label-default">3</span>
                                    </div>
                                    <img alt="..." src="{{asset('panel/assets/images/avatar-7.jpg')}}" class="media-object">
                                    <div class="media-body">
                                        <h4 class="media-heading">Steven Thompson</h4>
                                        <span> Visual Designer </span>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="#">
                                    <img alt="..." src="{{asset('panel/assets/images/avatar-8.jpg')}}" class="media-object">
                                    <div class="media-body">
                                        <h4 class="media-heading">Ella Patterson</h4>
                                        <span> Web Editor </span>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="#">
                                    <img alt="..." src="{{asset('panel/assets/images/avatar-9.jpg')}}" class="media-object">
                                    <div class="media-body">
                                        <h4 class="media-heading">Kenneth Ross</h4>
                                        <span> Senior Designer </span>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="#">
                                    <img alt="..." src="{{asset('panel/assets/images/avatar-10.jpg')}}" class="media-object">
                                    <div class="media-body">
                                        <h4 class="media-heading">Ella Patterson</h4>
                                        <span> Web Editor </span>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="#">
                                    <img alt="..." src="{{asset('panel/assets/images/avatar-5.jpg')}}" class="media-object">
                                    <div class="media-body">
                                        <h4 class="media-heading">Kenneth Ross</h4>
                                        <span> Senior Designer </span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="user-chat">
                        <div class="sidebar-content">
                            <a class="sidebar-back" href="#"><i class="fa fa-chevron-circle-left"></i> Back</a>
                        </div>
                        <div class="user-chat-form sidebar-content">
                            <div class="input-group">
                                <input type="text" placeholder="Type a message here..." class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-blue no-radius" type="button">
                                        <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <ol class="discussion sidebar-content">
                            <li class="other">
                                <div class="avatar">
                                    <img src="{{asset('panel/assets/images/avatar-4.jpg')}}" alt="">
                                </div>
                                <div class="messages">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                        nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    </p>
                                    <span class="time"> 51 min </span>
                                </div>
                            </li>
                            <li class="self">
                                <div class="avatar">
                                    <img src="{{asset('panel/assets/images/avatar-1.jpg')}}" alt="">
                                </div>
                                <div class="messages">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                        nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    </p>
                                    <span class="time"> 37 mins </span>
                                </div>
                            </li>
                            <li class="other">
                                <div class="avatar">
                                    <img src="{{asset('panel/assets/images/avatar-4.jpg')}}" alt="">
                                </div>
                                <div class="messages">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                        nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    </p>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="tab-pane" id="notifications">
                    <div class="notifications">
                        <div class="pageslide-title">
                            You have 11 notifications
                        </div>
                        <ul class="pageslide-list">
                            <li>
                                <a href="javascript:void(0)">
                                    <span class="label label-primary"><i class="fa fa-user"></i></span> <span
                                            class="message"> New user registration</span> <span class="time"> 1
											min</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span class="label label-success"><i class="fa fa-comment"></i></span> <span
                                            class="message"> New comment</span> <span class="time"> 7 min</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span class="label label-success"><i class="fa fa-comment"></i></span> <span
                                            class="message"> New comment</span> <span class="time"> 8 min</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span class="label label-success"><i class="fa fa-comment"></i></span> <span
                                            class="message"> New comment</span> <span class="time"> 16 min</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span class="label label-primary"><i class="fa fa-user"></i></span> <span
                                            class="message"> New user registration</span> <span class="time"> 36
											min</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span class="label label-warning"><i class="fa fa-shopping-cart"></i></span>
                                    <span class="message"> 2 items sold</span> <span class="time"> 1 hour</span>
                                </a>
                            </li>
                            <li class="warning">
                                <a href="javascript:void(0)">
                                    <span class="label label-danger"><i class="fa fa-user"></i></span> <span
                                            class="message"> User deleted account</span> <span class="time"> 2
											hour</span>
                                </a>
                            </li>
                        </ul>
                        <div class="view-all">
                            <a href="javascript:void(0)">
                                See all notifications <i class="fa fa-arrow-circle-o-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="settings">
                    <h5 class="sidebar-title">General Settings</h5>
                    <ul class="media-list">
                        <li class="media">
                            <div class="checkbox sidebar-content">
                                <label>
                                    <input type="checkbox" value="" class="green" checked="checked">
                                    Enable Notifications
                                </label>
                            </div>
                        </li>
                        <li class="media">
                            <div class="checkbox sidebar-content">
                                <label>
                                    <input type="checkbox" value="" class="green" checked="checked">
                                    Show your E-mail
                                </label>
                            </div>
                        </li>
                        <li class="media">
                            <div class="checkbox sidebar-content">
                                <label>
                                    <input type="checkbox" value="" class="green">
                                    Show Offline Users
                                </label>
                            </div>
                        </li>
                        <li class="media">
                            <div class="checkbox sidebar-content">
                                <label>
                                    <input type="checkbox" value="" class="green" checked="checked">
                                    E-mail Alerts
                                </label>
                            </div>
                        </li>
                        <li class="media">
                            <div class="checkbox sidebar-content">
                                <label>
                                    <input type="checkbox" value="" class="green">
                                    SMS Alerts
                                </label>
                            </div>
                        </li>
                    </ul>
                    <div class="sidebar-content">
                        <button class="btn btn-success">
                            <i class="icon-settings"></i> Save Changes
                        </button>
                    </div>
                </div>
            </div>
            <div class="hidden-xs" id="style_selector">
                <div id="style_selector_container">
                    <div class="pageslide-title">
                        Style Selector
                    </div>
                    <div class="box-title">
                        Choose Your Layout Style
                    </div>
                    <div class="input-box">
                        <div class="input">
                            <select name="layout" class="form-control">
                                <option value="default">Wide</option>
                                <option value="boxed">Boxed</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-title">
                        Choose Your Header Style
                    </div>
                    <div class="input-box">
                        <div class="input">
                            <select name="header" class="form-control">
                                <option value="fixed">Fixed</option>
                                <option value="default">Default</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-title">
                        Choose Your Sidebar Style
                    </div>
                    <div class="input-box">
                        <div class="input">
                            <select name="sidebar" class="form-control">
                                <option value="fixed">Fixed</option>
                                <option value="default">Default</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-title">
                        Choose Your Footer Style
                    </div>
                    <div class="input-box">
                        <div class="input">
                            <select name="footer" class="form-control">
                                <option value="default">Default</option>
                                <option value="fixed">Fixed</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-title">
                        10 Predefined Color Schemes
                    </div>
                    <div class="images icons-color">
                        <a href="#" id="default"><img src="{{asset('panel/assets/images/color-1.png')}}" alt="" class="active"></a>
                        <a href="#" id="style2"><img src="{{asset('panel/assets/images/color-2.png')}}" alt=""></a>
                        <a href="#" id="style3"><img src="{{asset('panel/assets/images/color-3.png')}}" alt=""></a>
                        <a href="#" id="style4"><img src="{{asset('panel/assets/images/color-4.png')}}" alt=""></a>
                        <a href="#" id="style5"><img src="{{asset('panel/assets/images/color-5.png')}}" alt=""></a>
                        <a href="#" id="style6"><img src="{{asset('panel/assets/images/color-6.png')}}" alt=""></a>
                        <a href="#" id="style7"><img src="{{asset('panel/assets/images/color-7.png')}}" alt=""></a>
                        <a href="#" id="style8"><img src="{{asset('panel/assets/images/color-8.png')}}" alt=""></a>
                        <a href="#" id="style9"><img src="{{asset('panel/assets/images/color-9.png')}}" alt=""></a>
                        <a href="#" id="style10"><img src="{{asset('panel/assets/images/color-10.png')}}" alt=""></a>
                    </div>
                    <div class="box-title">
                        Backgrounds for Boxed Version
                    </div>
                    <div class="images boxed-patterns">
                        <a href="#" id="bg_style_1"><img src="{{asset('panel/assets/images/bg.png')}}" alt=""></a>
                        <a href="#" id="bg_style_2"><img src="{{asset('panel/assets/images/bg_2.png')}}" alt=""></a>
                        <a href="#" id="bg_style_3"><img src="{{asset('panel/assets/images/bg_3.png')}}" alt=""></a>
                        <a href="#" id="bg_style_4"><img src="{{asset('panel/assets/images/bg_4.png')}}" alt=""></a>
                        <a href="#" id="bg_style_5"><img src="{{asset('panel/assets/images/bg_5.png')}}" alt=""></a>
                    </div>
                    <div class="style-options">
                        <a href="#" class="clear_style">
                            Clear Styles
                        </a>
                        <a href="#" class="save_style">
                            Save Styles
                        </a>
                    </div>
                </div>
                <div class="style-toggle open"></div>
            </div>
        </div>
    </div>
    <!-- end: PAGESLIDE RIGHT -->
    <!-- start: MAIN CONTAINER -->
    <div class="main-container inner">
        <!-- start: PAGE -->
        <div class="main-content">
            <!-- start: PANEL CONFIGURATION MODAL FORM -->
            <div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <h4 class="modal-title">Panel Configuration</h4>
                        </div>
                        <div class="modal-body">
                            Here will be a configuration form
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary">
                                Save changes
                            </button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- end: SPANEL CONFIGURATION MODAL FORM -->
            <div class="container">

               @yield('content')

            </div>
            <div class="subviews">
                <div class="subviews-container"></div>
            </div>
        </div>
        <!-- end: PAGE -->
    </div>
    <!-- end: MAIN CONTAINER -->
    <!-- start: FOOTER -->
    <footer class="inner">
        <div class="footer-inner">
            <div class="pull-left">
                2021 &copy; Minecores.
            </div>
            <div class="pull-right">
                <span class="go-top"><i class="fa fa-chevron-up"></i></span>
            </div>
        </div>
    </footer>
    <!-- end: FOOTER -->
    <!-- start: SUBVIEW SAMPLE CONTENTS -->
    <!-- *** NEW NOTE *** -->
    <!-- end: SUBVIEW SAMPLE CONTENTS -->
</div>
<!-- start: MAIN JAVASCRIPTS -->
<!--[if lt IE 9]>
<script src="{{asset('panel/assets/plugins/respond.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/excanvas.min.js')}}"></script>
<script type="text/javascript" src="{{asset('panel/assets/plugins/jQuery/jquery-1.11.1.min.js')}}"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script src="{{asset('panel/assets/plugins/jquery-2.1.1.min.js')}}"></script>
<!--<![endif]-->
<script src="{{asset('panel/assets/plugins/jquery-ui-1.10.2.custom.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/bootstrap.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/jquery.blockUI.js')}}"></script>
<script src="{{asset('panel/assets/plugins/jquery.icheck.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/moment.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/jquery.mousewheel.js')}}"></script>
<script src="{{asset('panel/assets/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{asset('panel/assets/plugins/bootbox.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/jquery.appear.js')}}"></script>
<script src="{{asset('panel/assets/plugins/jquery.cookie.js')}}"></script>
<script src="{{asset('panel/assets/plugins/jquery.velocity.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/jquery.touchSwipe.min.js')}}"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
<script src="{{asset('panel/assets/plugins/owl.carousel.js')}}"></script>
<script src="{{asset('panel/assets/plugins/jquery.mockjax.js')}}"></script>
<script src="{{asset('panel/assets/plugins/toastr.js')}}"></script>
<script src="{{asset('panel/assets/plugins/bootstrap-modal.js')}}"></script>
<script src="{{asset('panel/assets/plugins/bootstrap-modalmanager.js')}}"></script>
<script src="{{asset('panel/assets/plugins/fullcalendar.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/bootstrap-switch.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/bootstrap-select.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/jquery.validate.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/bootstrap-fileupload.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('panel/assets/plugins/jquery.truncate.js')}}"></script>
<script src="{{asset('panel/assets/plugins/summernote.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/daterangepicker.js')}}"></script>
<script src="{{asset('panel/assets/js/subview.js')}}"></script>
<script src="{{asset('panel/assets/js/subview-examples.js')}}"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="{{asset('panel/assets/plugins/bootstrap-progressbar.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/d3.v3.js')}}"></script>
<script src="{{asset('panel/assets/plugins/nv.d3.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/historicalBar.js')}}"></script>
<script src="{{asset('panel/assets/plugins/historicalBarChart.js')}}"></script>
<script src="{{asset('panel/assets/plugins/stackedArea.js')}}"></script>
<script src="{{asset('panel/assets/plugins/stackedAreaChart.js')}}"></script>
<script src="{{asset('panel/assets/plugins/jquery.sparkline.js')}}"></script>
<script src="{{asset('panel/assets/plugins/jquery.easypiechart.min.js')}}"></script>
<script src="{{asset('panel/assets/js/index.js')}}"></script>
<script src="{{asset('panel/assets/js/ui-subview.js')}}"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: CORE JAVASCRIPTS  -->
<script src="{{asset('panel/assets/js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- end: CORE JAVASCRIPTS  -->

@include('sweetalert::alert')
@yield('script')

<script>

    {{--    confirm any form delete --}}
    $(document).ready(function () {


        $('.delete123').click(function (e) {
            var that = $('#formSubmit')
            e.preventDefault();
            Swal.fire({
                icon: 'warning',
                text: 'Do you want to delete this?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    that.closest('form').submit();
                }
            });

        })
    })
</script>

<script>
    jQuery(document).ready(function () {
        Main.init();
        Index.init();
        SVExamples.init();
        //UISubview.init();



    });

    // General function not working on multi level
    function InlineClose() {
        $('.inline-open ,.inline-close').click(function () {
            //$('.inline-form').toggleClass('closed');

            if ($('.inline-form1').hasClass('closed')) {
                $('.inline-form1').removeClass('closed');
                $('.inline-form1').addClass('opened');
            } else if ($('.inline-form1').hasClass('opened')) {
                $('.inline-form1').removeClass('opened');
                $('.inline-form1').addClass('closed');
            }
        })
    }
    InlineClose();

</script>

@yield('js')
<!-- @RenderSection("scripts", required: false) -->
</body>
<!-- end: BODY -->

</html>
