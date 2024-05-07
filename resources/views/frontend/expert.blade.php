@extends('frontend.master')
@section('title', 'Home')
@section('content')
        
<!----Expert banner----------->




        <!-----Inner Banner-------->
        <div class="innerPage-banner">
          <div class="container">
            <div class="page-banner-inner">
              <div class="row">
                <div class="col-sm-2">
                    <img style="width:100%; border-radius:7px;" src="{{ url(config('app.expert_profile')).'/'.$experts->expert_profile ?? '' }}">
                </div>  
                <div class="col-sm-7">
                  <div class="page-heading">
                    <h2>{{$experts->name}}</h2>
                  </div>
                  <div class="expert-detail-designation col-md-8">
                    {{$experts->expert_designation}}
                  </div>
                  <div class="expert-lang">
                    <ul>
                      <li>{{$experts->expert_language}}</li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-3 video-container" style="    z-index: 999;">
                @if(!empty($experts->profile_video))
                    <!-- <video width="200" height="200" id="video_exp" controls controls poster="{{ url(config('app.expert_profile')).'/'.$experts->expert_thumbnail ?? '' }}">
                                  <source src="{{ $experts->profile_video ?? '' }}" type="video/mp4">
                                  
                                </video> -->
                      <iframe style="border-radius: 7px;" src="{{$experts->profile_video}}" id="video_exp" height="200" width="300" title="Iframe Example"></iframe>
                @endif
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <!--------Inner Banner End-->
        
        
        <!----------About Expert Start------------->
        <div class="about-expert page-section">
          <div class="container">
            <div class="row">
              <div class="col-md-8">
                <div class="row align-items-center">
                  <div class="col-md-6">
                    <div class="page-heading">
                      <h2>About Expert </h2>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!---<div class="ys-cta text-center">
                      <a href="#" class="yst-btn">Ask Your Queries <i class="fa-solid fa-arrow-right"></i></a>
                    </div>--->
                  </div>
                  <div class="col-md-12 mt-4">
                    <div class="about-expert-info">
                      <p>{!!$experts->expert_description!!}</p>
                    </div>
                    <!---<div class="about-expert-img">
                      <img src="{{ url(config('app.expert_profile')).'/'.$experts->expert_profile ?? '' }}">
                      <span class="video-popup-btn2"><i class="fa-solid fa-play"></i></span>
                    </div>--->
                   
                    <div class="video-banner modal" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="video-popup">
                              <!----<iframe width="560" height="315" src="{{ url(config('app.expert_video_url')).'/'.$experts->profile_video ?? '' }}" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--->
                              @if(!empty($experts->profile_video))
                              <video width="560" height="315" id="video_exp" controls poster="{{ url(config('app.expert_profile')).'/'.$experts->expert_thumbnail ?? '' }}">
                                  <source src="{{ $experts->profile_video }}" type="video/mp4">
                                  
                                </video>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="page-heading mt-4">
                      <h2>Qualification </h2>
                    </div>
                    <p>{{$experts->expert_qualification}}</p>

                    <div class="page-heading mt-4">
                      <h2>Experience </h2>
                    </div>
                    <p>{{ $experts->expert_experience }}</p>
                  </div>
                </div>

              </div>
              <div class="col-lg-4 col-md-6">
                <div class="ys-sidebar mt-0 bg-grey">
                    @if(isset($programs) && count($programs) > 0) 
                  <div class="sidebar-heading mt-4 mb-4">
                    <h2 class="ys-seidebar-heading">Upcoming Programs</h2>
                  </div>
                  <div class="upcoming-block">
                    <div class="upcoming-list">
                      <div class="upcomingList-img">
                      <a href="{{ route('user.program', ['id' => $programs[0]->id]) }}" class="text-black">
                        <img src="{{ url(config('app.uploads')).'/'.$programs[0]->image_url ?? '' }}">
                      </a>
                      </div>
                      <div class="upcomingList-con" style="background: #ffffff">
                        <div class="upcomingList-date">
                          <i class="fa-regular fa-calendar"></i> {{$programs[0]->start_date}}
                        </div>
                        <div class="upcomingList-title">
                        <a href="{{ route('user.program', ['id' => $programs[0]->id]) }}" class="text-black">
                          {{$programs[0]->title}}
                        </a>
                        </div>
                        <div class="upcomingList-expert">
                          By : {{$experts->name}}
                        </div>
                      </div>
                    </div>
                   </div> 
                    @endif
                    
                    @if(isset($webinars) && count($webinars) > 0) 
                    <div class="sidebar-heading mt-5 mb-4">
                      <h2 class="ys-seidebar-heading">Upcoming Workshops</h2>
                    </div>
                    
                    <div class="upcoming-block">
                    
                    <div class="upcoming-list">
                      <div class="upcomingList-img">
                         
                        @if(isset($webinars[0]->webinar_image)) 
                        <a href="{{ route('user.workshop', ['id' => $webinars[0]->id]) }}"> 
                        <img src="{{ url(config('app.webinar_image')).'/'.$webinars[0]->webinar_image ?? '' }}">
                        </a>
                        @endif
                      </div>
                      <div class="upcomingList-con" style="background: #ffffff">
                        <div class="upcomingList-date">
                          <i class="fa-regular fa-calendar"></i> {{$webinars[0]->webinar_start_date}}
                        </div>
                        <div class="upcomingList-title">
                        <a href="{{ route('user.workshop', ['id' => $webinars[0]->id]) }}" class="text-black"> 
                          {{$webinars[0]->webinar_title}}
                        </a>
                        </div>
                        <div class="upcomingList-expert">
                          By : {{$experts->name}}
                        </div>
                      </div>
                    </div>
                    </div>
                    @endif
                  
                </div>
              </div>
            </div>
          </div>
        </div>

        <!----------About Expert End------------->

        <!----Our team start----->
        <!-- <div class="our-expert">
          <div class="container">
            <div class="our-expert-inner">
              <div class="row">
                <div class="section-heding text-center">
                    <h2 class="ys-headting">Our Experts</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-6">
                    <div class="expert-box text-center">
                      <div class="o-expert-img">
                        <img src="../public/images/MaskExpert1.png">
                      </div>
                      <div class="o-expert-info">
                        <div class="o-expert-name">
                          Dr. Indira Priyadarshini
                        </div>
                        <div class="o-expert-designation">
                          Infertility & Child Specialist
                        </div>
                      </div>
                      <div class="o-expert-bottom">
                          <ul>
                            <li><span>50+</span>
                              Patients<br> Treated
                            </li>
                            <li><span>100+</span>
                              Participants<br> Enrolled
                            </li>
                            <li><span>10+</span>
                              Years of<br> Experience
                            </li>
                          </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="expert-box text-center">
                      <div class="o-expert-img">
                        <img src="../public/images/MaskExpert2.png">
                      </div>
                      <div class="o-expert-info">
                        <div class="o-expert-name">
                          Dr. Indira Priyadarshini
                        </div>
                        <div class="o-expert-designation">
                          Infertility & Child Specialist
                        </div>
                      </div>
                      <div class="o-expert-bottom">
                          <ul>
                            <li><span>50+</span>
                              Patients<br> Treated
                            </li>
                            <li><span>100+</span>
                              Participants<br> Enrolled
                            </li>
                            <li><span>10+</span>
                              Years of<br> Experience
                            </li>
                          </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="expert-box text-center">
                      <div class="o-expert-img">
                        <img src="../public/images/MaskExpert3.png">
                      </div>
                      <div class="o-expert-info">
                        <div class="o-expert-name">
                          Dr. Indira Priyadarshini
                        </div>
                        <div class="o-expert-designation">
                          Infertility & Child Specialist
                        </div>
                      </div>
                      <div class="o-expert-bottom">
                          <ul>
                            <li><span>50+</span>
                              Patients<br> Treated
                            </li>
                            <li><span>100+</span>
                              Participants<br> Enrolled
                            </li>
                            <li><span>10+</span>
                              Years of<br> Experience
                            </li>
                          </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="ys-cta text-center mt-5">
                  <a href="#" class="yst-btn">View More <i class="fa-solid fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
         -->
        <!-----Our team end------>
        
        <!-----Data Speak Start------>
        <!-- <div class="data-speak-section">
          <div class="container">
            <div class="data-speak-inner">
              <div class="row">
                <div class="col-lg-7">
                  <div class="ds-left">
                    <div class="ds-img">
                      <img src="../public/images/data-speak.png">
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
                        <a href="#" class="yst-btn">Connect with Us <i class="fa-solid fa-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      
      <!-----Data Speak End------>
        <!----Newsletter Start-------------->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script>
          $(function() {
$(document).on('click', function(element) {
if (!$(element.target).closest('.video-banner').length) {
$('#video_exp')[0].pause();
}
});
})
          </script>
       <!--- <div class="newsletter-section">
         <!-- <div class="container">
            
//@include('layouts.subscribenewsletter')  <!-- This includes the Subscribe Our Newsletter -->
 
         <!--- </div>
        <!---</div>--->
 
      <!----Newsletter End-------------->
  
 
 @endsection