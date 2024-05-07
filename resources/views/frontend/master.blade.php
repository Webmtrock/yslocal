<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('public/css/bootstrap-min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     

    <link rel="stylesheet" href="{{ asset('public/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/responsive.css') }}">
    
  
  </head>
  <body>
    <div class="main-wrapper">
      <div class="header">
        <div class="top-bar-header">
          <div class="container">
            <div class="row flex">
              <div class="col-md-2 b-right">
                <div class="top-bar-email tp-text">
                <span><i class="fa-solid fa-envelope"></i></span> <a href="mailto:info@yellowsquash.in">info@yellowsquash.in</a>
                </div>
              </div>
              <div class="col-md-2">
                <div class="top-bar-phone tp-text">
                  <span><i class="fas fa-phone"></i></span> <a href="tel:+919717333655">+91 97173 33655</a>
                </div>
              </div>
              <div class="col-md-5">
                <?php
                $top_header_text = App\Helper\Helper::getSettingData($key = "top_header_text");
                $top_header_button_text = App\Helper\Helper::getSettingData($key = "top_header_button_text");
                $top_header_button_link = App\Helper\Helper::getSettingData($key = "top_header_button_link");
               // echo $text->value;
                ?>
                <div class="text-uppercase tp-text tp-tagline">{{$top_header_text->value}}<a href="{{$top_header_button_link->value}}" data-target="_blank"><span class="tagline-rtext">{{$top_header_button_text->value}}</span></a></div>
              </div>
              <div class="col-md-3">
                <div class="tp-header-cta">
                  <a href="{{ route('user.register.expert') }}">Register as an Expert</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="main-header">
          <div class="container">
            <div class="row">
              <div class="col-xl-3 col-lg-3 col-6">
                <div class="header-logo">
          <a href="{{ route('user.home') }}"><img src="{{ asset('public/images/logo.png') }}"></a>
                </div>
              </div>
              <div class="col-xl-6 col-lg-7 col-6">
                <div class="top-navigation">
                  <nav class="navbar navbar-expand-xl navbar-light">
  
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ route('user.home') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('user.programs') }}">Programs</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('user.workshops') }}">Events</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('user.experts') }}">Experts</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('user.healthpedia') }}">Healthpedia</a>
                        </li>
                        
                        
                      </ul>
                    </div>
                  </nav>
                 
                </div>
              </div>
              <div class="col-md-3 main-heder-right">
                <div class="header-right">
                  <?php
                  if(auth()->user()){
                    $user_type = (auth()->user()->user_type);
                  }else{
                    $user_type = '';
                  }
                  
                  ?>
                  @if(auth()->check() && $user_type != 'admin' && $user_type != 'expert' )
                  <div class="header-cta">
                      <a href="{{route('user.dashboard')}}" class="yst-btn">My Account  <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    
                  @else
                    <div class="user-login">
                      <a href="{{route('user.login')}}">
                        <i class="fa-regular fa-user"></i>Login
                      </a>
                    </div>
                    <div class="header-cta">
                      <a href="{{route('user.signup')}}" class="yst-btn">Register Now  <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                  @endif
                </div>
                
                
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="main">
          @yield('content')
      </div>

      <?php
        $current_route = \Request::route()->getName();
        //echo $current_route;
        ?>
        @if($current_route != "landingpage" )
    <div class="footer">
      <div class="container">
        <div class="footer-first-section">
          <div class="row">
            <div class="col-md-6">
              <div class="footer-logo">
                    <a href="{{ route('user.home') }}"><img src="{{ asset('public/images/logo.png') }}"></a>
                </div>    
              <div class="footer-text">
                <p>
                  YellowSquash is a community-based marketplace for global wellness entrepreneurs (both in services and products). We provide platform and technology to enable sustainable & holistic wellness professionals to be successful, right from...
                </p>
              </div>
              <div class="footer-cta">
                <a href="{{ route('user.about') }}" class="yst-btn">About Us  <i class="fa-solid fa-arrow-right"></i></a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="footer-fmiddle">
                <h2 class="footer-col-title">Explore Programs</h2>

                <div class="footer-menu">
                  <ul style="  height: 260px;    overflow-y: scroll;">
                       @foreach($activeCategories as $category)
     <li>
         <a href="{{ route('user.programs') }}/?cat={{ $category->id }}"> {{ $category->title }}</a>
               </li>
        @endforeach
                   
                   
                  </ul>
                  
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="footer-last">
                <h2 class="footer-col-title">Useful Links</h2>
                <div class="footer-menu">
                  <ul>
                    <li>
                      <a href="{{ route('user.about') }}">About Us</a>
                    </li>
                     
                    <li>
                      <a href="{{ route('user.faq') }}">FAQs</a>
                    </li>
                    <li>
                      <a href="{{ route('user.privacy.policy') }}">Privacy Policy</a>
                    </li>
                    <li>
                      <a href="{{ route('user.termscondition') }}">Terms & Condition</a>
                    </li>
                    <li>
                      <a href="{{ route('user.refundpolicy') }}">Refund Policy</a>
                    </li>
                    <li>
                      <a href="{{ route('user.concerns') }}">All Concerns</a>
                    </li>
                    
                    <li>
                      <a href="{{ route('user.video') }}">Gallery</a>
                    </li>
                    <li>
                      <a href="{{ route('user.contact') }}">Contact us</a>
                    </li>
                  </ul>
                  
                </div>
              </div>
            </div>

          </div>
        </div>
     
        <div class="footer-second-section">
          <div class="row">
            <div class="col-lg-9 col-md-6">
              <div class="foote2-first">
                <h2 class="footer-col-title">Follow Us On Social Media</h2>
                <div class="social-media mt-0">
                  <div class="row space-between  mt-0">
                  <a href="https://www.facebook.com/yellowsquash.in/" target="_blank">
                    <div class="col-lg-3 col-sm-6 wc-col">
                      <div class="wc-inner  wcbg-yellow">
                        <div class="social-link-inner">
                          <div class="social-icon">
                            <i class="fa-brands fa-facebook-f"></i>
                          </div>
                          <div class="social-text">
                            <div class="social-heading">
                             <a href="https://www.facebook.com/yellowsquash.in/" target = "_blank" class="text-black"> Facebook </a>
                            </div>
                            <div class="social-info">
                              <span><i class="fa-brands fa-instagram"></i> 620</span>
                              <span><i class="fa-brands fa-square-facebook"></i> 620</span>
                            </div>
                          </div>
                          <div class="clearfix">
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                  
                    <div class="col-lg-3 col-sm-6 wc-col">
                    <a href="https://www.instagram.com/yellow.squash/?igshid=MzRlODBiNWFlZA%3D%3D " target="_blank">
                      <div class="wc-inner  wcbg-pink">
                        <div class="social-link-inner">
                          <div class="social-icon">
                            <i class="fa-brands fa-square-instagram"></i>
                          </div>
                          <div class="social-text">
                            <div class="social-heading">
                              
                              <a href="https://www.instagram.com/yellow.squash/?igshid=MzRlODBiNWFlZA%3D%3D" target = "_blank" class="text-black"> Instagram </a>
                            </div>
                            <div class="social-info">
                              <span><i class="fa-brands fa-instagram"></i> 620</span>
                              <span><i class="fa-brands fa-square-facebook"></i> 620</span>
                            </div>
                          </div>
                          <div class="clearfix">
                          </div>
                        </div>
                      </div>
