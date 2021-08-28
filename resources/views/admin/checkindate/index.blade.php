@extends('admin.layout.index')

@section('title')
    Time Of trip
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
                    <h1>Time Of trip <small>Index &amp; Details </small></h1>
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
                            <a class="inline-open" href="#addDaily">
                                <i class="fa fa-plus"></i> Add
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
                        <a href="Index.html">
                            Home
                        </a>
                    </li>
                    <li class="active">
                        Appointments
                    </li>
                </ol>
            </div>
        </div>
        <!-- end: BREADCRUMB -->
        <!-- start: PAGE CONTENT -->
        <div class="row">
            <div class="col-sm-12">
                <!-- start: TEXT FIELDS PANEL -->
                <div class="panel panel-white table-panel" style="zoom: 1;overflow: scroll;">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <span class="text-bold">Time Of trips</span></h4>
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
                    <div class="inline-form1 {{isset($errors) && count($errors) >0 ?'opened':'closed'}}" style="overflow: scroll">
                        <div class="col-md-11">
                            <form method="post" action="{{url('dashboard/check_in_daily')}}">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2 control-label" for="">
                                            Date
                                        </label>
                                        <div class="col-sm-4">
                                            <input type="date" value="{{old('date')}}" name="date" class="form-control" required>
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
                                            <input type="time" value="{{old('time')}}" name="time" class="form-control" required>
                                        </div>
                                        @if ($errors->has('time'))
                                            <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('time') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2 control-label" for="">
                                            Status
                                        </label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="status">
                                                <option value="1" {{old('status')!= null && old('status')==1?'selected':' ' }} >
                                                    Active
                                                </option>
                                                <option value="0" {{old('status')!= null && old('status')==0?'selected':' ' }}>
                                                    In Active
                                                </option>
                                            </select>
                                        </div>

                                        <label class="col-sm-2 control-label" for="">
                                            repetition amount
                                        </label>
                                        <div class="col-sm-4">
                                            <input type="number" name="count" placeholder="repetition amount"
                                                   class="form-control" value="{{old('count')}}">
                                        </div>
                                    </div>
                                </div>




                                <input type="hidden" name="_token" value="{{csrf_token()}}">

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
                    <div>
                        <div class="panel-group accordion" id="accordion">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h5 class="panel-title">
                                       </h5>
                                </div>
                                    <div class="panel-body">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th>date</th>
                                                <th>time</th>
                                                <th>Status</th>

                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($checkDates))
                                                @foreach($checkDates as $checkDate)
                                            <tr>
                                                <td>{{$checkDate->date}}</td>
                                                <td>{{Carbon\Carbon::parse($checkDate->time)->format('h:i A')}}</td>
                                                <td>{{$checkDate->status == 1 ?'Active' :'In Active'}}</td>

                                                <td>
                                                    <div class="btn-group">
{{--                                                        <a href="{{url('dashboard/appointment/updated/'.$checkDate->app_id)}}">--}}
                                                        <a href="#">
                                                        <button class="btn btn-info">
                                                            تعديل
                                                        </button>
                                                        </a>
                                                    </div>
{{--                                                    <div class="btn-group">--}}
{{--                                                        <button class="btn btn-info">--}}
{{--                                                            تقارير--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
                                                </td>
                                            </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                        <ul class="pagination pagination-blue margin-bottom-10">


                                            {{$checkDates ? $checkDates->links():''}}
                                        </ul>

                                    </div>

                            </div>
                        </div>
                    </div>
                    <!-- end: ACCORDION PANEL -->

                </div>
            </div>
            <!-- end: TEXT FIELDS PANEL -->
        </div>
    </div>
    <!-- end: PAGE CONTENT-->

@endsection
