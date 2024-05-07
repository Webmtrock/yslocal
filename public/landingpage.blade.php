@extends('frontend.master')
@section('title', 'Home')
@section('content')
        
        
<section class="workshop-banner py-5">
  <div class="text-center effective_bg text-white py-5">
      <h5>2-Day Introductory Workshop on</h5>
      <h2 class="mb-3">Low Carb Healthy Fat (LCHF) Lifestyle Program</h2>
      <h6>KNOW ABOUT INDIA'S MOST EFFECTIVE LOW-CARB LIFESTYLE PROGRAM</h6>
      <p>For a Preventive Lifestyle and Reversal of Diabetes/ BP/ PCOS/ Cholesterol/ Fatty Liver
          Live sessions in Hinglish (Hindi + English)
      </p>
      <button class=""data-bs-toggle="modal" data-bs-target="#exampleModal">Reserve Seat @ ₹199</button>
  </div>
</section>

<div class="top_video text-center">
    <video width="800" height="415" controls
        poster="https://yellowsquash.health/wp-content/uploads/2024/02/WhatsApp_Image_2023-06-26_at_00.27.59.webp">
        <source
            src="https://yellowsquash.health/wp-content/uploads/2024/01/the_lchf_lifestyle_program_by_satyajit_dash.mp4-720p.mp4"
            type="video/mp4">
    </video>
 
</div>
<section>
 <div class="container">
  <div class="row">
  
    <div class="col-lg-6 ">
      <div class="box-area">
        <span class="icon">
          <i class="fa-solid fa-calendar-days"></i>
        </span>
        <span><h4>30 April- 1 May (Tue-Wed)</h4></span>
      </div>
    </div>
    <div class="col-lg-6">
        <div class="box-area">
          <span class="icon">
            <i class="fa-regular fa-clock"></i>
          </span>
          <span><h4>30 April- 1 May (Tue-Wed)</h4></span>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="box-area">
          <span class="icon">
            <i class="fa-regular fa-clock"></i>
          </span>
          <span><h4>30 April- 1 May (Tue-Wed)</h4></span>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="box-area">
          <span class="icon">
            <i class="fa-solid fa-language"></i>
          </span>
          <span><h4>30 April- 1 May (Tue-Wed)</h4></span>
        </div>
      </div>
  </div>
  </div> 
</section>

<section>
  <div class="text-center">
    <h3 class="mt-5">LIMITED SEATS ONLY. GRAB YOUR SPOT NOW!</h3>
    <button class="btn_3 " data-bs-toggle="modal" data-bs-target="#exampleModal">Reserve Seat @ ₹199</button>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Introductory Workshop on Low Carb Healthy Fat (LCHF) Lifestyle Program</h5>
          <button type="button" class="btn-close btn-dark" data-bs-dismiss="modal" aria-label="Close"> <i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
        <form action="">
           <div class="row">
            <div class="col-lg-8">
                <div class="form-froup">
                    <label for="">Name</label>
                    <input type="text" class="form-control   " placeholder="Enter Your Name">
                </div>
                <div class="form-froup">
                    <label for="">Email</label>
                    <input type="email" class="form-control" placeholder="Enter Your Email">
                </div>
                <div class="form-froup">
                    <label for="">Enter Your WhatsAppNo.:</label>
                    <input type="number" class="form-control"  placeholder="Enter Your Contact Number">
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class=" btn btn-dark w-50 form-control"> Pay</button>
                </div>
            </div>
           </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="mt-5">
    <div class="container banner-2">
        <div class="row">
            <div class="col-lg-6">
             <h3>Meet Our Expert</h3>
             <h4 class="mt-5">Satyajit Dash</h4>
             <h5 class="mt-4">Expert In Indian LCHF | Sports Nutritionist | Author | Ex-IITian</h5>
             <p>Hey, my name is Satyajit Dash. I had always been fascinated by the relation we have with the taste and food. The more I studied, the more I became aware of the impact (both positive and negative) it has on our physical, mental and emotional well-being. This curiosity led me to create an easy customizable nutrition system which, first and foremost, I tried on me and my wife. And the results were shocking!!</p>
            <ul>
            <li> Lost 27 kgs of body fat in 8 months</li>
            <li> Completely Reversed my Grade-II Fatty liver.</li>
            <li>My triglyceride count came down from 180+ to 95</li>
            </ul>
 

 

               
               <p> Today, I am in my 40s but have the energy which can beat even a 30-year-old. I look and feel better than I ever have and am living my best life with my family</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('assets/img/satish.jpg') }}" class="img-icon" alt="">
            </div>
        </div>
    </div>
