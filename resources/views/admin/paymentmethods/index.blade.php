@extends('admin.layout.index');
@section('title')

    payment methods
@endsection

@section('content')



    <!-- start: PAGE HEADER -->
    <!-- start: TOOLBAR -->
    <div class="toolbar row">
        <div class="col-sm-6 hidden-xs">
            <div class="page-header">
                <h1>Payment Methods <small>Index &amp; Details </small></h1>
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
                        <a class="inline-open" href="#addpayment">
                            <i class="fa fa-plus"></i> Add method
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
                    <a href="{{url('/')}}">
                        Home
                    </a>
                </li>
                <li class="active">
                    Payment Methods
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
                    <h4 class="panel-title"><span class="text-bold">Payment Methods</span></h4>
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


                <!-- START: Add Payment  -->
                <div class="inline-form1 {{$errors->any() ? 'opened' : 'closed'}}" style="style="overflow: scroll">
                    <div class="col-md-11">
                        <h3>Add new methode</h3>
                        <form action="{{route('methods.store')}}" method="post">
                            <div class="form-group">
                                {{csrf_field()}}
                                {{method_field('post')}}
                                <div class="row">
                                    <label class="col-sm-2 control-label" for="">
                                        Name
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                               name="name" placeholder="Enter the name of methods"
                                               value="{{old('name')}}" required>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label" for="">
                                        price
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="number" step="any" class="form-control" name="prices"
                                               placeholder="Enter the price"
                                               value="{{old('prices')}}" required>
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
                                            <a href="#" class="btn btn-info inline-close">
                                                Close
                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-info ">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            @if(count($methods)> 0)
                <!-- START: Payment Index Table -->
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>code</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($methods as $index=>$method)
                            <tr>
                                <td>{{$index +1}}</td>
                                <td> {{$method->name}} </td>
                                <td>{{$method->prices}} LE</td>
                                <td class="center">
                                    <div class="btn-group">
                                        <a href="#" class="dotsrow dropdown-toggle"
                                           data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <form id="formSubmit"
                                                      action="{{ route('methods.destroy',$method->setting_id) }}"
                                                      method="post" style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}

                                                </form>
                                                <a href="" class=" delete123 "><i class="fa fa-trash"></i> delete</a>

                                            </li>
                                            <li>
                                                <a href="{{route('methods.edit',$method->setting_id)}}"
                                                   class="inline-open"><i
                                                        class="fa fa-edit"></i>Edit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                @else
                    <h2 class="center">oops.... no methods-you should add new methods </h2>
                @endif

            </div>
        </div>
        <!-- end: TEXT FIELDS PANEL -->
    </div>
    </div>
    <!-- end: PAGE CONTENT-->
    </div>

@endsection
