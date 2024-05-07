@extends('frontend.master')
@section('title', 'Home')
@section('content')
        
<!-----Inner Banner-------->
        <div class="innerPage-banner">
          <div class="container">
            <div class="page-banner-inner">
              <div class="row">
                <div class="col-12">
                  <div class="page-heading">
                    <h2>Register As An Expert</h2>
                  </div>
                  <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Register As An Expert</li>
                      </ol>
                    </nav>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <!--------Inner Banner End-->

        <!-------Contact Support---->
        <div class="contact-support page-section">
          <div class="container">
            <div class="contact-us-inner pt-4 pb-4">
              <div class="row">
                <div class="col-lg-8 col-md-6">
                  <div class="c-support-left">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="heading-contact-section">
                    <h2>Sign Up with us<br>                    
                    <p>Collaborating with us opens doors to new opportunities for your career. Whether it's expanding your network, gaining exposure, or accessing resources, we're here to support your growth every step of the way.
<br>
Register with us today!</p>

</div>
                          </div>
                          <div class="col-sm-12">
                             <div class="heading-contact-section">
                    <h2>How it works<br>                   
                    <p>By utilizing our software, you can enhance your efficiency and pay only for what you use. This allows you to concentrate on what truly counts: building strong client relationships, establishing an online presence, and expanding your reach to more individuals, ultimately increasing your earnings. In 2024, most internet users seek technology-enhanced experiences.
</p>
</div> 
                          </div>
                      </div>
                    




                    <div class="support-link">
                      <a href="" class="ext-support-link"><span>Frequently Asked Questions</span><span><i class="fa-solid fa-arrow-right"></i></span></a>
                      <a href="" class="ext-support-link"><span>All Programs </span><span><i class="fa-solid fa-arrow-right"></i></span></a>
                      <a href="" class="ext-support-link"><span>Upcoming Online Webinars</span><span><i class="fa-solid fa-arrow-right"></i></span></a>
                    </div>

                    <div class="contact-info mt-5">
                      <div class="contact-list">
                        <div class="cont-icon">
                          <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="cont-text">
                          <div class="cont-heading">
                            Address
                          </div>
                          <div class="cont-desc">
                            Platina Heights C-24, C Block, Phase 2, Industrial Area, Sector 62, Noida, Uttar Pradesh 201301
                          </div>
                        </div>
                      </div>
                      <div class="contact-list">
                        <div class="cont-icon">
                          <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="cont-text">
                          <div class="cont-heading">
                            Email
                          </div>
                          <div class="cont-desc">
                            info@yellowsquash.in
                          </div>
                        </div>
                      </div>
                      <div class="contact-list">
                        <div class="cont-icon">
                          <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="cont-text">
                          <div class="cont-heading">
                            Phone
                          </div>
                          <div class="cont-desc">
                            +91 97173 33655
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="support-form-sidebar">
                    <div class="support-sidebar-img">
                      <img src="public/images/support-img.jpg">
                    </div>
                    <form class="support-form mt-3" action="{{route('register.expert')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-md-12">
                          <input type="text" placeholder="Name" name="name" value ="{{request()->old('name')?request()->old('name'):''}}" required="" class="ys-field">
                          @error('name')
                            <div class="alert alert-danger">{{ $name }}</div>
                        @enderror
                        </div>
                        <div class="col-md-12">
                          <input type="text" placeholder="Designation"  name="designation" value ="{{request()->old('designation')?request()->old('designation'):''}}" required="" class="ys-field">
                          @error('designation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col-md-12">
                        <input type="text" placeholder="Experience" required="" name="experience"  value ="{{request()->old('experience')?request()->old('experience'):''}}" class="ys-field">
                        @error('experience')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col-md-12">
                        <input type="text" placeholder="Email" required="" name="email" value ="{{request()->old('email')?request()->old('email'):''}}" class="ys-field">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col-md-12">
                        <input type="password" placeholder="Enter your password" name="password"  class="ys-field" >
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-12">
                        <input type="password" placeholder="Confirm password"  name="confirm_password" class="ys-field" required>
                        @error('confirm_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                        <div class="col-md-12 mb-2">
                          <div class="form-cta">
                            <button type="submit" class="yst-btn">Submit  <i class="fa-solid fa-arrow-right"></i></button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!------Contact Support End--->

        <!------Contact Bottom Section--->
        <div class="contact-bottom page-section bg-grey">
          <div class="container">
            <div class="contact-bottom-inner pt-4 pb-4">
              <div class="row align-items-center">
                <div class="col-md-5">
                  <div class="call-support-left">
                    <div class="cb-img">
                      <img src="public/images/contact-call-back.jpg">
                    </div>
                  
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="call-support-right">
                    <div class="section-heding">
                      <h2 class="ys-headting">Let’s find<br>  <span>the right Program </span>for you!</h2>
                    </div>
                    <p>In hac habitasse platea dictumst. Ut porta, dolor ut aliquam congue, dui nunc varius nisl, a blandit ex libero eget lectus. Aliquam lacinia et dui eget aliquam.</p>
                    <div class="cont-bt-cta">
                      <a href="#" class="yst-btn">Connect With Us  <i class="fa-solid fa-arrow-right"></i></a>
                      <div class="adds-logo">
                        <img src="public/images/add1.png">
                        <img src="public/images/add2.png">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-------Contact Bottom section End-->
      
 
 
 @endsection