</section>

<section class="banner_section mt-3">
    <div class="container">
<div class="text-center">
    <h6>2,650+ People Across 22 Countries Have Taken The Workshop And Are Now Living Their Best Life!</h6>
    <h2>YOU MUST JOIN if you have any of the below issues:</h2>
</div>
<div class="row">
  
    <div class="col-lg-6">
      <div class="box-area text-center">
       
        <span><h4>Pre-Diabetes</h4></span>
      </div>
    </div>
    <div class="col-lg-6">
        <div class="box-area text-center">
          
          <span><h4>Hypertension</h4></span>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="box-area text-center">
         
          <span><h4>Diabetes</h4></span>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="box-area text-center">
          
          <span><h4>High Cholesterol</h4></span>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="box-area text-center">
          
          <span><h4>Fatty Liver</h4></span>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="box-area text-center">
         
          <span><h4>Hypothyroidism</h4></span>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="box-area text-center">
          
          <span><h4>Weight Issues</h4></span>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="box-area text-center">
         
          <span><h4>PCOD/ PCOS</h4></span>
        </div>
      </div>
  </div>
</div>
</section>

<section class="video_sec py-5">
    <div class="container">
        <h2 class="text-center">Some Transformation Stories</h2>
        <div class="row d-flex gap-5">
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column align-items-center">
                <video width="300" height="240" controls
                    poster="https://yellowsquash.health/wp-content/uploads/2024/02/13-1.webp">
                    <source
                        src="https://yellowsquash.health/wp-content/uploads/2024/01/joy_panda_testimonial_-_ultimate_lchf_lifestyle___yellowsquash-1080p.mp4"
                        type="video/mp4">
                </video>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column align-items-center">
                <video width="300" height="240" controls
                    poster="https://yellowsquash.health/wp-content/uploads/2024/02/13-1.webp">
                    <source
                        src="https://yellowsquash.health/wp-content/uploads/2024/01/joy_panda_testimonial_-_ultimate_lchf_lifestyle___yellowsquash-1080p.mp4"
                        type="video/mp4">
                </video>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column align-items-center">
                <video width="300" height="240" controls
                    poster="https://yellowsquash.health/wp-content/uploads/2024/02/13-1.webp">
                    <source
                        src="https://yellowsquash.health/wp-content/uploads/2024/01/joy_panda_testimonial_-_ultimate_lchf_lifestyle___yellowsquash-1080p.mp4"
                        type="video/mp4">
                </video>
            </div>
            {{-- <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column align-items-center">
             &nbsp;
          </div> --}}
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column align-items-center">
                <video width="300" height="240" controls
                    poster="https://yellowsquash.health/wp-content/uploads/2024/02/13-1.webp">
                    <source
                        src="https://yellowsquash.health/wp-content/uploads/2024/01/joy_panda_testimonial_-_ultimate_lchf_lifestyle___yellowsquash-1080p.mp4"
                        type="video/mp4">
                </video>
            </div>
        </div>

    </div>
</section>
<section class="workshop_section  py-5">

    <h2 class="text-center mb-5">What will you learn in the workshop?
    </h2>
    <p class="text-center">
      Know about insulin resistance & how we help you to keep it in narrow range to overcome lifestyle disorders
    </p>
    <p class="text-center">
      Secret behind reversing metabolic and lifestyle conditions like Abdominal Obesity, Diabetes, Hypertension, Fatty Liver, Thyroid and PCOS
    </p>
    <p class="text-center">
      Enjoy a healthier & tastier version of your favourite recipes and deserts without any guilt
    </p>
    <p class="text-center">
      How to create your own sustainable fat loss & metabolic healing journey, which by the way, has proven to work more than 1,50,000 times!!
  </p>
  <p class="text-center">
    Secrets of a nutrition system that is based on 15 years of study and 5 years of practice by the MasterCoach, which has helped 2,550+ people live their best life which is healthy and disease-free
