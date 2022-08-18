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
                <h4 class="title_page" style="text-align: center">থানা যোগ করুন</h4>
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
                            <li class="breadcrumb-item active" aria-current="page">থানা</li>
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
                    <form action='/update_ps/{{$data_ps->id}}' method="POST" class="form-horizontal form-material mx-2">
                      @csrf
                      @method('put')
                    <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">আসন </label>
                            <div class="col-sm-12" style="width: 75%;">
                                <select name='P_id' class="form-select shadow-none form-control-line">
                                    <option value="">সিলেক্ট আসন </option>
                                    @foreach($data_p as $data)
                                    <option value="{{$data->id}}">{{$data->name.'-'.$data->no}}</option>
                                    @endforeach   
                                </select>
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">থানার নাম</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='PS_name' type="text"value="{{$data_ps->PS_name}}" placeholder="থানার নাম" class="form-control form-control-line">
                            </div>
                        </div>
                       
                        <div class="form-group d-flex">
                            <div class="col-sm-12" style="width: 25%;"></div>
                            <div class="col-sm-12" style="width: 75%;">
                                <button href='insert_ps' class="btn btn-success text-white">আপডেট করুন</button>
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



