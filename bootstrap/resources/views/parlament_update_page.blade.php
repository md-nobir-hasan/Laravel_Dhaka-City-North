@extends('layout.master')
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="title_page">আসন</h4>
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
                            <li class="breadcrumb-item active" aria-current="page">আসন</li>
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
        <!-- Add Parlament Informatiom -->
        <!-- ============================================================== -->
        <div class="col-12  w-75 m-auto">
            <div class="card">
                <div class="card-body">
                    <form action='/update_parlament/{{$data->id}}' method="POST" class="form-horizontal form-material mx-2">
                       @csrf 
                       @method('put')
                    <div class="form-group">
                            <!--<label class="col-sm-12">Add Parlament Informatiom</label>-->
                            <div class="col-sm-12">
                                <select name="name" class="form-select shadow-none form-control-line">
                                    <option value="ঢাকা">ঢাকা</option>
                                 </select>
                                <!-- <input name='name' type="text" placeholder="Name" class="form-control form-control-line"> -->
                                <input name='no' type="text" placeholder="আসন" class="form-control form-control-line" value="{{$data->no}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white">যোগ করুন</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Add Parlament Informatiom -->
        <!-- ============================================================== -->






        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
     
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
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