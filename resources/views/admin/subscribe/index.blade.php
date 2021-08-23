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
                <h1>Subscribe <small>Index &amp; Details </small></h1>
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
                        <a class="inline-open" href="#addSubscribe">
                            <i class="fa fa-plus"></i> Add Subscribe
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
                    <a href="{{url('dashboard/users')}}">
                        Home
                    </a>
                </li>
                <li class="active">
                    Subscribe
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
                    <h4 class="panel-title"><span class="text-bold">Subscribe</span></h4>
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
                <div class="inline-form1 {{$errors->any() || count($students) == 1 ? 'opened' : 'closed'}}">
                    <div class="col-md-11">
                        <h3>Add new Subscribe</h3>
                        <hr>
                        <form action="{{route('subscribe.store')}}" method="post">
                            <div class="form-group">
                                {{csrf_field()}}
                                {{method_field('post')}}
                                <div class="row">
                                    <label class="col-sm-2 control-label" for="">
                                        Student
                                    </label>
                                    {{-- @php $status_value=['active','not_active']; @endphp--}}
                                    <div class="col-sm-4">
                                        <select class="form-control search_student " name="user_id">
                                            <option selected disabled>select student...</option>
                                            @if(count($students)==1 )
                                                @foreach($students as $student)
                                                    <option
                                                        value="{{$student->id}}" {{ old('user_id')== $student->id||$student->id ? 'selected' :''}} >{{$student->name}}
                                                        - code{{$student->code}}</option>
                                                @endforeach
                                            @else
                                                @foreach($students as $student)
                                                    <option
                                                        value="{{$student->id}}" {{old('user_id')== $student->id  ? 'selected' : ''}}>{{$student->name}}
                                                        - code{{$student->code}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('duplicated')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        @error('user_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <label class="col-sm-2 control-label" for="">
                                        Payment settings
                                    </label>

                                    <div class="col-sm-4">
                                        <select class="form-control make_select" name="payment_id">
                                            <option selected disabled>select methode...</option>

                                            @foreach($methods as $method)
                                                <option
                                                    value="{{$method->setting_id}}" {{old('payment_id')== $method->setting_id ? 'selected' : ''}} >{{$method->name}}
                                                    -(cost-{{$method->prices}})
                                                </option>

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
                                        <input type="number" step="any" id="total" class="form-control set_cost"
                                               name="total"
                                               placeholder="Enter the Cost"

                                               value="{{old('total')}}" {{old('total')==0?'readonly':''}} required
                                               oninput="changeInformation()">
                                        @error('total')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label" for="">
                                        Term
                                    </label>
                                    {{-- @php $status_value=['active','not_active']; @endphp--}}
                                    <div class="col-sm-4">
                                        <select class="form-control" name="term_id">
                                            @foreach($terms as $term)
                                                <option
                                                    value="{{$term->term_id}}" {{old('term_id')== $term->term_id ? 'selected' : ''}}>{{$term->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('term_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror


                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label" for="">
                                        Current paid
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="number" step="any" id="paid" class="form-control" name="paid"

                                               value="{{old('paid')??0}}" required oninput="changeInformation()">
                                        @error('paid')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label" for="">
                                        Next payment date
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="next_payment_date"

                                               value="{{old('next_payment_date')}}">
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

                                               value="{{old('unpaid')}}" required readonly>
                                        @error('unpaid')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label" for="">
                                        Paid_percentage_(%)
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" id="paid_percentage" class="form-control"
                                               name="paid_percentage"

                                               value="{{old('paid_percentage')}}" required readonly>
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
                                            {{old('note')}}
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
                <br><br><br>


                <!-- Start: Search user -->
                <div class="col-md-11">
                    <form action="{{route('subscribe')}}" method="get">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="">
                                    search about student
                                </label>
                                <div class="col-sm-4">
                                    <input type="text" name="search" placeholder="search by Code or Name of student"
                                           value="{{ request()->search }}" class="form-control">
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-info ">
                                        Search
                                    </button>

                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                </div>


            @if(count($subscribes)>0)
              

                    <!-- Start: subscribe Index Table -->
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
                                <th class="center">details</th>
                                <th class="center">action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($subscribes as $index=>$subscribe)
                                <tr>
                                    <td class="center">{{$subscribe->user->code}}</td>
                                    <td class="center">{{$subscribe->user->name}}</td>
                                    <td class="center">{{$subscribe->paymentSetting->name}}</td>
                                    <td class="center">{{$subscribe->total}} LE</td>
                                    <td class="center">{{$subscribe->paid}} LE</td>

                                    <td class="center">{{$subscribe->unpaid}} LE</td>
                                    <td class="center"> {{round($subscribe->paid_percentage,1)}} %</td>

                                    <td class="center">{{$subscribe->user2->name}}</td>
                                    <td class="center">{{$subscribe->term->name}}</td>
                                    <td class="center">{{$subscribe->next_payment_date}}</td>

                                    <td class="center">{{$subscribe->note}}</td>
                                    @if($subscribe->status == 0)
                                        <td class="center text-success">مدفوعة</td>
                                    @elseif($subscribe->status == 1)
                                        <td class="center text-danger">غير مدفوعة</td>
                                    @else
                                        <td class="center text-danger">****</td>
                                    @endif
                                    <td>
                                        <div class="col-sm-1 ">
                                            <div class="btn-group ">
                                                <a href="{{route('subscribe.installment.details',$subscribe->id)}}"
                                                   class="btn btn-info btn-sm">
                                                    details
                                                </a>
                                            </div>
                                        </div>
                                    </td>


                                    <td class="center">
                                        <div class="btn-group">
                                            <a href="#" class="dotsrow dropdown-toggle"
                                               data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                @if($subscribe->status == 0)
                                                    <li>
                                                        <a href="{{route('subscribe.edit',$subscribe->id)}}"
                                                           class="inline-open ">
                                                            <i class="fa fa-edit center"></i>
                                                            Edit
                                                        </a>
                                                    </li>

                                                @else
                                                    <li>
                                                        <a href="{{route('subscribe.installment',$subscribe->id)}}">
                                                            <i class="fa fa-plus center"></i>
                                                            pay in installments
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('subscribe.edit',$subscribe->id)}}"
                                                           class="inline-open ">
                                                            <i class="fa fa-edit center"></i>
                                                            Edit
                                                        </a>
                                                    </li>


                                                @endif


                                          <!--      <li>
                                                    <form id="formSubmit"
                                                          action="{{ route('subscribe.destroy',$subscribe->id) }}"
                                                          method="post" style="display: inline-block">
                                                        {{ csrf_field() }}
                                                        {{ method_field('delete') }}

                                                    </form>
                                                    <a href="" class=" delete123 "><i class="fa fa-trash"></i>
                                                        delete</a>

                                                </li> -->

                                            </ul>
                                        </div>
                                    </td>

                                </tr>


                            @endforeach


                            </tbody>
                        </table>
                         @if(count($subscribes)>35)
                        <div class="center">{{ $subscribes->appends(request()->query())->links() }}</div>
                        @endif
 
            
                   
                @else
                    <hr/>
                    <h2 class="center">oops....Empty. add new subscribes</h2>

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
    {{--hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh--}}
    <script>
        function makeDefault() {

            var total = parseFloat(document.getElementById("total").value);

            document.getElementById('total').readOnly
                = false;

            if (total <= 0 || isNaN(total)) {
                if (total <= 0) {
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


