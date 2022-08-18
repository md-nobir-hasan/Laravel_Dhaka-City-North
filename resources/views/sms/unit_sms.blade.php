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
                <h4 class="title_page"> ইউনিটের দায়িত্বভার ব্যক্তিদের বার্তা পাঠান </h4>
            </div>

            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">হোম</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> ইউনিটের দায়িত্বভার ব্যক্তিদের বার্তা পাঠান </li>
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
            <div class="col-md-3">
                <div class="form-group">    
                    <div class="col-sm-12">
                        <select id="seat_id" name="seat_id" class="form-select shadow-none form-control-line" onchange="get_thana()">
                            <option value="">সকল আসন</option>
                                @foreach($seats as $seat)
                                <option value="{{$seat->id}}">{{$seat->name.'-'.$seat->no}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">    
                    <div class="col-sm-12">
                        <select id="thana_id" name="thana_id" class="form-select shadow-none form-control-line" onchange="get_word()">
                            <option value="">সকল থানা</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">    
                    <div class="col-sm-12">
                        <select id="word_id" name="word_id" class="form-select shadow-none form-control-line" onchange="get_unit()">
                            <option value="">সকল ওয়ার্ড</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">    
                    <div class="col-sm-12">
                        <select id="unit_id" name="unit_id" class="form-select shadow-none form-control-line" onchange="get_table()">
                            <option value="">সকল ইউনিট</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- column -->
            <form method="POST" id="mp_send_sms" action="{{ route('sms.send') }}">
            @csrf
            <div class="col-md-12 mt-4 mb-4 row" style="margin: 0px;padding: 0px;">

                <div class="col-md-12 m-auto" style="margin: 0px;padding: 0px;">

                    <div class="form-group pt-3">
                        <label for="message">Message</label>
                        <textarea name="message" class="form-control" required rows="4"></textarea>
                    </div>
                </div>
                <div class="col-md-12 mt-5 m-auto" style="margin: 0px;padding: 0px;">
                    <input type="submit" id="submit_btn" style="width:100%" class="btn btn-success text-white" value="Send Message">
                </div>
                {{-- <div class="form-group">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                    </div>
                </div> --}}

            </div>
            <div class="col-12  m-auto">
                <div class="card">
                    <div class="table-responsive" id="table_data">
                        <table id="" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="border-top-0 text-center">সি. নং</th>
                                    <th class="border-top-0 text-center">আসন</th>
                                    <th class="border-top-0 text-center">থানা</th>
                                    <th class="border-top-0 text-center">ওয়ার্ড</th>
                                    <th class="border-top-0 text-center">ইউনিট  </th>
                                    <th class="border-top-0 text-center">পদবি</th>
                                    <th class="border-top-0 text-center">নাম</th>
                                    <th class="border-top-0 text-center">মোবাইল নম্বর</th>
                                    <th class="border-top-0 text-center">অপারেশন</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($unit_details as $key=>$ud)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td >{{$ud->name}} - {{$ud->no}}</td>
                                    <td >{{$ud->PS_name}}</td>
                                    <td >{{$ud->w_number}}</td>
                                    <td >{{$ud->union_name}}</td>
                                    <td >{{$ud->d_name}}</td>
                                    <td >{{$ud->rp_name}}</td>
                                    <td >{{$ud->rp_phone}}</td>
                                    <td>
                                        <label class="check_box_container">
                                            <input type="checkbox" name="number[]" value="{{$ud->rp_phone}}" checked="checked">
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
    <!-- ============================================================== -->
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
    function get_thana (){
        var seat  =  $('#seat_id').val();
        $('#word_id').val('');
        $('#unit_id').val('');

        if(seat != "" ){
            $('#thana_id').removeAttr('disabled');
            $('#word_id').removeAttr('disabled');
            $('#unit_id').removeAttr('disabled');

            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/ps_ajax/"+seat,
                success:function(respose){;
                    data = '<option value="">সকল থানা</option>';
                    $.each(respose,function(key,value){

                        data = data+'<option value="'+value.id+'">'+value.PS_name+'</option>';
                                
                    });
                    $('#thana_id').html(data);
                }
            });
            get_table_data(seat, null, null, null);

        }else{
            $('#thana_id').val("");
            $('#thana_id').attr('disabled', 'disabled');

            $('#word_id').attr('disabled', 'disabled');
            $('#unit_id').attr('disabled', 'disabled');

            get_table_data(null, null, null, null);
        }

    }
    
    function get_word (){
        var seat  =  $('#seat_id').val();
        var thana =  $('#thana_id').val();
        $('#unit_id').val('');
        
        if(thana != "" ){
            $('#word_id').removeAttr('disabled');
            $('#unit_id').removeAttr('disabled');

            $.ajax({
                type: "GET",
                dataType: 'json',
                url:"/w_ajax/"+seat+"/"+thana,
                success:function(respose){;
                    var data = '<option value="">সকল ওয়ার্ড</option>';
                    $.each(respose,function(key,value){

                        data = data + '<option value="'+value.id+'">'+value.w_number+'</option>';
                                
                    });
                    $('#word_id').html(data);
                }
            });
            get_table_data(seat, thana, null, null);
        }else{
            $('#word_id').val("");
            $('#word_id').attr('disabled', 'disabled');

            $('#unit_id').attr('disabled', 'disabled');
            get_table_data(seat, null, null, null);
        }
    }

    function get_unit (){
        var seat  =  $('#seat_id').val();
        var thana =  $('#thana_id').val();
        var word  =  $('#word_id').val();
        
        if(word != "" ){
            $('#unit_id').removeAttr('disabled');

            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/u_ajax/"+seat+"/"+thana+"/"+word,
                success:function(respose){;
                    var data = '<option value="">সকল ইউনিট</option>';
                    $.each(respose,function(key,value){

                        data = data + '<option value="'+value.id+'">'+value.union_name+'</option>';
                                
                    });
                    $('#unit_id').html(data);
                }
            });
            get_table_data(seat, thana, word, null);
        }else{
            $('#unit_id').val("");
            $('#unit_id').attr('disabled', 'disabled');
            get_table_data(seat, thana, null, null);
        }
    }

    function get_table(){
        var seat  =  $('#seat_id').val();
        var thana =  $('#thana_id').val();
        var word  =  $('#word_id').val();
        var unit  =  $('#unit_id').val();
        
        if(word != "" ){
            get_table_data(seat, thana, word, unit);
        }else{
            get_table_data(seat, thana, word, null);
        }
    }

    function get_table_data (seat, thana, word, unit){
        console.log(seat);
        console.log(thana);
        console.log(word);
        console.log(unit);

        var url = "{{route('unit.filter')}}";
        console.log(url);

        var data_1 = `
                    <table id="" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="border-top-0 text-center">সি. নং</th>
                                <th class="border-top-0 text-center">আসন</th>
                                <th class="border-top-0 text-center">থানা</th>
                                <th class="border-top-0 text-center">ওয়ার্ড</th>
                                <th class="border-top-0 text-center">ইউনিট  </th>
                                <th class="border-top-0 text-center">পদবি</th>
                                <th class="border-top-0 text-center">নাম</th>
                                <th class="border-top-0 text-center">মোবাইল নম্বর</th>
                                <th class="border-top-0 text-center">অপারেশন</th>
                            </tr>
                        </thead>
                        <tbody>
        
        `;
        var data_2 = '';
        var data_3 = `
                        </tbody>
                    </table>
        `;

        $.ajax({
            type: "POST",
            dataType: 'json',
            data: { "_token": "{{ csrf_token() }}", seat:seat, thana:thana, word:word, unit:unit},
            url: url,
            success:function(respose){
                console.log(respose);
                $.each(respose,function(key,ud){

                    data_2 = data_2+`
                    
                                <tr>
                                    <td>${key+1}</td>
                                    <td >${ud.name} - ${ud.no}</td>
                                    <td >${ud.thana}</td>
                                    <td >${ud.w_number}</td>
                                    <td >${ud.union_name}</td>
                                    <td >${ud.d_name}</td>
                                    <td >${ud.rp_name}</td>
                                    <td >${ud.rp_phone}</td>
                                    <td>
                                        <label class="check_box_container">
                                            <input type="checkbox" name="number[]" value="${ud.rp_phone}" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>

                                </tr>
                    
                    
                    `;
                                
                });
                $('#table_data').html("");
                $('#table_data').html(data_1 + data_2 + data_3);
            },
            error: function(err) {
                console.log( err );
            }
        });
    }



</script>

@endsection
