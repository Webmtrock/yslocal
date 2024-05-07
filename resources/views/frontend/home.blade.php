@extends('frontend.master')
@section('title', 'Home')
@section('content')

        <!---Banner Start--->
        <div class="hero-banner">
          <div class="banner-inner">
            <div class="container">
              <div class="row">
                <div class="col-md-7">
                  <div class="banner-con">
                    <h2 class="banner-heading">
                      Sustainable 
                        <br>
                      <span>Solutions for</span><br>
                      Chronic Conditions!
                    </h2>
                    <div class="banner-text">
                      Achieve long-term wellness through simple,<br>
                      powerful, and holistic changes in your lifestyle.

                    </div>
                    <div class="banner-cta">
                      <a href="#health-concern" class="yst-btn">TALK TO US  <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="banner-img">
                     <img src="public/images/imageedit_1_9730263422.jpeg" style="    border-radius: 16px;">
                    <!--<span class="video-popup-btn"><i class="fa-solid fa-play"></i></span>-->
                  </div>
                </div>
              </div>
              <div class="video-banner modal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="video-popup">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/C0DPdy98e4c?si=f-tkoXXc9Fk_I8H6" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Banner End-->

        <!---Offerings STart-->
        <div class="our-offerings">
          <div class="container">
            <div class="offerings-inner">
              <div class="section-heding text-center">
                <h2 class="ys-headting">Our Offerings</h2>
              </div>
            <div class="row">
                <div class="col-md-3 offerings-list">
                <div class="offerings-list-div">
                  <a href="{{ route('user.workshops') }}">
                  @if($settings['our_offerings_workshop_image'])
                    <img src="{{ asset('public/images/' . $settings['our_offerings_workshop_image']) }}" style="width: 100%;">
                    @endif
                    <div class="offerings-lable">
                    <span>{{ old('our_offerings_workshop_name', isset($settings['our_offerings_workshop_name']) ? $settings['our_offerings_workshop_name'] : '') }}</span>
                    </div>
                  </a>
                </div>
              </div>
                <div class="col-md-3 offerings-list">
                <div class="offerings-list-div">
                  <a href="#health-concern">
                  @if($settings['our_offerings_consultation_image'])
                    <img src="{{ asset('public/images/' . $settings['our_offerings_consultation_image']) }}" style="width: 100%;">
                    @endif
                    <div class="offerings-lable">
                    <span>{{ old('our_offerings_consultation_name', isset($settings['our_offerings_consultation_name']) ? $settings['our_offerings_consultation_name'] : '') }}</span>
                    </div>
                  </a>
                </div>
              </div>
                
              <div class="col-md-3 offerings-list">
                <div class="offerings-list-div">
                  <a href="{{ route('user.programs') }}">
                  @if($settings['our_offerings_program_image'])
                    <img src="{{ asset('public/images/' . $settings['our_offerings_program_image']) }}" style="width: 100%;">
                    @endif
                    <div class="offerings-lable">
                    <span>{{ old('our_offerings_program_name', isset($settings['our_offerings_program_name']) ? $settings['our_offerings_program_name'] : '') }}</span>
                    </div>
                  </a>
                </div>
              </div>
              
              <div class="col-md-3 offerings-list">
                <div class="offerings-list-div">
                  <a href="{{ route('user.healthpedia') }}">
                  @if($settings['our_offerings_healthpedia_image'])
                    <img src="{{ asset('public/images/' . $settings['our_offerings_healthpedia_image']) }}" style="width: 100%;">
                    @endif
                    <div class="offerings-lable">
                    <span>{{ old('our_offerings_healthpedia_name', isset($settings['our_offerings_healthpedia_name']) ? $settings['our_offerings_healthpedia_name'] : '') }}</span>
                    </div>
                  </a>
                </div>
              </div>
              
              
            </div>
            </div>
          </div>
        </div>


       

        <!---Health Concern Form Start--->
        <div class="health-concern" id="health-concern">
          <div class="container">
            <div class="health-concern-inner">
              <div class="section-heding text-center">
                <h2 class="ys-headting">Share Your Health Concerns</h2>
              </div>
              <div class="health-concern-from">
              @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            </div>
              <form class="health-concern-from" method="POST" action="{{ route('submit.form') }}">
                 @csrf 
                  <div class="row">
                    <div class="col-md-4">
                      <input type="text" placeholder="Full Name*" required="" name="name" class="ys-field">
                    </div>
                    <div class="col-md-4">
                      <input type="email" placeholder="Email*" required="" name="email" class="ys-field">
                    </div>
                    <div class="col-md-4">
                      <input type="text" placeholder="Phone Number*" required="" name="number" class="ys-field">
                    </div>
                    <div class="col-md-4">
                      <select class="ys-field" name="concern">
                        <option>Select your concern*</option>
                        <option>ADHD</option>
                        <option>GDD</option>
                        <option>ASD</option>
                        <option>Allergies</option>
                        <option>Alternate Therapy</option>
                        <option>Autism</option>
                        <option>Diabetes</option>
                        <option>Digestive Health</option>
                        <option>Gut Health</option>
                        <option>Heart Health</option>
                        <option>Hormonal Issues</option>
                        <option>IBS/IBD</option><
                        <option>Infertility</option>
                        <option>Mental Health</option>
                        <option>Nutrition deficiencies or insufficiencies</option>
                        <option>Peptic Ulcer</option>
                        <option>Thyroid</option>
                        <option>Ulcerative Colitis</option>
                        <option>Weight Loss</option>
                        <option>Women's Health</option>

                      </select>
                    </div>
                    <div class="col-md-4">
                      <div class="form-checkbox">
                          <input type="radio" name="related_to" value="workshops" id="workshops">
                          <label for="workshops">Events</label>
                      </div>
                      <div class="form-checkbox">
                          <input type="radio" name="related_to" value="programs" id="programs">
                          <label for="programs">Programs</label>
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-cta text-md-end">
                      <button type="submit" class="yst-btn">Submit  <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!---Health Concern Form End--->

           <!---Journey start--->
           <div class="ys-journey">
              <div class="container">
                @include('layouts.startjourneysec')  <!-- This includes from resources -> views ->  layouts -->
              </div>
          </div>
          <!---journey End--->

          
        <!---Condition Start--->
        <div class="condition-cover">
          <div class="container container-custom">
            <div class="row align-items-center">
              <div class="col-lg-8 col-md-6">
                <div class="section-heding">
                  <h2 class="ys-headting">Conditions We Cover</h2>
                </div>
              </div>
              <!--<div class="col-lg-4 col-md-6">
                <!--<div class="ys-cta text-md-end">
                      <a href="{{ route('user.programs') }}" class="yst-btn">Explore Our Programs  <i class="fa-solid fa-arrow-right"></i></a>
                </div>

              </div>-->
            </div>
            <div class="row">
              <div class="condition-tabs ys-tabs">
                  <nav>
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                      
                      <button class="nav-link active" id="programs" data-bs-toggle="tab" data-bs-target="#programs-content" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Programs</button>
                     

                      <button class="nav-link" id="workshops" data-bs-toggle="tab" data-bs-target="#workshops-content" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Events</button>
                      
                    </div>
                  </nav>
                  <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                      <div class="tab-pane fade active show" id="programs-content" role="tabpanel" aria-labelledby="programs">
                          <div class="conditions-slider">
                            <!-- Loader for Programs Content -->
                            <div id="programs-loader" class="loader"></div>
                              @foreach($activeCategories as $category)
                                  <a href="{{ route('user.programs') }}/?cat={{ $category->title }}">
                                  <div class="item">
                                      @if($category->category_image)
                                        <div class="condition-list text-center">
                                            <div class="con-icon">
                                            <img src="{{ url(config('app.category-image')).'/'.$category->category_image ?? '' }}" class="m-auto"  loading="lazy">
                                            </div> 
                                            <div class="con-text con-text-a">
                                                {{ $category->title }}
                                            </div>
                                        </div>
                                      @endif
                                  </div>
                                  </a>
                              @endforeach
                          </div>
                      </div>
                                  
                    <div class="tab-pane fade" id="workshops-content" role="tabpanel" aria-labelledby="workshops">
                      <div class="conditions-slider">
                     <!-- Loader for Workshops Content -->
                        <div id="workshops-loader" class="loader"></div>
                        @foreach($activeCategories as $category)
                          <a href="{{ route('user.workshops') }}/?cat={{ $category->title }}">
                              <div class="item">
                                @if($category->category_image)
                                  <div class="condition-list text-center">
                                      <div class="con-icon">
                                      <img src="{{ url(config('app.category-image')).'/'.$category->category_image ?? '' }}" class="m-auto"  loading="lazy">
                                      </div> 
                                      <div class="con-text con-text-a">
                                          {{ $category->title }}
                                      </div>
                                  </div>
                                  @endif
                              </div>
                          </a>
                        @endforeach
                      </div>
                    </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!---Condition End--->


         <!---Find Your Expert  Start--->
         <div class="condition-cover">
          <div class="container container-custom">
              
              
            <div class="row align-items-center">
              <div class="col-lg-8 col-md-6">
                <div class="section-heding">
                  <h2 class="ys-headting">Find Your Expert</h2>
                </div>
              </div>
               <div class="col-lg-4 col-md-6">
                <div class="ys-cta text-md-end">
                      <a href="{{ route('user.experts') }}" class="yst-btn">Explore Our Expert  <i class="fa-solid fa-arrow-right"></i></a>
                </div>

              </div>
            </div>
            <div class="row">
            <div class="condition-tabs ys-tabs">
    <div class="tab-content p-3 border bg-light" id="nav-tabContent">
        <div class="tab-pane fade active show" id="programs-content" role="tabpanel" aria-labelledby="programs">
            <div class="findexpert-slider">
                @foreach($experts as $expert)
                  
                <div class="item">
                    <div class="findexpert-list">
                        <div class="findexpert-list-div">
                           <a href="{{ route('user.expert', ['id' => $expert->id]) }}">
                            <img src="{{ url(config('app.expert_profile')).'/'.$expert->expert_profile ?? '' }}" style="width: 100%;max-height: 200px; height:200px;overflow: hidden;">
                                <div class="findexpert-lable" style="min-height:130px">
                                    <span><b>{{ $expert->name }}</b></span><br>
                                    <span style="font-size: 14px !important;">{{ $expert->expert_designation }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
               
                @endforeach
            </div>
        </div>
    </div>
</div>
            </div>
          </div>
        </div>

        <!---Find Your Expert  End--->
 

        <!---Popular Workshops Start--->
       
        <div class="workshops-section">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-8 col-md-6">
                <div class="section-heding">
                  <h2 class="ys-headting">Our Events</h2>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="ys-cta text-md-end">
                                          <a href="{{ route('user.workshops') }}" class="yst-btn">Explore Our Events  <i class="fa-solid fa-arrow-right"></i></a>
 
                </div>

              </div>
            </div>
            <div class="row">
           <div class="popular-programs-tabs ys-tabs">
                 <!---- <nav class="tabbable">
                    <!--<div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        
                      <button class="nav-link active" id="adhd1" data-bs-toggle="tab" onclick="$('.webicatall').show();"  aria-selected="true">All</button>
                         @foreach($activeCategories as $category)
                      <button class="nav-link"   type="button" role="tab" ><a href="{{ route('user.workshops') }}/?cat={{ $category->title }}" class="text-black">{{ $category->title ?? '' }}</a></button>
                      @endforeach
                      <button class="nav-link" id="gdd1" data-bs-toggle="tab" data-bs-target="#gdd-content1" type="button" role="tab" aria-controls="nav-gdd" aria-selected="false">GDD</button>
                       
                      
                    </div>
                  </nav>-->
                  <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                    <div class="tab-pane fade active show"  >
                      <div class="programs-inner">
                        <div class="row">
                            @if($webinars)

                            @foreach($webinars as $webinar)
                             
                                    <div class="col-xl-4 col-md-6 webicatall webicat{{ $webinar->category_id }}">
                            <div class="program-list">
                              <div class="program-video">
                                  
                                <video controls="" class="mx-auto h-auto md:h-[280px]" controlslist="nodownload"><source src="{{ url(config('app.webinar_image')).'/'.$webinar->webinar_video ?? '' }}" type="video/mp4"></video>
                              </div>
                              <div class="program-cont">
                                <div class="rating">
                                  <ul class="star-rating">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                    <li>4.5</li>
                                  </ul>
                                </div>
                                <div class="program-title">
                                  {{ $webinar->webinar_title }}
                                </div>
                                <!---<div class="program-desc">
                                {{ strip_tags($webinar->description) }}

                                </div>--->
                                <div class="program-bottom">
                                  <div class="p-expert-img">
                                  <img src="{{ url(config('app.expert_profile')).'/'.$webinar->expert->	expert_profile ?? '' }}" class="m-auto">
                                  </div>
                                  <div class="p-expert-info">
                                  <div class="p-expert-name">
                              @if ($webinar && $webinar->expert)
                                {{ $webinar->expert->name }}
                                 @else
                                No expert assigned
                                   @endif
                                    </div>
                                         <div class="p-expert-designation">
                                         @if ($webinar && $webinar->expert)
                                {{ $webinar->expert->expert_designation }}
                                 @else
                                No expert assigned
                                   @endif
                                    </div>
                                  </div>
                                  <div class="p-button">
                                    <a href="{{ route('user.workshop', ['id' => $webinar->id]) }}" class="green-btn">Subscribe</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> 
                                @endforeach
                            @endif
                        </div>
                      </div>
                    </div> 
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!---Popular Workshops End--->

     
        <!---Popular Programs start--->
        <div class="programs-section">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-8 col-md-6">
                <div class="section-heding">
                  <h2 class="ys-headting">Our Programs</h2>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="ys-cta text-md-end">
                      <a href="{{ route('user.programs') }}" class="yst-btn">Explore Our Programs  <i class="fa-solid fa-arrow-right"></i></a>
                </div>

              </div>
            </div>
            <div class="row">
               <div class="popular-programs-tabs ys-tabs">
                  
                  <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="adhd-content1" role="tabpanel" aria-labelledby="adhd1">
                      <div class="programs-inner">
                        <div class="row">
                            @if($programs)
                                @foreach($programs as $program)
                                    <div class="col-xl-4 col-md-6  procatall procatall{{ $program->category_id }}"> 
                            <div class="program-list">
                              <div class="program-video">
                                  
                                  <i onclick="openModal('{{ url(config('app.program_video_url')).'/'.$program->programming_tovideo_url ?? '' }}?autoplay=0')" class="fa-solid fa-play-circle button_video_play"></i> 
                          
                          
                                <!--<img src="{{ url(config('app.uploads')).'/videos/'.$programs[0]->program_video_thumbnail ?? '' }}">  -->
                                  
                               <img src="{{ asset('uploads/'.$program->image_url) }}">
                              <!-- The Modal -->
<div id="videoModal" class="modal" style="background:#acaaaa80">
  <div class="modal-content" style="top: 20%;">
    <span class="close close_btn_align" onclick="closeModal()">&times;</span>
    <iframe id="videoIframe" width="100%" height="315" src="" title="YouTube video player" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" frameborder="0"></iframe>
  </div>
</div>

<script>
// Get the modal
var modal = document.getElementById("videoModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
function openModal(videoUrl) {
  // Set the iframe source
  document.getElementById('videoIframe').src = videoUrl;
  // Show the modal
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
function closeModal() {
  // Pause the video
  var videoIframe = document.getElementById('videoIframe');
  videoIframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
  // Clear the iframe source
  document.getElementById('videoIframe').src = '';
  // Hide the modal
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    // Pause the video
    var videoIframe = document.getElementById('videoIframe');
    videoIframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
    // Clear the iframe source
    document.getElementById('videoIframe').src = '';
    // Hide the modal
    modal.style.display = "none";
  }
}
</script>  
                                  
                                
                              </div>
                              <div class="program-cont">
                                <div class="rating">
                                  <ul class="star-rating">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                    <li>4.5</li>
                                  </ul>
                                </div>
                                <div class="program-title">
                                  {{ $program->title }}
                                </div>
                                
                               
                                <div class="program-bottom">
                                  <div class="p-expert-img">
                                  @if($program->expert)
                                    
                                     <img src="{{ url(config('app.expert_profile')).'/'.$program->expert->	expert_profile ?? '' }}" class="m-auto">  
                                     @endif
                                </div>
                                  <div class="p-expert-info">
                                    <div class="p-expert-name">
                                        @if($program->expert)
                                     {{ $program->expert->name }}
                                     @endif
                                    </div>
                                    <div class="p-expert-designation">
                                        @if($program->expert)
                                       {{ $program->expert->expert_designation }}
                                       @endif
                                    </div>
                                  </div>
                                  <div class="p-button">
                                    <a href="{{ route('user.programs', ['id' => $program->id]) }}" class="green-btn">Subscribe</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> 
                                @endforeach
                            @endif
                        </div>
                      </div>
                    </div>
                
                    <div class="tab-pane fade" id="gdd-content1" role="tabpanel" aria-labelledby="gdd1">
                      <div class="programs-inner">
                        <div class="row">
                          <div class="col-xl-4 col-md-6">
                            <div class="program-list">
                              <div class="program-video">
                                  <video controls="" class="mx-auto h-auto md:h-[280px]" controlslist="nodownload"><source src="https://ysdbresouces.s3.ap-south-1.amazonaws.com/sp/Intro+Video+Gorang.mp4" type="video/mp4"></video>
                              </div>
                              <div class="program-cont">
                                <div class="rating">
                                  <ul class="star-rating">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                    <li>4.5</li>
                                  </ul>
                                </div>
                                <div class="program-title">
                                  Functional Medicine Approach for Digestive Disorders
                                </div>
                                <div class="program-desc">
                                  People who are seeking sustainable relief from digestive disorders by treating root causes.
                                </div>
                                <div class="program-bottom">
                                  <div class="p-expert-img">
                                    <img src="public/images/expert1.jpg">
                                  </div>
                                  <div class="p-expert-info">
                                    <div class="p-expert-name">
                                      Dr. Gaurang Ramesh
                                    </div>
                                    <div class="p-expert-designation">
                                      Surgical Gastroenterology | Functional Medicine
                                    </div>
                                  </div>
                                  <div class="p-button">
                                    <a href="#" class="green-btn">Subscribe</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="asd-content1" role="tabpanel" aria-labelledby="asd1">
                      <div class="programs-inner">
                        <div class="row">
                          <div class="col-xl-4 col-md-6">
                            <div class="program-list">
                              <div class="program-video">
                                <video controls="" class="mx-auto h-auto md:h-[280px]" controlslist="nodownload"><source src="https://ysdbresouces.s3.ap-south-1.amazonaws.com/sp/Intro+Video+Gorang.mp4" type="video/mp4"></video>
                              </div>
                              <div class="program-cont">
                                <div class="rating">
                                  <ul class="star-rating">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                    <li>4.5</li>
                                  </ul>
                                </div>
                                <div class="program-title">
                                  Functional Medicine Approach for Digestive Disorders
                                </div>
                                <div class="program-desc">
                                  People who are seeking sustainable relief from digestive disorders by treating root causes.
                                </div>
                                <div class="program-bottom">
                                  <div class="p-expert-img">
                                    <img src="public/images/expert1.jpg">
                                  </div>
                                  <div class="p-expert-info">
                                    <div class="p-expert-name">
                                      Dr. Gaurang Ramesh
                                    </div>
                                    <div class="p-expert-designation">
                                      Surgical Gastroenterology | Functional Medicine
                                    </div>
                                  </div>
                                  <div class="p-button">
                                    <a href="#" class="green-btn">Subscribe</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-4 col-md-6">
                            <div class="program-list">
                              <div class="program-video">
                                <video controls="" class="mx-auto h-auto md:h-[280px]" controlslist="nodownload"><source src="https://ysdbresouces.s3.ap-south-1.amazonaws.com/sp/Intro+Video+Gorang.mp4" type="video/mp4"></video>
                              </div>
                              <div class="program-cont">
                                <div class="rating">
                                  <ul class="star-rating">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                    <li>4.5</li>
                                  </ul>
                                </div>
                                <div class="program-title">
                                  Functional Medicine Approach for Digestive Disorders
                                </div>
                                <div class="program-desc">
                                  People who are seeking sustainable relief from digestive disorders by treating root causes.
                                </div>
                                <div class="program-bottom">
                                  <div class="p-expert-img">
                                    <img src="public/images/expert1.jpg">
                                  </div>
                                  <div class="p-expert-info">
                                    <div class="p-expert-name">
                                      Dr. Gaurang Ramesh
                                    </div>
                                    <div class="p-expert-designation">
                                      Surgical Gastroenterology | Functional Medicine
                                    </div>
                                  </div>
                                  <div class="p-button">
                                    <a href="#" class="green-btn">Subscribe</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>


                    <div class="tab-pane fade" id="accupressure-content1" role="tabpanel" aria-labelledby="accupressure1">
                      <div class="programs-inner">
                        <div class="row">
                          <div class="col-xl-4 col-md-6">
                            <div class="program-list">
                              <div class="program-video">
                                <video controls="" class="mx-auto h-auto md:h-[280px]" controlslist="nodownload"><source src="https://ysdbresouces.s3.ap-south-1.amazonaws.com/sp/Intro+Video+Gorang.mp4" type="video/mp4"></video>
                              </div>
                              <div class="program-cont">
                                <div class="rating">
                                  <ul class="star-rating">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                    <li>4.5</li>
                                  </ul>
                                </div>
                                <div class="program-title">
                                  Functional Medicine Approach for Digestive Disorders
                                </div>
                                <div class="program-desc">
                                  People who are seeking sustainable relief from digestive disorders by treating root causes.
                                </div>
                                <div class="program-bottom">
                                  <div class="p-expert-img">
                                    <img src="public/images/expert1.jpg">
                                  </div>
                                  <div class="p-expert-info">
                                    <div class="p-expert-name">
                                      Dr. Gaurang Ramesh
                                    </div>
                                    <div class="p-expert-designation">
                                      Surgical Gastroenterology | Functional Medicine
                                    </div>
                                  </div>
                                  <div class="p-button">
                                    <a href="#" class="green-btn">Subscribe</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-4 col-md-6">
                            <div class="program-list">
                              <div class="program-video">
                                <video controls="" class="mx-auto h-auto md:h-[280px]" controlslist="nodownload"><source src="https://ysdbresouces.s3.ap-south-1.amazonaws.com/sp/Intro+Video+Gorang.mp4" type="video/mp4"></video>
                              </div>
                              <div class="program-cont">
                                <div class="rating">
                                  <ul class="star-rating">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                    <li>4.5</li>
                                  </ul>
                                </div>
                                <div class="program-title">
                                  Functional Medicine Approach for Digestive Disorders
                                </div>
                                <div class="program-desc">
                                  People who are seeking sustainable relief from digestive disorders by treating root causes.
                                </div>
                                <div class="program-bottom">
                                  <div class="p-expert-img">
                                    <img src="public/images/expert1.jpg">
                                  </div>
                                  <div class="p-expert-info">
                                    <div class="p-expert-name">
                                      Dr. Gaurang Ramesh
                                    </div>
                                    <div class="p-expert-designation">
                                      Surgical Gastroenterology | Functional Medicine
                                    </div>
                                  </div>
                                  <div class="p-button">
                                    <a href="#" class="green-btn">Subscribe</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-4 col-md-6">
                            <div class="program-list">
                              <div class="program-video">
                                <video controls="" class="mx-auto h-auto md:h-[280px]" controlslist="nodownload"><source src="https://ysdbresouces.s3.ap-south-1.amazonaws.com/sp/Intro+Video+Gorang.mp4" type="video/mp4"></video>
                              </div>
                              <div class="program-cont">
                                <div class="rating">
                                  <ul class="star-rating">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                    <li>4.5</li>
                                  </ul>
                                </div>
                                <div class="program-title">
                                  Functional Medicine Approach for Digestive Disorders
                                </div>
                                <div class="program-desc">
                                  People who are seeking sustainable relief from digestive disorders by treating root causes.
                                </div>
                                <div class="program-bottom">
                                  <div class="p-expert-img">
                                    <img src="public/images/expert1.jpg">
                                  </div>
                                  <div class="p-expert-info">
                                    <div class="p-expert-name">
                                      Dr. Gaurang Ramesh
                                    </div>
                                    <div class="p-expert-designation">
                                      Surgical Gastroenterology | Functional Medicine
                                    </div>
                                  </div>
                                  <div class="p-button">
                                    <a href="#" class="green-btn">Subscribe</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>


                    <div class="tab-pane fade" id="allergies-content1" role="tabpanel" aria-labelledby="allergies1">
                      <div class="programs-inner">
                        <div class="row">
                          <div class="col-xl-4 col-md-6">
                            <div class="program-list">
                              <div class="program-video">
                                <video controls="" class="mx-auto h-auto md:h-[280px]" controlslist="nodownload"><source src="https://ysdbresouces.s3.ap-south-1.amazonaws.com/sp/Intro+Video+Gorang.mp4" type="video/mp4"></video>
                              </div>
                              <div class="program-cont">
                                <div class="rating">
                                  <ul class="star-rating">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                    <li>4.5</li>
                                  </ul>
                                </div>
                                <div class="program-title">
                                  Functional Medicine Approach for Digestive Disorders
                                </div>
                                <div class="program-desc">
                                  People who are seeking sustainable relief from digestive disorders by treating root causes.
                                </div>
                                <div class="program-bottom">
                                  <div class="p-expert-img">
                                    <img src="public/images/expert1.jpg">
                                  </div>
                                  <div class="p-expert-info">
                                    <div class="p-expert-name">
                                      Dr. Gaurang Ramesh
                                    </div>
                                    <div class="p-expert-designation">
                                      Surgical Gastroenterology | Functional Medicine
                                    </div>
                                  </div>
                                  <div class="p-button">
                                    <a href="#" class="green-btn">Subscribe</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-4 col-md-6">
                            <div class="program-list">
                              <div class="program-video">
                                <video controls="" class="mx-auto h-auto md:h-[280px]" controlslist="nodownload"><source src="https://ysdbresouces.s3.ap-south-1.amazonaws.com/sp/Intro+Video+Gorang.mp4" type="video/mp4"></video>
                              </div>
                              <div class="program-cont">
                                <div class="rating">
                                  <ul class="star-rating">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                    <li>4.5</li>
                                  </ul>
                                </div>
                                <div class="program-title">
                                  Functional Medicine Approach for Digestive Disorders
                                </div>
                                <div class="program-desc">
                                  People who are seeking sustainable relief from digestive disorders by treating root causes.
                                </div>
                                <div class="program-bottom">
                                  <div class="p-expert-img">
                                    <img src="public/images/expert1.jpg">
                                  </div>
                                  <div class="p-expert-info">
                                    <div class="p-expert-name">
                                      Dr. Gaurang Ramesh
                                    </div>
                                    <div class="p-expert-designation">
                                      Surgical Gastroenterology | Functional Medicine
                                    </div>
                                  </div>
                                  <div class="p-button">
                                    <a href="#" class="green-btn">Subscribe</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                         
                        </div> 
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!---Popular Programs End--->

           <!-----Why choose us Start---->

           <div class="choose-us">
           
    <div class="container">
        
         
 
 
                              
                             
                               
              <div class="row space-between">
                <div class="col-lg-3 col-md-6 wc-col">
                  <a href="{{ route('user.concerns') }}/{{ $concerns[0]->article_slug }}">  <div class="wc-inner  wcbg-blue">
                    <img src="{{ url(config('app.article_image_url')).'/'.$concerns[0]->banner_image ?? '' }}" style="width: 79px;height: 82px;">
                    <div class="wc-heading">
                      {{ $concerns[0]->article_title }}
                    </div>
                  </div></a>
                </div>
                <div class="col-lg-3 col-md-6 wc-col">
                  <a href="{{ route('user.concerns') }}/{{ $concerns[1]->article_slug }}"><div class="wc-inner  wcbg-yellow">
                    <img src="{{ url(config('app.article_image_url')).'/'.$concerns[1]->banner_image ?? '' }}" style="width: 79px;height: 82px;">
                    <div class="wc-heading">
                      {{ $concerns[1]->article_title }}
                    </div>
                  </div></a>
                </div>
                <div class="col-lg-3 col-md-6 wc-col">
                  <a href="{{ route('user.concerns') }}/{{ $concerns[2]->article_slug }}"><div class="wc-inner  wcbg-purple">
                    <img src="{{ url(config('app.article_image_url')).'/'.$concerns[2]->banner_image ?? '' }}" style="width: 79px;height: 82px;">
                    <div class="wc-heading">
                      {{ $concerns[2]->article_title }}
                    </div>
                  </div></a>
                </div>
                <div class="col-lg-3 col-md-6 wc-col">
                  <a href="{{ route('user.concerns') }}/{{ $concerns[3]->article_slug }}"> <div class="wc-inner wcbg-yellow">
                    <img src="{{ url(config('app.article_image_url')).'/'.$concerns[3]->banner_image ?? '' }}" style="width: 79px;height: 82px;">
                    <div class="wc-heading">
                      {{ $concerns[3]->article_title }}
                    </div>
                  </div></a>
                </div>
              </div>
              <div class="row space-between small-row">
                
                <div class="col-lg-3 col-md-6 wc-col">
                  <a href="{{ route('user.concerns') }}/{{ $concerns[4]->article_slug }}">  <div class="wc-inner  wcbg-white">
                    <img src="{{ url(config('app.article_image_url')).'/'.$concerns[4]->banner_image ?? '' }}" style="width: 79px;height: 82px;">
                    <div class="wc-heading">
                      {{ $concerns[4]->article_title }}
                    </div>
                  </div></a>
                </div>
                <div class="col-lg-3 col-md-6 wc-col">
                  <a href="{{ route('user.concerns') }}/{{ $concerns[5]->article_slug }}">  <div class="wc-inner  wcbg-blue">
                    <img src="{{ url(config('app.article_image_url')).'/'.$concerns[5]->banner_image ?? '' }}" style="width: 79px;height: 82px;">
                    <div class="wc-heading">
                      {{ $concerns[5]->article_title }}
                    </div>
                  </div></a>
                </div>
                <div class="col-lg-3 col-md-6 wc-col">
                  <a href="{{ route('user.concerns') }}/{{ $concerns[6]->article_slug }}">  <div class="wc-inner wcbg-white">
                    <img src="{{ url(config('app.article_image_url')).'/'.$concerns[6]->banner_image ?? '' }}" style="width: 79px;height: 82px;">
                    <div class="wc-heading">
                      {{ $concerns[6]->article_title }}
                    </div>
                  </div></a>
                </div>
              </div>
              <div class="row space-between">
                <div class="col-lg-3 col-md-6 wc-col">
                  <a href="{{ route('user.concerns') }}/{{ $concerns[7]->article_slug }}"> <div class="wc-inner wcbg-blue">
                    <img src="{{ url(config('app.article_image_url')).'/'.$concerns[7]->banner_image ?? '' }}" style="width: 79px;height: 82px;">
                    <div class="wc-heading">
                      {{ $concerns[7]->article_title }}
                    </div>
                  </div></a>
                </div>
                <div class="col-lg-6 col-md-12">
                  <div class="wc-inner-text">
                    <div class="wc-heading-big text-center">
                      <h2>We Know Your Concern</h2>
                    </div>
                    
                  </div>
                </div>
                
                <div class="col-lg-3 col-md-6 wc-col">
                  <a href="{{ route('user.concerns') }}/{{ $concerns[8]->article_slug }}">   <div class="wc-inner wcbg-blue">
                    <img src="{{ url(config('app.article_image_url')).'/'.$concerns[8]->banner_image ?? '' }}" style="width: 79px;height: 82px;">
                    <div class="wc-heading">
                      {{ $concerns[8]->article_title }}
                    </div>
                  </div> </a>
                </div>
              </div>
              <div class="row space-between small-row">
                
                <div class="col-lg-3 col-md-6 wc-col">
                  <a href="{{ route('user.concerns') }}/{{ $concerns[9]->article_slug }}"> <div class="wc-inner  wcbg-white">
                    <img src="{{ url(config('app.article_image_url')).'/'.$concerns[9]->banner_image ?? '' }}" style="width: 79px;height: 82px;">
                    <div class="wc-heading">
                      {{ $concerns[9]->article_title }}
                    </div>
                  </div></a>
                </div>
                
                <div class="col-lg-3 col-md-6 wc-col">
                  <a href="{{ route('user.concerns') }}/{{ $concerns[10]->article_slug }}"> <div class="wc-inner wcbg-white">
                    <img src="{{ url(config('app.article_image_url')).'/'.$concerns[10]->banner_image ?? '' }}" style="width: 79px;height: 82px;">
                    <div class="wc-heading">
                      {{ $concerns[10]->article_title }}
                    </div>
                  </div></a>
                </div>
              </div>
              
              
            </div> 
          </div>
          <!-----Why choose us End------>
  
     
        <!----Our team start----->
        <!---<div class="our-expert">
          <div class="container">
            <div class="our-expert-inner">
              <div class="row">
                <div class="section-heding text-center">
                    <h2 class="ys-headting">Our Experts  </h2>
                  </div>
                </div>
                <div class="row">
                                    @foreach($experts_promoted as $expert)

                  <div class="col-lg-4 col-md-6">
                    <div class="expert-box text-center">
                      <div class="o-expert-img">
                          
                          
                           <a href="{{ route('user.expert', ['id' => $expert->id]) }}">
                            
                            
                            
                            
                        <img src="{{ url(config('app.expert_profile')).'/'.$expert->expert_profile ?? '' }}">
                        </a>
                      </div>
                      <div class="o-expert-info">
                        <div class="o-expert-name">
                          {{ $expert->name }}
                        </div>
                        <div class="o-expert-designation">
                             
                                                      {{ $expert->expert_designation }}

                         
                        </div>
                      </div>
                     
                    </div>
                  </div> 
                  @endforeach
                </div>
                <div class="ys-cta text-center mt-5">
                   <a href="{{ route('user.experts') }}" class="yst-btn">View More <i class="fa-solid fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>--->
        
        <!-----Our team end------>

        <!-----Data Speak Start------>
        <div class="data-speak-section">
          <div class="container">
            <div class="data-speak-inner">
             
                 @include('layouts.dataspeak')  <!-- This includes from resources -> views ->  layouts -->

              
            </div>
          </div>
        </div>
      
      <!-----Data Speak End------>

      <!-----Register Expert Start----->
        <div class="register-expert">
          <div class="container">
 @include('layouts.registerexpertsec')  <!-- This includes from resources -> views ->  layouts -->
          
          </div>
        </div>
      <!-----Register Expert End----->

      <!-----Testimonial Start----->
        <div class="ys-testimonial">
          <div class="container">
                 @include('layouts.hearourcustomers')  <!-- This includes from resources -> views ->  layouts -->

          </div>
        </div>
      <!-----Testimonial End----->

      <!-------Faq Start---------------->
      <div class="faq-section">
        <div class="container">
             @include('layouts.faqsec')  <!-- This includes from resources -> views ->  layouts -->
         
        </div>
      </div>
      <!-------Faq End------------------>

      <!-----BLog Section Start----------->
      <div class="latest-blogs">
          <div class="container">
            <div class="row">
              <div class="section-heding text-center mb-4">
                <h2 class="ys-headting">Latest Blogs</h2>
              </div>
              <div class="blogs-slider">
                  
                    @foreach($articles->take(6) as $article)
                <div class="item">
                  <div class="blog-list">
                      
                    <div class="blog-img">
                       <a href="{{ route('user.healthpediadetail', ['id' => $article->article_slug]) }}"  >
                           <img src="{{ url(config('app.article_image_url')).'/'.$article->banner_image ?? '' }}"> 
                           </a>
                    </div>
                    <div class="blog-con">
                      <div class="blog-meta">
                        <ul>
                          <li>
                              @if($article->expert)
                              {{ $article->expert->name }}
                              @endif
                              </li>
                          <li>|</li>
                          <li> {{ $article->created_at }}</li>
                        </ul>
                      </div>
                      <div class="blog-title">
                        <a href="{{ route('user.healthpediadetail', ['id' => $article->article_slug]) }}">{{ $article->article_title }}</a>
                      </div>
                      <div class="blog-desc">
                        {{ $article->meta_description }}
                      </div>
                      <div class="blog-btn">
                        <a href="{{ route('user.healthpediadetail', ['id' => $article->article_slug]) }}" class="yst-btn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                      </div>
                    </div>

                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        
        <!-- Loader CSS -->


 
 @endsection