@extends('admin.layout.index')

@section('title')
    Installment - add
@endsection

@section('content')

    <!-- start: TOOLBAR -->
    <div class="toolbar row">
        <div class="col-sm-6 hidden-xs">
            <div class="page-header">
                <h1>Stations
                    <small>add info</small>
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
                    Installment New -{{$subscribe->user->name}} - code {{$subscribe->user->code}}
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
                    <h4 class="panel-title"><span class="text-bold">Installment</span></h4>
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


                <!-- START: update subscription   -->

                <!-- Start: update  subscription Form -->
                <div class="inline-form1  opened" style="overflow: scroll">
                    <div class="col-md-11">
                        <h3>Installment New -{{$subscribe->user->name}} - code:   {{$subscribe->user->code}}</h3>

                        <br> <br>

                        <form action="{{route('subscribe.installment.store')}}" method="post">
                            <div class="form-group">
                                {{csrf_field()}}
                                {{method_field('post')}}
                                <input type="hidden" name="id" value="{{$subscribe->id}}">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2 control-label" for="">
                                            Add New Payment (Installment)
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="number" step="any" id="pay_debt" class="form-control" name="pay_debt"

                                                   value="{{old('pay_debt')??0}}" required  oninput="changeInformation()" >
                                            @error('pay_debt')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 control-label" for="">
                                        Student
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                                placeholder="" value="{{$subscribe->user->name}}"
                                               required readonly>

                                    </div>

                                    <label class="col-sm-2 control-label" for="">
                                        Payment settings
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                                placeholder="" value="{{$subscribe->paymentSetting->name}}"
                                                readonly>

                                    </div>


                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label" for="">
                                        Cost
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="number"  step="any" class="form-control"

                                               value="{{$subscribe->total}}"  readonly>

                                    </div>

                                    <label class="col-sm-2 control-label" for="">
                                        term
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text"  class="form-control"

                                               value=" {{$subscribe->term->name}}"  readonly>

                                    </div>



                                </div>
                            </div>
                            {{--                            kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk--}}
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label" for="">
                                        current paid
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="number" step="any"  class="form-control"

                                               value="{{ $subscribe->paid}}"   readonly >

                                    </div>

                                    <label class="col-sm-2 control-label" for="">
                                        Next payment date
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="date"  class="form-control" name="next_payment_date"

                                               value="{{old('next_payment_date')!= null ? old('next_payment_date') : $subscribe->next_payment_date}}"  >
                                        @error('next_payment_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label" for="">
                                        NON-Paid
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="number" step="any"  class="form-control"

                                               value="{{ $subscribe->unpaid}}"  readonly>

                                    </div>

                                    <label class="col-sm-2 control-label" for="">
                                        paid_percentage_(%)
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text"  id="paid_percentage" class="form-control"

                                               value="{{$subscribe->paid_percentage}}"  readonly>

                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label" for="">
                                        Note
                                    </label>
                                    <div class="col-sm-10">
                                          <textarea placeholder="Note" name="note"
                                                    class="form-control">
                                            {{old('note')!= null ? old('note') : $subscribe->note}}
                                        </textarea>

                                        @error('note')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <div class="btn-group">
                                            <a href="{{route('subscribe')}}" class="btn btn-info inline-close">
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
                        {{--                        /*********************************************************************************/--}}
                        {{--                        /*********************************************************************************/--}}
                        {{--                        /*********************************************************************************/--}}
                        {{--                        /*********************************************************************************/--}}

                    </div>
                </div>


            </div>
        </div>
        <!-- end: TEXT FIELDS PANEL -->
    </div>

@endsection

@section('script')
{{--    <script>--}}

{{--        function changeInformation() {--}}

{{--            var Total = parseFloat(document.getElementById("total").value);--}}
{{--            var Paid = parseFloat(document.getElementById("paid").value);--}}

{{--            var NOT_PAID = Total - Paid;--}}



{{--            if (typeof NOT_PAID === 'undefined'  ) {--}}

{{--                alert('برجاء ادخال دفعه من الاشتراك ');--}}

{{--            } else {--}}
{{--                var paidPercentage = (Paid / Total) * 100;--}}

{{--                non_paid = parseFloat(NOT_PAID).toFixed(2);--}}

{{--                document.getElementById("unpaid").value = non_paid;--}}

{{--                document.getElementById("paid_percentage").value = parseFloat(paidPercentage);--}}

{{--            }--}}

{{--        }--}}

{{--    </script>--}}


@endsection
