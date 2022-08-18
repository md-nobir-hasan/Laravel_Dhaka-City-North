

    @extends('layout.master')
    @section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="title_page">ইউনিট কমিটি যোগ করুন</h4>
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
                @elseif(session()->get('message')=='1')
                    <div class="alert alert-success">
                        <p>সফলভাবে যোগ করা হয়েছে</p>
        
                    </div>
                @elseif(session()->get('message')=='5')
                    <div class="alert alert-success">
                        <p>সফলভাবে আপডেট হয়েছে</p>
        
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
                                <li class="breadcrumb-item active" aria-current="page">ইউনিট কমিটি</li>
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
                            <form action="/insert_unit_info" class="form-horizontal form-material mx-2">
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">আসন</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select id="p_id" name="p_id" class="form-select shadow-none form-control-line" onchange="data_fetch()">
                                            <option> আসন</option>
                                            @foreach($data_p as $value)
                                        <option value="{{$value->id}}">{{$value->name.'-'.$value->no}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">থানা কমিটি</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select id="ps_id" name="ps_id" class="form-select shadow-none form-control-line" onchange="ps_func()">
                                            <option>থানা কমিটি</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">ওয়ার্ড কমিটি</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select id="w_id" name="w_id" class="form-select shadow-none form-control-line">
                                            <option>ওয়ার্ড কমিটি</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">ইউনিট কমিটি</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='union_name' type="text" placeholder=" ইউনিট" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <div class="col-sm-12" style="width: 25%;"></div>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <button class="btn btn-success text-white">যোগ করুন</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
           
                <div class="row">
                    <!-- column -->
                    <div class="col-12 m-auto">
                        <div class="card">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0 text-center">সি. নং</th>
                                            <th class="border-top-0 text-center">আসন </th>
                                            <th class="border-top-0 text-center">থানা কমিটি</th>
                                            <th class="border-top-0 text-center">ওয়ার্ড কমিটি</th>
                                            <th class="border-top-0 text-center">ইউনিট কমিটি </th>
                                            <th class="border-top-0 text-center">অপারেশন</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data_join as $data)
                                        <tr>
                                        <!--  -->
                                            <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$loop->index+1}}
                                            </td>
                                            <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->name.'-'.$data->no}}</td>
                                            <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->PS_name}}</td>
                                            <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->w_number}}</td>
                                            <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->union_name}}</td>
                                            <td class="td_css" style='line-height: 0.5;padding: .5rem;text-align: center'>
                                            <a  href='/update_page_unit/{{$data->id}}' name="btn_edit" class="btn btn-info" style='line-height: 0.5;padding: .5rem'><i class="bi bi-pen"></i></a>
                                            <form class="spacing" method="POST" action='/delete/u_model/{{$data->id}}'>
                                                @csrf
                                                @method('delete')
                                                <button id='custom-btn' class="btn btn-danger" onclick="return confirm('Are you sure??')"> <i class="bi bi-trash"></i> </button>
                                             </form>
                                        </td>
                                        
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
            All Rights Reserved by
            <a href="#">ঢাকা মহানগর উত্তর আওয়ামী লীগ</a>.
        </footer>="https://www.wrappixel.com">WrapPixel</a>.
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
                        var data = '<option>সিলেক্ট থানা</option>';
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
                        var data = '<option>সিলেক্ট ওয়ার্ড</option>';
                        $.each(respose,function(key,value){

                            data = data + '<option value="'+value.id+'">'+value.w_number+'</option>';
                            
                        });
                        $('#w_id').html(data);
                    }
                });
            }
        </script>
@endsection
