@extends('expertwebsite.master')
@section('title', 'Home')
@section('content')
<style>
input.razorpay-payment-button.yst-btn.plan-subs {
    display: none;
}
  </style>
        
              @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
        <!----------Detail top ------------->
        <div class="single-detail-section page-section">
          <div class="container">
            <div class="row pb-5">
              <div class="col-md-9">
              
                <div class="single-left">
                  <div class="section-heding mb-2 mt-3">
                    <h2 class="ys-headting">{{$wibiner->webinar_title}}</h2>
                  </div>
                  <div class="by-expert mb-4">
                    <!-- By Dr. Gaurang Ramesh -->
                    {{$wibiner->expert->name  ?? '' }}
                  </div>
                  <div class="ys-left-single row">
                    <div class="col-md-5">
                      <div class="ys-left-single-img workshop">
                      <img src="{{ url(config('app.webinar_image') . '/' . ($wibiner->webinar_image ?? '')) }}">

                        <!-- <div class="img-overlay">
                          

                        </div> -->
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
                                <video width="560" height="315" controls>
                                  <source src="{{ url(config('app.webinar_image') . '/' . ($wibiner->webinar_video ?? '')) }}" type="video/mp4">
                                  
                                </video>  
                                <!---<iframe width="560" height="315" src="{{ url(config('app.webinar_image') . '/' . ($wibiner->webinar_video ?? '')) }}" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--->
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="ys-left-single-con">
                        <div class="workshop-tag">
                          <ul>
                            {{$wibiner->category->title  ?? '' }}
                          </ul>
                        </div>
                        <div class="workshop-date">
                          <i class="fa-regular fa-calendar"></i> {{ isset($wibiner->webinar_start_date) ? \Carbon\Carbon::parse($wibiner->webinar_start_date)->format('d-M-Y') : '' }} | {{$wibiner->start_time  ?? '' }}-{{$wibiner->end_time  ?? '' }} (IST)
                        </div>
                        <div class="web-start mb-4 mt-3">
                          <h5>Webinar Starts in</h5>
                        </div>
                        <!-- <div class="web-calender">
                          <ul>
                            <li><span id="days"><span>Days</span>Days</li>
                            <li><span id="hours"><span>Hours</span>Hours</li>
                            <li><span id="minutes"><span>Minutes</span>Minutes</li>
                            <li><span id="seconds"><span>Seconds</span>Seconds</li>
                          </ul>
                        </div> -->
                      <div class="web-calender">
                        <ul>
                        <li><p id="days">0</p><span>Days</span></li>
                        <li><p id="hours">0</p><span>Hours</span></li>
                        <li><p id="minutes">0</p><span>Minutes</span></li>
                        <li><p id="seconds">0</p><span>Seconds</span></li>
                        </ul>
                      </div>



                      </div>
                    </div>
                  </div>

                </div>
               
              </div>
              <div class="col-md-3">
                <div class="single-right">
                  <div class="ys-sidebar-single">
                 
                    <div class="sidebar-heading text-center mt-4 mb-4">
                      <h2 class="ys-seidebar-heading">HURRY! Seats filling FAST!</h2>
                    </div>
                    <div class="single-side-con text-center">
                      <!-- <button class="yst-btn plan-subs" data-toggle="modal" data-target="#registerModal">Register Now</button> -->
                      <!-- <button class="yst-btn plan-subs">Register Now</button> -->
                      
                      
                      <div class="web-price">
                      @if($wibinerExists)
                        @else
                          @if($wibiner->webinar_price == 0)
                              <span>For Free</span>
                          @else
                              <span>For Rs. : {{$wibiner->webinar_price}}</span>
                          @endif
                        @endif

                        </div>
                        @if (auth()->check())
                            
                                @if ($wibiner->webinar_price != 0)
                                <form action="{{ route('razorpay.paid.workshop') }}" method="POST" id="razorpayForm">
                                  @csrf
                                  <input type="hidden" name="webinar_price" value="{{$wibiner->webinar_price}}">
                                  <input type="hidden" name="wibiner_id" value="{{$wibiner->id}}">
                                  @if($wibinerExists)
                                  <button type="button" class="yst-btn plan-subs ">Subscribed </button>
                                  @else
                                  <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY_ID') }}"
                                      data-amount="{{$wibiner->webinar_price * 100}}"
                                      data-buttontext="Subscribe now"
                                      data-name="Yellowsquash.in" data-description="Program Payment"
                                      data-image="https://projectstaging.live/public/images/logo.png"
                                      data-prefill.name="{{auth()->user()->name ?? ''}}"
                                      data-prefill.email="{{auth()->user()->email ?? auth()->user()->phone ?? ''}}"
                                      data-theme.color="#ff7529" class="yst-btn plan-subs">
                                  </script>
                                  @endif
                               </form>

                                @else
                                  <form action="{{route('razorpay.free.workshop')}} " method="POST" id="razorpayForm">
                                    @csrf
                                    <input type="hidden" name="type" value="free">
                                    <input type="hidden" name="wibiner_id" value="{{$wibiner->id}}">

                                    @if($wibinerExists)
                                      <button type="button" class=" plan-subs " style="background-color: green">Subscribed</button>
                                     
                                    @else
                                    <button type="submit" class="yst-btn plan-subs" id="bookNowButton">subscribe now</button>
                                    @endif
                                  </form>  
                                @endif
                            
                        @else
                            <button type="button" class="yst-btn plan-subs" id="registerButton">subscribe now</button>
                        @endif
                        <!-- Free Modal -->
                        <div class="modal fade" id="freeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content bg-white">
                                    <div class="modal-header text-center">
                                        <span class="modal-title" id="exampleModalLabel">Register For the Webinar <b>FOR FREE</b></span>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form for free webinar registration -->
                                        <form action="{{route('razorpay.free.workshop')}}" method="POST">
                                        
                                          @csrf
                                        <input type="hidden" name="wibiner_id" value="{{$wibiner->id}}">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="name" name= "name" placeholder="Full Name">
                                            </div>
                                            <div class="mb-3">
                                                <input type="email" class="form-control" id="" name="email" placeholder="Email id">
                                            </div>
                                            <div class="mb-3">
                                                <input type="number" class="form-control" id="recipient-name" name="phone" placeholder="Phone number">
                                                @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                          <button type="submit" class="yst-btn plan-subs w-25" value="0">Submit now</button>
                                          
                                          </div>
                                        </form>
                                </div>
                            </div>
                        </div>

                        <!-- Paid Modal -->
                        <div class="modal fade" id="paidModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content bg-white">
                                    <div class="modal-header text-center">
                                        <span class="modal-title" id="exampleModalLabel">Register For <b>Paid</b></span>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form for paid webinar registration -->
                                        <form action="{{ route('razorpay.paid.workshop') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="wibiner_id" value="{{$wibiner->id}}">
                                            <input type="hidden" name="webinar_price" value="{{$wibiner->webinar_price}}"> 
                                            
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="name" id="recipient-name" placeholder="Full Name" required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="email" id="recipient-name" placeholder="Email id"  required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="recipient-name" placeholder="Phone number" name="phone" required>
                                            </div>
                                      </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success w-25">Pay Rs. {{$wibiner->webinar_price}}</button>
                                        </div>
                                    
                                    
                                    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY_ID') }}"
                                        data-amount=""
                                        data-name="Yellowsquash.in" data-description="Program Payment"
                                        data-image="https://projectstaging.live/public/images/logo.png"
                                        data-prefill.name="{{auth()->user()->name ?? ''}}"
                                        data-prefill.email="{{auth()->user()->email ?? auth()->user()->phone ?? ''}}"
                                        >
                                    </script>
                                    
                                </div>
                                </form>
                            </div>
                        </div>


                      <p class="text-center mb-5">
                        Reserve your seat before {{$wibiner->webinar_start_date  ?? '' }} to confirm your slot!
                      </p>
                      <div class="web-duration">
                        <i class="fa-solid fa-clock"></i> <strong>Duration :</strong> {{$wibiner->duration  ?? '' }}
                      </div>
                      <div class="web-duration text-nowrap">
                        <i class="fa-solid fa-calendar-days"></i> <strong>Starting on :</strong> {{ isset($wibiner->webinar_start_date) ? \Carbon\Carbon::parse($wibiner->webinar_start_date)->format('d-M-Y') : '' }}
                    </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row b-bottom-y">
              <div class="col-md-9">
                <div class="description-tab nav nav-tabs pt-4" id="nav-tab" role="tablist">
                  <button class="nav-link active" id="desctab1" data-bs-toggle="tab" data-bs-target="#desctab1-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true"><i class="fa-solid fa-book-open-reader"></i> Overview</button>
                  <button class="nav-link" id="desctab2" data-bs-toggle="tab" data-bs-target="#desctab2-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true"><i class="fa-solid fa-user-tie"></i> Expert</button>
                  <button class="nav-link" id="desctab3" data-bs-toggle="tab" data-bs-target="#desctab3-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true"><i class="fa-solid fa-book-bookmark"></i> Programs</button>
                  <!-- <button class="nav-link" id="desctab4" data-bs-toggle="tab" data-bs-target="#desctab4-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true"><i class="fa-solid fa-file-pen"></i> Upcoming Webinars</button> -->
                  <!-- <button class="nav-link" id="desctab5" data-bs-toggle="tab" data-bs-target="#desctab5-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true"><i class="fa-solid fa-clipboard-question"></i> Blogs</button> -->
                  
                </div>
                <div class="tab-content p-3 mt-5" id="description-section">
                  <div class="tab-pane fade active show" id="desctab1-content" role="tabpanel" aria-labelledby="desctab1">
                    
                    <div class="overview-con">
                      <div class="row">
                        <div class="col-md-12">
                        <h4>The {{$wibiner->duration ?? ''}} MIN interactive session will cover :</h4>
                          @forelse($webinarSession as $session)
                              <p><strong>{{$session->heading}}:</strong><br>{{$session->definition}}</p>
                              @empty
                              <p>No data found..
                          @endforelse

                         
                          <h4>What you’ll learn in this exclusive session:</h4>
                          @forelse($webinarLearn as $learn)
                            <p>{{$loop->iteration}}. {{$learn->title}}</p>
                        @empty
                            <p>No data found..</p>
                        @endforelse
                           
                          <h4>Who is it for?</h4>
                          @forelse($webinarFor as $wibinerFor)
                             <p>{{$loop->iteration}}. {{$wibinerFor->who_title}}
                              @empty
                              <p>No data found..
                        @endforelse 

                          </p>
                          <div class="show-less mt-5">
                            Show Less <i class="fa-solid fa-angle-down"></i>
                          </div>
                        </div>
                        
                      </div>
                      
                    </div>
                  </div>
                  

                  <div class="tab-pane fade" id="desctab2-content" role="tabpanel" aria-labelledby="desctab2">
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
                            
                            <img src="{{ url(config('app.expert_profile') . '/' . ($wibiner->expert->expert_profile ?? '')) }}"> 
                            </div>
                            
                          </div>
                          <div class="col-md-8">
                            <div class="dexpert-name">
                            
                            {{$wibiner->expert->name  ?? '' }} 
                            </div>
                            <div class="dexpert-designation">
                            {{$wibiner->expert_designation  ?? '' }}
                            </div>
                            <div class="about-me">
                              <div class="aboutme-title">
                                About Me
                              </div>
                              
                            </div>
                            <div class="about-info">
                            {{$wibiner->description  ?? '' }}
                            </div>
                            <div class="expert-exp">
                              <div class="exp-yr">
                                <strong>Experience:</strong>
                                {{$wibiner->expert->expert_experience ?? '' }}
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
                              <div class="qual">
                                <strong>Qualification : </strong> {{$wibiner->expert->expert_qualification  ?? '' }}
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="desctab3-content" role="tabpanel" aria-labelledby="desctab3">
                    <div class="overview-con">
                      <div class="description-heading mb-5">
                        <h2>{{$wibiner->expert->name  ?? '' }}</h2>
                      </div>
                      <div class="expert-program col-md-4">
                        <div class="upcoming-list text-center">
                          <div class="upcomingList-img">
                            <img src="{{ url(config('app.webinar_image') . '/' . ($wibiner->webinar_image ?? '')) }}">
                          </div>
                          <div class="upcomingList-con">
                            
                            <div class="upcomingList-title">
                            {{$wibiner->webinar_title}}
                            </div>
                            <div class="prog-rating">
                              <ul class="star-rating">
                                  <li><i class="fa-solid fa-star"></i></li>
                                  <li><i class="fa-solid fa-star"></i></li>
                                  <li><i class="fa-solid fa-star"></i></li>
                                  <li><i class="fa-solid fa-star"></i></li>
                                  <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                  <li>4.9</li>
                              </ul>          
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <div class="tab-pane fade" id="desctab4-content" role="tabpanel" aria-labelledby="desctab4">
                    <div class="overview-con">
                      <div class="description-heading mb-5">
                        <h2>Workshop By Dr. Gaurang Ramesh</h2>
                      </div>
                      <div class="expert-program col-md-4">
                        <div class="upcoming-list text-center">
                          <div class="upcomingList-img">
                            <img src="images/upcomingW1.png">
                          </div>
                          <div class="upcomingList-con">
                            
                            <div class="upcomingList-title">
                              Functional Medicine Approach for Digestive Disorders
                            </div>
                            <div class="prog-rating">
                              <ul class="star-rating">
                                  <li><i class="fa-solid fa-star"></i></li>
                                  <li><i class="fa-solid fa-star"></i></li>
                                  <li><i class="fa-solid fa-star"></i></li>
                                  <li><i class="fa-solid fa-star"></i></li>
                                  <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                  <li>4.9</li>
                              </ul>          
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="tab-pane fade" id="desctab5-content" role="tabpanel" aria-labelledby="desctab5">
                    <div class="overview-con">
                      <div class="description-heading mb-4">
                        <h2>News & Blogs</h2>
                      </div>
                      

                      <div class="news-blog">
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="expert-blog">
                              <div class="exp-blog-img">
                                <img src="images/exp-blog.png">
                              </div>
                              <div class="exp-blog-meta">
                              {{$wibiner->expert->name  ?? '' }} |  April 15 2023
                              </div>
                              <div class="exp-blog-title">
                                Anxiety and Depression and The Role....
                              </div>
                              <div class="exp-blog-btn mt-4">

                                  <a href="#" class="yst-btn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-lg-4">
                            <div class="expert-blog">
                              <div class="exp-blog-img">
                                <img src="images/exp-blog.png">
                              </div>
                              <div class="exp-blog-meta">
                                By Dr. Gaurang Ramesh  |  April 15 2023
                              </div>
                              <div class="exp-blog-title">
                                Anxiety and Depression and The Role....
                              </div>
                              <div class="exp-blog-btn mt-4">

                                  <a href="#" class="yst-btn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                              </div>
                            </div>
                          </div> 
                          
                         <div class="col-lg-4"> 
                            <div class="expert-blog">
                              <div class="exp-blog-img">
                                <img src="images/exp-blog.png">
                              </div>
                              <div class="exp-blog-meta">
                                By Dr. Gaurang Ramesh  |  April 15 2023
                              </div>
                              <div class="exp-blog-title">
                                Anxiety and Depression and The Role....
                              </div>
                              <div class="exp-blog-btn mt-4">

                                  <a href="#" class="yst-btn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                              </div>
                            </div>
                          </div>
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
@include('layouts.subscribenewsletter')  <!-- This includes the Subscribe Our Newsletter -->
 
          </div>
