@extends('admin.layout.index')

@section('title')
    user - updated
@endsection

@section('content')


    <!-- start: TOOLBAR -->
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

    <div class="toolbar row">
        <div class="col-sm-6 hidden-xs">
            <div class="page-header">
                <h1>Users
                    <small>updated password</small>
                </h1>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">

            <div class="toolbar-tools pull-right">
                <!-- start: TOP NAVIGATION MENU -->
                <ul class="nav navbar-right">
                    <!-- start: TO-DO DROPDOWN -->
                    <li class="dropdown">
                        <a href="{{url('dashboard/users')}}" class="close-subviews">
                            <i class="fa fa-chevron-left"></i> BACK
                        </a>
                    </li>

                </ul>
                <!-- end: TOP NAVIGATION MENU -->
            </div>
        </div>
    </div>
    <!-- end: TOOLBAR -->
    <!-- end: PAGE HEADER -->
    <!-- start: BREADCRUMB -->
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/dashboard')}}">
                        Home
                    </a>
                </li>
                <li class="active">
                    Users
                </li>
                <li class="active">
                    updated passowrd
                </li>
            </ol>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-12">
            <!-- start: TEXT FIELDS PANEL -->
            <div class="panel panel-white table-panel" style="zoom: 1;overflow: scroll">
                <div class="panel-heading">
                    <h4 class="panel-title"><span class="text-bold">updated info</span></h4>
                    <div class="panel-tools">
                        <div class="dropdown">
                            <a data-toggle="dropdown"
                               class="btn btn-xs dropdown-toggle btn-transparent-grey"
                               aria-expanded="false">
                                <i class="fa fa-cog"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-light pull-right" role="menu"
                                style="display: none;">
                                <li>
                                    <a class="panel-collapse collapses" href="#"><i
                                                class="fa fa-angle-up"></i> <span>Collapse</span> </a>
                                </li>
                                <li>
                                    <a class="panel-expand" href="#">
                                        <i class="fa fa-expand"></i> <span>Fullscreen</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <a class="btn btn-xs btn-link panel-close" href="#">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <div class="row" >
                        <div class="col-md-11">
                            <div class="noteWrap opened  col-md-11" style="overflow: scroll">

                                <form method="post" action="{{url('dashboard/users/change/password')}}">

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label" for="">
                                                password
                                            </label>
                                            <div class="col-sm-4">
                                                <input type="password" placeholder="password" name="password"
                                                       value="{{old('password')}}" class="form-control" required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                        </span>
                                                @endif

                                            </div>


                                            <label class="col-sm-2 control-label" for="">
                                                password confirmation
                                            </label>
                                            <div class="col-sm-4">
                                                <input type="password" placeholder="password confirmation" name="password_confirmation"
                                                       value="{{old('password_confirmation')}}" class="form-control" required>

                                                @if ($errors->has('password_confirmation'))
                                                    <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                                @endif

                                            </div>


                                        </div>
                                    </div>

                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="id" value="{{$user->id}}">


                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                <div class="btn-group">
                                                    <a href="{{url('dashboard/users')}}" class="btn btn-info inline-close">
                                                        back
                                                    </a>
                                                </div>
                                                <div class="btn-group">
                                                    <button type="submit" class="btn btn-info">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>



@endsection