</p>
<p class="text-center">
  Save money and effort that you spend on medicines, diets, and gyms
</p>
<p class="text-center">
  How to stay accountable and consistent because habits take time
</p>
<p class="text-center">
  Finally, how to be your own & your family’s Nutritionist for life!
</p>

    <div class="container">
        <h2 class="text-center pt-4 pb-5">
          Unlock bonus books worth ₹2,999 written by Satyajit Dash
        </h2>
        <div class="row">
          <div class="col-lg-6">
            <div class="content_box text-center mx-2">
              <img
                src="https://yellowsquash.health/wp-content/uploads/2024/02/lchflifestyleguidebook215x300-16.png"
                alt="" />
              <div class="bonus_box">
                <h4>LCHF LIFESTYLE GUIDE BOOK</h4>
                <h6>
                  Learn small everyday lifestyle tweaks that have a huge effect
                  on your health
                </h6>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="content_box text-center mx-2">
              <img
                src="https://yellowsquash.health/wp-content/uploads/2024/02/lchflifestyleguidebook215x300-16.png"
                alt="" />
              <div class="bonus_box">
                <h4>LCHF LIFESTYLE GUIDE BOOK</h4>
                <h6>
                  Learn small everyday lifestyle tweaks that have a huge effect
                  on your health
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
              <div class="col-lg-6 btn_4">
                  <div class="row">
                      <div class="col-6 col-md-4 col-lg-3">
                          <h1 id="days">06</h1>
                          <span>Days</span>
                      </div>
                      <div class="col-6 col-md-4 col-lg-3">
                          <h1 id="hours">13</h1>
                          <span>Hours</span>
                      </div>
                      <div class="col-6 col-md-4 col-lg-3">
                          <h1 id="minutes">30</h1>
                          <span>Minutes</span>
                      </div>
                      <div class="col-6 col-md-4 col-lg-3">
                          <h1 id="seconds">00</h1>
                          <span>Seconds</span>
                      </div>
                  </div>
              </div>
          </div>
          <div class="text-center">
              <h3>Time Is Running Out. Grab Your Spot Fast!</h3>
              <button class="btn_3" data-bs-toggle="modal" data-bs-target="#exampleModal">Reserve Seat @ ₹199</button>
          </div>
      </div>
  </div>
  
    

    <section class="health_fat py-5 mt-5">
      <div class="container">
        <h2 class="pb-4 text-center">
          Why a Low Carb Healthy Fat (LCHF) Lifestyle?
        </h2>
        <div class="row">
          <div class="col-lg-6">
            <div class="carb_box">
              <p class="text-white">
                As DIET PLANS always fail, you need a sustainable lifestyleto
                sustain your health throughout life. You don’t have to
                compromise on taste or quantity of food ☺
              </p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="carb_box">
              <p class="text-white">
                Not Extreme like a Keto Diet: LCHF emphasizes on lowering & switching to healthy & slow (low GL) carb intake and compensating that with healthier fat and increasing “moderate” intake of protein.
              </p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="carb_box">
              <p class="text-white">
                Helps address the root causes for 90% of the metabolic disorders including but not limited to abdominal obesity & diabetes
              </p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="carb_box">
              <p class="text-white">
                Focuses on Micro-nutrient rich food & supplements - Good nutrition prevents 95% of all diseases
              </p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="carb_box">
              <p class="text-white">
                Exercise is an important pillar in an LCHF lifestyle. You get guidance as per your preferences, but MOVEMENT is a MUST!
              </p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="carb_box">
              <p class="text-white">
                Instead of spending on medicines, gyms or fad diets, learn the science of nutrition and help yourself and your family to create your own health and wealth
              </p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="carb_box">
              <p class="text-white">
                Result Oriented: You can achieve your health goals. Reverse health issues like Diabetes, Obesity, Blood Pressure, Cholesterol, Fatty Liver, Thyroid and PCOS/ PCOD.
              </p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="carb_box">
              <p class="text-white">
                Our LCHF lifestyle guidance is designed to fit the busiest of lifestyles. If you are a working professional, a housewife, a foodie, can’t exercise due to health conditions or just not motivated enough, worry not, we will help you achieve the life of your dreams!
              </p>
            </div>
          </div>
        </div>
        <h3 class="mt-5 text-center">
          In this Workshop, you will learn the secrets to making your hormones
          let go of fat (instead of storing them) & reverse health issues like
          Diabetes, Obesity, Blood Pressure, Cholesterol, Fatty Liver, Thyroid
          and PCOS/ PCOD
        </h3>
        <h4 class="pt-3 text-center text-white">
          Sessions in Hinglish (Hindi + English)
        </h4>
        <div class="text-center mt-5">
          <button class="text-white border-0 "data-bs-toggle="modal" data-bs-target="#exampleModal">Reserve Seat @ ₹199</button>
        </div>
        <span class="mt-5 text-white text-center d-block"
          >Note: If you are not comfortable in Hindi at all, this workshop is
          not for you!
        </span>
      </div>
    </section>
