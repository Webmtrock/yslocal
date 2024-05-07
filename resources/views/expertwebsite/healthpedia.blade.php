@extends('expertwebsite.master')
@section('title', 'Home')
@section('content')
        

        <!--- Popular program-->
        <div class="program-popular page-section" style="  background: #0EA89D;" >
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                  <div style="    color: #fff;">Home > Blog</div>
                <h2 class="ys-headting" style="    color: #fff;">Latest Blogs</h2>  
                 
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
                   
                    <div class="row">
                        
                    @foreach($articles as $article)    
                      <div class="col-lg-6">
                        <div class="blog-list">
                          <div class="blog-img">
                            <a href="{{ route('expert.website.healthpediadetail', ['id' => $article->article_slug]) }}"  >
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
                          <li> {{$article->created_at->format('M d, Y | h:i A')}}</li>
                        </ul>
                            </div>
                            <div class="blog-title">
                              <a href="{{ route('expert.website.healthpediadetail', ['id' => $article->article_slug]) }}">{{ $article->article_title }}</a>
                            </div>
                            <div class="blog-desc">
                              {{ $article->summary }} 
                            </div>
                            <div class="blog-btn">
                              <a href="{{ route('expert.website.healthpediadetail', ['id' => $article->article_slug]) }}" class="yst-btn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                          </div>

                        </div>
                      </div>
                      @endforeach
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
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="page-sidebar">
                    <div class="sidebar-search">
                      <form class="blog-search">
                        <input type="text" name="" class="search-bar" placeholder="Search">
                        <label for="search-btn">
                          <i class="fa-solid fa-arrow-right-long"></i>
                          <input type="submit" name="" id="search-btn">
                        </label>
                      </form>
                    </div>
                    <div class="blog-widget">
                      <div class="sidebar-heading mb-3">
                        <h2 class="ys-seidebar-heading">Tags</h2>
                      </div>
                      <div class="blog-cat">
                        <ul>
                          @foreach($activeCategories as $activeCat)     
                          <li>{{ $activeCat->title }}</li>
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
                            <a href="{{ route('expert.website.healthpediadetail', ['id' => $article->article_slug]) }}"  >
                           <img src="{{ url(config('app.article_image_url')).'/'.$article->banner_image ?? '' }}"> 
                           </a>
                          </div>
                          <div class="r-post-con">
                            <div class="r-post-date">
                              {{$article->created_at->format('M d, Y | h:i A')}}
                            </div>
                            <div class="r-post-title">
                              <a style="color:black; font-size:13px;" href="{{ route('expert.website.healthpediadetail', ['id' => $article->article_slug]) }}">{{ $article->article_title }}</a>
                            </div>
                            <div class="r-post-btn">
                              <a href="{{ route('expert.website.healthpediadetail', ['id' => $article->article_slug]) }}">Read More</a>
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