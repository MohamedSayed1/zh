@extends('admin.layout.index')

@section('title')
    subscribe - updated
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
                    <a href="{{url('dashboard/users')}}">
                        Home
                    </a>
                </li>
                <li class="active">
                    Subscription - updated
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
                    <h4 class="panel-title"><span class="text-bold">Subscription</span></h4>
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
                        <h3>update subscription</h3>
                        <br>
                       {{--                        /*********************************************************************************/--}}
                        <form action="{{route('subscribe.update')}}" method="post">
                            <div class="form-group">
                                {{csrf_field()}}
                                {{method_field('post')}}
                                <input type="hidden" name="id" value="{{$subscribe->id}}">

                                <div class="row">
                                    <label class="col-sm-2 control-label" for="">
                                        Student
                                    </label>

                                    <div class="col-sm-4">
                                        <select class="form-control" name="user_id">
                                            @foreach($students as $student)
                                                <option
                                                    value="{{$student->id}}"
                                                    @if(old('user_id')==$student->id OR $subscribe->user_id==$student->id) selected @endif>{{$student->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        @error('invalid_student')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label" for="">
                                        Payment settings
                                    </label>
                                    <div class="col-sm-4">

                                        <select class="form-control make_select" name="payment_id">
                                            <option selected disabled>select methode.......</option>
                                            @foreach($methods as $method)
                                                <option
                                                    value="{{$method->setting_id}}"
                                                    @if(old('payment_id')==$method->setting_id OR $subscribe->payment_id==$method->setting_id) selected @endif>{{$method->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('payment_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label" for="">
                                        Cost
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="number" id="total" step="any" class="form-control set_cost" name="total"
                                               placeholder="Enter the Cost"
                                               value="{{old('total')!= null ? old('total') : $subscribe->total}}" {{$subscribe->total==0?'readonly':''}} required oninput="changeInformation()">
                                        @error('total')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label" for="">
                                        Term
                                    </label>

                                    <div class="col-sm-4">


                                        <select class="form-control" name="term_id">
                                            @foreach($terms as $term)
                                                <option
                                                    value="{{$term->term_id}}"
                                                    @if(old('term_id')==$term->term_id OR $subscribe->term_id==$term->term_id) selected @endif>{{$term->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('term_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

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
                                        <input type="number" step="any" id="paid" class="form-control" name="paid"

                                               value="{{old('paid')!= null ? old('paid') : $subscribe->paid}}" required  oninput="changeInformation()" >
                                        @error('paid')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
                                        <input type="number" step="any" id="unpaid" class="form-control" name="unpaid"

                                               value="{{old('unpaid')!= null ? old('unpaid') : $subscribe->unpaid}}" required readonly>
                                        @error('unpaid')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label" for="">
                                        paid_percentage_(%)
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text"   id="paid_percentage" class="form-control" name="paid_percentage"

                                               value="{{old('paid_percentage')!= null ? old('paid_percentage') : $subscribe->paid_percentage}}" required readonly>
                                        @error('paid_percentage')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
                            <div class="form-group center ">
                                <div class="row center" >
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
    <script>
        function makeDefault() {

            var total = parseFloat(document.getElementById("total").value);

            document.getElementById('total').readOnly
                = false;

            if (total <= 0 || isNaN(total)) {
                if (total<= 0){
                    alert('NOTE...  only pay an amount  ');
                    document.getElementById('total').readOnly
                        = true;
                }


                document.getElementById("paid").value = 0;
                document.getElementById("unpaid").value = '';
                document.getElementById("paid_percentage").value = '';
            } else {
                changeInformation();
            }

        }


        function changeInformation() {

            var Total = parseFloat(document.getElementById("total").value);
            var Paid = parseFloat(document.getElementById("paid").value);

            var NOT_PAID = Total - Paid;


            if (isNaN(Total) || Total <= 0) {


                document.getElementById("unpaid").value = parseFloat(total).toFixed(2);
                document.getElementById("paid_percentage").value = '';
            } else {
                var paidPercentage = (Paid / Total) * 100;


                non_paid = parseFloat(NOT_PAID).toFixed(2);
                if (isNaN(paidPercentage) || paidPercentage > 100) {
                    if (paidPercentage > 100) {
                        alert('the current paid (>) cost  if continue percentage(%) will be > 100%  and non_paid will be = negative (-)');
                    }
                    if (isNaN(paidPercentage)) {
                        document.getElementById("paid_percentage").value ='';
                        document.getElementById("unpaid").value = non_paid;
                    }else{

                        document.getElementById("paid_percentage").value = parseFloat(paidPercentage).toFixed();
                        document.getElementById("unpaid").value = non_paid;}

                } else {
                    document.getElementById("paid_percentage").value = parseFloat(paidPercentage).toFixed();
                    document.getElementById("unpaid").value = non_paid;
                }

            }
        }

        $(document).ready(function () {
            $('.search_student').select2();
        });


        $(document).ready(function () {
            $('.make_select').select2();
        });


    </script>


    <script>
        $(document).ready(function () {

            $('select[name="payment_id"]').on('change', function () {
                var subscribeId = $(this).val();

                if (subscribeId) {

                    $.ajax({
                        url: "{{ URL::to('dashboard/subscribes/cost') }}/" + subscribeId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {

                            $('.set_cost').empty();

                            $('.set_cost').val(data);

                            makeDefault();
                        },
                    });
                }
            });
        });

    </script>



@endsection
