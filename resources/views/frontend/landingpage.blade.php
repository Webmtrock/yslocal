@extends('frontend.master')
@section('title', 'landingpage')
@section('content')
<section class="top_section top_section_align">
   <div class="container">
      <div class="row">
         <div class="col-sm-6">
            <img src="{{ asset('public/images/logo.png') }}">
         </div>
         <div class="col-sm-6">
            <div class="right_align">
               <button class="cta_button" data-bs-toggle="modal" data-bs-target="#paidModal">{{$landingPage->button_name}}</button>  
            </div>
         </div>
      </div>
   </div>
</section>
<section class="hero_section_landingpage py-5">
   <div class="text-center effective_bg text-white py-5">
      {!! $landingPage->section1_des !!}
      <button class="cta_button" data-bs-toggle="modal" data-bs-target="#paidModal">{{$landingPage->button_name}}</button>
   </div>
</section>


                              
@if ($webinar->webinar_price != 0)             
               <!-- <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY_ID') }}"
                  data-amount="10"
                  data-buttontext="Subscribe"
                  data-name="Yellowsquash.in" data-description="Program Payment"
                  data-image="https://projectstaging.live/public/images/logo.png"
                  

                  data-theme.color="#ff7529" class="yst-btn plan-subs">
               </script> -->
@endif
            
                            

                            
<div class="container">    
<div class="row">
<div class="col-sm-12">
    

<div class="video_section text-center">
   <video width="800" height="415" controls
      poster="https://yellowsquash.health/wp-content/uploads/2024/02/WhatsApp_Image_2023-06-26_at_00.27.59.webp">
      <source
         src="{{ ($webinar->webinar_video ?? '') }}"
         type="video/mp4">
   </video>
</div>
</div>   
</div>
</div>


<section>
   <div class="container">
      <div class="row">
         <div class="col-sm-6 ">
            <div class="box-area">
               <span class="icon">
               <i class="fa-solid fa-calendar-days"></i>
               </span>
               <span>
                  <h4>{{ \Carbon\Carbon::parse($webinar->webinar_start_date)->format('d F Y') }}</h4>
               </span>
            </div>
         </div>
         <div class="col-sm-6">
            <div class="box-area">
               <span class="icon">
               <i class="fa-regular fa-clock"></i>
               </span>
               <span>
                  <h4>{{ \Carbon\Carbon::parse($webinar->start_time)->format('h:i a') }}</h4>
               </span>
            </div>
         </div>
         <div class="col-sm-6">
            <div class="box-area">
               <span class="icon">
               <i class="fa-regular fa-clock"></i>
               </span>
               <span>
                  <h4>{{$landingPage->section2_session}}</h4>
               </span>
            </div>
         </div>
         <div class="col-sm-6">
            <div class="box-area">
               <span class="icon">
               <i class="fa-solid fa-language"></i>
               </span>
               <span>
                  <h4>{{$webinar->expert->expert_language}}</h4>
               </span>
            </div>
         </div>
      </div>
   </div>
</section>


<div class="container">    
<div class="row">
<div class="col-sm-12">
<section>
   <div class="text-center">
      <h3 class="mt-5">{{$landingPage->section2_title}}</h3>
      <button class="btn_3 " data-bs-toggle="modal" data-bs-target="#paidModal">{{$landingPage->button_name}}</button>
   </div>
   <div class="modal fade" id="paidModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content bg-white">
                                  <div class="modal-header text-center">
                                      <span class="modal-title" id="exampleModalLabel">{{$webinar->webinar_title}}</span>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <!-- Form for paid webinar registration -->
                                      @if ($webinar->webinar_price != 0)
                                   
                                      <form id="paymentForm" action="{{route('razorpay.paid.workshop')}}" method="post">
                                     
                                          @csrf
                                          <input type="hidden" name="wibiner_id" value="{{$webinar->id}}">
                                          <input type="hidden" name="webinar_price" value="{{$webinar->webinar_price*100}}"> 
                                          <input type="hidden" name="form_type" value="landing"> 
                                          <input type="hidden" name="landing_page_id" value="{{$landingPage->id}}"> 
                                              <div class="mb-3">
                                                  <input type="text" class="form-control" name="name" id="name_val" placeholder="Full Name" value="" required>
                                                  <span class="name_error" class="text-danger" style="color:red;"></span>
                                              </div> 
                                              <div class="mb-3">
                                                  <input type="text" class="form-control" name="email" id="email_val" placeholder="Email id"  value="" required>
                                                  <span class="email_error" class="text-danger" style="color:red;"></span>
                                              </div>
                                              <div class="mb-3">
                                                  <input type="text" class="form-control" name="phone" id="phone_val" placeholder="Phone number"  value="" required>
                                                  <span class="phone_error" class="text-danger" style="color:red;"></span>
                                              </div>
                                        
                                      </div>
                                      <div class="modal-footer">
                                       
                                              <button type="button" class="btn btn-success w-25" id="payNowBtn">Pay now</button>
                                        
                                      </div>
                                  </form>
                                  @else
                                  <form action="{{route('razorpay.free.workshop')}} " method="POST" id="">
                                 
                                    @csrf
                                    <input type="hidden" name="type" value="free">
                                    <input type="hidden" name="wibiner_id" value="{{$webinar->id}}">
                                    <input type="hidden" name="form_type" value="landing">
                                    <input type="hidden" name="landing_page_id"  value="{{$landingPage->id}}"> 

                                             <div class="mb-3">
                                                  <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                                                  <span class="name_error" class="text-danger"></span>
                                              </div>
                                              <div class="mb-3">
                                                  <input type="text" class="form-control" name="email" placeholder="Email id" required>
                                                  <span class="email_error" class="text-danger"></span>
                                              </div>
                                              <div class="mb-3">
                                                  <input type="text" class="form-control" name="phone" placeholder="Phone number" required>
                                                  <span class="phone_error" class="text-danger"></span>
                                              </div>
                                    
                                    <input type="submit" class="btn btn-success w-25" id="" value="Submit Now">
                                   
                                  </form>  
                                  @endif
                              </div>
                          </div>
                      </div>
