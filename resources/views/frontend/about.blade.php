@extends('frontend.master')
@section('title', 'Home')
@section('content')
        

      
        <!-----Inner Banner-------->
        <div class="innerPage-banner">
          <div class="container">
            <div class="page-banner-inner">
              <div class="row">
                <div class="col-lg-10 col-md-9 col-8">
                  <div class="page-heading">
                    <h2>About Us</h2>
                  </div>
                  <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                      </ol>
                    </nav>
                  </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                  <div class="innerPage-banner-img">
                    <img src="public/images/innerbanner-img.png">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--------Inner Banner End-->

        <!---about us section--------->
        <div class="about-us-section page-section">
          <div class="container">
            <div class="about-us-inner pt-4 pb-4">
              <div class="row">
                <div class="col-md-7">
                  <div class="about-left">
                    <div class="about-img">
                      <img src="public/images/about-us.png">
                      <span class="video-popup-btn1"><i class="fa-solid fa-play"></i></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="about-right">
                    <div class="section-heding mb-3">
                      <h2 class="ys-headting">Everything you can do in a physical do with YellowSquash</h2>
                    </div>
                    <p>YellowSquash is a community-based marketplace for global wellness entrepreneurs (both in services and products). We provide platform and technology to enable sustainable & holistic wellness professionals to be successful, right from generating leads, sales, execution and tracking.</p>

                    
                    <div class="ab-bottom">
                      <div class="ab-bHeading">
                        We have a compelling offering for the Experts
                      </div>
                      <div class="ab-desc">
                        Get in touch with us at <a href="mailto:info@yellowsquash.in">info@yellowsquash.in</a>.
                      </div>
                      <div class="ys-cta mt-4">
                        <a href="{{ ('user.program') }}" class="yst-btn">More Programs <i class="fa-solid fa-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!---about us section End----->
        
        <!-----Data Speak Start------>
        <div class="data-speak-section">
          <div class="container">
            <div class="data-speak-inner">
              <div class="row">
                <div class="col-lg-7">
                  <div class="ds-left">
                    <div class="ds-img">
                      <img src="public/images/data-speak.png">
                    </div>
                    <div class="ds-boxes">
                      <div class="row">
                        <div class="col-lg-3 col-6">
                          <div class="box-inner text-center">
                            <div class="ds-value bg-black">
                              70%
                            </div>
                            <div class="ds-text">
                              CUSTOMERS COMPLETELY CURED
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-6">
                          <div class="box-inner text-center">
                            <div class="ds-value bg-yellow">
                              79%
                            </div>
                            <div class="ds-text">
                              CUSTOMERS OFF ALL MEDICINES
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-6">
                          <div class="box-inner text-center">
                            <div class="ds-value bg-green">
                              3K+
                            </div>
                            <div class="ds-text">
                              CUSTOMERS SERVED SUCCESSFULLY
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-6">
                          <div class="box-inner text-center">
                            <div class="ds-value bg-grey">
                              69%
                            </div>
                            <div class="ds-text">
                              CUSTOMERS HAVE REDUCED MEDICINE
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="ds-right">
                    <div class="section-heding">
                      <h2 class="ys-headting">Let The Data Speak</h2>
                    </div>
                    <p>Integer venenatis consequat elit. Curabitur eget laoreet nibh. Cras euismod, tellus vitae luctus ultricies, lacus erat sagittis nulla, id ornare velit ligula congue ex. Etiam rhoncus urna ut pulvinar euismod.</p>

                    <div class="ds-right-list">
                      <ul>
                        <li>Informative Events</li>
                        <li>Consultations</li>
                        <li>Wellness Programs</li>
                        <li>Product</li>
                        <li>Healthpedia</li>
                      </ul>
                    </div>
                    <div class="ds-video">
                      <div class="ds-v-icon"><i class="fa-solid fa-play"></i></div>
                      <div class="ds-v-text">24 Experts Online Connected<span>Unlimited Workshops</span></div>
                    </div>
                    <div class="ds-right-bottom">
                      <div class="ds-rbottom-title">
                        Tools For Expert Learners
                      </div>
                      <div class="ds-rbottom-desc">
                        A learning community where peoplecan share knowledge
                      </div>
                      <div class="ys-cta mt-4">
                        <a href="{{ ('user.contact') }}" class="yst-btn">Connect with Us <i class="fa-solid fa-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
      <!-----Data Speak End------>
      

        <!----Newsletter Start-------------->
        <div class="newsletter-section">
          <div class="container">
            <div class="row">
              <div class="section-heding text-center mb-3">
                <h2 class="ys-headting">Subscribe Our Newsletter</h2>
              </div>
              <div class="section-desc text-center">
                Integer venenatis consequat elit. Curabitur eget laoreet nibh. Cras euismod, tellus vitae luctus ultricies, lacus erat sagittis nulla, id ornare velit ligula congue ex. Etiam rhoncus urna ut pulvinar euismod.
              </div>
              <div class="subscription-form">
                <form>
                  <input type="email" name="semail">
                  <div class="form-cta text-center">
                    <button type="submit" class="yst-btn">Subscribe  <i class="fa-solid fa-arrow-right"></i></button>
                  </div>
                </form>
              </div>
              <div class="guidline text-center">
                No ads, No trails, No Commitments
              </div>
              <div class="adds-logo">
                <img src="public/images/add1.png">
                <img src="public/images/add2.png">
              </div>
            </div>
          </div>
        </div>

      <!----Newsletter End-------------->
 
 
 @endsection