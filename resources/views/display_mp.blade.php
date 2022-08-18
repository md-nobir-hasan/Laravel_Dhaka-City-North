
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
                  <h4 class="title_page">এম পি এর  তথ্য অনুসন্ধান করুন</h4>
              </div>
        
              <div class="col-7 align-self-center">
                  <div class="d-flex align-items-center justify-content-end">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item">
                                  <a href="#">হোম</a>
                              </li>
                              <li class="breadcrumb-item active" aria-current="page">এম পি তথ্য</li>
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
          <div class="col-12  w-75 m-auto unit-item">
            <div class="card">
                <div class="card-body">
                    <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                    <form action='mp_report' method="GET" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
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
          <!-- ============================================================== -->
          <!-- Add Police Station -->
          <!-- ============================================================== -->


            @if(isset($data_mp))
          <div class="row  custom-table-design-row" >
              <!-- column -->
              
              <div class="col-12 p-0 mx-auto">
                  <div class="card">
                      <div class="table-responsive">
                        
                            <div class="row">
                            
                                @foreach($data_mp as $data) 
                                <div class="col-lg-6">
                                      <div class="box">
                                          <div class="img">
                                          <img src="{{asset("storage/image/$data->mp_img")}}" alt="Image">
                                          </div>
                                          <div class="details">
                                          <label class="name-item" for="name"> {{ $data->mp_name}}</label > <br>
                                        {{-- <label class="d_name" for="name">{{ $data->d_name}}</label><br><br> --}}
                                        {{-- <label class="make_hi" for="name"><strong class="make_hi">স্থান: </strong> {{ $data->name }}</label><br> --}}
                                        
                                        
                                        <label class="phone"  ><strong id="phone" class="phone phone_strong stonger">ফোন : </strong> <a id="phone_number" class="phone_num" href="tel:{{ $data->mp_phone}}">{{ $data->mp_phone}}</a> </label><br>
                                        <label class="email" ><strong class="email_strong stonger">ই-মেইল : </strong> <span>{{ $data->mp_email}}</span></label><br>
                                        <label class="dob" ><strong class="dob stonger">জন্ম তারিখ : </strong> <span>{{ $data->mp_dob}}</span></label><br>
                                            {{-- <strong>Name: </strong>
                                            <strong>Email :</strong>
                                            <strong>Phone:</strong>  --}}
                                            
                                          </div>
                                      </div>
                                     
                                </div>
                                @endforeach
                                @endif
                               
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
    {{-- <footer> --}}
        <footer class="footer text-center">
           <div class="footer_login">
               All Rights Reserved by <br>
               <div id="tooltip">
                   <span id="tooltipText">এখানে ক্লিক করুন</span>
                   <a href="http://www.nazmuljewel.com/" target="_blank" style="color:black; font-size:23px; text-decoration:none;">নাজমুল আলম ভূইয়া জুয়েল </a> <br>
                </div>
               <span class="footer_span">বিজ্ঞান ও প্রযুক্তি বিষয়ক সম্পাদক</span>
               <div id="tooltip">
                    <span id="tooltipText">এখানে ক্লিক করুন</span>
                    <a href="https://www.albd-dcn.org/" target="_blank" style="color:green; font-size:23px; text-decoration:red;">ঢাকা মহানগর উত্তর আওয়ামী লীগ</a> 
                </div>
           </div>
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
  </script>
      
  @endsection


  

