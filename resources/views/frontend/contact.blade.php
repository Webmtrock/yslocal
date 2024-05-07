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
                    <h2>Contact Us</h2>
                  </div>
                  <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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
                    <div class="heading-contact-section">
                      <span><img src="public/images/call.png"></span><h2>We're Here To<br>                    </div>
                    <p>Have questions or want to know more about our programs?  Request a callback! Just fill out the form, and we'll reach out. Simple and convenient.</p>

                    <div class="support-link">
                      <a href="/faq" class="ext-support-link"><span>Frequently Asked Questions</span><span><i class="fa-solid fa-arrow-right"></i></span></a>
                      <a href="/programs" class="ext-support-link"><span>All Programs </span><span><i class="fa-solid fa-arrow-right"></i></span></a>
                      <a href="/workshops" class="ext-support-link"><span>Upcoming Online Webinars</span><span><i class="fa-solid fa-arrow-right"></i></span></a>
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
                    
                    <br>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
            
                    <form class="support-form mt-3" method="POST" action="{{ route('contact.form') }}">
                        @csrf
                      <div class="row">
                        <div class="col-md-12">
                          <input type="text" placeholder="Full Name" required="" name="name" class="ys-field">
                        </div>
                        <div class="col-md-12">
                          <input type="email" placeholder="Email Id" required="" name="email" class="ys-field">
                        </div>
                        <div class="col-md-12">
                          <input type="text" placeholder="Phone Number" required="" name="number" class="ys-field">
                        </div>
                        <div class="col-md-12">
                          <textarea type="text" placeholder="Message" name="message" class="ys-field"></textarea>
                        </div>
                        <input type="hidden" value="contact" name="belongs_to">
                        <div class="col-md-12 mb-2">
                          <div class="form-cta">
                            <button type="submit" class="yst-btn">Send Message  <i class="fa-solid fa-arrow-right"></i></button>
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
                    <p>Need help in choosing the right program for you?</p>
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