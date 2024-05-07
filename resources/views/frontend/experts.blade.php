@extends('frontend.master')
@section('title', 'Home')
@section('content')
        
<!----Expert banner----------->
        <div class="expert-banner page-section bg-grey pb-4">
          <div class="container">
            <div class="section-heding mb-3 text-center">
              <h2 class="ys-headting">Meet The Expert</h2>
            </div>
            <div class="expert-banner-desc text-center">
              <p>
            Connect with the best experts and start your healing journey today!
              </p>
            </div>
          </div>
        </div>
        <!---------Expert banner end---------->
        <!---------Expert tabs---------------->
        <div class="program-popular page-section  bg-grey pt-0">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="popular-programs-tabs ys-tabs">
                  <nav class="tabbable">
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link @if(empty(request()->has('cat')))active @endif" id="progTab1" data-bs-toggle="tab" data-bs-target="#progTab1-content" type="button" role="tab" aria-controls="nav-all" aria-selected="true">All</button>
                    @php ($counter=0) @endphp
                      @foreach($category as $key => $value)
                      <a href="{{ route('user.experts', ['cat' => $value->id]) }}#mainstart" class="text-black">
                      <button class="nav-link @if(request()->has('cat') && request()->input('cat') == $value->id) active @endif" id="progTab{{$counter++}}" data-bs-toggle="tab" data-bs-target="#progTab25-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true"  >{{ $value->title ?? '' }}</button></a>
                      
                        
                      @endforeach
                    
                      

                      
                    </div>
                  </nav>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="tab-content mt-5" id="nav-tabContent">
                  <div class="tab-pane fade active show" id="progTab1-content" role="tabpanel" aria-labelledby="progTab1">

                  @forelse($expert as $key => $value)
               
                  <div class="expert-list-block">
                      <div class="expert-list-img">
                    <a href="{{ route('user.expert', ['id' => $value->id]) }}">         
                      <img src="{{ url(config('app.expert_profile') . '/' . ($value->expert_profile ?? '')) }}">
                      </a>
                       
                      </div>
                      <div class="expert-list-con">
                        <div class="expert-list-name">
                        <a href="{{ route('user.expert', ['id' => $value->id]) }}">    
                        {{$value->name}}
                        </a>
                        </div>
                        <div class="expert-list-designation">
                        {{$value->expert_designation??NULL}}
                       
                          
                        </div>
                        <!---<div class="expert-list-desc">
                         <?php
                         /*$description = $value->expert_description;
                         $maxLength = 150;
                         
                         if (strlen($description) > $maxLength) {
                             // Find the position of the last space within the maximum length
                             $lastSpace = strrpos(substr($description, 0, $maxLength), ' ');
                         
                             // Truncate the description at the last space and add ellipsis
                             $truncatedDescription = substr($description, 0, $lastSpace) . '...';
                         } else {
                             $truncatedDescription = $description;
                         }*/
                         ?>

                        
                        </div>--->
                        <div class="expert-exp">
                              <div class="exp-yr">
                                <strong>Experience:</strong>
                                {{$value->expert_experience ?? '' }}
                              </div>
                            
                            </div>
                            <div class="expert-btm"> 
                              
                              <div class="qual">
                                <strong>Qualification : </strong> {{$value->expert_qualification  ?? '' }}
                              </div>

                            </div>
                            <div class="expert-btm"> 
                              
                              <div class="qual">
                                <strong>Language : </strong> {{$value->expert_language  ?? '' }}
                              </div>

                            </div>
                      </div>
                    </div>
                    @empty
                      <div class="pt-5 d-flex justify-content-center align-items-center flex-column">
                        <img src="https://www.yellowsquash.in/assets/images/empty.png" class="mx-auto" style="width: 30%;">
                        <div class="text-center text-black text-16 tracking-wide py-2">It’s empty in here</div>
                        <div class="text-center text-black text-opacity-40 text-18 tracking-wide">
                            <span>No Experts found.</span>
                        </div>
                      </div>
                    @endforelse
                    <!-- <div class="expert-list-block">
                      <div class="expert-list-img">
                        <img src="public/images/expert-l1.png">
                      </div>
                      <div class="expert-list-con">
                        <div class="expert-list-name">
                          Dr. Ashwani Garg
                        </div>
                        <div class="expert-list-designation">
                          Functional Medicine Expert , MBBS
                        </div>
                        <div class="expert-list-desc">
                          Dr Ashwani’s dream to make a difference in healthcare made him move from clinical practice to he...
                        </div>
                      </div>
                    </div> -->
                    <!-- <div class="expert-list-block">
                      <div class="expert-list-img">
                        <img src="public/images/expert-l2.png">
                      </div>
                      <div class="expert-list-con">
                        <div class="expert-list-name">
                          Dr. Gaurang Ramesh
                        </div>
                        <div class="expert-list-designation">
                          Surgical Gastroenterology | Functional Medicine
                        </div>
                        <div class="expert-list-desc">
                          He is an Integrative Gastroenterologist and a Functional Medicine practitioner. He h...
                        </div>
                      </div>
                    </div> -->
                    <!-- <div class="expert-list-block">
                      <div class="expert-list-img">
                        <img src="public/images/expert-l3.png">
                      </div>
                      <div class="expert-list-con">
                        <div class="expert-list-name">
                          Satyajit Dash
                        </div>
                        <div class="expert-list-designation">
                          LCHF Coach | Sports Nutrition
                        </div>
                        <div class="expert-list-desc">
                          Satyajit is a certified Sports Nutritionist from ISSA, USA, with a specialisation in Low Carb Health...
                        </div>
                      </div>
                    </div> -->
                    <!-- <div class="expert-list-block">
                      <div class="expert-list-img">
                        <img src="public/images/expert-l4.png">
                      </div>
                      <div class="expert-list-con">
                        <div class="expert-list-name">
                          Dr. Rashmi Chandwani
                        </div>
                        <div class="expert-list-designation">
                          BHMS
                        </div>
                        <div class="expert-list-desc">
                          Dr. Rashmi Chandwani is a highly experienced Chronic Disease Specialist with over 25 year...
                        </div>
                      </div>
                    </div> -->
                    <!-- <div class="expert-list-block">
                      <div class="expert-list-img">
                        <img src="public/images/expert-l5.png">
                      </div>
                      <div class="expert-list-con">
                        <div class="expert-list-name">
                          Dr. Praveen Dhole
                        </div>
                        <div class="expert-list-designation">
                          DHMS Certified Homeopath
                        </div>
                        <div class="expert-list-desc">
                          Dr. Pravin Dhole is a professional homoeopath with a special interest in helping children who are fa...
                        </div>
                      </div>
                    </div> -->
                    <!-- <div class="expert-list-block">
                      <div class="expert-list-img">
                        <img src="public/images/expert-l6.png">
                      </div>
                      <div class="expert-list-con">
                        <div class="expert-list-name">
                          Meenakshi Rana
                        </div>
                        <div class="expert-list-designation">
                          Low Carb Nutritionist | Holistic Fertility Coach
                        </div>
                        <div class="expert-list-desc">
                          Meenakshi specializes in crafting personalized strategies to make your body baby-ready blendi...
                        </div>
                      </div>
                    </div> -->
                  </div>
                  <div class="tab-pane fade" id="progTab2-content" role="tabpanel" aria-labelledby="progTab2">
                    <div class="expert-list-block">
                      <div class="expert-list-img">
                        <img src="public/images/expert-l1.png">
                      </div>
                      <div class="expert-list-con">
                        <div class="expert-list-name">
                          Dr. Ashwani Garg
                        </div>
                        <div class="expert-list-designation">
                          Functional Medicine Expert , MBBS
                        </div>
                        <div class="expert-list-desc">
                          Dr Ashwani’s dream to make a difference in healthcare made him move from clinical practice to he...
                        </div>
                      </div>
                    </div>
                    <div class="expert-list-block">
                      <div class="expert-list-img">
                        <img src="public/images/expert-l2.png">
                      </div>
                      <div class="expert-list-con">
                        <div class="expert-list-name">
                          Dr. Gaurang Ramesh
                        </div>
                        <div class="expert-list-designation">
                          Surgical Gastroenterology | Functional Medicine
                        </div>
                        <div class="expert-list-desc">
                          He is an Integrative Gastroenterologist and a Functional Medicine practitioner. He h...
                        </div>
                      </div>
                    </div>
                    
                    <div class="expert-list-block">
                      <div class="expert-list-img">
                        <img src="public/images/expert-l6.png">
                      </div>
                      <div class="expert-list-con">
                        <div class="expert-list-name">
                          Meenakshi Rana
                        </div>
                        <div class="expert-list-designation">
                          Low Carb Nutritionist | Holistic Fertility Coach
                        </div>
                        <div class="expert-list-desc">
                          Meenakshi specializes in crafting personalized strategies to make your body baby-ready blendi...
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
             
    
        <!----------Expert tabs end---------->
        
        
                   <div class="col-lg-4 ">
                   <div class="blog-widget">
                      <div class="sidebar-heading mb-4">
                        <h2 class="ys-seidebar-heading">Upcoming Workshops</h2>
                      </div>
                      <div class="recent-post">
                          
                        @foreach($wibiner as $key => $value)   
                        <div class="recent-post-list">
                          <div class="r-post-img">
                                 <a href="{{ route('user.workshop', ['id' => $value->id]) }}">
                                <img src="{{ url(config('app.webinar_image') . '/' . ($value->webinar_image ?? '')) }}"> 
                           </a>
                          </div>
                          <div class="r-post-con">
                            <div class="r-post-date">
                            <i class="fas fa-calendar"></i> {{ isset($value->webinar_start_date) ? \Carbon\Carbon::parse($value->webinar_start_date)->format('d-M-Y') : '' }} | {{$value->start_time}}
                            </div>
                            <div class="r-post-title">
                              <a style="color:black; font-size:13px;" href="{{ route('user.workshop', ['id' => $value->id]) }}"> {{$value->webinar_title}}</a>
                            </div>
                           
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
               </div>
        
        <!-----Data Speak Start------>
<div class="data-speak-section">
<div class="container">
<div class="data-speak-inner">
                 @include('layouts.dataspeak')  <!-- This includes from resources -> views ->  layouts -->
 
              
</div>
</div>
</div>
<!-----Data Speak End------>
        <!----Newsletter Start-------------->
        <div class="newsletter-section">
          <div class="container">
            
@include('layouts.subscribenewsletter')  <!-- This includes the Subscribe Our Newsletter -->

          </div>
        </div>

      <!----Newsletter End-------------->
 
 
 @endsection