</a>
                    </div>


                    <a href="https://youtube.com/@yellowsquash01?si=YxhQH11vKYxQXnuK" target = "_blank" class="text-black">
                      <div class="col-lg-3 col-sm-6 wc-col">
                        <div class="wc-inner  wcbg-blue">
                          <div class="social-link-inner">
                            <div class="social-icon">
                              <i class="fa-brands fa-youtube"></i>
                            </div>
                            <div class="social-text">
                              <div class="social-heading">
                                
                              <a href="https://youtube.com/@yellowsquash01?si=YxhQH11vKYxQXnuK" target = "_blank" class="text-black"> Youtube </a>
                              </div>
                              <div class="social-info">
                                <span><i class="fa-brands fa-instagram"></i> 620</span>
                                <span><i class="fa-brands fa-square-facebook"></i> 620</span>
                              </div>
                            </div>
                            <div class="clearfix">
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                    
                    <div class="col-lg-3 col-sm-6 wc-col">
                      <a href="https://www.linkedin.com/company/13443979/admin/feed/posts/" target="_blank">
                      <div class="wc-inner  wcbg-white">
                        <div class="social-link-inner">
                          <div class="social-icon">
                            <i class="fa-brands fa-linkedin"></i>
                          </div>
                          <div class="social-text">
                            <div class="social-heading">
                              <a href="https://www.linkedin.com/company/13443979/admin/feed/posts/" target="_blank" class="text-black">Linkedin</a>
                            </div>
                            <div class="social-info">
                              <span><i class="fa-brands fa-instagram"></i> 620</span>
                              <span><i class="fa-brands fa-square-facebook"></i> 620</span>
                            </div>
                          </div>
                          <div class="clearfix">
                          </div>
                        </div>
                      </div>
                      </a>
                    </div>
                    

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="foote2-last">
                <h2 class="footer-col-title">Reach Us</h2>
                <div class="footer-info">
                  <div class="f-address">
                    <p><i class='fas fa-map-marker-alt'></i> Platina Heights C-24, C Block, Phase 2, Industrial Area, Sector 62, Noida, Uttar Pradesh 201301</p>
                  </div>
                  <div class="f-contact">
                    <i class="fas fa-envelope"></i> <a href="tel:+91 97173 33655"> +91 97173 33655</a>
                  </div>
                  <div class="f-email">
                   <i class="fas fa-phone"></i> <a href="mailto:info@yellowsquash.in"> info@yellowsquash.in</a>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <div class="row">
            <div class="col-md-12 text-center">
              <div class="footer-copyright">
                Copyright © 2024. All Rights Reserved | Yellowsquash
              </div>
            </div>
            

          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
  
 <div class="modal fade" id="exampleModalScrollable2" tabindex="-1" aria-labelledby="exampleModalScrollable2" data-bs-keyboard="false" style="display: none;" aria-hidden="true">
                                        <!-- Scrollable modal -->
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content" style="background: linear-gradient(#FFD600, #F9F0C9);">
                                                <div class="modal-header">
                                                   
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                    <div class="col-sm-6">
                                                        <img src="https://projectstaging.live/public/images/mod.png"/>
                                                        </div>
                                                    <div class="col-sm-6">
                                                        <h4>Workshop</h4>
YellowSquash hosts engaging online workshops focusing on various chronic conditions, empowering patients to navigate their healing journey with clarity and confidence.

</div>
                                                </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="modal fade" id="exampleModalScrollable3" tabindex="-1" aria-labelledby="exampleModalScrollable3" data-bs-keyboard="false" style="display: none;" aria-hidden="true">
                                        <!-- Scrollable modal -->
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content" style="background: linear-gradient(#FFD600, #F9F0C9);">
                                                <div class="modal-header">
                                                   
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                    <div class="col-sm-6">
                                                        <img src="https://projectstaging.live/public/images/jimg2.png"/>
                                                        </div>
                                                    <div class="col-sm-6">
                                                        <h4>Consultations</h4>
If you encounter any questions or confusion during the workshop, rest assured that our dedicated counselors are readily available to provide clarity and assistance regarding our treatment processes. 

</div>
                                                </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="modal fade" id="exampleModalScrollable4" tabindex="-1" aria-labelledby="exampleModalScrollable4" data-bs-keyboard="false" style="display: none;" aria-hidden="true">
                                        <!-- Scrollable modal -->
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content" style="background: linear-gradient(#FFD600, #F9F0C9);">
                                                <div class="modal-header">
                                                   
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                    <div class="col-sm-6">
                                                        <img src="https://projectstaging.live/public/images/jimg3.png"/>
                                                        </div>
                                                    <div class="col-sm-6">
                                                        <h4>Wellness Programs </h4>
We tailor our treatment programs to fit the specific needs of every patient. Our focus is on personalization, ensuring that each treatment plan is effective and delivers tangible results.

</div>
                                                </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="modal fade" id="exampleModalScrollable5" tabindex="-1" aria-labelledby="exampleModalScrollable5" data-bs-keyboard="false" style="display: none;" aria-hidden="true">
                                        <!-- Scrollable modal -->
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content" style="background: linear-gradient(#FFD600, #F9F0C9);">
                                                <div class="modal-header">
                                                   
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                    <div class="col-sm-6">
                                                        <img src="https://projectstaging.live/public/images/jimg4.png"/>
                                                        </div>
                                                    <div class="col-sm-6">
                                                        <h4>Product</h4>
Schedule your personalized one-on-one consultation with our specialist to gain valuable insights into the ideal treatment plan and approach for your specific illness.

</div>
                                                </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="modal fade" id="exampleModalScrollable6" tabindex="-1" aria-labelledby="exampleModalScrollable6" data-bs-keyboard="false" style="display: none;" aria-hidden="true">
                                        <!-- Scrollable modal -->
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content" style="background: linear-gradient(#FFD600, #F9F0C9);">
                                                <div class="modal-header">
                                                   
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                    <div class="col-sm-6">
                                                        <img src="https://projectstaging.live/public/images/jimg5.png"/>
                                                        </div>
                                                    <div class="col-sm-6">
                                                        <h4>Healthpedia</h4>
Explore our extensive collection of health blogs and videos to delve into the latest advancements in the medical field.
</div>
                                                </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                              <div class="modal fade" id="exampleModalScrollable7" tabindex="-1" aria-labelledby="exampleModalScrollable7" data-bs-keyboard="false" style="display: none;" aria-hidden="true">
                                        <!-- Scrollable modal -->
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                   
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <video  controls>
  <source src=" https://projectstaging.live/uploads/webinar-image/1711973881.mp4" type="video/mp4">
</video>
                                                   
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>        
                                    
  
  

<script src="{{ asset('public/js/jquery-min.js') }}"></script>  
<script src="{{ asset('public/js/bootstrap-min.js') }}"></script>
<script src="{{ asset('public/js/slick.min.js') }}"></script>
<script src="{{ asset('public/js/main-js.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':

                    toastr.options.timeOut = 10000;
                    toastr.info("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();
                    break;
                case 'success':

                    toastr.options.timeOut = 10000;
                    toastr.success("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
                case 'warning':

                    toastr.options.timeOut = 10000;
                    toastr.warning("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
                case 'error':

                    toastr.options.timeOut = 10000;
                    toastr.error("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
            }
        @endif
    </script>
</body>
</html>