@extends('layout.master')
<!-- Page wrapper  -->
<!-- ============================================================== -->
@section('content')
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
                <h4 class="title_page"> থানার দায়িত্বভার ব্যক্তিরদের বার্তা পাঠান </h4>
            </div>

            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">হোম</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> থানার দায়িত্বভার ব্যক্তিরদের বার্তা পাঠান </li>
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
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="border-top-0 text-center">সি. নং</th>
                                    <th class="border-top-0 text-center">আসন</th>
                                    <th class="border-top-0 text-center">থানা</th>
                                    <th class="border-top-0 text-center">পদবি</th>
                                    <th class="border-top-0 text-center">নাম</th>
                                    <th class="border-top-0 text-center"> ফোন নাম্বার</th>
                                    <th class="border-top-0 text-center">অপারেশন </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($thana_details as $key=>$td)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$td->name.'-'.$td->no}}</td>
                                    <td>{{$td->PS_name}}</td>
                                    <td>{{$td->d_name}}</td>
                                    <td>{{$td->rp_name}}</td>
                                    <td>{{$td->rp_phone}}</td>
                                    <td>
                                        <label class="check_box_container">
                                            <input type="checkbox" name="number[]" value="{{$td->rp_phone}}" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-4 mb-4 row">

                <div class="col-md-12 m-auto">

                    <div class="form-group pt-3">
                        <label for="message">Message</label>
                        <textarea name="message" class="form-control" required rows="4"></textarea>
                    </div>
                </div>
                <div class="col-md-12 mt-5 m-auto">
                    <input type="submit" id="submit_btn" style="width:100%" class="btn btn-success text-white" value="Send Message">
                </div>
                {{-- <div class="form-group">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                    </div>
                </div> --}}

            </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

// $('#submit_btn').click( function(e){
//     e.preventDefault();

//         let url = "{{route('sms.send')}}";
//         $.ajax({
//             url: url,
//             method: "POST",
//             data: $('#mp_send_sms').serialize(),
//             success: function (response) {
//                 if ('' !== response) {
//                     console.log(response);
//                 }
//                 // var percentage = 0;
//                 // var timer = setInterval(function(){
//                 //     percentage = percentage + 20;
//                 //     progress_bar_process(percentage, timer);
//                 // }, 1000);
//             },
//             error: function (error){
//                 console.log(error);
//             }
//         });


// })


// function progress_bar_process(percentage, timer)
//   {
//    $('.progress-bar').css('width', percentage + '%');
//    if(percentage > 100)
//    {
//     clearInterval(timer);
//     $('#sample_form')[0].reset();
//     $('#process').css('display', 'none');
//     $('.progress-bar').css('width', '0%');
//     $('#save').attr('disabled', false);
//     $('#success_message').html("<div class='alert alert-success'>Data Saved</div>");
//     setTimeout(function(){
//      $('#success_message').html('');
//     }, 5000);
//    }
//   }

</script>

@endsection
