<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ঢাকা মহানগর উত্তর আওয়ামী লীগ</title>
    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="{{asset('assets/login.css')}}" rel="stylesheet">

</head>
<body>
  
   <div class="container">
      <div class="login_header" style=" display: flex;
      justify-content: center;
      flex-direction: column;
      align-items: center;">
        <div class="logo_img">
            <img src="{{asset('assets/images/logo1.png')}}" alt="homepage" style=""/>
           </div>
           <div class="logo_title">
            <h3 class="company_name">ঢাকা মহানগর উত্তর আওয়ামী লীগ</h3>
           </div>
      </div>
   </div>
   

    <div id="login">
        <div class="container">

            

            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{url('login')}}" method="post">
                            @csrf
                            <h3 class="text-center text-info">লগইন</h3>
                            @if(session()->has('message'))
                        @if(session()->get('message')=='0')
                        <div class="alert alert-danger">
                            <p>আপনার আইডি নাম্বার  এবং পাসওয়ার্ড ভুল</p>
                        
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
                            <div class="form-group">
                                <label for="username" class="text-info">আইডি নং :</label><br>
                                <input type="text" name="phone_num" id="phone_num" class="form-control">
                            </div>
                            <div class="form-group" id="pass_eye">
                                <label for="password" class="text-info">পাসওয়ার্ড :</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                                <span class="p-viewer">
                                    <i class="fa fa-eye" aria-hidden="true"  onclick="myFunction()"></i>
                                </span>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="লগইন">
                            </div>

                            <div id="register-link" class="text-right">
                            
                            </div>
                         
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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



  <script>
   function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
  </script>



</body>
</html>