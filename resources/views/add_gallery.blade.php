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
                        <h4 class="title_page">গ্যালারি যোগ করুন</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">গ্যালারি</li>
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


            @if($errors->any())
            <div class="alert alert-danger">
               
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif



          <div class="container">
              <div>
                <div class="form-group d-flex">
                    <label class="col-sm-12" style="width: 25%;">ফোল্ডার</label>
                  <div class="col-sm-12" style="width: 75%;">
                      <select id="select_folder" class="select_folder" name='select_folder' class="form-select shadow-none form-control-line" onchange="data_fetch()">
                          <option value="folder1">কোভিড</option>  
                          <option value="folder1">জাতীয়</option>  
                          <option value="folder1">সম্মেলন</option>  
                          <option value="folder1"> গ্যালারি</option>  
                      </select>
                  </div>
              </div>
              </div>
          </div>




            <div class="container-fluid">
               

                <!-- ============================================================== -->
                <!-- Add Police Station -->
                <div class="col-12  w-75 m-auto">
                    <div class="card">
                        
                        <div class="card-body">
                            <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                           <div id="form_folder1" class="form_folder1">
                            <form action='/insert_gallery' method="POST" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                                @csrf
  
                               
                             
                                  <div class="form-group d-flex">
                                      <label class="col-sm-12" style="width: 25%;">গ্যালারি</label>
                                      <div class="col-sm-12" style="width: 75%;">
                                          <input name='img' type="file" class="form-control form-control-line" >
                                      </div>
                                  </div>
                                 
                                  <div class="form-group d-flex">
                                      <div class="col-sm-12" style="width: 25%;"></div>
                                      <div class="col-sm-12" style="width: 75%;">
                                          <button type="submit" class="btn btn-success text-white">যোগ করুন</button>
                                      </div>
                                  </div>
                              </form>
                           </div>
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
                    <div class="col-12   m-auto">
                        <div class="card">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0 text-center">সি. নং</th>
                                            <th class="border-top-0 text-center">গ্যালারি </th>
                                            <th class="border-top-0 text-center">অপারেশন</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data_g as $data)
                                        <tr>
                                        <!--  -->
                                            <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$loop->index+1}}
                                            </td>

                                            <td class="td_n_img" style='line-height: 0.5;padding: .5rem;text-align: center'><img src='{{asset("storage/gallery/test/$data->image")}}' alt="">
                                            </td>

                                            <td class="td_css" style='line-height: 0.5;padding: .5rem;text-align: center'>
                                                
                                            <a  href='/update_page_ps/{{$data->id}}' name="btn_edit" class="btn btn-info" style='line-height: 0.5;padding: .5rem'><i class="bi bi-pen"></i></a>

                                            <form  class="spacing" method="POST" action='/delete/police_stations/{{$data->id}}'>
                                                @csrf
                                                @method('delete')
                                                <button id='custom-btn' class="btn btn-danger" onclick="return confirm('Are you sure??')"> <i class="bi bi-trash"></i></button>
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

        @section('javascript')
        <script>
             function data_fetch()
            { 
                var select_folder =  $('#select_folder').val();

                if(select_folder=='folder1')
                {
                        $('#form_folder1').show();
                }
                // $.ajax({
                //     type: "GET",
                //     dataType: 'json',
                //     url: "/ps_ajax/"+p_id,
                //     success:function(respose){
                //         var data = '<option value="">সিলেক্ট থানা</option>';
                //         $.each(respose,function(key,value){

                //             data = data + '<option value="'+value.id+'">'+value.PS_name+'</option>';
                            
                //         });
                        $('#ps_id').html(data);
                    }
                });
                    
            }

        </script>
            
        @endsection

 
        
    