@extends('layout.master')
<!-- Page wrapper  -->
<!-- ============================================================== -->
@section('content')

<style>
   
    
   #myImg {

border-radius: 5px;
cursor: pointer;
transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}


#myImg2 {

border-radius: 5px;
cursor: pointer;
transition: 0.3s;
}

#myImg2:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
display: none; /* Hidden by default */
position: fixed; /* Stay in place */
z-index: 50; /* Sit on top */
padding-top: 100px; /* Location of the box */
left: 0;
top: 0;
width: 100%; /* Full width */
height: 100%; /* Full height */
overflow: auto; /* Enable scroll if needed */
background-color: rgb(0,0,0); /* Fallback color */
background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
margin: auto;
display: block;
width: 80%;
max-width: 700px;
}

/* Caption of Modal Image */
#caption {
margin: auto;
display: block;
width: 80%;
max-width: 700px;
text-align: center;
color: #ccc;
padding: 10px 0;
height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
-webkit-animation-name: zoom;
-webkit-animation-duration: 0.6s;
animation-name: zoom;
animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
from {-webkit-transform:scale(0)} 
to {-webkit-transform:scale(1)}
}

@keyframes zoom {
from {transform:scale(0)} 
to {transform:scale(1)}
}

/* The Close Button */
.close {
position: absolute;
top: 35px;
right: 35px;
color: #f1f1f1;
font-size: 40px;
font-weight: bold;
transition: 0.3s;
}

.close:hover,
.close:focus {
color: #bbb;
text-decoration: none;
cursor: pointer;
}


.gallery-title{
    font-weight: bolder;
    font-size: 18px;
    color: green;
}
hr{
    height: 10px;
   padding: 5px;
   color: green;
}
.gallery{
    margin-bottom: 15px;
}

.gallery_img .img img{
    /* max-height: 168px; */
    min-height: 168px;
    width: 100%;
    margin-bottom: 10px;
    object-fit: cover;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
.modal-content {
  width: 100%;
}
.gallery_img .img img{
    min-height: unset;
    max-height: 350px;
}
}

</style>