</section>
</div>
</div>
</div>


<section class="mt-5">
   <div class="container banner-2">
      <div class="row">
         <div class="col-lg-6">
            <h3>Meet Our Expert</h3>
            <h4 class="mt-5">{{$webinar->expert->name??''}}</h4>
            <h5 class="mt-4">{{$webinar->expert->expert_qualification??''}}</h5>
            <p>{!!$webinar->expert->expert_description??''!!}</p>
          
          
         </div>
         <div class="col-lg-6" style="text-align: center;">
            <img src="{{url('uploads/expert-profile/'.$webinar->expert->expert_profile)}}" class="img-icon" alt="" >
         </div>
      </div>
   </div>
</section>
<section class="banner_section mt-3">
   <div class="container">
      <div class="text-center">
         {!!$landingPage->section3_des!!}
      </div>
      <div class="row">
        
         @foreach($section_3 as $data)
         <div class="col-lg-6">
            <div class="box-area text-center">
               <span>
                  <h4>{{$data->value??''}}</h4>
               </span>
            </div>
         </div>
        @endforeach
      </div>
   </div>
</section>
<div class="row">
   <section class="video_sec py-5">
      <div class="container">
         <h2 class="text-center">{{$landingPage->section4_title}}</h2>
         <div class="row gap-6">
         @if($webinar_videos->isEmpty())
                                 <div class="item">
                                    <div class="comments-list text-center">
                                       No Video Available
                                    </div>
                                 </div>
            @else
            @foreach($webinar_videos as $data)
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 align-items-center">
               <video width="300" height="240" controls
                  poster="https://yellowsquash.health/wp-content/uploads/2024/02/13-1.webp">
                  <source
                     src="{{url('/uploads/'.$data->video)}}"
                     type="video/mp4">
               </video>
            </div>
            @endforeach
            @endif
         
         </div>
      </div>
   </section>
</div>
<section class="workshop_section  py-5">
   <h2 class="text-center mb-5">{{$landingPage->section5_title}}
   </h2>
   <div class="row">
   @foreach($section_5 as $section5_data)
   <div class="col-xs-1 text-center change_format">
    {{$section5_data->value ??''}}
   </div>
   @endforeach
   </div>
   <div class="container">
      <h2 class="text-center pt-4 pb-5">
      {{$landingPage->section5_bottom_title}}
      </h2>
      <div class="row">
         <div class="col-lg-6">
            <div class="content_box text-center mx-2">
               <img
                  src="{{ asset('uploads/'.$landingPage->section5_image_first) }}"
                  alt="" style="height: 40%;"/>
               <div class="bonus_box">
                  
                  <h6>
                  {{$landingPage->section5_imgcontent_first}}
                  </h6>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="content_box text-center mx-2">
               <img
                  src="{{ asset('uploads/'.$landingPage->section5_image_sec) }}"
                  alt="" style="height: 40%;"/>
               <div class="bonus_box">
               <h6>
                  {{$landingPage->section5_imgcontent_sec}}
                  </h6>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="container mt-5 log-code">
   <div class="text-center boxes">
      <div class="row">
         <div class="web-calender change_design_counter">
                        <ul>
                        <li><p id="days">6</p><span>Days</span></li>
                        <li><p id="hours">16</p><span>Hours</span></li>
                        <li><p id="minutes">19</p><span>Minutes</span></li>
                        <li><p id="seconds">8</p><span>Seconds</span></li>
                        </ul>
                      </div> 
         
      </div>
      <div class="text-center">
         <h3>{{$landingPage->section6_title}}</h3>
         <button class="btn_3" data-bs-toggle="modal" data-bs-target="#paidModal">{{$landingPage->button_name}}</button>
      </div>
   </div>
