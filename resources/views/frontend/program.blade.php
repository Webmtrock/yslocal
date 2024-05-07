@extends('frontend.master')
@section('title', 'Home')
@section('content')
<!----------Detail top ------------->
<div class="single-detail-section page-section">
<div class="container">
   <div class="row pb-5">
      <div class="col-md-7">
         <div class="single-left">
            <div class="section-heding mb-3">
               <h2 class="ys-headting">{{ $programs[0]->title }}</h2>
            </div>
            <div class="rating mb-4">
               <ul class="star-rating">
                  <!-- <li><i class="fa-solid fa-star"></i></li>
                     <li><i class="fa-solid fa-star"></i></li>
                     <li><i class="fa-solid fa-star"></i></li>
                     <li><i class="fa-solid fa-star"></i></li>
                     <li><i class="fa-solid fa-star-half-stroke"></i></li> -->
                  <?php
                     $rating = $programs[0]->rating ;
                     ?>
                  @for ($i = 0; $i < 5; $i++)
                  @if (floor($rating) - $i >= 1)
                  {{--Full Start--}}
                  <li><i class="fa-solid fa-star"></i></li>
                  @elseif ($rating - $i > 0)
                  {{--Half Start--}}
                  <li><i class="fa-solid fa-star-half-stroke"></i></li>
                  @else
                  {{--Empty Start--}}
                  <i class="far fa-star text-warning"> </i>
                  @endif
                  @endfor
                  <li>{{ $programs[0]->rating }}</li>
               </ul>
            </div>
            <div class="ys-left-single row">
               <div class="col-md-12">
                  <div class="ys-left-single-img">
                      
                     @if(!empty($programs[0]->program_video_thumbnail))
                     <img src="{{ url(config('app.uploads')).'/videos/'.$programs[0]->program_video_thumbnail ?? '' }}" style="width: 100%; height:450px;">
                     
                     @else
                     <img src="{{ url(config('app.uploads')).'/videos/'.$programs[0]->image_url ?? '' }}" style="width: 100%;height:450px;">
                     @endif
                    
                     @if(!empty($programs[0]->programming_tovideo_url))
                     <div class="img-overlay">
                     </div>
                     <span class="video-popup-btn2"><i class="fa-solid fa-play"></i></span>
                     @endif
                     
                     
                     
                     
                     
                     
                     
                     
                     
                  </div>
                  <div class="video-banner modal" tabindex="-1">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                              <div class="video-popup">
                                 @if(!empty($programs[0]->programming_tovideo_url))
                                 <video id="modalVideo" width="560" height="315"controls poster="{{$programs[0]->program_video_thumbnail}}">
                                    <source src="{{ url(config('app.program_video_url')).'/'.$programs[0]->programming_tovideo_url ?? '' }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                 </video>
                                 <!-- <iframe width="560" height="315" src="{{ url(config('app.program_video_url')).'/'.$programs[0]->programming_tovideo_url ?? '' }}" title="YouTube video player" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                                 @endif
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
                                 {{ date('d-F-Y', strtotime($programs[0]->program_start_date)) }}
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="text-center text-white overview-bx">
                                 <i class="fa-regular fa-circle-check"></i><br>
                                 @if(!empty($programs[0]->enroll_user))
                                 Enrollments<br> {{ ($programs[0]->enroll_user)??'' }}
                                 @endif
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="text-center text-white overview-bx">
                                 <i class="fa-regular fa-clock"></i><br>
                                 @php
                                 $sessionCount = count($ProgramSession);
                                 @endphp
                                 <p> Sessions <br> {{ $sessionCount }}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-5">
         @if($programExists)
         <div>
            @else
            <div class="single-right">
               @endif 
               <div class="ys-sidebar-single">
                  <div class="sidebar-heading text-center mt-4 mb-4">
                     @if($programExists)
                     <div class="support-form-sidebar">
                       
                        <h2 class="ys-seidebar-heading" style="border-radius: 7px; color: #4dad4d !important;background-color: #dde7df !important;padding: 18px !important;"> <i class="fa-regular fa-circle-check"></i>Subscribed</h2>
                        <p class="ys-seidebar-heading" style="font-size: 17px;"> <u>Download</u> our app access the program</p>
                        <br><br>
                        <p style="float: left;"><i class="fa-regular fa-file-lines"></i> &nbsp;Sessions: {{ $sessionCount }}</p>
                        <br><br>
                        <p style="float: left;"> <i class="fa-solid fa-calendar"></i> &nbsp;Starting on {{ \Carbon\Carbon::parse($programs[0]->program_start_date)->format('d-F-Y') }}</p>
                        <br><br><br><br>
                        <p> Have a question? <span style="color:green;"><a href="{{route('user.contact')}}">Ask Us</a></span></p>
                     </div>
                     @else
                     <h2 class="ys-seidebar-heading">Subscribe To Program</h2>
                     @endif  
                  </div>
                  <div class="single-side-con">
                     <div class="plan-form">
                        @if($programExists)
                        @else
                        <form action="{{ route('checkout') }}" method="post">
                           @csrf
                           <div class="row">
                              <div class="col-sm-6">
                                 <div class="dropdown-text mb-3"><strong>Select a Plan</strong></div>
                                 <input type="hidden" value="{{Request()->id}}" name="program_id">
                                 <select class="dropdown-option" id="selectPlan" required>
                                    <option value="">Select Plan</option>
                                    @foreach($plan as $key => $plans)
                                    <option value="{{ $plans->id }}">{{ $plans->add_plans }}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="col-sm-6">
                                 <!-- for select plan type -->
                                 <div class="dropdown-text mb-3" ><strong>Select Plan Type</strong></div>
                                 <div class="plan-form">
                                    <select class="dropdown-option" id="selectPlanType" name="plan_type_id" required>
                                       <option value="">Select Plan Type</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <br>
                           <button type="submit" class="yst-btn plan-subs">Subscribe Now</button>
                        </form>
                        @endif
                        <!---<div class="plan-form">     
                            <select class="dropdown-option">
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
                        <!--- </div>--->
                     </div>
                  </div>
               </div>
            </div>
            <br>
            <ol class="timeline">
               <li class="timeline-item">
                  <span class="timeline-item-icon | faded-icon icon_change">
                  1
                  </span>
                  <div class="timeline-item-description">
                     <span><a href="#">Enroll for the Program</a></span>
                  </div>
               </li>
               <li class="timeline-item">
                  <span class="timeline-item-icon | faded-icon icon_change">
                  2
                  </span>
                  <div class="timeline-item-description">
                     <span><a href="#">Fill Intake Form</a></span>
                  </div>
               </li>
               <li class="timeline-item">
                  <span class="timeline-item-icon | faded-icon icon_change">
                  3
                  </span>
                  <div class="timeline-item-description">
                     <span><a href="#">Submit Existing Reports</a></span>
                  </div>
               </li>
               <li class="timeline-item">
                  <span class="timeline-item-icon | faded-icon icon_change">
                  4
                  </span>
                  <div class="timeline-item-description">
                     <span><a href="#">Test Recommendations are shared with you</a></span>
                  </div>
               </li>
               <li class="timeline-item">
                  <span class="timeline-item-icon | faded-icon icon_change">
                  5
                  </span>
                  <div class="timeline-item-description">
                     <span><a href="#">Submit New Test Reports</a></span>
                  </div>
               </li>
               <li class="timeline-item">
                  <span class="timeline-item-icon | faded-icon icon_change">
                  6
                  </span>
                  <div class="timeline-item-description">
                     <span><a href="#">Consultation</a></span>
                  </div>
               </li>
               <li class="timeline-item">
                  <span class="timeline-item-icon | faded-icon icon_change">
                  7
                  </span>
                  <div class="timeline-item-description">
                     <span><a href="#">Attend Program Sessions</a></span>
                  </div>
               </li>
               <li class="timeline-item">
                  <span class="timeline-item-icon | faded-icon icon_change">
                  8
                  </span>
                  <div class="timeline-item-description">
                     <span><a href="#">Follow up</a></span>
                  </div>
               </li>
            </ol>
         </div>
      </div>
      <div class="row b-bottom-y">
         <div class="col-md-9">
            <div class="description-tab nav nav-tabs pt-4" id="nav-tab" role="tablist">
               <button class="nav-link active" id="desctab1" data-bs-toggle="tab" data-bs-target="#desctab1-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true"><i class="fa-solid fa-book-open-reader"></i> Overview</button>
               <button class="nav-link" id="desctab2" data-bs-toggle="tab" data-bs-target="#desctab2-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true"><i class="fa-solid fa-book-bookmark"></i> Sessions</button>
               <button class="nav-link" id="desctab3" data-bs-toggle="tab" data-bs-target="#desctab3-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true"><i class="fa-solid fa-user-tie"></i> Expert</button>
               <button class="nav-link" id="desctab4" data-bs-toggle="tab" data-bs-target="#desctab4-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true"><i class="fa-solid fa-file-pen"></i> F.A.Qs</button>
               <button class="nav-link" id="desctab5" data-bs-toggle="tab" data-bs-target="#desctab5-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true"><i class="fa-solid fa-comment-dots"></i> Reviews</button>
            </div>
            <div class="tab-content p-3 mt-5" id="description-section">
               <div class="tab-pane fade active show" id="desctab1-content" role="tabpanel" aria-labelledby="desctab1">
                  <div class="overview-con">
                     <div class="row">
                        <div class="col-md-12"style="overflow-wrap: break-word;">
                           {!! $programs[0]->program_description !!}
                        </div>
                        <!----<div class="col-md-4">
                           <img src="{{ url(config('app.uploads')).'/'.$programs[0]->image_url ?? '' }}" style="width: 100%;">
                           </div>--->
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="desctab2-content" role="tabpanel" aria-labelledby="desctab2">
                  <div class="overview-con">
                     <div class="description-heading mb-4">
                        <h2>Sessions</h2>
                     </div>
                     <p>Program Starts {{ \Carbon\Carbon::parse($programs[0]->program_start_date)->format(' d-F-Y') }}
                        {{$ProgramSession[0]->session_starttime ?? ''}} IST sessions
                     </p>
                     <div class="session-faq">
                        <div class="accordion" id="accordionExample">
                           @forelse ($ProgramSession as $key => $ProgramSessions)
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="heading{{$key}}">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                                 Session {{$key + 1}} | {{$ProgramSessions->session_time}} Min
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
                                 </div>
                              </div>
                            </div>
                           @empty
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                No session fouond!
                              </h2>
                             
                            </div>
                           @endforelse
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
                                 <a href="{{ route('user.expert', ['id' => $program->expert->id]) }}">
                                    <img src="{{ url(config('app.expert_profile')).'/'.$program->expert->expert_profile ?? '' }}">
                                    <!-- {{$program->expert->expert_profile}}   -->
                                 </a>
                              </div>
                           </div>
                           <div class="col-md-8">
                              <div class="dexpert-name">
                                 <a href="{{ route('user.expert', ['id' => $program->expert->id]) }}" class="text-black">
                                 {{$program->expert->name}}  
                                 </a>
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
                                 {!! \Illuminate\Support\Str::words($program->expert->expert_description, 20, '...') !!}
                              </div>
                              <div class="expert-exp">
                                 <div class="exp-yr">
                                    <strong>Experience:</strong>
                                    {{$program->expert->year_of_experiance}} years
                                 </div>
                              </div>
                              <!-- <div class="expert-btm">
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
                              </div> -->
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
                                    {!!$programFaqs->answer !!}
                                 </div>
                              </div>
                           </div>
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="desctab5-content" role="tabpanel" aria-labelledby="desctab5">
                  <div class="overview-con">
                 
                     <div class="review-section">
                        <div class="row">
                           
                           <div class="col-sm-12 user-comments">
                              <div class="description-heading">
                                 <h2>Review Images</h2>
                              </div>
                              <div class="comments-sliderssss">

                                 @if($program_review_images->isEmpty())
                                 <div class="col-sm-12 items">
                                    <div class="comments-list">
                                       No Images Available
                                    </div>
                                 </div>
                                 @else
                                 @foreach($program_review_images as $image)
                                 <div class=" col-sm-12 items">
                                    <div class="comments-list">
                                       <img src="{{ asset(url('uploads/'.$image->file))}}">
                                    </div>
                                 </div>
                                 @endforeach
                                 @endif
                              </div>
                           </div>
                           <div class="col-sm-12 user-comments">
                              <div class="description-heading">
                                 <h2>Review Video</h2>
                              </div>
                              <div class="comments-slider">
                                 @if($program_review_video->isEmpty())
                                 <div class="item">
                                    <div class="comments-list">
                                       No Video Available
                                    </div>
                                 </div>
                                 @else
                                 @foreach($program_review_video as $image)
                                    @if($image->file_type == "video")
                                       <div class="" width="320" height="240">

                                       
                                             <!-- <video width="320" height="240" controls>
                                                <source src="{{$image->file}}" type="video/mp4">
                                             </video> -->
                                             
                                             <iframe src="{{ asset(url('uploads/'.$image->file))}}" height="200" width="300"  title="Iframe Example"></iframe>
                                             
                                       </div>
                                    @endif
                                    @if($image->file_type == "video_link")
                              
                                       <div class="" width="320" height="240" style="margin-left:50px;">
                                          <iframe src="https://sample-videos.com/video321/mp4/720/big_buck_bunny_720p_2mb.mp4" height="200" width="300" title="Iframe Example"></iframe>
                                    
                                    </div>
                                    @endif
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
       //    console.log(response);
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
<script>
    var myModal = document.querySelector('.modal');

    myModal.addEventListener('hidden.bs.modal', function () {
        var video = document.getElementById('modalVideo');
        video.pause();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const timelineItems = document.querySelectorAll('.timeline-item');

        timelineItems.forEach(item => {
            item.addEventListener('click', function () {
                const icon = this.querySelector('.timeline-item-icon');
                const step = parseInt(icon.dataset.step);

                // Check if the icon is already changed
                const isChanged = !icon.classList.contains('icon_change');

                if (isChanged) {
                    // If changed, revert back to original state
                    icon.textContent = '✓'; // Reset icon text to its original value
                    icon.classList.add('icon_change'); // Add back faded class
                    icon.style.color = ''; // Reset color
                } else {
                    // If not changed, apply the changes
                    icon.textContent = '✓'; // Change icon to a checkmark
                    icon.classList.remove('icon_change'); // Remove faded class
                    icon.style.color = 'green'; // Change color to green
                }
            });
        });
    });
