

    @extends('layout.master')
    @section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="title_page">ইউনিটের দায়িত্বাভার ব্যক্তির তথ্য</h4>
                </div>
                @if(session()->has('message'))
                @if(session()->get('message')=='0')
                    <div class="alert alert-danger">
                        <p>আপনার দেওয়া তথ্য বিদ্যমান আছে</p>
        
                    </div>
                @elseif(session()->get('message')=='4')
                    <div class="alert alert-success">
                        <p>সফলভাবে ডিলেট হয়েছে</p>
        
                    </div>
                @else
                    <div class="alert alert-success">
                        <p>সফলভাবে যোগ করা হয়েছে</p>
        
                    </div>
                @endif
            @endif
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">হোম</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">ইউনিটের দায়িত্বাভার ব্যক্তির তথ্য</li>
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
    
            <div id="project" class="tabcontent">
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Add Word -->
                <div class="col-12 w-75 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                            <form action="/update_unit_rp_info/{{$data_unit_rp->id}}" method="POST" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                               @csrf
                               @method('put')
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">আসন </label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select id="p_id" name="p_id" class="form-select shadow-none form-control-line" onchange="data_fetch()">
                                            <option value="{{$data_join->p_id}}">{{$data_join->name.'-'.$data_join->no}} </option>
                                            @foreach($data_p as $value)
                                        <option value="{{$value->id}}">{{$value->name.'-'.$value->no}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;"> থানা</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select id="ps_id" name="ps_id" class="form-select shadow-none form-control-line" onchange="ps_func()">
                                            <option value="{{$data_join->ps_id}}">{{$data_join->PS_name}}</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;"> ওয়ার্ড</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select id="w_id" name="w_id" class="form-select shadow-none form-control-line" onchange="union_fetch()">
                                            <option value="{{$data_join->w_id}}">{{$data_join->w_number}}</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">ইউনিট</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select id="u_id" name="u_id" class="form-select shadow-none form-control-line">
                                            <option value="{{$data_join->u_id}}">{{$data_join->union_name}}</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">পদবি</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select name="d_id" class="form-select shadow-none form-control-line">
                                            <option value="{{$data_join->d_id}}">{{$data_join->d_name}}</option>
                                            @foreach($data_designation as $value)
                                        <option value="{{$value->id}}">{{$value->d_name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;"> নাম</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='rp_name' type="text" placeholder="নাম" class="form-control form-control-line" value="{{$data_unit_rp->rp_name}}">
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">  মোবাইল নম্বর</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='rp_phone' type="text" placeholder="মোবাইল নম্বর" class="form-control form-control-line" value="{{$data_unit_rp->rp_phone}}">
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">  ভোটার নং</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='rp_nid' type="text" placeholder="ভোটার নং" class="form-control form-control-line" value="{{$data_unit_rp->rp_nid}}">
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">ই-মেইল</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='rp_email' type="email" placeholder="ই-মেইল" class="form-control form-control-line" value="{{$data_unit_rp->rp_email}}">
                                    </div>
                                </div>
        
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">জন্ম তারিখ</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='rp_dob' type="date" lang="bn"  class="form-control form-control-line" value="{{$data_unit_rp->rp_dob}}">
                                    </div>
                                </div>
        
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">ছবি</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='rp_img' type="file" placeholder="ছবি" class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <div class="col-sm-12" style="width: 25%;"></div>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <button class="btn btn-success text-white"> আপডেট করুন</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
           
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            All Rights Reserved by Nice admin. Designed and Developed by
            <a href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    @endsection




@section('javaScript')
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->

<script>
    function data_fetch()
            { 
                var p_id =  $('#p_id').val();
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/ps_ajax/"+p_id,
                    success:function(respose){
                        var data = '<option value="">সিলেক্ট থানা</option>';
                        $.each(respose,function(key,value){

                            data = data + '<option value="'+value.id+'">'+value.PS_name+'</option>';
                            
                        });
                        $('#ps_id').html(data);
                    }
                });
                    
            }


            function ps_func(){

                var ps_id =  $('#ps_id').val();
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/w_ajax/"+ps_id,
                    success:function(respose){
                        var data = '<option value="">সিলেক্ট ওয়ার্ড</option>';
                        $.each(respose,function(key,value){

                            data = data + '<option value="'+value.id+'">'+value.w_number+'</option>';
                            
                        });
                        $('#w_id').html(data);
                    }
                });
            }

            function union_fetch(){

                var w_id =  $('#w_id').val();
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/u_ajax/"+w_id,
                    success:function(respose){
                        var data = '<option value="">সিলেক্ট ইউনিট</option>';
                        $.each(respose,function(key,value){

                            data = data + '<option value="'+value.id+'">'+value.union_name+'</option>';
                            
                        });
                        $('#u_id').html(data);
                    }
                });
            }


        </script>
@endsection