</div>
<section class="health_fat py-5 mt-5">
   <div class="container">
      <h2 class="pb-4 text-center">
      {{$landingPage->section7_title}}
      </h2>
      <div class="row">
         @foreach($section_7 as $data)
         <div class="col-lg-6">
            <div class="carb_box">
               <p class="text-white">
                  {{$data->value}}
               </p>
            </div>
         </div>
         @endforeach
        
      </div>
      <h3 class="mt-5 text-center">
          {!! $landingPage->section7_des !!}
      </h3>
     
      <div class="text-center mt-5">
         <button class="text-white border-0 "data-bs-toggle="modal" data-bs-target="#paidModal">{{$landingPage->button_name}}</button>
      </div>
      <span class="mt-5 text-white text-center d-block"
         >Note: {{ $landingPage->section7_note_title }}
      </h3>
      </span>
   </div>
</section>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
   $(document).ready(function(){
    $('#payNowBtn').on('click',function(){
         var name = $('#name_val').val();
         var email = $('#email_val').val();
         var phone = $('#phone_val').val();
      
         if(name == null || name == ''){
         
           $('.name_error').text('Please enter name.');
         }else if(email == null || email == ''){
           
           $('.email_error').text('Please enter email.');
          
         }else if(phone == null || phone == ''){
            $('.phone_error').text('Please enter phone.');
         }
         else{
            var form = $('#paymentForm');
                     if (form) {
                     
                        var options = {
                           "key": "{{ env('RAZORPAY_KEY_ID') }}",
                           "amount": "{{ $webinar->webinar_price * 100 }}", // Amount in paisa
                           "currency": "INR",
                           "name": "Yellowsquash.in",
                           "description": "Program Payment",
                           "image": "https://projectstaging.live/public/images/logo.png",
                           "handler": function (response){
                                 // On success, submit the form
                                 form.submit();
                           },
                           "prefill": {
                                 "name": "{{ auth()->user()->name ?? '' }}",
                                 "email": "{{ auth()->user()->email ?? auth()->user()->phone ?? '' }}"
                           },
                           "theme": {
                                 "color": "#ff7529"
                           }
                        };
                        console.log(options);
                        var rzp = new Razorpay(options);
                        rzp.open();
                     }
         }
       });
      });
   </script>
@endsection()

