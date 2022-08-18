@extends('layout.master')
<!-- Page wrapper  -->
<!-- ============================================================== -->
@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="title_page">এম পি এর তথ্য যোগ করুন</h4>
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
                            <li class="breadcrumb-item active" aria-current="page">এম.পি. এর তথ্য</li>
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


        <!-- ============================================================== -->
        <!-- Add Police Station -->
        <div class="col-12  w-75 m-auto">
            <div class="card">
                <div class="card-body">
                    <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                    <form action='insert_mp_info' method="POST" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">আসন</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <select name='p_id' class="form-select shadow-none form-control-line">
                                    <option value="">সিলেক্ট আসন </option>
                                    @foreach($data_p as $data)
                                    <option value="{{$data->id}}">{{$data->name.'-'.$data->no}}</option>
                                    @endforeach   
                                </select>
                            </div>
                        </div>

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">নাম</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='mp_name' type="text" placeholder="নাম" class="form-control form-control-line">
                            </div>
                        </div>

                        

                       
                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">মোবাইল নম্বর</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='mp_phone' type="text" placeholder="মোবাইল নম্বর" class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">ভোটার নং</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='mp_nid' type="text" placeholder="ভোটার নং" class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">ই-মেইল</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='mp_email' type="email" placeholder="ই-মেইল" class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">জন্ম তারিখ</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='mp_dob' type="date" lang="bn"  class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">ছবি</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='mp_img' type="file" placeholder="ছবি" class="form-control form-control-line">
                            </div>
                        </div>
                       
                        <div class="form-group d-flex">
                            <div class="col-sm-12" style="width: 25%;"></div>
                            <div class="col-sm-12" style="width: 75%;">
                                <button href='insert_ps' class="btn btn-success text-white">যোগ করুন </button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Add Police Station -->
        <!-- ============================================================== -->





{{-- =======================================================================================================
==============================       Show show table        ===========================================
==================================================================================================== --}}
        <div class="row">
            <!-- column -->
            <div class="col-12  m-auto">
                <div class="card">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="border-top-0 text-center">সি. নং</th>
                                    <th class="border-top-0 text-center">আসন </th>
                                    <th class="border-top-0 text-center"> নাম</th>
                                    <th class="border-top-0 text-center"> ভোটার নং</th>
                                    <th class="border-top-0 text-center"> ফোন নাম্বার</th>
                                    <th class="border-top-0 text-center">ই-মেইল</th>
                                    <th class="border-top-0 text-center">জন্ম তারিখ</th>
                                    <th class="border-top-0 text-center">ছবি</th>
                                    <th class="border-top-0 text-center">অপারেশন</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data_mp as $data)
                                <tr>
                                <!--  -->
                                    <td>{{$loop->index+1}}
                                    </td>
                                    <td>{{$data->name.'-'.$data->no}}</td>
                                    <td >{{$data->mp_name}}</td>
                                    <td type='tel' >{{$data->mp_nid}}</td>
                                    <td >{{$data->mp_phone}}</td>
                                    <td >{{$data->mp_email}}</td>
                                    <td >{{$data->mp_dob}}</td>
                                    <td class="td_n_img"><img class="img img-control" src="{{asset("storage/image/$data->mp_img")}}" alt=""></td>

                                    <td class="td_css">
                                    <a  href='/update_page_mp/{{$data->id}}'  class="btn btn-info"><i class="bi bi-pen"></i></a>
                                    <form class="spacing" method="POST" action='/delete/mpDetail/{{$data->id}}'>
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
        All Rights Reserved by
        <a href="#">ঢাকা মহানগর উত্তর আওয়ামী লীগ</a>.
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
    
@endsection



