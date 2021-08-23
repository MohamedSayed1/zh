@extends('admin.layout.index')

@section('title')
    Terms
@endsection

@section('content')
    <!-- start: PAGE HEADER -->
    <!-- start: TOOLBAR -->
    <div class="toolbar row">
        <div class="col-sm-6 hidden-xs">
            <div class="page-header">
                <h1>Term <small>Index &amp; Details </small></h1>
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
                        <a class="inline-open" href="#addTerm">
                            <i class="fa fa-plus"></i> Add Term
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
                    Term
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
                    <h4 class="panel-title"><span class="text-bold">Term</span></h4>
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


                <!-- Start: Add New Term Form -->
                <div class="inline-form1 {{$errors->any() ? 'opened' : 'closed'}}" style="overflow: scroll">
                    <div class="col-md-11">
                        <h3>Add new Term</h3>
                        <form action="{{url('dashboard/terms')}}" method="post">
                            <div class="form-group">
                                {{csrf_field()}}
                                {{method_field('post')}}
                                <div class="row">
                                    <label class="col-sm-2 control-label" for="">
                                        Name
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                               name="name" placeholder="Enter the name of term" value="{{old('name')}}"
                                               required>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label" for="">
                                        Start Date
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="start_date"
                                               placeholder="Enter the start date of the term"
                                               value="{{old('start_date')}}" required>
                                        @error('start_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label" for="">
                                        End Date
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="end_date"
                                               placeholder="Enter the end date of the term"
                                               value="{{old('end_date')}}" required>
                                        @error('end_date')
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


                <!-- Start: Term search -->
                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="">
                                    Start Date
                                </label>
                                <div class="col-sm-4">
                                    <input type="date" placeholder="User Code" class="form-control">
                                </div>
                                <label class="col-sm-2 control-label" for="">
                                    End Date
                                </label>
                                <div class="col-sm-4">
                                    <input type="date" placeholder="User Code" class="form-control">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            @if(count($terms)>0)
                <!-- Start: Term Index Table -->
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>code</th>
                            <th>Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
{{--                            <th>Morning Time</th>--}}
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($terms as $index=>$term)
                            <tr>
                                <td>{{$index +1}}</td>
                                <td>{{$term->name}}</td>
                                <td>{{$term->start_date}}</td>
                                <td>{{$term->end_date}}</td>
                                <td>{{$term->status == 1 ? 'active' : 'not_active'}}</td>
{{--                                <td>{{$term->morning_time}} AM</td>--}}
                                <td class="center">
                                    <div class="btn-group">
                                        <a href="#" class="dotsrow dropdown-toggle"
                                           data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                        <ul class="dropdown-menu" role="menu">

                                         

                                            <li>
                                                <a href="{{route('terms.edit',$term->term_id)}}"
                                                   class="inline-open ">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </a>
                                            </li>

                                            <li>
                                                <a onclick="return confirm('It will be converted to active and Buffy will be converted to inactive ?')"  href="{{url('dashboard/terms/updated/to/active/'.$term->term_id)}}">
                                                    <i class="fa fa-plus"></i>
                                                   to Active
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </td>

                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                @else
                <hr/>
                    <h2 class="center">oops....no terms-add new term</h2>
                @endif
            </div>
        </div>
        <!-- end: TEXT FIELDS PANEL -->
    </div>


@endsection

@section('script')


{{--    <script>--}}


{{--        $(document).ready(function () {--}}


{{--            $('.delete123').click(function (e) {--}}
{{--                var that = $('#formSubmit')--}}
{{--                e.preventDefault();--}}
{{--                Swal.fire({--}}
{{--                    icon: 'warning',--}}
{{--                    text: 'Do you want to delete this?',--}}
{{--                    showCancelButton: true,--}}
{{--                    confirmButtonText: 'Delete',--}}
{{--                    confirmButtonColor: '#e3342f',--}}
{{--                }).then((result) => {--}}
{{--                    if (result.isConfirmed) {--}}
{{--                        that.closest('form').submit();--}}
{{--                    }--}}
{{--                });--}}

{{--            })--}}
{{--        })--}}
{{--    </script>--}}

@endsection


