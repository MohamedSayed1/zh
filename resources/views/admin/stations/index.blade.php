@extends('admin.layout.index')

@section('title')
    Stations
@endsection

@section('content')

    <!-- start: TOOLBAR -->
    <div class="toolbar row">
        <div class="col-sm-6 hidden-xs">
            <div class="page-header">
                <h1>Stations
                    <small>Index &amp; Details & add</small>
                </h1>
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
                        <a class="inline-open" href="#addStations">
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
                    <a href="{{url('/dashboard')}}">
                        Home
                    </a>
                </li>
                <li class="active">
                    Stations
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
                    <h4 class="panel-title"><span class="text-bold">Stations</span></h4>
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


                <!-- START: Add Station   -->
                <div class="inline-form1 {{$errors->has('name') ? 'opened' : 'closed'}}" style="overflow: scroll">
                    <div class="col-md-11">
                        <form action="{{url('dashboard/stations')}}" method="post">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label" for="">
                                        Station Name
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" name="name" class="form-control"
                                               placeholder="Enter Station Name"
                                               value="{{old('name')}}"
                                               required>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-info inline-close">
                                                Close
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


                <!-- START: Station Index Table -->
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>code</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($stations))
                        @foreach($stations as $station)
                            <tr>

                                <td>{{$station->id}}</td>
                                <td>{{$station->name}}</td>
                                <td class="center">
                                    <div class="btn-group">
                                        <a href="#" class="dotsrow dropdown-toggle"
                                           data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{url('dashboard/stations/updated/'.$station->id)}}" class="inline-open"><i
                                                            class="fa fa-edit"></i>Edit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>

                        @endforeach
                    @endif


                    </tbody>
                </table>

            </div>
        </div>
        <!-- end: TEXT FIELDS PANEL -->
    </div>

@endsection