@extends('frontend.master')
@section('title', 'Home')
@section('content')
        


<!------ Program Explore----------->
         
        <!------ Program Explore----------->

        <!--- Popular program-->
        <div class="program-popular page-section" id="mainstart">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2 class="ys-headting">Popular Program</h2>  
                <div class="popular-programs-tabs ys-tabs">
                  <nav class="tabbable">
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">

                    <a href="{{ route('user.programs') }}" class="text-black">
                            <button class="nav-link @if(empty(request()->has('cat')))active @endif" id="progTab1" data-bs-toggle="tab" data-bs-target="#progTab1-content" type="button" role="tab" aria-controls="nav-all" aria-selected="true">All</button>
                        </a>

                        @php ($counter=0)@endphp
                       
                        @foreach($activeCategories as $activeCat)
                            <!-- Category buttons -->
                            <a href="{{ route('user.programs', ['cat' => $activeCat->id]) }}#mainstart" class="text-black">
                                <button class="nav-link @if(request()->has('cat') && request()->input('cat') == $activeCat->id) active @endif" id="progTab{{$counter++}}" data-bs-toggle="tab" data-bs-target="#progTab25-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true">{{ $activeCat->title ?? '' }}</button>
                            </a>
                        @endforeach
                       
                      
                    </div>
                  </nav>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="tab-content mt-5" id="nav-tabContent">
                  <div class="tab-pane fade active show" id="progTab1-content" role="tabpanel" aria-labelledby="progTab1">
                      @forelse($programs as $key => $value)
                          <div class="popular-program-list">
                            <div class="prog-list row">
                                <div class="prog-img col-md-4">
                                    
                                  <a href="{{ route('user.program', ['id' => $value->id]) }}">
                                        <img src="{{ asset('uploads/'.$value->image_url) }}">
                                    
                                        </a>
                                </div>
                                <div class="prog-img col-md-8">
                                    <div class="prog-right-con">
                                      <div class="prog-meta">
                                        <div class="prog-cat-list">
                                          <ul>
                                          @php
                                          $categoryIds = explode(',', $value->category_id);
                                          $categories = \App\Models\Category::whereIn('id', $categoryIds)->pluck('title')->toArray();
                                          $categoryTitles = implode(' | ', $categories);
                                          @endphp
                                          <p class="fw-semibold">{{ $categoryTitles }}</p>
                                            <!-- <li>Learning Disorders</li> --> 
                                          </ul>

                                        </div>
                                      </div>
                                      <div class="prog-title">
                                          <a href="{{ route('user.program', ['id' => $value->id]) }}" class="text-dark fw-semibold  ">
                                            {{$value->title}}
                                          </a>
                                      </div>
                                      <div class="prog-info">
                                        <div class="prog-expert">
                                          <div class="prog-expert-name">
                                            By {{$value->expert ? $value->expert->name : 'No Register Expert '}}

                                          </div>
                                          <div class="prog-expert-dsg">
                                                @if($value->expert)
                                                  {{ $value->expert->expert_designation }}
                                                @endif
                                                </br></br>
                                                <i class="fas fa-calendar" style="color:#22c55e"></i>
                                                {{ date('d-F-Y', strtotime($value->program_start_date)) }} 
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
                            <span>No Programs found.</span>
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


                   @if($programs instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="blog-pagination mt-5" style="margin-left: auto;">
                {{ $programs->onEachSide(1)->links() }}
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
                 
            </div>
          </div>
        </div>  
        <!----popular program end--->

        <!------Call Back-------->
        @include('layouts.requestcallbackform')  <!-- This includes the navbar -->

        <!------Call Back End---->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    @if (Session::has('success'))

<script>
    $(document).ready(function() {

    toastr.{{ Session::get('flash_notification.level') }}
    ('{{ Session::get('success') }}');

    });
</script>

@endif
  </script>
     
 @endsection