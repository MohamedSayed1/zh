@extends('admin.layout.index')

@section('title')
    subscribe
@endsection

@section('css')

@endsection
@section('content')
    <!-- start: PAGE HEADER -->
    <!-- start: TOOLBAR -->
    <div class="toolbar row">
        <div class="col-sm-6 hidden-xs">
            <div class="page-header">
                <h1>Subscribe Details <small>Subscribe &amp; Details </small></h1>
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
                    <a href="{{url('dashboard/users')}}">
                        Home
                    </a>
                </li>
                <li class="active">
                    Subscribe Details
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
                    <h4 class="panel-title"><span class="text-bold danger">Subscribe Details</span></h4>
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


                <!-- Start: Add New subscribe Form -->


            {{--                            */******************************************************--}}

            @if(count($subscribes)>0)
                <!-- Start: subscribe Index Table -->
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th class="center">code</th>
                            <th class="center">student</th>
                            <th class="center">payment setting</th>
                            <th class="center">cost</th>
                            <th class="center">paid</th>
                            <th class="center">unpaid</th>
                            <th class="center">paid_percentage</th>
                            <th class="center">received by</th>
                            <th class="center">term</th>
                            <th class="center">next_paid</th>
                            <th class="center">note</th>
                            <th class="center">status</th>
                           
                            <th class="center">action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($subscribes as $index=>$subscribe)
                            <tr >
                                <td class="center">{{$subscribe->user->code}}</td>
                                <td class="center">{{$subscribe->user->name}}</td>
                                <td class="center">{{$subscribe->paymentSetting->name}}</td>
                                <td class="center">{{$subscribe->total}} LE</td>
                                <td class="center">{{$subscribe->paid}} LE</td>

                                <td class="center">{{$subscribe->unpaid}} LE</td>
                                <td class="center">{{$subscribe->paid_percentage}} %</td>
                                <td class="center">{{$subscribe->user2->name}}</td>
                                <td class="center">{{$subscribe->term->name}}</td>
                                <td class="center">{{$subscribe->next_payment_date}}</td>
                                <td class="center">{{$subscribe->note}}</td>
                                @if($subscribe->status == 0)
                                    <td class="text-success">مدفوعة</td>
                                @elseif($subscribe->status == 1)
                                    <td class="text-danger">غير مدفوعة</td>
                                @else
                                    <td class="text-danger">****</td>
                                @endif
                               

                                <td class="center">
                                    <div class="btn-group">
                                        <a href="#" class="dotsrow dropdown-toggle"
                                           data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            @if($subscribe->status == 0)
                                                <li>
                                                    <a href="{{route('subscribe.edit',$subscribe->id)}}"
                                                       class="inline-open ">
                                                        <i class="fa fa-edit"></i>
                                                        Edit
                                                    </a>
                                                </li>

                                            @else
                                                <li>
                                                    <a href="{{route('subscribe.installment',$subscribe->id)}}">
                                                        <i class="fa fa-plus"></i>
                                                        pay in installments
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('subscribe.edit',$subscribe->id)}}"
                                                       class="inline-open ">
                                                        <i class="fa fa-edit"></i>
                                                        Edit
                                                    </a>
                                                </li>


                                            @endif


                                            <li>
                                                <form id="formSubmit"
                                                      action="{{ route('subscribe.destroy',$subscribe->id) }}"
                                                      method="post" style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}

                                                </form>
                                                <a href="" class=" delete123 "><i class="fa fa-trash"></i> delete</a>

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
                    <h2 class="center">oops....Empty. add new subscribes</h2>
            @endif
                <br><br><br><br>

            <!-- start: TEXT FIELDS PANEL -->
                <div class="panel panel-white table-panel" style="zoom: 1; overflow: scroll">
                    <div class="panel-heading">
                        <h4 class="panel-title"><span class="text-bold danger" >Installment_Details</span></h4>
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


                    <!-- Start: Add New subscribe Form -->

                @if(count($installments)>0)
                    <!-- Start: subscribe Index Table -->
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th class="center">code</th>
                                <th class="center">student</th>
                                <th class="center">pay_dept</th>
                                <th class="center">received by</th>
                                <th class="center">created_at</th>


                            </tr>
                            </thead>
                            <tbody>

                            @foreach($installments as $index=>$installment)
                                <tr>
                                    <td class="center">{{$index + 1}}</td>
                                    <td class="center">{{$installment->subscribe->user->name}}</td>
                                    <td class="center">{{$installment->pay_debt}} LE</td>
                                    <td class="center">{{$installment->user->name}}</td>
                                    <td class="center">{{$installment->created_at}} </td>


                                </tr>


                            @endforeach


                            </tbody>
                        </table>
                    @else
                        <hr/>
                        <h2 class="center">oops....Empty. add new subscribes</h2>
                    @endif



                </div>
                <!-- end: TEXT FIELDS PANEL -->
            </div>


        </div>
                <!-- end: TEXT FIELDS PANEL -->
            </div>





@endsection




