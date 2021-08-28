<nav id="pageslide-left" class="pageslide inner">
    <div class="navbar-content">
        <!-- start: SIDEBAR -->
        <div class="main-navigation left-wrapper transition-left">
            <div class="navigation-toggler hidden-sm hidden-xs">
                <a href="#main-navbar" class="sb-toggle-left">
                </a>
            </div>
            <div class="user-profile border-top padding-horizontal-10 block">
                <div class="inline-block">
                    <img src="{{asset('panel/assets/images/avatar-1.jpg')}}" alt="">
                </div>
                <div class="inline-block">
                    <h5 class="no-margin"> Welcome </h5>
                    <h4 class="no-margin"> {{Auth()->user()->name}} </h4>
                    <a class="btn user-options sb_toggle">
                        <i class="fa fa-cog"></i>
                    </a>
                </div>
            </div>
            <!-- start: MAIN NAVIGATION MENU -->
            <ul class="main-navigation-menu">

                <li class="{{Request::is('/') ?'active open' :' '}} ">
                    <a href="#"><i class="fa fa-home"></i> <span class="title"> Dashboard </span>
                        <!-- <span class="label label-default pull-right ">LABEL</span>  --></a>
                </li>
                <li class="{{Request::is('dashboard/users*') ?'active open' :' '}}">
                    <a href="{{url('dashboard/users')}}">
                        <i class="fa fa-user"></i>
                        <span class="title"> Users </span>
                    </a>
                </li>
                <li class="{{Request::is('dashboard/terms*') ?'active open' :' '}}">
                    <a href="{{url('dashboard/terms')}}">
                        <i class="fa fa-user"></i>
                        <span class="title"> Terms </span>
                    </a>
                </li>
                 <li class="{{Request::is('dashboard/subscribes*') ?'active open' :' '}}">
                    <a href="{{url('dashboard/subscribes')}}">
                        <i class="fa fa-user"></i>
                        <span class="title"> Finance </span>
                    </a>
                </li>

                <li class="{{Request::is('dashboard/appointment*') ?'active open' :' '}}">
                    <a href="{{url('dashboard/appointment')}}">
                        <i class="fa fa-user"></i>
                        <span class="title"> Appointments </span>
                    </a>
                </li>


                <li class="@if(Request::is('dashboard/methods*') OR Request::is('dashboard/stations*')) active open @endif">
                    <a href="javascript:;"
                       class=" @if(Request::is('dashboard/methods*') OR Request::is('dashboard/stations*')) active open @endif">
                        <i class="fa fa-cog"></i>
                        Setup <i class="icon-arrow"></i>
                    </a>
                    <ul class="sub-menu   @if(Request::is('dashboard/methods*') OR Request::is('dashboard/stations*')) active open @endif">
                        <li class="{{Request::is('dashboard/methods*') ?'active open' :' '}}">
                            <a href="{{url('dashboard/methods')}}">
                                <i class="fa fa-money"></i>
                                <span class="title"> payment Method </span>
                            </a>
                        </li>
                        <li class="{{Request::is('dashboard/stations*') ?'active open' :' '}}">
                            <a href="{{url('dashboard/stations')}}">
                                <i class="fa fa-bus"></i>
                                <span class="title"> stations </span>
                            </a>
                        </li>
                        <li class="{{Request::is('dashboard/check_in_daily*') ?'active open' :' '}}">
                            <a href="{{url('dashboard/check_in_daily')}}">
                                <i class="fa fa-bus"></i>
                                <span class="title"> daily date  </span>
                            </a>
                        </li>
                        <li class="{{Request::is('dashboard/check_in_answer*') ?'active open' :' '}}">
                            <a href="{{url('dashboard/check_in_answer')}}">
                                <i class="fa fa-bus"></i>
                                <span class="title"> daily answers  </span>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
            <!-- end: MAIN NAVIGATION MENU -->
        </div>
        <!-- end: SIDEBAR -->
    </div>
    <div class="slide-tools">
        <div class="col-xs-6 text-left no-padding">
            <a class="btn btn-sm status" href="#">
                Status <i class="fa fa-dot-circle-o text-green"></i> <span>Online</span>
            </a>
        </div>
        <div class="col-xs-6 text-right no-padding">
            <a class="btn btn-sm log-out text-right" href="{{url('logout')}}">
                <i class="fa fa-power-off"></i> Log Out
            </a>
        </div>
    </div>
</nav>
