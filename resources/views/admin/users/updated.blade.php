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
                    <small>updated</small>
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
                    updated
                </li>
            </ol>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-12">
            <!-- start: TEXT FIELDS PANEL -->
            <div class="panel panel-white table-panel" style="zoom: 1;">
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
                    <div class="row">
                        <div class="col-md-11">
                            <div class="noteWrap opened  col-md-11">

                                <form method="post" action="{{url('dashboard/users/updated')}}">

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label" for="">
                                                id
                                            </label>
                                            <div class="col-sm-4">
                                                <input type="text" placeholder="code" name="code"
                                                       value="{{old('code')!=null?old('code'):$user->code}}" class="form-control" required>

                                                @if ($errors->has('code'))
                                                    <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('code') }}</strong>
                                        </span>
                                                @endif

                                            </div>


                                            <label class="col-sm-2 control-label" for="">
                                                Name
                                            </label>
                                            <div class="col-sm-4">
                                                <input type="text" placeholder="Name" name="name"
                                                       value="{{old('name')!=null?old('name'):$user->name}}" class="form-control" required>

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        </span>
                                                @endif

                                            </div>


                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label" for="">
                                                Station
                                            </label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="station">
                                                    @if(isset($stations))
                                                        @foreach($stations as $station)
                                                            <option value="{{$station->id}}"
                                                                    @if(old('station') != null)
                                                                     {{old('station') ==$station->id?'selected':'' }}
                                                                    @else
                                                                      {{$user->station_id ==$station->id?'selected':'' }}
                                                                    @endif
                                                            >
                                                                {{$station->name}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            @if(Auth()->user()->group_id == 1)
                                            <label class="col-sm-2 control-label" for="">
                                                Groupe
                                            </label>
                                            <div class="col-sm-4">
                                                <select name="group" class="form-control">
                                                    @if(isset($groups))
                                                        @foreach($groups as $grou)
                                                            <option value="{{$grou->id}}"
                                                                    @if(old('group') != null)
                                                                    {{old('group') ==$grou->id?'selected':'' }}
                                                                    @else
                                                                        {{$user->group_id ==$grou->id?'selected':'' }}
                                                                    @endif
                                                            >
                                                                {{$grou->name}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            @endif


                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">


                                            <label class="col-sm-2 control-label" for="">
                                                Phone
                                            </label>
                                            <div class="col-sm-4">
                                                <input type="text" placeholder="Phone" name="phone"
                                                       value="{{old('phone')!=null?old('phone'):$user->phone}}" class="form-control" required>
                                                @if ($errors->has('phone'))
                                                    <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                        </span>
                                                @endif
                                            </div>

                                            <label class="col-sm-2 control-label" for="">
                                                parent phone
                                            </label>
                                            <div class="col-sm-4">
                                                <input type="text" placeholder="parent phone" name="parent_phone"
                                                       value="{{old('parent_phone')!= null?old('parent_phone'):$user->parent_phone}}" class="form-control">
                                                @if ($errors->has('parent_phone'))
                                                    <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('parent_phone') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">


                                            <label class="col-sm-2 control-label" for="">
                                                Fucilty
                                            </label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="faculty">
                                                    @if(isset($faclitys))
                                                        @foreach($faclitys as $key => $value)
                                                            <option value="{{$key}}"
                                                            @if(old('faculty') != null)
                                                                {{old('faculty') == $key ?'selected':'' }}
                                                                    @else
                                                                {{$user->faculty == $key ?'selected':'' }}
                                                                    @endif
                                                            >
                                                                {{$value}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>

                                                @if ($errors->has('faculty'))
                                                    <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('faculty') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                            <label class="col-sm-2 control-label" for="">
                                                Educate Level
                                            </label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="educational_level">
                                                    @if(isset($levels))
                                                        @foreach($levels as $key => $value)
                                                            <option value="{{$key}}"
                                                            @if(old('educational_level') != null)
                                                                {{old('educational_level') ==$key?'selected':'' }}
                                                                    @else
                                                                {{$user->educational_level ==
                                                                $key?'selected':'' }}
                                                                    @endif
                                                            >
                                                                {{$value}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>

                                                @if ($errors->has('educational_level'))
                                                    <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('educational_level') }}</strong>
                                        </span>
                                                @endif
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label" for="">
                                                Groupe
                                            </label>
                                            <div class="col-sm-4">
                                                <select name="active" class="form-control">
                                                            <option value="1"
                                                            @if(old('active') != null)
                                                                {{old('active') ==1?'selected':'' }}
                                                                    @else
                                                                {{$user->is_active ==1?'selected':'' }}
                                                                    @endif
                                                            >
                                                               Active
                                                            </option>
                                                    <option value="0"
                                                            @if(old('active') != null)
                                                                {{old('active') ==0?'selected':'' }}
                                                                    @else
                                                                {{$user->is_active ==0?'selected':'' }}
                                                                    @endif
                                                            >
                                                              unActive
                                                            </option>


                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label" for="">
                                                Note
                                            </label>
                                            <div class="col-sm-10">
                                <textarea  placeholder="Note" name="note"
                                           class="form-control">{{old('note')!=null?old('note'):$user->notes}}

                                </textarea>
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