</section>
@endsection()

<script>

  function countdown() {
      // Set the date we're counting down to
      var countDownDate = new Date("Apr 30, 2024 00:00:00").getTime();
  
      // Update the count down every 1 second
      var x = setInterval(function() {
  
          // Get today's date and time
          var now = new Date().getTime();
  
          // Find the time remaining
          var distance = countDownDate - now;
  
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
          // Display the result in the elements with id="days", "hours", "minutes", "seconds"
          document.getElementById("days").innerHTML = days;
          document.getElementById("hours").innerHTML = hours;
          document.getElementById("minutes").innerHTML = minutes;
          document.getElementById("seconds").innerHTML = seconds;
  
          // If the countdown is finished, write some text
          if (distance < 0) {
              clearInterval(x);
              document.getElementById("days").innerHTML = "00";
              document.getElementById("hours").innerHTML = "00";
              document.getElementById("minutes").innerHTML = "00";
              document.getElementById("seconds").innerHTML = "00";
          }
      }, 1000);
  }
  
  // Call the function on page load
  window.onload = countdown;


  
  </script>
  
 <style>
.workshop-banner {
  background-color: #C8EADF;
  height: 796px;
}

.effective_bg {
  background-color: #1d4245;
  margin: 0 40px;
  border-radius: 20px;
}

