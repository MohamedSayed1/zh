@extends('admin.layout.index')

@section('title')
    user
@endsection

@section('content')

    <!-- start: PAGE HEADER -->
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
                    <small>Index &amp; Details</small>
                </h1>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="toolbar-tools pull-right">
                <!-- start: TOP NAVIGATION MENU -->
                <ul class="nav navbar-right">
                    <!-- start: TO-DO DROPDOWN -->
                    <li class="dropdown">
                        <a href="{{url('dashboard/users/add')}}">
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
                    Users
                </li>
            </ol>
        </div>
    </div>
    <!-- end: BREADCRUMB -->
    <!-- start: PAGE CONTENT -->
    <div class="row">

        <div class="col-sm-12">
            <!-- start: TEXT FIELDS PANEL -->
            <div class="panel panel-white table-panel" style="zoom: 1;">
                <div class="panel-heading">
                    <h4 class="panel-title"><span class="text-bold">Users</span></h4>
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


                <!-- Start:  User Search -->
                <div class="panel-body">
                    <form method="post" action="{{url('dashboard/users')}}">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="">
                                    id
                                </label>
                                <div class="col-sm-4">
                                    <input type="text" placeholder="User Code" class="form-control" name="code"
                                           value="{{app('request')->input('code')}}">
                                </div>
                                <label class="col-sm-2 control-label" for="">
                                    Station
                                </label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="station">
                                        <option value="" {{app('request')->input('station') == null?'selected':' '}}>
                                            Select ---
                                        </option>
                                        @if(isset($stations))
                                            @foreach($stations as $station)
                                                <option value="{{$station->id}}"
                                                    {{app('request')->input('station') == $station->id?'selected':' '}}
                                                >{{$station->name}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="">
                                    Groups
                                </label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="group">
                                        <option value=""
                                            {{app('request')->input('group') == null?'selected':' '}}
                                        >Select ---
                                        </option>
                                        @if(isset($groups))
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}"
                                                    {{app('request')->input('group') == $group->id?'selected':' '}}
                                                >{{$group->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <label class="col-sm-2 control-label" for="">
                                    Name
                                </label>
                                <div class="col-sm-4">
                                    <input type="text" placeholder="Name" class="form-control" name="name"
                                           value="{{app('request')->input('name')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="btn-group">
                                        <button class="btn btn-info inline-close" type="submit">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <!-- Start Users Index Table -->
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>code</th>
                        <th>Name</th>
                        <th>Groupe</th>
                        <th>Status</th>
                        <th>Station</th>
                        <th>Fucilty</th>
                        <th>Educate Level</th>
                        <th>phone</th>
                        <th>parent phone</th>
                        <th class="center"><i class="fa fa-plus center">Add</i></th>
                        <th>notes</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($users))
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->code}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->getGroup->name}}</td>
                                <td>{{$user->is_active == 1 ?'Activate' :'unActive' }} </td>
                                <td>{{$user->getStations->name}}</td>
                                <td>{{$user->faculty}}</td>
                                <td>{{$user->educational_level}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->parent_phone}}</td>
                                <td>
                                    <div class="col-sm-1 center ">
                                        <div class="btn-group center">
                                            <a href="{{route('subscribe',$user->id)}}"
                                               class="btn btn-info btn-sm">
                                                <i class="fa fa-plus "></i> subscribe
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$user->notes}}</td>
                                <td class="center">
                                    @if(Auth()->user()->group_id == 2  && $user->group_id == 1)

                                    @else
                                    <div class="btn-group">
                                        <a href="#" class="dotsrow dropdown-toggle"
                                           data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{url('dashboard/users/updated/'.$user->id)}}"
                                                   class="new-note"><i
                                                        class="fa fa-edit"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="{{url('dashboard/users/change/password/'.$user->id)}}"><i
                                                        class="fa fa-ban"></i>updated Password</a>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
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
