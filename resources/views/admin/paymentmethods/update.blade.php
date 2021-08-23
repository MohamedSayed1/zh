@extends('admin.layout.index')

@section('title')
   payment settings - updated
@endsection

@section('content')

    <!-- start: TOOLBAR -->
    <div class="toolbar row">
        <div class="col-sm-6 hidden-xs">
            <div class="page-header">
                <h1>Stations
                    <small>updated info</small>
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
                    <a href="{{url('/')}}">
                        Home
                    </a>
                </li>
                <li class="active">
                    methods - updated
                </li>
            </ol>
        </div>
    </div>
    <!-- end: BREADCRUMB -->
    <!-- start: PAGE CONTENT -->
    <div class="row">
        <div class="col-sm-12">
            <!-- start: TEXT FIELDS PANEL -->
            <div class="panel panel-white table-panel" style="zoom: 1; overflow: scroll">
                <div class="panel-heading">
                    <h4 class="panel-title"><span class="text-bold">methods</span></h4>
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


                <!-- START: update Term   -->

                <!-- Start: update  Term Form -->
                <div class="inline-form1  opened" style="overflow: scroll">
                    <div class="col-md-11">
                        <h3>update method</h3>
                        <form action="{{route('methods.update')}}" method="post">
                            <div class="form-group">

                                {{csrf_field()}}
                                {{method_field('post')}}

                                <input type="hidden" name="setting_id" value="{{$method->setting_id}}">


                                <div class="row">
                                    <label class="col-sm-2 control-label" for="">
                                        Name
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                               name="name" placeholder="Enter the name of method"
                                               value="{{old('name')!= null ? old('name') : $method->name}}" required>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label" for="">
                                       price
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="number" step="any" class="form-control" name="prices"
                                               placeholder="Enter the price "
                                               value="{{old('prices')!= null ? old('prices') : $method->prices}}" required>
                                        @error('prices')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>


                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <div class="btn-group">
                                            <a href="{{url('dashboard/methods')}}" class="btn btn-info inline-close">
                                                back
                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-info ">
                                                save
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
        <!-- end: TEXT FIELDS PANEL -->
    </div>

@endsection