.workshop-banner button {
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

.workshop-button:hover {
  background-color: #00897b;
  
}


.workshop-banner h5 {
  color: #36BF9D;
  font-family: "DM Sans", Sans-serif;
  font-size: 30px;
  font-weight: 600;
  line-height: 1.5em;
}

.workshop-banner h2 {
  color: #FFFFFF;
  font-family: "DM Sans", Sans-serif;
  font-size: 45px;
  font-weight: 600;
  line-height: 1.5em;
  width: 55%;
  margin: 0 auto;
  font-size: 38px;
}

.workshop-banner h6 {
  color: #FFFFFF;
  font-family: "DM Sans", Sans-serif;
  font-size: 16px;
  font-weight: normal;
  line-height: 33px;
  font-size: 17px;
}

.workshop-banner p {
  color: #FFFFFF;
  font-family: "DM Sans", Sans-serif;
  font-size: 20px;
  font-weight: 600;
  line-height: 33px;
  width: 50%;
  margin: 0 auto;
  font-size: 17px;
}
.box-area {
  color: #FFFFFF;
  line-height: 33px;
  background-color: #1d4245;
  margin-top: 20px !important;
  padding: 20px !important;
  border-radius: 20px;
}
.box-area h4 {
  width: 90%;
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

.workshop_section p {
  width: 50%;
  margin: 30px auto;
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
  padding: 34px 0px 32px 46px;
  border-radius: 14px;
}

img.img-icon {
  width: 388px;
 
  border-radius: 14px;
  margin-left: 47px;
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
/* Custom styling for the modal */
/* .modal-header {
  background-color: #007bff;  
} */

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

@media (max-width: 767px) {
  .navbar-custom .ml-auto {
      margin-left: 0;
      margin-top: 1rem;
  }
}

@media (max-width: 767px) {
  .modal-content {
      padding: 20px; /* Adds more padding inside the modal */
  }
  .modal-footer button {
      width: 100%; /* Makes buttons take full width */
      margin-bottom: 10px; /* Adds spacing between buttons */
  }
}
@media (max-width: 767px) {
  .form-control {
      margin-top: 10px;
  }
}



@media (max-width: 576px) {
  .top_video video {
    /* border-radius: 20px; */
    width: 329px;
    margin-top: 222px;
    height: 169px;
}
}




@media (min-width: 320px) and (max-width: 599px) {
  .navbar-brand img {
      width: 100%; /* Full width of the navbar */
      height: auto;
  }

  .navbar-custom .container-fluid {
      padding: 0 10px; /* Reduce padding within the container */
  }

  .btn.reserve-button {
      font-size: 0.7rem; /* Reduce font size */
      padding: 5px; /* Reduce padding */
      /* width: 100%; Full width button */
    margin-right: 118;
  }
  .modal-dialog {
      margin: 10px; /* Less margin around the dialog */
      width: 95%; /* Use more of the screen width */
  }

  .modal-content {
      font-size: 0.8rem; /* Smaller font size in modal */
  }

  .form-control {
      font-size: 0.8rem; /* Smaller form controls */
  }

  .form-group button {
      width: 100%; /* Full width submit button */
  }

  /* Adjustments for your form layout */
  .form-froup, .form-group {
      width: 100%; /* Full width form groups */
      padding: 0 5px; /* Padding for small screens */
  }

  .modal-header, .modal-footer {
      display: block; /* Stack the elements */
  }

  .btn-close {
      float: right; /* Align the close button to the right */
      top: -10px; /* Adjust position */
      right: 0;
  }
}




@media only screen and (min-width: 320px) and (max-width: 599px) {
  .container, .container-fluid {
      padding-right: 15px;
      padding-left: 15px;
      margin-right: auto;
      margin-left: auto;
  }
  h2.mb-3 {
    font-size: 15px;
}
.text-center h6 {
  font-size: 8px;
  font-weight: 400;
}
  h1, .h1 {
      font-size: 0.8rem; /* Smaller font size for H1 headers */
  }

  h2, .h2 {
      font-size: 1.4rem; /* Smaller font size for H2 headers */
  }

  h3, .h3 {
      font-size: 1.3rem; /* Smaller font size for H3 headers */
  }

  p, .text {
      font-size: 0.9rem; /* Smaller text for paragraphs */
  }

    .top_video video, .video_sec video {
        width: 89%;
   
      
    }

    .workshop_section p {
      width: 100%;
     
  }

  .health_fat h2 {
  
    font-size: 24px;
 
}
  .btn, .btn_3 { /* Adjust button sizes */
      font-size: 0.8rem;
      padding: 10px 12px;
  }
  .navbar-brand{
    text-align: center;
  }
    
  .workshop-banner p {
    
    font-size: 8px;
}
  .navbar-logo, .img-icon { 
      max-width: 65%;
      height: auto;
  }

  .top_video video, .video_sec video { 
    width: 75%;
    height: auto;
  
  }

  .box-area h4 {
    width: 84%;
  
}
  .workshop-banner button {
   
    font-size: 12px;
   
  
  
  
    margin-top: 30px;
   
}
  .box-area, .bonus_box, .white-bag { 
      padding: 10px; 
      font-size: 0.8rem; 
  }

  .swiper-slide img {
      width: 33%;
      height: auto;
  }

  .accordion-button, .accordion-body {
      font-size: 0.8rem;
  }

  .col-lg-4.banner-box {
 
    height: 191px;

 
}


}




@media (min-width: 600px) and (max-width: 768px) {
  .col-lg-4.banner-box {
    
    width: 100px;
}
video {
  width: 84%;
  margin-bottom: 8px;
}

.workshop_section p {
  width: 100%;
 
}
h2.text-center.pt-4.pb-5 {
  font-size: 24px;
}
.health_fat h2 {

  font-size: 26px;

}
.top_video video {
 
  width: 67%;
  height: auto;
  margin-top: 86px;
}
}


@media (min-width: 769px) and (max-width: 968px) {
  .col-lg-4.banner-box {
    
    width: 100px;
}
video {
  width: 100%;
}

.top_video video {
 
  width: 63%;
}

.workshop_section p {
  width: 100%;
 
}
}

 </style>
 
