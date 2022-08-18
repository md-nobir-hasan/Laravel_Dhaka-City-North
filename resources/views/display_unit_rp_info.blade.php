
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
                  <h4 class="title_page">ইউনিটের দায়িত্বভার ব্যক্তির তথ্য অনুসন্ধান করুন</h4>
              </div>
        
              <div class="col-7 align-self-center">
                  <div class="d-flex align-items-center justify-content-end">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item">
                                  <a href="#">হোম</a>
                              </li>
                              <li class="breadcrumb-item active" aria-current="page">ইউনিটের দায়িত্বভার ব্যক্তির তথ্য</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
      <div class="container-fluid">
    

        
        <div id="project" class="tabcontent">
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Add Word -->
            <div class="col-12 w-75 m-auto unit-item">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </div>
                            @endif
                        <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                        <form action='{{url("/unit_report")}}' method="GET" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                           @csrf
                            <div class="form-group d-flex">
                                <label class="col-sm-12" style="width: 25%;">আসন কমিটি </label>
                                <div class="col-sm-12" style="width: 75%;">
                                    <select id="p_id" name="p_id" class="form-select shadow-none form-control-line" onchange="data_fetch()">
                                        <option value=""> আসন</option>
                                        @foreach($data_p as $value)
                                    <option value="{{$value->id}}">{{$value->name.'-'.$value->no}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="col-sm-12" style="width: 25%;"> থানা কমিটি</label>
                                <div class="col-sm-12" style="width: 75%;">
                                    <select id="ps_id" name="ps_id" class="form-select shadow-none form-control-line" onchange="ps_func()">
                                        <option value=""> থানা</option>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-group d-flex">
                                <label class="col-sm-12" style="width: 25%;"> ওয়ার্ড কমিটি</label>
                                <div class="col-sm-12" style="width: 75%;">
                                    <select id="w_id" name="w_id" class="form-select shadow-none form-control-line" onchange="union_fetch()">
                                        <option value=""> ওয়ার্ড </option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="col-sm-12" style="width: 25%;">ইউনিট কমিটি</label>
                                <div class="col-sm-12" style="width: 75%;">
                                    <select id="u_id" name="u_id" class="form-select shadow-none form-control-line">
                                        <option value=""> ইউনিট</option>
                                        
                                    </select>
                                </div>
                            </div>
                         

                           
                            <div class="form-group d-flex">
                                <div class="col-sm-12" style="width: 25%;"></div>
                                <div class="col-sm-12" style="width: 75%;">
                                    <button class="btn btn-success text-white" id="#search_all">অনুসন্ধান করুন </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
             @if(isset($all_thana))
            <div class="row custom-table-design-row w-75 mx-auto">
              
                <div class="col-12 m-auto p-0">
                    <div class="card">
                    
                    <h4>
                            
                             {{$data_unit[0]->name.'-'. $data_unit[0]->no}}/{{$all_thana}}/{{$all_ward}}
                            @endif
                            
                        </h4>
                        <div class="table-responsive">
                            @php
                                
                            @endphp
                            <div class="row">
                            @if(isset($data_unit2) && isset($data_unit))
                                @php
                                $count1=count($data_unit);
                                $count2=count($data_unit2);
                                $count = min($count1,$count2);
                                @endphp
                                
                            
                            @for($i=0;$i<$count;$i++)
                           
                            
                               @php
                                    $data = $data_unit[$i]
      
                                @endphp 
                               <div class="col-lg-6">
                                <div class="box">
                                    <div class="img">
                                    <img class=" border border-success border-2" src="{{asset("storage/image/null_img.png")}}" alt="Image">
                                    </div>
                                    <div class="details" >
                                      
                                        <label class="name-item" for="name"> {{ $data->rp_name}}</label > <br>
                                            <label class="designation-item">{{ $data->d_name}}</label><br><br>
                                        {{-- <label class="d_name" for="name">{{ $data->d_name}}</label><br><br> --}}
                                        {{-- <label class="make_hi" for="name"><strong class="make_hi">স্থান: </strong> {{ $data->PS_name }}</label><br> --}}
                                        <label class="unit" ><strong class="unit_strong stonger">ইউনিট : </strong> {{ $data->union_name}}</label><br>
                                        
                                        <label class="phone"  ><strong id="phone" class="phone phone_strong stonger">ফোন : </strong> <a id="phone_number" class="phone_num" href="tel:{{ $data->rp_phone}}">{{ $data->rp_phone}}</a> </label><br>
                                        <label class="phone"  ><strong id="phone" class="phone phone_strong stonger">এন আইডি নং: </strong> {{ $data->rp_nid}} </label><br>
                                        
                                        <label class="email" ><strong class="email_strong stonger">ই-মেইল : </strong> <span>{{ $data->rp_email}}</span></label><br>
                                        <label class="dob" ><strong class="dob stonger">জন্ম তারিখ : </strong> <span>{{ $data->rp_dob}}</span></label><br>
                                    </div>
                                </div>
                               
                          </div>
                          {{-- @elseif($i%2==1) --}}
                          @php
                            $data = $data_unit2[$i]
                        @endphp
                          <div class="col-lg-6">
                            <div class="box">
                                <div class="img">
                                <img class=" border border-success border-2"  src="{{asset("storage/image/null_img.png")}}" alt="Image">
                                </div>
                                <div class="details" >
                                  
                                     <label class="name-item" for="name"> {{ $data->rp_name}}</label > <br>
                                            <label class="designation-item">{{ $data->d_name}}</label><br><br>
                                        {{-- <label class="d_name" for="name">{{ $data->d_name}}</label><br><br> --}}
                                        {{-- <label class="make_hi" for="name"><strong class="make_hi">স্থান: </strong> {{ $data->PS_name }}</label><br> --}}
                                        <label class="unit" ><strong class="unit_strong stonger">ইউনিট : </strong> {{ $data->union_name}}</label><br>
                                        <label class="phone"  ><strong id="phone" class="phone phone_strong stonger">ফোন : </strong> <a id="phone_number" class="phone_num" href="tel:{{ $data->rp_phone}}">{{ $data->rp_phone}}</a> </label><br>
                                        <label class="phone"  ><strong id="phone" class="phone phone_strong stonger">এন আইডি নং: </strong> {{ $data->rp_nid}} </label><br>
                                        <label class="email" ><strong class="email_strong stonger">ই-মেইল : </strong> <span>{{ $data->rp_email}}</span></label><br>
                                        <label class="dob" ><strong class="dob stonger">জন্ম তারিখ : </strong> <span>{{ $data->rp_dob}}</span></label><br>
                                    
                                </div>
                            </div>
                           
                      </div>
                    
                             

                               @endfor
                            @endif
                             
                              

                                
                               
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
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
        //   $('.phone').each(function(i){
        //     //   console.log("yes");
        //         $(this).on('click',function(){
        //             // console.log("yes");
        //         $('.phone_num:eq('+i+')').show();
        //         $('.phone_num:gt('+i+')').hide();
        //         $('.phone_num:lt('+i+')').hide();
        //     });
        //   });
          $("#search_all").click(function(){
              console.log("yes");
                $(".custom-table-design-row").show()
            });   
            
      });
  </script>
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
                      var data = '<option value="">থানা</option>';
                      var data = data + '<option value="সকল" >সকল থানা</option>';
                      $.each(respose,function(key,value){

                          data = data + '<option value="'+value.id+'">'+value.PS_name+'</option>';
                          
                      });
                      $('#ps_id').html(data);
                      $("#ps_id").children('option:eq(1)').hide();
                  }
              });
                  
          }


          function ps_func(){

              var p_id =  $('#p_id').val();
              var ps_id =  $('#ps_id').val();
              
              $.ajax({
                  type: "GET",
                  dataType: 'json',
                  url: "/w_ajax/"+p_id+"/"+ps_id,
                  success:function(respose){
                      var data = '<option value="">ওয়ার্ড</option>';
                      var data = data + '<option value="সকল">সকল ওয়ার্ড</option>';
                      $.each(respose,function(key,value){

                          data = data + '<option value="'+value.id+'">'+value.w_number+'</option>';
                          
                      });
                      $('#w_id').html(data);
                      $("#w_id").children('option:eq(1)').hide();
                  }
              });
          }

          function union_fetch(){
              console.log("yes")

              var p_id =  $('#p_id').val();
              var ps_id =  $('#ps_id').val();
              var w_id =  $('#w_id').val();
              console.log(p_id,ps_id,w_id)
            
              $.ajax({
                  type: "GET",
                  dataType: 'json',
                  url: "/u_ajax/"+p_id+"/"+ps_id+"/"+w_id,
                  success:function(respose){
                     console.log(respose)
                      var data = '<option value="">ইউনিট</option>';
                      var data = data + '<option value="সকল">সকল ইউনিট</option>';
                      $.each(respose,function(key,value){

                          data = data + '<option value="'+value.id+'">'+value.union_name+'</option>';
                          
                      });
                      $('#u_id').html(data);
                  }
              });
          }


      </script>

      
  @endsection


  

