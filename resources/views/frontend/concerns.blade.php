@extends('frontend.master')
@section('title', 'Home')
@section('content')
        

      <!-----Inner Banner-------->
        <div class="innerPage-banner">
          <div class="container">
            <div class="page-banner-inner">
              <div class="row">
                <div class="col-12">
                  <div class="page-heading">
                    <h2>All Concerns</h2>
                  </div> 
                  <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Concerns</li>
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
                <div class="col-lg-12 col-md-6">
                  <div class="blog-listing-inner">
                    <div class="section-heding">
                      <h2 class="ys-headting mx-3">Latest Concerns</h2>
                    </div>
                    <div class="row">
                        
                    @foreach($concerns as $concern)    
                      <div class="col-lg-4">
                        <div class="blog-list">
                          <div class="blog-img">
                            <a href="{{ route('user.concerndetail', ['id' => $concern->article_slug]) }}"  >
                           <img src="{{ url(config('app.article_image_url')).'/'.$concern->banner_image ?? '' }}"> 
                           </a>
                          </div>
                          <div class="blog-con">
                            <div class="blog-meta">
                              <ul>
                          <li>
                              @if($concern->expert)
                              {{ $concern->expert->name }}
                              @endif
                              </li>
                          <li>|</li>
                          <li> {{$concern->created_at->format('M d, Y | h:i A')}}</li>
                        </ul>
                            </div>
                            <div class="blog-title">
                              <a href="{{ route('user.concerndetail', ['id' => $concern->article_slug]) }}">{{ $concern->article_title }}</a>
                            </div>
                            <div class="blog-desc">
                              {{ $concern->summary }} 
                            </div>
                            <div class="blog-btn">
                              <a href="{{ route('user.concerndetail', ['id' => $concern->article_slug]) }}" class="yst-btn">Read More <i class="fa-solid fa-arrow-right"></i></a>
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