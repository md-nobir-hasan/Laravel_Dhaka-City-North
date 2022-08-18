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
                    <form action="/update_mp/{{$data_mp->id}}" method="POST" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                      @csrf
                      @method('put')
                    <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">আসন কমিটি </label>
                            <div class="col-sm-12" style="width: 75%;">
                                <select name='p_id' class="form-select shadow-none form-control-line">
                                    <option value="">আসন কমিটি </option>
                                    @foreach($data_p as $data)
                                    <option value="{{$data->id}}">{{$data->name.'-'.$data->no}}</option>
                                    @endforeach   
                                </select>
                            </div>
                        </div>

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">নাম</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='mp_name' type="text" placeholder="নাম" class="form-control form-control-line" value="{{$data_mp->mp_name}}">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">মোবাইল নম্বর</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='mp_phone' type="text" placeholder="মোবাইল নম্বর" class="form-control form-control-line" value="{{$data_mp->mp_phone}}">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">ভোটার নং</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='mp_nid' type="text" placeholder="ভোটার নং" class="form-control form-control-line" value="{{$data_mp->mp_nid}}">
                            </div>
                        </div>

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">ই-মেইল</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='mp_email' type="email" placeholder="ই-মেইল" class="form-control form-control-line" value="{{$data_mp->mp_email}}">
                            </div>
                        </div>

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">জন্ম তারিখ</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='mp_dob' type="date" lang="bn"  class="form-control form-control-line" value="{{$data_mp->mp_dob}}">
                            </div>
                        </div>

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">ছবি</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='mp_img' type="file" placeholder="ছবি" class="form-control form-control-line" value="{{asset("storage/image/$data->mp_img")}}">
                            </div>
                        </div>
                       
                        <div class="form-group d-flex">
                            <div class="col-sm-12" style="width: 25%;"></div>
                            <div class="col-sm-12" style="width: 75%;">
                                <button class="btn btn-success text-white"> আপডেট</button> 
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



