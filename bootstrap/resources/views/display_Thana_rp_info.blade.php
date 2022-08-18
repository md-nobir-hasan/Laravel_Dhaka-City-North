
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
                  <h4 class="title_page">থানা কমিটি তথ্য দেখুন</h4>
              </div>
        
              <div class="col-7 align-self-center">
                  <div class="d-flex align-items-center justify-content-end">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item">
                                  <a href="#">হোম</a>
                              </li>
                              <li class="breadcrumb-item active" aria-current="page">থানা কমিটি তথ্য দেখুন</li>
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

        <div class="col-12  w-75 m-auto">
            <div class="card">
                <div class="card-body">
                    <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                    <form action='thana_report' method="POST" class="form-horizontal form-material mx-2">
                      @csrf
                      <div class="form-group d-flex">
                        <label class="col-sm-12" style="width: 25%;"> আসন </label>
                        <div class="col-sm-12" style="width: 75%;">
                            <select id="p_id" name="p_id" class="form-select shadow-none form-control-line" onchange="data_fetch()">
                                <option>আসন </option>
                                @foreach($data_p as $value)
                            <option value="{{$value->id}}">{{$value->name.'-'.$value->no}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <label class="col-sm-12" style="width: 25%;">থানা কমিটি</label>
                        <div class="col-sm-12" style="width: 75%;">
                            <select id="ps_id" name="ps_id" class="form-select shadow-none form-control-line">
                                <option> থানা কমিটি</option>
                                
                            </select>
                        </div>
                    </div>
                       
                        <div class="form-group d-flex">
                            <div class="col-sm-12" style="width: 25%;"></div>
                            <div class="col-sm-12" style="width: 75%;">
                                <button href='insert_ps' class="btn btn-success text-white">অনুসন্ধান করুন</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
          <!-- ============================================================== -->
          <!-- Add Police Station -->
          <div class="col-12  w-75 m-auto">
              
          </div>

          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Add Police Station -->
          <!-- ============================================================== -->



          <div class="row">
              <!-- column -->
              <div class="col-12  m-auto">
                  <div class="card">
                      <div class="table-responsive">
                        
                            <div class="row">
                                @foreach($data_thana as $data) 
                                <div class="col-sm-6">
                                      <div class="box">
                                          <div class="img">
                                          <img src="{{asset("storage/image/$data->rp_img")}}" alt="Image">
                                          </div>
                                          <div class="details">
                                            {{-- <strong>Name: </strong>
                                            <strong>Email :</strong>
                                            <strong>Phone:</strong>  --}}
                                            
                                             
                                            <label for="name"><strong class="make_hi">Name: </strong> {{ $data->rp_name}}</label><br>
                                            <label for="email"><strong class="make_hi">Email: </strong> {{ $data->rp_email}}</label><br>
                                            <label for="Phone" ><strong id="phone" class=" phone make_hi">Phone: </strong> <a id="phone_number" class="phone_num" href="tel:{{ $data->rp_phone}}">{{ $data->rp_phone}}</a> </label><br>
                                            
                                          </div>
                                      </div>
                                     
                                </div>
                                @endforeach
                               
                                </div>
                                
                            </div>
                           
                
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

  @section('javaScript')
  <script>
      $(document).ready(function(){
          $('#phone').on('click',function(){
            //   alert('ok');
            $('#phone_number').show();
          });
            
      });


      function data_fetch()
            { 
                var p_id =  $('#p_id').val();
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/ps_ajax/"+p_id,
                    success:function(respose){
                        console.log(respose);
                        var data = '<option> থানা কমিটি</option>';
                        var data = data +'<option value="*">সকল থানা কমিটি</option>';
                        $.each(respose,function(key,value){

                            data = data + '<option value="'+value.id+'">'+value.PS_name+'</option>';
                            
                        });
                        $('#ps_id').html(data);
                    }
                });
                    
            }
  </script>
      
  @endsection


  

