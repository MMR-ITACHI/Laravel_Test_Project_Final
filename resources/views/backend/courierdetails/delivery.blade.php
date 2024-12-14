@extends('backend.layouts.parents')

@section('css')

<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

<!-- Related styles of various javascript plugins -->
<link rel="stylesheet" href="{{ asset('css/plugins.css') }}">

<!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
<link rel="stylesheet" href="{{ asset('css/main.css') }}">

<!-- Load a specific file here from css/themes/ folder to alter the default theme of the template -->

<!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
<link rel="stylesheet" href="{{ asset('css/themes.css') }}">
<!-- END Stylesheets -->

<!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
<script src="{{ asset('js/vendor/modernizr-respond.min.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        $('#shipped_button').click(function() {
            var recordId = $(this).data('record-id');
            $('#otpModal').data('record-id', recordId).modal('show');
        });

        $('#send_otp').click(function() {
            var recordId = $('#otpModal').data('record-id');
            
            $.ajax({
                url: '{{ route("sendOtp") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    record_id: recordId
                },
                success: function(response) {
                    alert('OTP sent to the receiver.');
                },
                error: function() {
                    alert('Error sending OTP.');
                }
            });
        });

        $('#verify_otp').click(function() {
            var otpCode = $('#otp_code').val();
            var recordId = $('#otpModal').data('record-id');
            
            $.ajax({
                url: '{{ route("verifyOtp") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    otp_code: otpCode,
                    record_id: recordId
                },
                success: function(response) {
                    if (response.success) {
                        alert('Status updated to Delivered.');
                        $('#otpModal').modal('hide');
                    } else {
                        alert('Invalid OTP. Please try again.');
                    }
                },
                error: function() {
                    alert('Error verifying OTP.');
                }
            });
        });
    });
</script>


@endsection

@section('breadcum')

<ul id="nav-info" class="clearfix">
                        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i></a></li>
                        <li><a href="{{ url('employee/dashboard') }}">Dashboard</a></li>
                        <li class="active"><a href="{{ route('courierdetails.index') }}">Courier Details List</a></li>
                    </ul>

@section('content')



@if('msg')
<div class="alert alert-success">{{session('msg')}}</div>
@endif


                    <table id="example-datatables" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="cell-small">Sl No</th>
                                <th><i class="fa fa-user"></i> Tracking Id</th>
                                <th class="hidden-xs hidden-sm hidden-md"><i class="fa fa-envelope-o"></i>Sender Type</th>
                                <th><i class="fa fa-phone" aria-hidden="true"></i>Sender Name</th>
                                <th><i class="fa fa-truck"></i>Sender Branch Name</th>
                                <th><i class="fa fa-picture-o" aria-hidden="true"></i> Payment Type</th>
                                <th><i class="fa fa-bolt"></i>Courier Status</th>

                                <th><i class="fa fa-pencil-square-o" aria-hidden="true"></i>|<i class="fa fa-trash" aria-hidden="true"></i> Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($cdetails as $cdetail)

                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cdetail->tracking_id}}</td>
                        <td>{{$cdetail->sender_type}}</td>
                        <td>{{$cdetail->sender_name}}</td>
                        <td>{{$cdetail->branch->branch_name}}</td>

                        <td>{{$cdetail->payment_type}}</td>

                        


                        <td>
                        <button id="shipped_button" class="{{$cdetail->status =='Shipped' ? 'btn btn-success': 'btn btn-info'}}" data-record-id="{{ $cdetail->id }}">{{$cdetail->status}}</button>
                        </td>

                        <!-- OTP Modal -->
<div class="modal" id="otpModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enter OTP Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" id="otp_code" class="form-control" placeholder="Enter OTP Code">
                <button type="button" class="btn btn-primary" id="send_otp">Send OTP</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="verify_otp">Verify OTP</button>
            </div>
        </div>
    </div>
</div>

                        

                        <td>





                                <a href="" class="btn btn-info">View</a>

                               <button type="submit" name="submit" class="btn btn-danger">Delete</button>





                            </form>

                            </td>

                        </tr>


                           @endforeach
                            <!-- <tr>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                                <td class="text-center hidden-xs hidden-sm">1</td>
                                <td><a href="javascript:void(0)">username1</a></td>
                                <td class="hidden-xs hidden-sm hidden-md">user1@example.com</td>
                                <td><span class="label label-warning">Pending..</span></td>
                            </tr> -->

                        </tbody>
                    </table>
                    <!-- END Datatables -->

@endsection

@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

@section('js')

 <!-- Bootstrap.js -->
 <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>

<!-- Jquery plugins and custom javascript code -->
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

@endsection

@section('javascript')
 <!-- Javascript code only for this page -->
 <script>
            $(function () {
                /* Initialize Datatables */
                $('#example-datatables').dataTable({columnDefs: [{orderable: false, targets: [0]}]});
                $('#example-datatables2').dataTable();
                $('#example-datatables3').dataTable();
                $('.dataTables_filter input').attr('placeholder', 'Search');
            });
        </script>

@endsection




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

