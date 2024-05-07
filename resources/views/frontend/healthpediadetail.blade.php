@extends('frontend.master')
@section('title', 'Home')
@section('content')
        

     <div class="main blog-single">
        <!-----Inner Banner-------->
        <div class="innerPage-banner">
          <div class="container">
            <div class="page-banner-inner">
              <div class="row">
                <div class="col-12">
                  <div class="page-heading">
                    <h2>{{@$articles[0]->article_title}}</h2>
                  </div>
                  <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="blog.html">Our Blogs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{@$articles[0]->article_title}}</li>
                      </ol>
                    </nav>
                  </div>
                </div>
               </div>
            </div>
          </div>
        </div>
        <!--------Inner Banner End-->

        <!-------Blog Details---->
        <div class="blog-wrapper page-section">
          <div class="container">
            <div class="blog-listing-outer pt-4 pb-4">
              <div class="row">
                <div class="col-lg-8 col-md-12">
                  <div class="blog-listing-inner">
                    <!---<div class="section-heding mb-5">
                      <h2 class="ys-headting">{{@$articles[0]->article_title}}</h2>
                    </div>--->
                    <div class="blog-content-area">
                      <div class="featured-img">
                        <img src="{{ url(config('app.article_image_url')).'/'.@$articles[0]->banner_image ?? '' }}">
                      </div>
                      <div class="blog-meta-list mb-4">
                        <div class="blog-meta-d">
                          @if(@$articles[0]->created_at){

                            {{@$articles[0]->created_at->format('M d, Y') ?? ''}}
                          }
                          @endif
                        </div>
                        <div class="blog-meta-d">
                          Admin By @if(@$articles[0]->expert)
                              {{ $articles[0]->expert->name }}
                              @endif
                        </div>
                        <!-- <div class="blog-meta-d">
                          Comments (30)
                        </div> -->
                      </div>
                      
                      
                      {!!@ $articles[0]->article_body !!}
                      
                      
                      
                      <!---<div class="b-comments mt-5">
                        <h4 class="mb-5">Comments (5)</h4>
                        <div class="b-comments-list">
                          <div class="b-comment-img">
                            <img src="../public/images/user1.png">
                          </div>
                          <div class="b-comment-con">
                            <div class="b-comment-first">
                              <div class="b-comment-name">
                                JOEL LEONARD
                              </div>
                              <div class="b-comment-date">
                                March 2023
                              </div>
                            </div>
                            <div class="b-comment-text">
                              Proin ullamcorper porttitor lobortis. Nullam condimentum neque tincidunt hendrerit fermentum. Nunc vel nibh cursus, lacinia lacus quis, convallis ex. Phasellus in suscipit eros, cursus suscipit lectus. Quisque at lectus quis neque gravida rhoncus. Maecenas ut vehicula neque.
                            </div>
                            <div class="b-comment-reply">
                              Reply
                            </div>
                          </div>
                        </div>
                        <div class="b-comments-list">
                          <div class="b-comment-img">
                            <img src="../public/images/user2.png">
                          </div>
                          <div class="b-comment-con">
                            <div class="b-comment-first">
                              <div class="b-comment-name">
                                JOEL LEONARD
                              </div>
                              <div class="b-comment-date">
                                March 2023
                              </div>
                            </div>
                            <div class="b-comment-text">
                              Proin ullamcorper porttitor lobortis. Nullam condimentum neque tincidunt hendrerit fermentum. Nunc vel nibh cursus, lacinia lacus quis, convallis ex. Phasellus in suscipit eros, cursus suscipit lectus. Quisque at lectus quis neque gravida rhoncus. Maecenas ut vehicula neque.
                            </div>
                            <div class="b-comment-reply">
                              Reply
                            </div>
                          </div>
                        </div>
                        <div class="b-comments-list">
                          <div class="b-comment-img">
                            <img src="../public/images/user3.png">
                          </div>
                          <div class="b-comment-con">
                            <div class="b-comment-first">
                              <div class="b-comment-name">
                                JOEL LEONARD
                              </div>
                              <div class="b-comment-date">
                                March 2023
                              </div>
                            </div>
                            <div class="b-comment-text">
                              Proin ullamcorper porttitor lobortis. Nullam condimentum neque tincidunt hendrerit fermentum. Nunc vel nibh cursus, lacinia lacus quis, convallis ex. Phasellus in suscipit eros, cursus suscipit lectus. Quisque at lectus quis neque gravida rhoncus. Maecenas ut vehicula neque.
                            </div>
                            <div class="b-comment-reply">
                              Reply
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="comment-form mt-5">
                        <div class="comment-form-section-heading mb-3">
                          Leave A <span style="color: #F9D121;font-family: 'Oswald';font-weight: 600;">Reply</span>
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
                      </div>--->
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-12">
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
                        @php ($counter=0) @endphp
                        <ul>
                          @foreach($activeCategories as $activeCat)     
                        <a href="{{ route('user.healthpedia') }}/?cat={{ $activeCat->id }}#mainstart" class="text-black">
                          <li>{{ $activeCat->title }}</li></a>
                        @endforeach
                        </ul>
                        
                      </div>
                      <!-- <div class="blog-cat">
                        <ul>
                        @foreach($activeCategories as $activeCat)     
                          <li>{{ $activeCat->title }}</li>
                        @endforeach  
                        </ul>
                      </div> -->
                    </div>
                    <div class="blog-widget">
                      <div class="sidebar-heading mb-4">
                        <h2 class="ys-seidebar-heading">Recent Post</h2>
                      </div>
                      <div class="recent-post">
                        
                        
                        @foreach($recent->take(5) as $article)   
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
                    <!----<div class="blog-widget">
                      <div class="sidebar-heading mb-4">
                        <h2 class="ys-seidebar-heading">Upcoming Programs</h2>
                      </div>
                      <div class="upcoming-block">
                        <div class="upcoming-list">
                          <div class="upcomingList-img">
                            <img src="../public/images/upcomingW1.png">
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
                            <img src="../public/images/upcomingW1.png">
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
                            <img src="../public/images/git-icon1.png">
                          </div>
                          <div class="git-text">
                            info@yellowsquash.in
                          </div>
                        </div>
                        <div class="git-list">
                          <div class="git-icon">
                            <img src="../public/images/git-icon2.png">
                          </div>
                          <div class="git-text">
                            +91 97173 33655
                          </div>
                        </div>
                      </div>
                    </div>---->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!----Newsletter Start-------------->
        <div class="newsletter-section">
          <div class="container">
            <div class="row">
              <div class="section-heding text-center mb-3">
                <h2 class="ys-headting">Subscribe Our Newsletter</h2>
              </div>
              <div class="section-desc text-center">
                Integer venenatis consequat elit. Curabitur eget laoreet nibh. Cras euismod, tellus vitae luctus ultricies, lacus erat sagittis nulla, id ornare velit ligula congue ex. Etiam rhoncus urna ut pulvinar euismod.
              </div>
              <div class="subscription-form">
                <form>
                  <input type="email" name="semail">
                  <div class="form-cta text-center">
                    <button type="submit" class="yst-btn">Subscribe  <i class="fa-solid fa-arrow-right"></i></button>
                  </div>
                </form>
              </div>
              <div class="guidline text-center">
                No ads, No trails, No Commitments
              </div>
              <div class="adds-logo">
                <img src="../public/images/add1.png">
                <img src="../public/images/add2.png">
              </div>
            </div>
          </div>
        </div>

      <!----Newsletter End-------------->
      </div>
 
 
 @endsection