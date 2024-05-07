<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('public/expertwebsite/css/bootstrap-min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('public/expertwebsite/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/expertwebsite/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('public/expertwebsite/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('public/expertwebsite/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/expertwebsite/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('public/expertwebsite/css/responsive.css') }}">
    
  
  </head>
  <body>
    <div class="main-wrapper">
      <div class="header">
        <div class="top-bar-header">
          <div class="container">
            <div class="row flex">
              <div class="col-md-2 b-right">
                <div class="top-bar-email tp-text">
                <span><i class="fa-solid fa-envelope"></i></span> <a href="mailto:holistic@doctor.in">holistic@doctor.in</a>
                </div>
              </div>
              <div class="col-md-2">
                <div class="top-bar-phone tp-text">
                  <span><i class="fas fa-phone"></i></span> <a href="tel:+91 999999999">+91 999 999 999</a>
                </div>
              </div>
              <div class="col-md-5">
                <div class="text-uppercase tp-text tp-tagline">Intro Price ! Get Online Programmes @ 25% Offer<span class="tagline-rtext">New</span></div>
              </div>
              <div class="col-md-3">
                <div class="social-icon-top">
                            <i class="fa-brands fa-facebook-f"></i>
                          </div>
                          <div class="social-icon-top">
                            <i class="fa-brands fa-square-instagram"></i>
                          </div>
                          <div class="social-icon-top">
                            <i class="fa-brands fa-twitter"></i>
                          </div>
                          
                          <div class="social-icon-top">
                            <i class="fa-brands fa-youtube"></i>
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
          <a href="{{ route('expert.website.home') }}"><img src="{{ asset('public/expertwebsite/images/logo.png') }}"></a>
                </div>
              </div>
              <div class="col-xl-6 col-lg-7 col-6">
                <div class="top-navigation">
                  <nav class="navbar navbar-expand-xl navbar-light">
  
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav" style=" margin: auto; ">
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ route('expert.website.about') }}">About <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('expert.website.programs') }}">Programs</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('expert.website.workshops') }}">Workshop</a>
                        </li>
                         
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('expert.website.healthpedia') }}">Blogs</a>
                        </li>
                        
                        
                      </ul>
                    </div>
                  </nav>
                 
                </div>
              </div>
              <div class="col-md-3 main-heder-right">
                <div class="header-right">
                  @if(auth()->check())
                    <div class="user-login">
                    <form method="get" action="{{route('user_logout')}}">
                      @csrf
                       <button type="submit" class="btn btn-success"><i class="fa-regular fa-user"></i> Logout</button>
                    </form>
                    </div>
                    
                  @else
                    <div class="user-login">
                      <a href="{{route('expert.website.login')}}">
                        <i class="fa-regular fa-user"></i>Login
                      </a>
                    </div>
                    <div class="header-cta">
                      <a href="{{route('expert.website.signup')}}" class="yst-btn">Register Now  <i class="fa-solid fa-arrow-right"></i></a>
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


    <div class="footer">
      <div class="container">
        <div class="footer-first-section">
          <div class="row">
            <div class="col-md-6">
              <div class="footer-logo">
                    <a href="{{ route('expert.website.home') }}"><img src="{{ asset('public/expertwebsite/images/logo.png') }}"></a>
                </div>    
              <div class="footer-text">
                <p>
                  YellowSquash is a community-based marketplace for global wellness entrepreneurs (both in services and products). We provide platform and technology to enable sustainable & holistic wellness professionals to be successful, right from...
                </p>
              </div>
              
            </div>
            <div class="col-md-3">
              <div class="footer-fmiddle">
                <h2 class="footer-col-title">Contact Us</h2>

                <div class="footer-menu">
                   
               
                <div class="footer-info">
                  <div class="f-address">
                    <p><i class='fas fa-map-marker-alt'></i> Platina Heights C-24, C Block, Phase 2, Industrial Area, Sector 62, Noida, Uttar Pradesh 201301</p>
                  </div>
                  <div class="f-contact">
                    <i class="fas fa-envelope"></i> <a href="tel:+91 97173 33655"> +91 999999 9999</a>
                  </div>
                  <div class="f-email">
                   <i class="fas fa-phone"></i> <a href="mailto:info@yellowsquash.in"> info@doctorweb.in</a>
                  </div>

          
              </div>
        
                  
                </div>
              </div>
              <div class="footer-cta">
                <a href="{{ route('expert.website.book.appointment') }}" class="yst-btn">Book Appointment  <i class="fa-solid fa-arrow-right"></i></a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="footer-last">
                <h2 class="footer-col-title">Quick Links</h2>
                <div class="footer-menu">
                  <ul>
                    <li>
                      <a href="{{ route('expert.website.about') }}">About Us</a>
                    </li>
                     
                     


 
 


                    <li>
                      <a href="{{ route('expert.website.workshops') }}">Workshops</a>
                    </li>           
                    <li>
                      <a href="{{ route('expert.website.programs') }}">Programs</a>
                    </li>
                     <li>
                      <a href="{{ route('expert.website.login') }}">Login/ Sign Up</a>
                    </li>
                    
                    <li>
                      <a href="{{ route('expert.website.privacy.policy') }}">Privacy Policy</a>
                    </li>                    
                    <li>
                      <a href="{{ route('expert.website.tnc') }}">Terms & Conditions</a>
                    </li>
                   
                    <li>
                      <a href="{{ route('expert.website.faq') }}">FAQs</a>
                    </li>
                    <li>
                      <a href="{{ route('expert.website.contact') }}">Contact us</a>
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
              
                <div class="social-media mt-0">
                  <div class="row    mt-0">
                      <h2 class="footer-col-title" style="  float: left;    width: auto;">Follow Us On Social Media</h2>
                  <div class="social-icon-top">
                            <i class="fa-brands fa-facebook-f"></i>
                          </div>
                          <div class="social-icon-top">
                            <i class="fa-brands fa-square-instagram"></i>
                          </div>
                          <div class="social-icon-top">
                            <i class="fa-brands fa-twitter"></i>
                          </div>
                          
                          <div class="social-icon-top">
                            <i class="fa-brands fa-youtube"></i>
                          </div>
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
                                                        <img src="https://projectstaging.live/public/expertwebsite/images/mod.png"/>
                                                        </div>
                                                    <div class="col-sm-6">
                                                        <h4>Informative Events</h4>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis elit magna. Suspendisse eu enim risus. Ut ac sapien at arcu feugiat pretium. Morbi sed metus odio. Suspendisse ac blandit turpis. Fusce et odio eget sapien congue mattis. Mauris quis eros vel augue auctor aliquet at ac massa. Nulla vulputate orci sit amet orci sagittis lacinia. Proin sit amet semper magna. Aliquam mollis maximus vehicula. 

</div>
                                                </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div> 
  
  

<script src="{{ asset('public/expertwebsite/js/jquery-min.js') }}"></script>  
<script src="{{ asset('public/expertwebsite/js/bootstrap-min.js') }}"></script>
<script src="{{ asset('public/expertwebsite/js/slick.min.js') }}"></script>
<script src="{{ asset('public/expertwebsite/js/main-js.js') }}"></script>
</body>
</html>