<script>

                   
                        
                            
                          
                      
function updateCountdown() {
    
    const deadlineDate = "{{$webinar->webinar_start_date}}";
    const endTime = "{{$webinar->start_time ?? '00:00:00'}}"; // Assuming default time if not provided
    //console.log(endTime);
    
    // Convert time to 24-hour format
    //const timeRegex = /(\d{1,2})\.(\d{2})\s*(AM|PM)/i;
    const timeRegex = /(\d{1,2}):(\d{2})\s*(AM|PM)/i;
    
    const matches = endTime.match(timeRegex);
    
    if (!matches) {
       // console.error("Invalid time format:", endTime);
        return;
    }

    let hours = parseInt(matches[1], 10);
    const minutes = parseInt(matches[2], 10);
    const ampm = matches[3] ? matches[3].toUpperCase() : '';

    // Adjust hours for AM/PM
    if (ampm === 'PM' && hours < 12) {
        hours += 12;
    }
    if (ampm === 'AM' && hours === 12) {
        hours = 0;
    }
    
    const endTime24Hour = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:00`;
  
    // Combine date and time strings
    const deadlineString = `${deadlineDate} ${endTime24Hour}`;
    
    //console.log("Deadline String:", deadlineString); // Debug statement

    // Attempt to construct deadline as a Date object
    const deadline = new Date(deadlineString);
    
    //console.log("Deadline Date Object:", deadline); // Debug statement

    // Check if the constructed date is valid
    if (isNaN(deadline.getTime())) {
        console.error("Invalid date:", deadlineString);
        return;
    }

    // Get current date and time
    const now = new Date();

    // Check if the deadline is in the past
    if (deadline < now) {
        document.getElementById("days").innerText = '0';
        document.getElementById("hours").innerText = '0';
        document.getElementById("minutes").innerText = '0';
        document.getElementById("seconds").innerText = '0';
        return;
    }

    // Get time difference
    let timeDifference = deadline.getTime() - now.getTime();
    
    // Calculate countdown
    const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
    const hoursRemaining = Math.floor(timeDifference / (1000 * 60 * 60)) % 24;
    const minutesRemaining = Math.floor((timeDifference / 1000 / 60) % 60);
    const secondsRemaining = Math.floor((timeDifference / 1000) % 60);
    
    // Update countdown display
    if(days !== null && days !== ''){
      document.getElementById("days").innerText = days;
    }
    
    document.getElementById("hours").innerText = hoursRemaining;
    document.getElementById("minutes").innerText = minutesRemaining;
    document.getElementById("seconds").innerText = secondsRemaining;
}

// Update countdown every second
setInterval(updateCountdown, 1000);

// Initial call to update countdown immediately
updateCountdown();
</script>



<style>
   .top_section
   {
   background-color:#1D4245;
   padding: 15px 0px;
   }
   .cta_button {
   font-family: "DM Sans", Sans-serif;
   font-size: 25px;
   font-weight: 500;
   fill: #FFFFFF;
   color: #FFFFFF;
   background-color: transparent;
   background-image: linear-gradient(285deg, #098581 0%, #2CC696 100%);
   border-radius: 10px 10px 10px 10px;
   padding: 10px 20px 10px 20px;
   border: none;
   }
   .right_align {
   float: right;
   }
   .header{
   display:none;
   }
   .hero_section_landingpage {
   background-color: #C8EADF;
   }
   .effective_bg {
   background-color: #1d4245;
   margin: 0 40px;
   border-radius: 20px;
   }
   .hero_section_landingpage button {
   font-family: "DM Sans", Sans-serif;
   font-size: 25px;
   font-weight: 500;
   fill: #FFFFFF;
   color: #FFFFFF;
   background-color: transparent;
   background-image: linear-gradient(285deg, #098581 0%, #2CC696 100%);
   border-radius: 10px 10px 10px 10px;
   padding: 18px 20px 17px 20px;
   margin-top: 30px;
   border: none;
   }
   .hero_section_landingpage h5 {
   color: #36BF9D;
   font-family: "DM Sans", Sans-serif;
   font-size: 30px;
   font-weight: 600;
   line-height: 1.5em;
   }
   .hero_section_landingpage h2 {
   color: #FFFFFF;
   font-family: "DM Sans", Sans-serif;
   font-size: 45px;
   font-weight: 600;
   line-height: 1.5em;
   width: 55%;
   margin: 0 auto;
   font-size: 38px;
   }
   .hero_section_landingpage h6 {
   color: #FFFFFF;
   font-family: "DM Sans", Sans-serif;
   font-size: 16px;
   font-weight: normal;
   line-height: 33px;
   font-size: 17px;
   }
   .hero_section_landingpage p {
   color: #FFFFFF;
   font-family: "DM Sans", Sans-serif;
   font-size: 20px;
   font-weight: 600;
   line-height: 33px;
   width: 50%;
   margin: 0 auto;
   font-size: 17px;
   }
   .video_section
   {
   margin:30px 0px;
   }
   .box-area {
   color: #ffffff;    
   line-height: 33px;
   background-color: #1d4245;
   margin-top: 20px !important;
   padding: 20px !important;
   border-radius: 20px;
   }
   .box-area h4 {
   color: #ffffff;
   display: inline-block;
   padding-left: 10px;
   }
   
   .btn_3{
   font-family: "DM Sans", Sans-serif;
   font-size: 25px;
   font-weight: 500;
   fill: #FFFFFF;
   color: #FFFFFF;
   background-color: transparent;
   background-image: linear-gradient(285deg, #098581 0%, #2CC696 100%);
   border-radius: 10px 10px 10px 10px;
   padding: 20px 20px 20px 20px;
   margin-top: 25px;
   border: none  ;
   /* margin-left: 38%; */
   }
   .text-center.mt-5 {
   font-weight: 500;
   font-size: 23px;
   }
   .workshop_section {
   background-color: #C8EADF;
   }
   .workshop_section .change_format {
   margin: 30px auto;
   width:52%;
   background-color: #fff;
   padding: 10px;
   color: #59595F;
   font-family: "DM Sans", Sans-serif;
   font-size: 21px;
   font-weight: 700;
   line-height: 1.5em;
   }
   span.icon {
   font-size: 29px;
   }
   .top_video video {
   border-radius: 20px;
   }
   .top_video {
   margin-top: -160px;
   }
   .container.banner-2 {
   background: #C8EADF;
   padding: 32px 46px;
   border-radius: 14px;
   }
   img.img-icon {
   border-radius: 14px;
   }
   .banner_section.mt-3{
   background: #dff5f4;
   }
   .text-center h6{
   font-size: 20px;
   font-weight: 400;
   }
   .banner_section.mt-3 {
   background: #dff5f4;
   padding: 50px 0 50px 0px;
   }
   .bonus_box {
   padding: 10px 10px 10px 10px;
   background-color: #eff9f5;
   border-style: solid;
   border-width: 1px 1px 1px 1px;
   border-color: #74c0a2;
   border-radius: 10px 10px 10px 10px;
   }
   .bonus_box h6 {
   color: #1c3930;
   font-family: "DM Sans", Sans-serif;
   font-size: 18px;
   font-weight: 500;
   line-height: 28px;
   width: 80%;
   margin: 0 auto;
   }
   .health_fat {
   background-color: #115b60;
   }
   .health_fat h2 {
   color: #9efcd7;
   font-family: "DM Sans", Sans-serif;
   font-size: 32px;
   font-weight: 600;
   }
   .health_fat .carb_box {
   background: #1d4245;
   margin-top: 20px !important;
   padding: 20px !important;
   border-radius: 20px;
   min-height: 170px;
   display: flex;
   align-items: center;
   }
   .health_fat h3 {
   color: #9efcd7;
   font-family: "DM Sans", Sans-serif;
   font-size: 22px;
   font-weight: 400;
   line-height: 30px;
   }
   .health_fat h4 {
   font-family: "DM Sans", Sans-serif;
   font-weight: 600;
   line-height: 30px;
   font-style: italic;
   }
   .health_fat button {
   font-size: 25px;
   font-weight: 500;
   background-image: linear-gradient(291deg, #098581 0%, #2cc696 100%);
   border-radius: 10px;
   padding: 20px;
   }
   .health_fat span {
   font-size: 19px;
   font-weight: 500;
   }
   .container.banner-2 h3{
   font-size: 24px;
   font-weight: 500;
   }
   .container.banner-2 h4{
   font-weight: 600;
   }
   .container.banner-2 h5{
   font-style: italic;
   font-size: 18px;
   }
   .col-lg-6.bg-primary {
   height: 160px;
   }
   .btn_4{
   font-family: "DM Sans", Sans-serif;
   font-size: 25px;
   font-weight: 500;
   fill: #FFFFFF;
   color: #FFFFFF;
   background-color: transparent;
   background-image: linear-gradient(285deg, #098581 0%, #2CC696 100%);
   border-radius: 10px 10px 10px 10px;
   padding: 20px 20px 20px 20px;
   margin-top: 25px;
   border: none;
   margin-left: 28%;
   }
   .modal-title {
   font-weight: bold;          /* Bold text for the title */
   }
   .modal-body {
   padding: 20px;              /* More padding inside the body */
   font-size: 16px;            /* Larger text */
   }
   .modal-footer {
   background-color: #f8f9fa;  /* Light grey background */
   padding: 12px 20px;         /* Padding for the footer */
   }
   .btn-close {
   color: white;               /* White color for the close button */
   }
   .btn-secondary {
   background-color: #6c757d;  /* Standard grey color */
   }
   .btn-primary {
   background-color: #007bff;  /* Standard blue color */
   }
   /* Close button hover effect */
   .btn-close:hover {
   color: #f1f1f1;             /* Lighter white color when hovered */
   }
 
 
.change_design_counter
{
    width:50% !important;
    margin:20px auto;
    border-radius:7px;
    background:linear-gradient(285deg, #098581 0%, #2CC696 100%);
}
.change_design_counter ul li {
    background: transparent !important;
    color: #ffffff;
}
.change_design_counter ul li span
{
    background:transparent !important;
}


@media only screen and (max-width: 480px) {
    .effective_bg {
    margin: 0 20px;
}
.top_section_align
{
    text-align:center !important;
}
.top_section_align .right_align {
    float: initial;
}
.hero_section_landingpage p {
    width: 90%;
}
.hero_section_landingpage h2 {
    width: 90%;
}
.workshop_section .change_format {
        width: 85%; /* Width for screens wider than 768px */
    }
    .change_design_counter
    {
        width:100% !important;
    }
    .main{
        overflow-x: hidden;
    }
}   




</style>