<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                {{-- <h4 class="title_page">গ্যালারি </h4> --}}
            </div>

            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">হোম</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">গ্যালারি </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    
             <div class="container gallery_img">
                <div class="row">
               
                    <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="gallery-title">কোভিট-১৯ চলাকালিন সময়ে ঢাকা মহানগর উত্তর আওয়ামীলীগের থানা, ওয়ার্ড ও ইউনিট পর্যায়ে খাদ্য সামগ্রী, অক্সিজেন সিলিন্ডার সরবরাহ, অ্যাম্বুলেন্স সার্ভিস, মাক্স, পিপি সরবরাহ কর্মসূচি</span><br>
                    </div>

                    <br>

                    <div class="col-md-3 col-sm-6 img">
                        <img id="myImg"  src={{asset('storage/gallery/covid/2.jpg')}}
                        data-bigger-src={{asset('storage/gallery/covid/2.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img   id="myImg"  src={{asset('storage/gallery/covid/10.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img   id="myImg"  src={{asset('storage/gallery/covid/100.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img  id="myImg"  src={{asset('storage/gallery/covid/11.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img id="myImg"  src={{asset('storage/gallery/covid/103.jpg')}}
                        data-bigger-src={{asset('storage/gallery/covid/103.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img   id="myImg"  src={{asset('storage/gallery/covid/13.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img   id="myImg"  src={{asset('storage/gallery/covid/14.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img  id="myImg"  src={{asset('storage/gallery/covid/20.jpg')}}>
                    </div>

                    <div class="col-md-3 col-sm-6 img">
                        <img id="myImg"  src={{asset('storage/gallery/covid/1.jpg')}}
                        data-bigger-src={{asset('storage/gallery/covid/1.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img   id="myImg"  src={{asset('storage/gallery/covid/17.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img   id="myImg"  src={{asset('storage/gallery/covid/18.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img  id="myImg"  src={{asset('storage/gallery/covid/19.jpg')}}>
                        
                    </div>

                    <div class="col-md-3 col-sm-6 img">
                        <img id="myImg"  src={{asset('storage/gallery/covid/30.jpg')}}
                        data-bigger-src={{asset('storage/gallery/covid/30.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img   id="myImg"  src={{asset('storage/gallery/covid/25.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img   id="myImg"  src={{asset('storage/gallery/covid/21.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img  id="myImg"  src={{asset('storage/gallery/covid/28.jpg')}}>
                        
                    </div>

                      <div class="col-md-3 col-sm-6 img">
                        <img id="myImg"  src={{asset('storage/gallery/covid/4.jpg')}}
                        data-bigger-src={{asset('storage/gallery/covid/4.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img   id="myImg"  src={{asset('storage/gallery/covid/5.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img   id="myImg"  src={{asset('storage/gallery/covid/6.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img  id="myImg"  src={{asset('storage/gallery/covid/46.jpg')}}>
                        
                    </div>

                    
                   

                </div>
                 <hr>
                  


                 <div class="row">
               
                    <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="gallery-title">ঢাকা মহানগর উত্তর আওয়ামীলীগের সকল ইউনিট সমূহের ত্রি-বার্ষিক সম্মেলন,২০২১</span>
                    </div><br>

                    <div class="col-md-3 col-sm-6 img">
                        <img  id="myImg"  src={{asset('storage/gallery/sommelon/1.jpg')}}
                        data-bigger-src={{asset('storage/gallery/sommelon//1.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img   id="myImg"  src={{asset('storage/gallery/sommelon/2.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img   id="myImg"  src={{asset('storage/gallery/sommelon/3.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img id="myImg"  src={{asset('storage/gallery/sommelon/4.jpg')}}>
                    </div>
                   

                </div>
                 <hr>


                 <div class="row">
               

                    <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="gallery-title">ঢাকা মহানগর উত্তর আওয়ামীলীগের কার্যনির্বাহী কমিটির বর্ধিত সভা,বিভিন্ন থানা ও ওয়ার্ড পর্যায়ের মিটিং সমূহ </span>
                    </div><br>


                    <div class="col-md-3 col-sm-6 img">
                        <img  id="myImg"  src={{asset('storage/gallery/mitting/1.jpg')}}
                        data-bigger-src={{asset('storage/gallery/mitting/1.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img   id="myImg"  src={{asset('storage/gallery/mitting/2.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img   id="myImg"  src={{asset('storage/gallery/mitting/3.jpg')}}>
                    </div>
                    <div class="col-md-3 col-sm-6 img">
                        <img id="myImg"  src={{asset('storage/gallery/mitting/4.jpg')}}>
                    </div>
                    

                </div>
                 <hr>


                 <div class="row">
               

                    <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="gallery-title">ঢাকা মহানগর উত্তর আওয়ামীলীগের জাতীয় পর্যায়ে কর্মসূচি পালন</span><br>
                    </div><br>


                    <div class="col-md-3 img">
                        <img  id="myImg"  src={{asset('storage/gallery/national/1.jpg')}}
                        data-bigger-src={{asset('storage/gallery/national/1.jpg')}}>
                    </div>
                    <div class="col-md-3 img">
                        <img   id="myImg"  src={{asset('storage/gallery/national/2.jpg')}}>
                    </div>
                    <div class="col-md-3 img">
                        <img   id="myImg"  src={{asset('storage/gallery/national/3.jpg')}}>
                    </div>
                    <div class="col-md-3 img">
                        <img  id="myImg"  src={{asset('storage/gallery/national/4.jpg')}}>
                    </div>
                   

                </div>
                 {{-- <hr> --}}

                 

                   

                   

                   


                                                                        <!-- The Modal -->
                    <div id="myModal" class="modal">
                    <span class="close">&times;</span>      
                            
                    <img id="modal-img" class="modal-content"  src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQS2ol73JZj6-IqypxPZXYS3rRiPwKteoD8vezk9QsRdkjt3jEn&usqp=CAU">
                        
                    
                    <div id="caption">

                    </div>
                    </div>

                 

                   

                </div>
                
            </div>
      
    </div>
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

</div>




       
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");
            
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            // var img = document.getElementById("myImg");
            var modalImg = document.getElementById("modal-img");
            var captionText = document.getElementById("caption");
            // img.onclick = function(){
            //   modal.style.display = "block";
            //   modalImg.src = this.src;
            //   captionText.innerHTML = this.alt;
            // }
            
            
            document.addEventListener("click", (e) => {
              const elem = e.target;
              console.log('yes');
              if (elem.id==="myImg") {
                modal.style.display = "block";
                modalImg.src = elem.dataset.biggerSrc || elem.src;
                captionText.innerHTML = elem.alt; 
              }
            })
            
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() { 
              modal.style.display = "none";
            }
                </script>

 @endsection



