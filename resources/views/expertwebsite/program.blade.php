@extends('expertwebsite.master')
@section('title', 'Home')
@section('content')
        

 

        <!----------Detail top ------------->
        <div class="single-detail-section page-section">
          <div class="container">
            <div class="row pb-5">
              <div class="col-md-9">
                <div class="single-left">
                  <div class="section-heding mb-3">
                    
                       
                    <h2 class="ys-headting">{{ $programs[0]->title }}</h2>
                  </div>
                  <div class="rating mb-4">
                    <ul class="star-rating">
                      <li><i class="fa-solid fa-star"></i></li>
                      <li><i class="fa-solid fa-star"></i></li>
                      <li><i class="fa-solid fa-star"></i></li>
                      <li><i class="fa-solid fa-star"></i></li>
                      <li><i class="fa-solid fa-star-half-stroke"></i></li>
                      <li>4.5</li>
                    </ul>
                  </div>
                  <div class="ys-left-single row">
                    <div class="col-md-12">
                      <div class="ys-left-single-img">
                          
                          
                        <img src="{{ url(config('app.uploads')).'/'.$programs[0]->image_url ?? '' }}" style="width: 100%;">
                        <div class="img-overlay">

                        </div>
                        <span class="video-popup-btn2"><i class="fa-solid fa-play"></i></span>
                      </div>
                      <div class="video-banner modal" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="video-popup">
                              <video width="560" height="315"controls><source src="{{ url(config('app.program_video_url')).'/'.$programs[0]->programming_tovideo_url ?? '' }}" type="video/mp4">  Your browser does not support the video tag.</video>
                                <!-- <iframe width="560" height="315" src="{{ url(config('app.program_video_url')).'/'.$programs[0]->programming_tovideo_url ?? '' }}" title="YouTube video player" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                       
                    </div>
                    <div class="col-md-12">
                      <div class="ys-left-single-con">
                      <div class="description-dark mb-3 mt-5">
                      <div class="row center-align">
                        <div class="col-md-4">
                          <div class="text-center text-white overview-bx">
                            <i class="fa-solid fa-graduation-cap"></i><br>
                            Program Starts<br>
                          {{ date('d-F-Y', strtotime($programs[0]->start_date)) }}


                           </div>
                        </div>
                        <div class="col-md-4">
                          <div class="text-center text-white overview-bx">
                            <i class="fa-regular fa-circle-check"></i><br>
                            Entry Score<br> {{ $programs[0]->enroll_user }}&nbsp;+
                          </div>
                          
                        </div>
                        <div class="col-md-4">
                          <div class="text-center text-white overview-bx">
                            <i class="fa-regular fa-clock"></i><br>
                            @php
                              $sessionCount = count($ProgramSession);
                          @endphp

                          <p> Sessions: {{ $sessionCount }}</p>
                        

                          </div>
                        </div>
                      </div>
                    </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-md-3">
                <div class="single-right">
                    
                
                    @if(auth()->check())
                    @if($programExists)       
                    <div class="ys-sidebar-single">
                      
                     
                      
                    <div class="sidebar-heading text-center mt-4 mb-4">
                      <h2 class="ys-seidebar-heading">Subscribe To Progradddm</h2>
                    </div>

                   
                    <div class="single-side-con">
                      <div class="dropdown-text mb-3"><strong>Select A Plan</strong></div>
                        <div class="plan-form">
                        <form action="{{ route('checkout') }}" method="post">
                          @csrf
                          
                          <input type="hidden" value="{{Request()->id}}" name="program_id">
                            <select class="dropdown-option" id="selectPlan" required>
                              <option value="">Select Plan</option>
                              @foreach($plan as $key => $plans)
                              <option value="{{ $plans->id }}">{{ $plans->add_plans }}</option>
                              @endforeach
                            </select>

                          <!-- for select plan type -->
                          <div class="dropdown-text mt-3 mb-3" ><strong>Select Plan Type</strong></div>
                            <div class="plan-form">     
                              <select class="dropdown-option" id="selectPlanType" name="plan_type_id" required>
                                  <option value="">Select Plan Type</option>
                              </select>
                            </div>
                          
                            @if($programExists)
                              <button type="button" class="yst-btn plan-subs">Subscribed</button>
                            @else
                                <button type="submit" class="yst-btn plan-subs">Subscribe Now</button>
                            @endif

                        </form>
                        <!-- <div class="dropdown-text mt-3 mb-3"><strong>Select Price</strong>
                      </div> -->
                      
                    </div>
                  </div>
                </div>       

                    @endif
                    @else       
                           
                    <div class="ys-sidebar-single">
                      
                     
                      
                    <div class="sidebar-heading text-center mt-4 mb-4">
                      <h2 class="ys-seidebar-heading">Subscribe To Program</h2>
                    </div>

                   
                    <div class="single-side-con">
                      <div class="dropdown-text mb-3"><strong>Select A Plan</strong></div>
                        <div class="plan-form">
                        <form action="{{ route('checkout') }}" method="post">
                          @csrf
                          
                          <input type="hidden" value="{{Request()->id}}" name="program_id">
                            <select class="dropdown-option" id="selectPlan" required>
                              <option value="">Select Plan</option>
                              @foreach($plan as $key => $plans)
                              <option value="{{ $plans->id }}">{{ $plans->add_plans }}</option>
                              @endforeach
                            </select>

                          <!-- for select plan type -->
                          <div class="dropdown-text mt-3 mb-3" ><strong>Select Plan Type</strong></div>
                            <div class="plan-form">     
                              <select class="dropdown-option" id="selectPlanType" name="plan_type_id" required>
                                  <option value="">Select Plan Type</option>
                              </select>
                            </div>
                          
                            @if($programExists)
                              <button type="button" class="yst-btn plan-subs">Subscribed</button>
                            @else
                                <button type="submit" class="yst-btn plan-subs">Subscribe Now</button>
                            @endif

                        </form>
                        <!-- <div class="dropdown-text mt-3 mb-3"><strong>Select Price</strong>
                      </div> -->
                      <div class="plan-form">     
                     
                        <!-- <select class="dropdown-option">
                          <option>Select Price</option>
                          
                           @foreach($programs as $key => $program)
                              <option value="">{{ $program->price }}</option>
                             
                          @endforeach -->
                        <!-- </select>  -->


                        <!-- <div class="plan-radio-option">
                          <div class="plan-option">
                            <input type="radio" name="">Individual
                          </div>
                          <div class="plan-option">
                            <input type="radio" name="">2 Member Plan
                          </div>
                          <div class="plan-option">
                            <input type="radio" name="">3 Member Plan
                          </div>
                          <div class="plan-option">
                            <input type="radio" name="">4 Member Plan
                          </div>
                          <div class="plan-option">
                            <input type="radio" name="">5 Member Plan
                          </div>
                          
                        </div> -->

                        <!-- <button type="submit" class="yst-btn plan-subs">Subscribe Now</button> -->
                        
                      </div>
                    </div>
                  </div>
                </div>       
                                
                    @endif
                  
              </div>
            </div>
            </div>
            <div class="row b-bottom-y">
              <div class="col-md-9">
                <div class="description-tab nav nav-tabs pt-4" id="nav-tab" role="tablist">
                  <button class="nav-link active" id="desctab1" data-bs-toggle="tab" data-bs-target="#desctab1-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true"><i class="fa-solid fa-book-open-reader"></i> Overview</button>
                  <button class="nav-link" id="desctab2" data-bs-toggle="tab" data-bs-target="#desctab2-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true"><i class="fa-solid fa-book-bookmark"></i> Sessions</button>
                  <button class="nav-link" id="desctab3" data-bs-toggle="tab" data-bs-target="#desctab3-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true"><i class="fa-solid fa-user-tie"></i> Expert</button>
                  <button class="nav-link" id="desctab4" data-bs-toggle="tab" data-bs-target="#desctab4-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true"><i class="fa-solid fa-file-pen"></i> F.A.Qs</button>
                   <button class="nav-link" id="desctab6" data-bs-toggle="tab" data-bs-target="#desctab6-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true"><i class="fa-solid fa-comment-dots"></i> Reviews</button>
                </div>
                <div class="tab-content p-3 mt-5" id="description-section">
                  <div class="tab-pane fade active show" id="desctab1-content" role="tabpanel" aria-labelledby="desctab1">
                     
                    <div class="overview-con">
                      <div class="row">
                        <div class="col-md-8">
                           {!! $programs[0]->program_description !!}
                        </div>
                        <div class="col-md-4">
                           <img src="{{ url(config('app.uploads')).'/'.$programs[0]->image_url ?? '' }}" style="width: 100%;">
                        </div>
                       
                      </div>
                      
                    </div>
                  </div>
                  <div class="tab-pane fade" id="desctab2-content" role="tabpanel" aria-labelledby="desctab2">
                    <div class="overview-con">
                      <div class="description-heading mb-4">
                        <h2>Sessions</h2>
                      </div>
                      <p>Program Starts {{ \Carbon\Carbon::parse($programs[0]->start_date)->format('dF-Y') }}
                        (Saturday): 8:00 PM IST sessions</p>

                      <div class="session-faq">
                        <div class="accordion" id="accordionExample">
                            @foreach($ProgramSession as $key => $ProgramSessions)
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="heading{{$key}}">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                           Session {{$key + 1}} | {{$ProgramSessions->session_time}} 
                           @if(auth()->check())
                           @if($programExists)
                           <span style="margin: auto;"> {{ date('d M Y', strtotime($ProgramSessions->session_startdate)) }}</span>


                           @endif
                           @else
                            
                           @endif
                          </button>
                          </h2>
                        <div id="collapse{{$key}}" class="accordion-collapse collapse" aria-labelledby="heading{{$key}}" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <p><b>{{$ProgramSessions ->session_title}}</b></p>
                          {!! $ProgramSessions->session_description !!}

                          @if(auth()->check())
                            @foreach($ProgramSessions->SessionResorce as $val)
                              @if(@$val->file_type == 'image')
                                  <a href="{{ asset('uploads/'.$val->file_path) }}" target="_blank">{{ $val->file_path }}</a><br>
                              @else
                              <a href="{{ asset('uploads/'.$val->file_path) }}" target="_blank">{{ $val->file_path }}</a><br>
                          
                              @endif
                            @endforeach  
                          @endif

                          </div>
                        </div>
                        </div>
                        @endforeach
                        </div>

                         

                          <div class="show-less mt-5">
                            Show Less <i class="fa-solid fa-angle-down"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                 

                  <div class="tab-pane fade" id="desctab3-content" role="tabpanel" aria-labelledby="desctab3">
                    <div class="overview-con">
                      <div class="row">
                        <div class="col-md-8">
                          <div class="description-heading">
                            <h2>Expert</h2>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <!-- <div class="ys-cta text-md-end mt-3">
                            <a href="#" class="yst-btn">Ask Your Queries <i class="fa-solid fa-arrow-right"></i></a>
                          </div> -->
                        </div>
                      </div>
                      <div class="description-expert mt-4">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="dexpert-img">
                            
                            <img src="{{ url(config('app.expert_profile')).'/'.$program->expert->expert_profile ?? '' }}">
                            <!-- {{$program->expert->expert_profile}}   --> 
                            </div>
                            
                          </div>
                          <div class="col-md-8">
                            <div class="dexpert-name">
                            
                            {{$program->expert->name}}  
                        
                            </div>
                            <div class="dexpert-designation">
                               {{$program->expert->expert_designation}}  
                          
                              <!-- Surgical Gastroenterology | Functional Medicine -->
                            </div>
                            <div class="about-me">
                              <div class="aboutme-title">
                                About Me
                              </div>
                              
                            </div>
                            <div class="about-info">
                            {{ \Illuminate\Support\Str::words($program->expert->expert_description, 20, '...') }}

                            </div>
                            <div class="expert-exp">
                              <div class="exp-yr">
                                <strong>Experience:</strong>
                                {{$program->expert->year_of_experiance}} years
                              </div>
                              <div class="desc-social-link">
                                <ul>
                                  <li><strong>Social Media :</strong></li>
                                  <li><a href=""><i class="fa-brands fa-square-facebook"></i></a></li>
                                  <li><a href=""><i class="fa-brands fa-square-youtube"></i></a></li>
                                  <li><a href=""><i class="fa-brands fa-square-twitter"></i></a></li>
                                  <li><a href=""><i class="fa-brands fa-square-instagram"></i></a></li>

                                </ul>
                              </div>
                            </div>
                            <div class="expert-btm"> 
                              <div class="expert-rating">
                                <ul class="star-rating">
                                  <li style="color: #2d2d2d;"><strong>Rating : </strong></li>
                                  <li><i class="fa-solid fa-star"></i></li>
                                  <li><i class="fa-solid fa-star"></i></li>
                                  <li><i class="fa-solid fa-star"></i></li>
                                  <li><i class="fa-solid fa-star"></i></li>
                                  <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                  <li>4.9</li>
                                </ul>          
                              </div>
                            </div>
                              <div class="qual">
                                <strong>Qualification : </strong> {{$program->expert->expert_qualification}} 

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="desctab4-content" role="tabpanel" aria-labelledby="desctab4">
                    <div class="overview-con">
                      <div class="description-heading">
                        <h2>FAQ</h2>
                      </div>

                      <div class="session-faq">
                         <div class="accordion" id="accordionExample">
                          @foreach($programFaq as $key => $programFaqs)
                          <div class="accordion-item">
                              <h2 class="accordion-header" id="heading{{ $key }}">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                                      {{ $programFaqs->question }}
                                  </button>
                              </h2>
                              <div id="collapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $key }}" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                      {{ $programFaqs->answer }}
                                  </div>
                              </div>
                          </div>
                          @endforeach
                      </div>


                          <div class="show-less mt-5">
                            Show Less <i class="fa-solid fa-angle-down"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                

                   <div class="tab-pane fade" id="desctab6-content" role="tabpanel" aria-labelledby="desctab6">
                    <div class="overview-con">
                      <div class="description-heading mb-4">
                        <h2>Reviews</h2>
                      </div>
                      

                      <div class="review-section">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="review-text text-center">
                              <h1>4.9</h1>
                              <div class="rating">
                                  <ul class="star-rating">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                    <li></li>
                                  </ul>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-8">
                            <div class="review-star">
                              <div class="rating-bar">
                                <div class="star-text">
                                  5 Star
                                </div>
                                <div class="progress">
                                  <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                  </div>
                                </div>
                              </div>
                              <div class="rating-bar">
                                <div class="star-text">
                                  4 Star
                                </div>
                                <div class="progress">
                                  <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                  </div>
                                </div>
                              </div>
                              <div class="rating-bar">
                                <div class="star-text">
                                  3 Star
                                </div>
                                <div class="progress">
                                  <div class="progress-bar" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                  </div>
                                </div>
                              </div>
                              <div class="rating-bar">
                                <div class="star-text">
                                  2 Star
                                </div>
                                <div class="progress">
                                  <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                  </div>
                                </div>
                              </div>
                              <div class="rating-bar">
                                <div class="star-text">
                                  1 Star
                                </div>
                                <div class="progress">
                                  <div class="progress-bar" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">
                                  </div>
                                </div>
                              </div>
                              
                            </div>


                          </div>
                          <div class="user-comments mt-5 pb-5">
                            <div class="comment-heading mb-3">
                              <strong>Comments (5)</strong>
                            </div>
                            <div class="comments-slider">
                                <div class="item">
                                  <div class="comments-list">
                                    <img src="images/comments1.png">
                                  </div>
                                </div>
                                <div class="item">
                                  <div class="comments-list">
                                    <img src="images/comments1.png">
                                  </div>
                                </div>
                                <div class="item">
                                  <div class="comments-list">
                                    <img src="images/comments1.png">
                                  </div>
                                </div>
                                <div class="item">
                                  <div class="comments-list">
                                    <img src="images/comments1.png">
                                  </div>
                                </div>
                            </div>
                          </div>
                          <div class="comment-form">
                            <div class="comment-form-section-heading mb-3">
                              Leave A Reply
                            </div>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <div class="comment-form-box">
                              <form class="comment-form">
                                <div class="row">
                                  <div class="col-md-6">
                                    <input type="text" placeholder="Enter Your Name" required="" class="ys-field">
                                  </div>
                                  <div class="col-md-6">
                                    <input type="email" placeholder="Enter Your Email Address" required="" class="ys-field">
                                  </div>
                                  <div class="col-md-12">
                                    <textarea type="text" placeholder="Message Here" class="ys-field"></textarea>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-cta">
                                      <button type="submit" class="yst-btn">Post Comments  <i class="fa-solid fa-arrow-right"></i></button>
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
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---------Detail top end----------->

        <!----Newsletter Start-------------->
        <div class="newsletter-section">    
          <div class="container">
              @include('layouts.subscribenewsletter')  <!-- This includes the navbar -->

          
          </div>
        </div>

      <!----Newsletter End-------------->
      
     
 @endsection
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
    $(document).ready(function() {
    $('#selectPlan').on('change', function() {
        var selectedPlanId = $(this).val();
        if (selectedPlanId !== 'Select Plan') {
            getPlanDetails(selectedPlanId);
        }
    });

    function getPlanDetails(planId) {
        var token = $('meta[name="csrf-token"]').attr('content'); // Fetch CSRF token
        $.ajax({
          url: "{{ route('getplan.type') }}",
            type: 'post', // Change to GET request
            data: { planId: planId }, // Send planId as part of the data object
            headers: {
                'X-CSRF-TOKEN': token 
            },
            success: function(response) {
              $('#selectPlanType').empty(); 
              $('#selectPlanType').append(response); 
                // Handle the response here
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }
});

</script>


