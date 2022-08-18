@extends('layout.master')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/sr-1.1.1/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>

<style>
    /* The container */
    .check_box_container {
      display: block;
      position: relative;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default checkbox */
    .check_box_container input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 30px;
      width: 30px;
      background-color: #eee;
      margin-left: 43%;
      margin-top: -4%;
    }

    /* On mouse-over, add a grey background color */
    .check_box_container:hover input ~ .checkmark {
      background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .check_box_container input:checked ~ .checkmark {
      background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the checkmark when checked */
    .check_box_container input:checked ~ .checkmark:after {
      display: block;
    }

    /* Style the checkmark/indicator */
    .check_box_container .checkmark:after {
        left: 10px;
        top: 1px;
        width: 11px;
        height: 20px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
</style>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="title_page"> সকল বার্তার তালিকা </h4>
            </div>

            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">হোম</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> সকল বার্তার তালিকা </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- =======================================================================================================
==============================       Show show table        ===========================================
==================================================================================================== --}}
        <div class="row">
            <!-- column -->
            <form method="POST" id="mp_send_sms" action="{{ route('sms.send') }}">
            @csrf
            <div class="col-12  m-auto">
                <div class="card">
                    <div class="table-responsive" style="padding: 10px;">
                        <table id="custom_table" class="table table-borderless display">
                            <thead>
                                <tr>
                                    <th class="border-top-0 text-center">সি. নং</th>
                                    <th class="border-top-0 text-center">তারিখ</th>
                                    <th class="border-top-0 text-center">প্রাপক</th>
                                    <th class="border-top-0 text-center">প্রেরক </th>
                                    <th class="border-top-0 text-center">অপারেশন </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($sms_details as $key=>$sd)
                                <tr>
                                    <td class="align-middle">{{$key+1}}</td>
                                    <td class="align-middle">{{date('d-m-Y', strtotime($sd->created_at));}}</td>
                                    <td class="align-middle">
                                        {!! $sd->user_data() !!}
                                    </td>
                                    <td class="align-middle">
                                        @if($sd->sender == 0)
                                            Non Masking
                                        @else
                                            Masking
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if($sd->status == 1)
                                            <span class="btn btn-success text-white">Successful </>
                                        @else
                                            <span class="btn btn-danger text-white">{{ $sd->status }} </>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           {{-- <div class="col-md-12 mt-4 mb-4 row">

                <div class="col-md-12 m-auto">

                    <div class="form-group pt-3">
                        <label for="message">Message</label>
                        <textarea name="message" class="form-control" required rows="4"></textarea>
                    </div>
                </div>
                <div class="col-md-12 mt-5 m-auto">
                    <input type="submit" id="submit_btn" style="width:100%" class="btn btn-success text-white" value="Send Message">
                </div>

            </div> --}}

            </form>
        </div>

        {{-- =======================================================================================================
==============================     End Show show table        ===========================================
==================================================================================================== --}}



    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
 <footer class="footer text-center">
           <div class="footer_login">
            All Rights Reserved by <br>
            <a href="http://www.nazmuljewel.com/" target="_blank" style="color:blue; font-size:23px; text-decoration:none;">নাজমুল আলম ভূইয়া জুয়েল </a> <br>
            <span class="footer_span">বিজ্ঞান ও প্রযুক্তি বিষয়ক সম্পাদক</span> <br>
             <a href="https://www.albd-dcn.org/" target="_blank" style="color:green; font-size:23px; text-decoration:red;">ঢাকা মহানগর উত্তর আওয়ামী লীগ</a> 
           </div>
        </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>

@endsection

@section('javaScript') 
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/sr-1.1.1/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

 <script>
        $(document).ready(function () {
               $("#custom_table").DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        title: 'SMS History',
                        charset: 'utf-8',
                        bom : 'true'
                    }
                ]
            });
        });
</script>

@endsection
