@extends('frontend.master')
@section('title', 'Home')
@section('content')
        
<style>
  a.nav-link {
    color: black!important;
}
a.nav-link.active {
    color: black !important;
    background-color: #f9d121!important;
}
ul.nav.nav-pills {
    margin-bottom: 30px;
}
</style>
      <!-----Inner Banner-------->
        <div class="innerPage-banner">
          <div class="container">
            <div class="page-banner-inner">
              <div class="row">
                <div class="col-12">
                  <div class="page-heading">
                    <h2>Healthpedia</h2>
                  </div>
                  <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Healthpedia</li>
                      </ol>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--------Inner Banner End-->

        <!-------Contact Support---->
        <div class="blog-wrapper page-section">
          <div class="container">
            <div class="blog-listing-outer pt-4 pb-4">
              <div class="row">
                <div class="col-lg-8 col-md-6">
                  <div class="blog-listing-inner">
                    <?php
                        $current_route = \Request::route()->getName();
                        //echo $current_route;
                        ?>
                    
                    <div class="row">
                        <div class="col-sm-6">
                    <ul class="nav nav-pills" style="margin: 30px 0px;">
                      
                      <li class="nav-item">
                      <a class="nav-link {{ $current_route == 'user.healthpedia' ? 'active' : '' }}" style="color:black;" href="{{route('user.healthpedia')}}">Articles</a>
                      </li>
                      <li class="nav-item">
                      <a class="nav-link " aria-current="page" href="{{route('user.video')}}" style="color:black;">Videos</a>
                      </li>
                    
                    </ul>
                    </div>
                    <?php
                    $data = \App\Helper\Helper::getTotalVideoBlog(); 
                    //print_r($data);
                    ?>
                   
                <div class="col-sm-6">
                <div class="blog_top_count" >
                    <span>
                        <img src="{{ url('public/images/blog.jpg') }}" height="50" width="50">
                    </span>
                  <p>  {{$data['total_blog']}}</p>
                  <br> <!-- Add a line break here -->
                  <p>  Total Articles</p>
             
                    <span>
                        <img src="{{ url('public/images/video_icon.jpg') }}" height="50" width="50">
                    </span>
                  <p>  {{$data['total_video']}}</p>
                  <br> <!-- Add a line break here -->
                  <p>  Total Videos</p>
              </div>

                </div>
                </div>
              
                    <div class="section-heding">
                     
                      <h2 class="ys-headting mx-3">Latest Blogs</h2>
                    </div>
                    <div class="row">
                        
                    @forelse($articles as $article)    
                      <div class="col-lg-6">
                        <div class="blog-list">
                          <div class="blog-img">
                            <a href="{{ route('user.healthpediadetail', ['id' => $article->article_slug]) }}"  >
                           <img src="{{ url(config('app.article_image_url')).'/'.$article->banner_image ?? '' }}"> 
                           </a>
                           <span class="top_image_tag">@if($article->expert)
                              {{ $article->expert->name }}
                              @endif</span>
                          </div>
                          <div class="blog-con">
                           
                            <br>
                            <div class="blog-desc">
                              @php
                              $categoryIds = explode(',', $article->category_id);
                              $categories = \App\Models\Category::whereIn('id', $categoryIds)->pluck('title')->toArray();
                              $categoryTitles = implode(' | ', $categories);
                              @endphp
                              <p><b>{{ $categoryTitles }}</b></p> 
                          </div>
                          
                          <div class="blog-title">
                              <a href="{{ route('user.healthpediadetail', ['id' => $article->article_slug]) }}">{{ $article->article_title }}</a>
                            </div>

                            <div class="blog-desc">
                              {{ $article->summary }} 
                            </div>
                           <!--- <div class="blog-btn">
                              <a href="{{ route('user.healthpediadetail', ['id' => $article->article_slug]) }}" class="yst-btn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                            </div>--->
                          </div>

                        </div>
                      </div>
                      @empty
                      <div class="pt-5 d-flex justify-content-center align-items-center flex-column">
                        <img src="https://www.yellowsquash.in/assets/images/empty.png" class="mx-auto" style="width: 30%;">
                        <div class="text-center text-black text-16 tracking-wide py-2">It’s empty in here</div>
                        <div class="text-center text-black text-opacity-40 text-18 tracking-wide">
                            <span>No Blogs found.</span>
                        </div>
                      </div>


   
                      <!-- <div class="container d-flex justify-content-center align-items-center vh-100">
                      <div class="text-center display-6">
                          <p><b>No Blogs found.</b></p>
                      </div>
                  </div> -->

                      @endforelse
                      <!----<div class="col-lg-6">
                        <div class="blog-list">
                          <div class="blog-img">
                            <img src="public/images/blog2.jpg">
                          </div>
                          <div class="blog-con">
                            <div class="blog-meta">
                              <ul>
                                <li>By YS Content </li>
                                <li>|</li>
                                <li>Jan 18, 2024</li>
                              </ul>
                            </div>
                            <div class="blog-title">
                              <a href="#">The Impact of Chronic Inflammation on Overall Health and Well-Being</a>
                            </div>
                            <div class="blog-desc">
                              This article will introduce you to chronic inflammation, which is fueled by unhe
                            </div>
                            <div class="blog-btn">
                              <a href="#" class="yst-btn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="blog-list">
                          <div class="blog-img">
                            <img src="public/images/blog3.jpg">
                          </div>
                          <div class="blog-con">
                            <div class="blog-meta">
                              <ul>
                                <li>By Dr. Gaurang Ramesh</li>
                                <li>|</li>
                                <li>Jan 16, 2024</li>
                              </ul>
                            </div>
                            <div class="blog-title">
                              <a href="#">Proton Pump Inhibitors: Pros and Cons</a>
                            </div>
                            <div class="blog-desc">
                              Proton Pump Inhibitors might provide relief in digestive disorders, but they are
                            </div>
                            <div class="blog-btn">
                              <a href="#" class="yst-btn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="blog-list">
                          <div class="blog-img">
                            <img src="public/images/blog4.jpg">
                          </div>
                          <div class="blog-con">
                            <div class="blog-meta">
                              <ul>
                                <li>Dr. Praveen Dhole</li>
                                <li>|</li>
                                <li>Jan 18, 2024</li>
                              </ul>
                            </div>
                            <div class="blog-title">
                              <a href="#">Sensory Processing Issues in Children with Autism</a>
                            </div>
                            <div class="blog-desc">
                              In this article, we will read about sensory issues that occur in autistic childr
                            </div>
                            <div class="blog-btn">
                              <a href="#" class="yst-btn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="blog-list">
                          <div class="blog-img">
                            <img src="public/images/blog5.png">
                          </div>
                          <div class="blog-con">
                            <div class="blog-meta">
                              <ul>
                                <li>By YS Content</li>
                                <li>|</li>
                                <li>Jan 16, 2024</li>
                              </ul>
                            </div>
                            <div class="blog-title">
                              <a href="#">Pathophysiology of Depression</a>
                            </div>
                            <div class="blog-desc">
                              Depression is a complex mental condition that goes beyond temporary sadness. You
                            </div>
                            <div class="blog-btn">
                              <a href="#" class="yst-btn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="blog-list">
                          <div class="blog-img">
                            <img src="public/images/blog6.png">
                          </div>
                          <div class="blog-con">
                            <div class="blog-meta">
                              <ul>
                                <li>By Dr. Gaurang Ramesh</li>
                                <li>|</li>
                                <li>Jan 16, 2024</li>
                              </ul>
                            </div>
                            <div class="blog-title">
                              <a href="#">Unraveling the Gut Microbiota-Autoimmune Disease Connection</a>
                            </div>
                            <div class="blog-desc">
                              In this blog, we will learn about the intricate relationship between the gut mic
                            </div>
                            <div class="blog-btn">
                              <a href="#" class="yst-btn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="blog-list">
                          <div class="blog-img">
                            <img src="public/images/blog7.png">
                          </div>
                          <div class="blog-con">
                            <div class="blog-meta">
                              <ul>
                                <li>By YS Content</li>
                                <li>|</li>
                                <li>Jan 16, 2024</li>
                              </ul>
                            </div>
                            <div class="blog-title">
                              <a href="#">Role Of Epigenetics In Diseases Development And Prevention</a>
                            </div>
                            <div class="blog-desc">
                              In this blog, we will learn about the impact of epigenetics on various diseases,
                            </div>
                            <div class="blog-btn">
                              <a href="#" class="yst-btn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="blog-list">
                          <div class="blog-img">
                            <img src="public/images/blog8.jpg">
                          </div>
                          <div class="blog-con">
                            <div class="blog-meta">
                              <ul>
                                <li>By Dr. Gaurang Ramesh </li>
                                <li>|</li>
                                <li>Jan 16, 2024</li>
                              </ul>
                            </div>
                            <div class="blog-title">
                              <a href="#">Anxiety and Depression and The Role Played by Gut Microbiome</a>
                            </div>
                            <div class="blog-desc">
                              This blog explores the relationship between gut microbiota, epigenetics, and var
                            </div>
                            <div class="blog-btn">
                              <a href="#" class="yst-btn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                          </div>

                        </div>
                      </div>---->
                      <style>
                        .pagination .page-item .page-link {
                          color: #a6aba6;
                          border-color: #000000;
                        }

                      .pagination .page-item.active .page-link {
                          background-color:#a6aba6;
                          
                      }
                      .blog-pagination .page-item.active .page-link {
                        color: white; 
                        background-color: #a6aba6; /* Active pagination number background color */
                        border-color: #000000; /* Active pagination number border color */
                    }
                  </style>


                    @if($articles instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        <div class="blog-pagination mt-5" style="margin-left: auto;">
                            {{ $articles->onEachSide(1)->links() }}
                        </div>
                    @endif

                    </div>
                    <!-- <div class="blog-pagination mt-5">
                      <ul>
                        <li>Previous</li>
                        <li><i class="fa-solid fa-arrow-left-long"></i></li>
                        <li><span class="active-page">01</span></li>
                        <li><span>02</span></li>
                        <li><span>03</span></li>
                        <li><i class="fa-solid fa-arrow-right-long"></i></li>
                        <li>Next</li>
                      </ul>
                    </div> -->
                      <!-- Pagination Links -->
                     
                    </div>
                    <!-- <div class="pagination justify-content-center" style="width: 50%;">
   
</div> -->



                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="page-sidebar">
                    <div class="sidebar-search">
                    <form class="blog-search" action="{{ route('user.healthpedia') }}" method="GET">
                  <div class="input-group">
                      <input type="text" name="q" class="search-bar form-control" placeholder="Search by category...">
                      <button type="submit" style="background:linear-gradient(to bottom, #FFE575 10%,#F9D121 100%); color:#000000; border:none;" class="btn btn-primary">Search</button>
                  </div>
              </form>

                    </div>
                    <div class="blog-widget">
                      <div class="sidebar-heading mb-3">
                        <h2 class="ys-seidebar-heading">Tags</h2>
                      </div>
                      <div class="blog-cat">
                        
                        @php ($counter=0) @endphp
                       
                        <ul>
                          @foreach($activeCategories as $activeCat)     
                        <a href="{{ route('user.healthpedia') }}/?cat={{ $activeCat->id }}#mainstart" class="text-black">
                          <li>{{ $activeCat->title }}</li></a>
                        @endforeach
                        </ul>
                        
                      </div>
                    </div>
                    <div class="blog-widget">
                      <div class="sidebar-heading mb-4">
                        <h2 class="ys-seidebar-heading">Recent Post</h2>
                      </div>
                      <div class="recent-post">
                          
                        @foreach($articles->take(5) as $article)   
                        <div class="recent-post-list">
                          <div class="r-post-img">
                            <a href="{{ route('user.healthpediadetail', ['id' => $article->article_slug]) }}"  >
                           <img src="{{ url(config('app.article_image_url')).'/'.$article->banner_image ?? '' }}"> 
                           </a>
                          </div>
                          <div class="r-post-con">
                            <div class="r-post-date">
                              {{$article->created_at->format('M d, Y | h:i A')}}
                            </div>
                            <div class="r-post-title">
                              <a style="color:black; font-size:13px;" href="{{ route('user.healthpediadetail', ['id' => $article->article_slug]) }}">{{ $article->article_title }}</a>
                            </div>
                            <div class="r-post-btn">
                              <a href="{{ route('user.healthpediadetail', ['id' => $article->article_slug]) }}">Read More</a>
                            </div>
                          </div>
                        </div>
                        @endforeach
                        

                      </div>
                    </div>
                    <!---<div class="blog-widget">
                      <div class="sidebar-heading mb-4">
                        <h2 class="ys-seidebar-heading">Upcoming Programs</h2>
                      </div>
                      <div class="upcoming-block">
                        <div class="upcoming-list">
                          <div class="upcomingList-img">
                            <img src="public/images/upcomingW1.png">
                          </div>
                          <div class="upcomingList-con">
                            <div class="upcomingList-date">
                              <i class="fa-regular fa-calendar"></i> Feb 7, 2024
                            </div>
                            <div class="upcomingList-title">
                              Functional Medicine Approach for Digestive Disorders
                            </div>
                            <div class="upcomingList-expert">
                              By : Dr. Gaurang Ram
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="blog-widget">
                      <div class="sidebar-heading mb-4">
                        <h2 class="ys-seidebar-heading">Upcoming Webniars</h2>
                      </div>
                      <div class="upcoming-block">
                        <div class="upcoming-list">
                          <div class="upcomingList-img">
                            <img src="public/images/upcomingW1.png">
                          </div>
                          <div class="upcomingList-con">
                            <div class="upcomingList-date">
                              <i class="fa-regular fa-calendar"></i> Feb 7, 2024
                            </div>
                            <div class="upcomingList-title">
                              Functional Medicine Approach for Digestive Disorders
                            </div>
                            <div class="upcomingList-expert">
                              By : Dr. Gaurang Ram
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="blog-widget">
                      <div class="sidebar-heading mb-4">
                        <h2 class="ys-seidebar-heading">Get In Touch</h2>
                      </div>
                      <div class="get-in-touch">
                        <div class="git-list">
                          <div class="git-icon">
                            <img src="public/images/git-icon1.png">
                          </div>
                          <div class="git-text">
                            info@yellowsquash.in
                          </div>
                        </div>
                        <div class="git-list">
                          <div class="git-icon">
                            <img src="public/images/git-icon2.png">
                          </div>
                          <div class="git-text">
                            +91 97173 33655
                          </div>
                        </div>
                      </div>
                    </div>--->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     
          <!----Newsletter Start-------------->

<div class="newsletter-section">
<div class="container">
@include('layouts.subscribenewsletter')  <!-- This includes the Subscribe Our Newsletter -->
 
          </div>
</div>
 
      <!----Newsletter End-------------->
 
 
 @endsection