</script>

<style>
   :root {
   --c-grey-100: #f4f6f8;
   --c-grey-200: #e3e3e3;
   --c-grey-300: #b2b2b2;
   --c-grey-400: #7b7b7b;
   --c-grey-500: #3d3d3d;
   --c-blue-500: #688afd;
   }
   .timeline {
   width: 85%;
   max-width: 700px;
   margin-left: auto;
   margin-right: auto;
   display: flex;
   flex-direction: column;
   padding: 32px 0 32px 32px;
   border-left: 2px solid var(--c-grey-200);
   font-size: 1.125rem;
   }
   .timeline-item {
   display: flex;
   gap: 24px;
   & + * {
   margin-top: 24px;
   }
   & + .extra-space {
   margin-top: 48px;
   }
   }
   .new-comment {
   width: 100%;
   input {
   border: 1px solid var(--c-grey-200);
   border-radius: 6px;
   height: 48px;
   padding: 0 16px;
   width: 100%;
   &::placeholder {
   color: var(--c-grey-300);
   }
   &:focus {
   border-color: var(--c-grey-300);
   outline: 0; // Don't actually do this
   box-shadow: 0 0 0 4px var(--c-grey-100);
   }
   }
   }
   .timeline-item-icon {
   display: flex;
   align-items: center;
   justify-content: center;
   width: 40px;
   height: 40px;
   border-radius: 50%;
   margin-left: -52px;
   flex-shrink: 0;
   overflow: hidden;
   box-shadow: 0 0 0 6px #fff;
   svg {
   width: 20px;
   height: 20px;
   }
   &.faded-icon {
   background-color: var(--c-grey-100);
   color: var(--c-grey-400);
   }
   &.filled-icon {
   background-color: var(--c-blue-500);
   color: #fff;
   }
   }
   .timeline-item-description {
   display: flex;
   padding-top: 6px;
   gap: 8px;
   color: var(--c-grey-400);
   img {
   flex-shrink: 0;
   }
   a {
   color: var(--c-grey-500);
   font-weight: 500;
   text-decoration: none;
   &:hover,
   &:focus {
   outline: 0; // Don't actually do this
   color: var(--c-blue-500);
   }
   }
   }
   .timeline .avatar {
   display: flex;
   align-items: center;
   justify-content: center;
   border-radius: 50%;
   overflow: hidden;
   aspect-ratio: 1 / 1;
   flex-shrink: 0;
   width: 40px;
   height: 40px;
   &.small {
   width: 28px;
   height: 28px;
   }
   img {
   object-fit: cover;
   }
   }
   .timeline .comment {
   margin-top: 12px;
   color: var(--c-grey-500);
   border: 1px solid var(--c-grey-200);
   box-shadow: 0 4px 4px 0 var(--c-grey-100);
   border-radius: 6px;
   padding: 16px;
   font-size: 1rem;
   }
   .timeline .button {
   border: 0;
   padding: 0;
   display: inline-flex;
   vertical-align: middle;
   margin-right: 4px;
   margin-top: 12px;
   align-items: center;
   justify-content: center;
   font-size: 1rem;
   height: 32px;
   padding: 0 8px;
   background-color: var(--c-grey-100);
   flex-shrink: 0;
   cursor: pointer;
   border-radius: 99em;
   &:hover {
   background-color: var(--c-grey-200);
   }
   &.square {
   border-radius: 50%;
   color: var(--c-grey-400);
   width: 32px;
   height: 32px;
   padding: 0;
   svg {
   width: 24px;
   height: 24px;
   }
   &:hover {
   background-color: var(--c-grey-200);
   color: var(--c-grey-500);
   }
   }
   }
   .timeline .show-replies {
   color: var(--c-grey-300);
   background-color: transparent;
   border: 0;
   padding: 0;
   margin-top: 16px;
   display: flex;
   align-items: center;
   gap: 6px;
   font-size: 1rem;
   cursor: pointer;
   svg {
   flex-shrink: 0;
   width: 24px;
   height: 24px;
   }
   &:hover,
   &:focus {
   color: var(--c-grey-500);
   }
   }
   .timeline .avatar-list {
   display: flex;
   align-items: center;
   & > * {
   position: relative;
   box-shadow: 0 0 0 2px #fff;
   margin-right: -8px;
   }
   }
</style>
@endsection