</div>
 
      <!----Newsletter End-------------->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function updateCountdown() {
    const deadlineDate = "{{$wibiner->webinar_start_date}}";
    const endTime = "{{$wibiner->start_time ?? '00:00:00'}}"; // Assuming default time if not provided

    // Convert time to 24-hour format
    const timeRegex = /(\d{1,2})\.(\d{2})\s*(AM|PM)/i;
    const matches = endTime.match(timeRegex);

    if (!matches) {
        console.error("Invalid time format:", endTime);
        return;
    }

    let hours = parseInt(matches[1], 10);
    const minutes = parseInt(matches[2], 10);
    const ampm = matches[3] ? matches[3].toUpperCase() : '';

    // Adjust hours for AM/PM
    if (ampm === 'PM' && hours < 12) {
        hours += 12;
    }
    if (ampm === 'AM' && hours === 12) {
        hours = 0;
    }

    const endTime24Hour = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:00`;

    // Combine date and time strings
    const deadlineString = `${deadlineDate} ${endTime24Hour}`;

    console.log("Deadline String:", deadlineString); // Debug statement

    // Attempt to construct deadline as a Date object
    const deadline = new Date(deadlineString);

    console.log("Deadline Date Object:", deadline); // Debug statement

    // Check if the constructed date is valid
    if (isNaN(deadline.getTime())) {
        console.error("Invalid date:", deadlineString);
        return;
    }

    // Get current date and time
    const now = new Date();

    // Check if the deadline is in the past
    if (deadline < now) {
        document.getElementById("days").innerText = '0';
        document.getElementById("hours").innerText = '0';
        document.getElementById("minutes").innerText = '0';
        document.getElementById("seconds").innerText = '0';
        return;
    }

    // Get time difference
    let timeDifference = deadline.getTime() - now.getTime();

    // Calculate countdown
    const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
    const hoursRemaining = Math.floor(timeDifference / (1000 * 60 * 60)) % 24;
    const minutesRemaining = Math.floor((timeDifference / 1000 / 60) % 60);
    const secondsRemaining = Math.floor((timeDifference / 1000) % 60);

    // Update countdown display
    document.getElementById("days").innerText = days;
    document.getElementById("hours").innerText = hoursRemaining;
    document.getElementById("minutes").innerText = minutesRemaining;
    document.getElementById("seconds").innerText = secondsRemaining;
}

// Update countdown every second
setInterval(updateCountdown, 1000);

// Initial call to update countdown immediately
updateCountdown();
</script>


<script>
    $(document).ready(function() {
        $('#registerButton').on('click', function() {
            var webinarPrice = {{$wibiner->webinar_price}};
            if (webinarPrice == 0) {
                $('#freeModal').modal('show'); // Open modal for free webinar
            } else {
                $('#paidModal').modal('show'); // Open modal for paid webinar
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
       
        var razorpayButton = document.querySelector('.razorpay-payment-button');
        if (razorpayButton) {
      
            razorpayButton.classList.add('yst-btn','plan-subs');
            razorpayButton.style.border = "none";

        }
    });
</script>
 @endsection