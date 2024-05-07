@extends('frontend.master')
@section('title', 'Home')
@section('content')
        


<!------ Program Explore----------->
 
        <!------ Program Explore----------->

        <!--- Popular program-->
        <div class="program-popular page-section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2 class="ys-headting">Our Event</h2>  
                <div class="popular-programs-tabs ys-tabs">
                  <nav class="tabbable">
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                      
                      <!-- All button -->
<a href="{{ route('user.workshops') }}" class="text-black">
    <button class="nav-link @if(empty(request()->has('cat')))active @endif" id="progTab1" data-bs-toggle="tab" data-bs-target="#progTab1-content" type="button" role="tab" aria-controls="nav-all" aria-selected="true">All</button>
</a>

@php ($counter=0)@endphp
@foreach($activeCategories as $activeCat)
    <!-- Category buttons -->
    <a href="{{ route('user.workshops', ['cat' => $activeCat->id]) }}#mainstart" class="text-black">
        <button class="nav-link @if(request()->has('cat') && request()->input('cat') == $activeCat->id) active @endif" id="progTab{{$counter++}}" data-bs-toggle="tab" data-bs-target="#progTab25-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true">{{ $activeCat->title ?? '' }}</button>
    </a>
@endforeach

                     

                      <!-- <button class="nav-link active" id="progTab25" data-bs-toggle="tab" data-bs-target="#progTab25-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true">ADHD</button>
                      <button class="nav-link" id="progTab2" data-bs-toggle="tab" data-bs-target="#progTab2-content" type="button" role="tab" aria-controls="nav-gdd" aria-selected="false">Accupressure</button>
                      <button class="nav-link" id="progTab3" data-bs-toggle="tab" data-bs-target="#progTab3-content" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Allergies</button>
                      <button class="nav-link" id="progTab4" data-bs-toggle="tab" data-bs-target="#progTab4-content" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Alternate Therapy</button>
                      <button class="nav-link" id="progTab5" data-bs-toggle="tab" data-bs-target="#progTab5-content" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Autism</button>
                      <button class="nav-link" id="progTab6" data-bs-toggle="tab" data-bs-target="#progTab6-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true">Bone Elderly Lung</button>
                      <button class="nav-link" id="progTab7" data-bs-toggle="tab" data-bs-target="#progTab7-content" type="button" role="tab" aria-controls="nav-gdd" aria-selected="false">Community Wellness</button>
                      <button class="nav-link" id="progTab8" data-bs-toggle="tab" data-bs-target="#progTab8-content" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Diabetes</button>
                      <button class="nav-link" id="progTab9" data-bs-toggle="tab" data-bs-target="#progTab9-content" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Diets</button>
                      <button class="nav-link" id="progTab10" data-bs-toggle="tab" data-bs-target="#progTab10-content" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Digestion</button>
                      <button class="nav-link" id="progTab11" data-bs-toggle="tab" data-bs-target="#progTab11-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true">Gut Health</button>
                      <button class="nav-link" id="progTab12" data-bs-toggle="tab" data-bs-target="#progTab12-content" type="button" role="tab" aria-controls="nav-gdd" aria-selected="false">Healthy Life</button>
                      <button class="nav-link" id="progTab13" data-bs-toggle="tab" data-bs-target="#progTab13-content" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Heart Health</button>
                      <button class="nav-link" id="progTab14" data-bs-toggle="tab" data-bs-target="#progTab14-content" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Hormonal Issues</button>
                      <button class="nav-link" id="progTab15" data-bs-toggle="tab" data-bs-target="#progTab15-content" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Infertility</button>
                      <button class="nav-link" id="progTab16" data-bs-toggle="tab" data-bs-target="#progTab16-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true">Kid Therapeutic</button>
                      <button class="nav-link" id="progTab17" data-bs-toggle="tab" data-bs-target="#progTab17-content" type="button" role="tab" aria-controls="nav-gdd" aria-selected="false">Mental Health</button>
                      <button class="nav-link" id="progTab18" data-bs-toggle="tab" data-bs-target="#progTab18-content" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Nutrition</button>
                      <button class="nav-link" id="progTab19" data-bs-toggle="tab" data-bs-target="#progTab19-content" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Self Help</button>
                      <button class="nav-link" id="progTab20" data-bs-toggle="tab" data-bs-target="#progTab20-content" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Thyroid</button>
                      <button class="nav-link" id="progTab21" data-bs-toggle="tab" data-bs-target="#progTab21-content" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Weight Loss</button>
                      <button class="nav-link" id="progTab22" data-bs-toggle="tab" data-bs-target="#progTab22-content" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Women Health</button>
                      <button class="nav-link" id="progTab23" data-bs-toggle="tab" data-bs-target="#progTab23-content" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Yoga</button> -->

                      
                    </div>
                  </nav>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="tab-content mt-5" id="nav-tabContent">
                  <div class="tab-pane fade active show" id="progTab1-content" role="tabpanel" aria-labelledby="progTab1">
                   @forelse($wibiner as $key => $value)
                    <div class="popular-program-list">
                      <div class="prog-list row"> 
                        <div class="prog-img col-md-4">
                        <a href="{{ route('user.workshop', ['id' => $value->id]) }}"> 
                       <img src="{{ url(config('app.webinar_image') . '/' . ($value->webinar_image ?? '')) }}">

                        </a>
                        </div>
                        <div class="prog-img col-md-8">
                          <div class="prog-right-con">
                              <div class="webinar_event_tag">{{isset($value->webinar_event_type)?$value->webinar_event_type:''}}</div> 
                            <div class="prog-meta"> 
                             
                              <div class="prog-cat-list">
                                <ul>
                                @php
                                          $categoryIds = explode(',', $value->category_id);
                                          $categories = \App\Models\Category::whereIn('id', $categoryIds)->pluck('title')->toArray();
                                          $categoryTitles = implode(' | ', $categories);
                                          @endphp
                                          <p class="fw-semibold">{{ $categoryTitles }}</p>
                                
                                </ul>

                              </div>
                            </div>
                            <div class="prog-title">
                          <a style="color:#000000;font-weight:bold;" href="{{ route('user.workshop', ['id' => $value->id]) }}">
                              {{$value->webinar_title}}
                              </a>
                            </div>
                            <!-- <div class="prog-desc" style="overflow-wrap: break-word;" >
                              <p>
                                <?php
                                  $webinarDescription = strip_tags($value->description); 
                                  $words = explode(' ', $webinarDescription); 
                                  $first50Words = implode(' ', array_slice($words, 0, 20)); // Get the first 50 words
                               //   echo $first50Words;
                                  ?>
                              </p>
              
                            </div> -->
                            <div class="prog-info">
                              <div class="prog-expert">
                                <div class="prog-expert-name">
                                  By {{$value->expert ? $value->expert->name : 'No Register Expert '}}

                                </div>
                                <div class="prog-expert-dsg">
                                  {{$value->expert_designation}}
                                </div>
                                
                                <div class="expert_date" style="margin-left:0px;">
                                   
                                   <i class="fas fa-calendar"></i> {{ isset($value->webinar_start_date) ? \Carbon\Carbon::parse($value->webinar_start_date)->format('d-M-Y') : '' }} | {{$value->start_time}}

                                </div>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    @empty
                      <div class="pt-5 d-flex justify-content-center align-items-center flex-column">
                        <img src="https://www.yellowsquash.in/assets/images/empty.png" class="mx-auto" style="width: 30%;">
                        <div class="text-center text-black text-16 tracking-wide py-2">It’s empty in here</div>
                        <div class="text-center text-black text-opacity-40 text-18 tracking-wide">
                            <span>No Workshops found.</span>
                        </div>
                      </div>
                    @endforelse
                    <style>
                        .pagination .page-item .page-link {
                          color: #22c55e;
                          border-color: green;
                        }

                      .pagination .page-item.active .page-link {
                          background-color:green;
                          
                      }
                      .blog-pagination .page-item.active .page-link {
                        color: white; 
                        background-color: green; /* Active pagination number background color */
                        border-color: green; /* Active pagination number border color */
                    }
                  </style>


                   @if($wibiner instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="blog-pagination mt-5" style="margin-left: auto;">
                {{ $wibiner->onEachSide(1)->links() }}
                  </div>
                  @endif



                  </div>

                </div>
              </div>
             
               
               
               
               
               <div class="col-lg-4 ">
                   <div class="blog-widget">
                      <div class="sidebar-heading mb-4">
                        <h2 class="ys-seidebar-heading">Upcoming Workshops</h2>
                      </div>
                      <div class="recent-post">
                          
                        @foreach($Program as $key => $value ) 
                        <div class="recent-post-list">
                          <div class="r-post-img">
                                 <a href="{{ route('user.program', ['id' => $value->id]) }}"><img src="{{ asset('uploads/'.$value->image_url) }}"></a> 
                           </a>
                          </div>
                          <div class="r-post-con">
                            <div class="r-post-date">
                            <i class="fas fa-calendar"></i> {{ isset($value->program_start_date) ? \Carbon\Carbon::parse($value->program_start_date)->format('d-M-Y') : '' }} |     {{$value->program_start_date}}
                            </div>
                            <div class="r-post-title">
                              <a style="color:black; font-size:13px;" href="{{ route('user.program', ['id' => $value->id]) }}">{{$value->title}}</a>
                            </div>
                           
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
               </div>
               
               
               
               
               
              <!--<div class="col-lg-4 col-md-6">-->
              <!--  <div class="ys-sidebar">-->
              <!--    <div class="sidebar-heading text-center mt-4 mb-4">-->
              <!--      <h2 class="ys-seidebar-heading">Upcoming Programs</h2>-->
              <!--    </div>-->
              <!--    @foreach($Program as $key => $value)-->
                 
              <!--    <div class="upcoming-block">-->
              <!--      <div class="upcoming-list">-->
              <!--        <div class="upcomingList-img">-->
              <!--        <a href="{{ route('user.program', ['id' => $value->id]) }}">-->
              <!--        <img src="{{ asset('uploads/'.$value->image_url) }}"></a>-->
              <!--        </div>-->
              <!--        <div class="upcomingList-con">-->
              <!--          <div class="upcomingList-date">-->
              <!--          <i class="fas fa-calendar"></i> {{ isset($value->program_start_date) ? \Carbon\Carbon::parse($value->program_start_date)->format('d-M-Y') : '' }} |     {{$value->program_start_date}}-->
                         
              <!--          </div>-->
              <!--          <div class="upcomingList-title">-->
              <!--          <a href="{{ route('user.program', ['id' => $value->id]) }}" class="text-black">-->
              <!--           {{$value->title}}-->
              <!--          </a>-->
              <!--          </div>-->
              <!--          <div class="upcomingList-expert">-->
              <!--            By {{$value->expert ? $value->expert->name : 'No Register Expert '}}-->
              <!--          </div>-->
              <!--        </div>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--    @endforeach-->
                 <!--  <div class="upcoming-block">
              <!--      <div class="upcoming-list">-->
              <!--        <div class="upcomingList-img">-->
              <!--          <img src="public/images/upcomingW1.png">-->
              <!--        </div>-->
              <!--        <div class="upcomingList-con">-->
              <!--          <div class="upcomingList-date">-->
              <!--            <i class="fa-regular fa-calendar"></i> Feb 7, 2024-->
              <!--          </div>-->
              <!--          <div class="upcomingList-title">-->
              <!--            Functional Medicine Approach for Digestive Disorders-->
              <!--          </div>-->
              <!--          <div class="upcomingList-expert">-->
              <!--            By : Dr. Gaurang Ram-->
              <!--          </div>-->
              <!--        </div>-->
              <!--      </div>-->
              <!--      <div class="upcoming-list">-->
              <!--        <div class="upcomingList-img">-->
              <!--          <img src="public/images/upcomingW2.png">-->
              <!--        </div>-->
              <!--        <div class="upcomingList-con">-->
              <!--          <div class="upcomingList-date">-->
              <!--            <i class="fa-regular fa-calendar"></i> Feb 7, 2024-->
              <!--          </div>-->
              <!--          <div class="upcomingList-title">-->
              <!--            Functional Medicine Approach for Digestive Disorders-->
              <!--          </div>-->
              <!--          <div class="upcomingList-expert">-->
              <!--            By : Dr. Gaurang Ram-->
              <!--          </div>-->
              <!--        </div>-->
              <!--      </div>-->
              <!--      <div class="upcoming-list">-->
              <!--        <div class="upcomingList-img">-->
              <!--          <img src="public/images/upcomingW3.png">-->
              <!--        </div>-->
              <!--        <div class="upcomingList-con">-->
              <!--          <div class="upcomingList-date">-->
              <!--            <i class="fa-regular fa-calendar"></i> Feb 7, 2024-->
              <!--          </div>-->
              <!--          <div class="upcomingList-title">-->
              <!--            Functional Medicine Approach for Digestive Disorders-->
              <!--          </div>-->
              <!--          <div class="upcomingList-expert">-->
              <!--            By : Dr. Gaurang Ram-->
              <!--          </div>-->
              <!--        </div>-->
              <!--      </div>-->
              <!--    </div> -->
              <!--  </div>-->
              <!--</div>-->
            </div>
          </div>
        </div>  
        <!----popular program end--->

        <!------Call Back-------->
        @include('layouts.requestcallbackform')  <!-- This includes the navbar -->
 
        <!------Call Back End---->


     
 @endsection