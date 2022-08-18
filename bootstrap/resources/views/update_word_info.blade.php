

    @extends('layout.master')
    @section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="title_page">ওয়ার্ড যোগ করুন</h4>
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
                @elseif(session()->get('message')=='5')
                    <div class="alert alert-success">
                        <p>সফলভাবে আপডেট হয়েছে</p>
        
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
                                <li class="breadcrumb-item active" aria-current="page">ওয়ার্ড</li>
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
                            <form method="POST" action="/update_word_info/{{$data_w->id}}" class="form-horizontal form-material mx-2">
                                @csrf
                                @method('put')
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">আসন </label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select id="p_id" name="p_id" class="form-select shadow-none form-control-line" onchange="data_fetch()">
                                            <option value="">সিলেক্ট আসন </option>
                                            @foreach($data_p as $value)
                                        <option value="{{$value->id}}">{{$value->name.'-'.$value->no}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">থানা</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select id="ps_id" name="ps_id" class="form-select shadow-none form-control-line" onchange="getid()">
                                            <option value="">সিলেক্ট থানা</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;"> ওয়ার্ড নাম্বার</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='w_number' type="text" placeholder="ওয়ার্ড নাম্বার" class="form-control form-control-line" value="{{$data_w->w_number}}">
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <div class="col-sm-12" style="width: 25%;"></div>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <button class="btn btn-success text-white">আপডেট করুন</button>
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
                        console.log(respose);
                        var data = '<option value="">সিলেক্ট থানা</option>';
                        $.each(respose,function(key,value){
                            data = data + '<option value="'+value.id+'">'+value.PS_name+'</option>';
                            
                        });
                        $('#ps_id').html(data);
                    }
                });
                    
            }
    function getid()
            { 
                var ps_id =  $('#ps_id').val();
               console.log(ps_id);
                    
            }
        </script>
@endsection
