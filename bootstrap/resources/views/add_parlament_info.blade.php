
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
                  <h4  class="title_page">সংসদীয় এলাকা যোগ করুন</h4>
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
          <!-- Add Police Station -->
          <div class="col-12  w-75 m-auto">
              <div class="card">
                  <div class="card-body">
                      <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                      <form action='insert_parlament' method="POST" class="form-horizontal form-material mx-2">
                        @csrf
                      <div class="form-group d-flex">
                        
                              <label class="col-sm-12" style="width: 25%;">আসন</label>
                              <div class="col-sm-12" style="width: 75%;">
                                  <select name='name' class="form-select shadow-none form-control-line">
                                      <option value="ঢাকা">ঢাকা</option>  
                                  </select>
                              </div>
                          </div>
                          <div class="form-group d-flex">
                              <label class="col-sm-12" style="width: 25%;"> আসন নং</label>
                              <div class="col-sm-12" style="width: 75%;">
                                  <input name='no' type="text" placeholder="আসন নং" class="form-control form-control-line">
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

          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Add Police Station -->
          <!-- ============================================================== -->



          <div class="row">
              <!-- column -->
              <div class="col-12   m-auto">
                  <div class="card">
                      <div class="table-responsive">
                          <table id="datatable" class="table table-hover table-bordered">
                              <thead>
                                  <tr>
                                      <th class="border-top-0 text-center">সি. নং</th>
                                      <th class="border-top-0 text-center">আসন </th>
                                      <th class="border-top-0 text-center">অপারেশন</th>
                                  </tr>
                              </thead>
                              <tbody>
                              @foreach($data as $data)
                                  <tr>
                                  <!--  -->
                                      <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$loop->index+1}}
                                      </td>
                                      <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->name.'-'.$data->no}}</td>
                                      <td class='td_css' style='line-height: 0.5;padding: .5rem;text-align: center'>
                                      <a  href='/parlament_update_page/{{$data->id}}' name="btn_edit" class="btn btn-info" style='line-height: 0.5;padding: .5rem'><i class="bi bi-pen"></i></a>
                                      <form class="spacing" method="POST" action='/delete/parlament_seat/{{$data->id}}' >
                                        @csrf
                                                @method('delete')
                                                <button id='custom-btn' data-confirm='Are you sure??' class="btn btn-danger"> <i class="bi bi-trash" onclick="return confirm('Are you sure??')"></i> </button>
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
    </footer>
      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
  </div>
 
      
  @endsection


  

