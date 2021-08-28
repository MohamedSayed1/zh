@extends('admin.layout.index')

@section('title')
    Appointment - updated
@endsection

@section('content')

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

        <!-- ******************************************************************************************************************************************************************************************** -->

        <!-- start: PAGE HEADER -->
        <!-- start: TOOLBAR -->
        <div class="toolbar row">
            <div class="col-sm-6 hidden-xs">
                <div class="page-header">
                    <h1>Appointments <small>Updated</small></h1>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <a href="#" class="back-subviews">
                    <i class="fa fa-chevron-left"></i> BACK
                </a>
                <a href="#" class="close-subviews">
                    <i class="fa fa-times"></i> CLOSE
                </a>
                <div class="toolbar-tools pull-right">
                    <!-- start: TOP NAVIGATION MENU -->
                    <ul class="nav navbar-right">
                        <!-- start: TO-DO DROPDOWN -->
                        <li class="dropdown">
                            <a href="{{url('dashboard/appointment')}}">
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
                        <a href="#">
                            Home
                        </a>
                    </li>
                    <li class="active">
                        Appointments - updated
                    </li>
                </ol>
            </div>
        </div>
        <!-- end: BREADCRUMB -->
        <!-- start: PAGE CONTENT -->
        <div class="row">
            <div class="col-sm-12">
                <!-- start: TEXT FIELDS PANEL -->
                <div class="panel panel-white table-panel" style="zoom: 1;overflow: scroll">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <span class="text-bold">Appointments</span></h4>
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

                    <!-- START: Add Daily  -->
                    <div class="inline-form1 opened " style="overflow: scroll">
                        <div class="col-md-11">
                            <form method="post" action="{{url('dashboard/appointment/updated')}}">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2 control-label" for="">
                                            Date
                                        </label>
                                        <div class="col-sm-4">
                                            <input type="date" value="{{old('date')!=null ?old('date'):$app->date}}" name="date" class="form-control" required>
                                        </div>
                                        @if ($errors->has('date'))
                                            <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('date') }}</strong>
                                        </span>
                                        @endif
                                        <label class="col-sm-2 control-label" for="">
                                            Time
                                        </label>
                                        <div class="col-sm-4">
                                            <input type="time" value="{{old('time')!=null ?old('time'):$app->time}}" name="time" class="form-control" required>
                                            @if ($errors->has('time'))
                                                <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('time') }}</strong>
                                        </span>
                                            @endif

                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2 control-label" for="">
                                            Status
                                        </label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="status">
                                                <option value="1"
                                                        @if(old('status')!= null)
                                                        {{old('status')==1?'selected':' ' }}
                                                        @else
                                                            {{$app->status  == 1?'selected':' '  }}
                                                        @endif

                                                >
                                                    Active
                                                </option>
                                                <option value="0"
                                                @if(old('status')!= null)
                                                    {{old('status')==0?'selected':' ' }}
                                                        @else
                                                    {{$app->status  == 0?'selected':' '  }}
                                                        @endif
                                                >
                                                    In Active
                                                </option>
                                            </select>
                                        </div>

                                        <label class="col-sm-2 control-label" for="">
                                            to Student
                                        </label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="to_student">
                                                <option value="1"
                                                @if(old('to_student')!= null)
                                                    {{old('to_student')==1?'selected':' ' }}
                                                        @else
                                                    {{$app->to_student  == 1?'selected':' '  }}
                                                        @endif

                                                >
                                                    yes
                                                </option>
                                                <option value="0"
                                                @if(old('to_student')!= null)
                                                    {{old('to_student')==0?'selected':' ' }}
                                                        @else
                                                    {{$app->to_student  == 0?'selected':' '  }}
                                                        @endif

                                                >
                                                    no
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="id" value="{{$app->app_id}}">

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <div class="btn-group">
                                                <button class="btn btn-info">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- START: Daily Index ACCORDION -->
                    <!-- start: ACCORDION PANEL -->
                    <!-- end: ACCORDION PANEL -->
                </div>
            </div>
            <!-- end: TEXT FIELDS PANEL -->
        </div>
    </div>
    <!-- end: PAGE CONTENT-->

@endsection