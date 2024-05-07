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
                    <h2>{{$concerns[0]->article_title}}</h2>
                  </div>
                  <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="blog.html">All Concerns</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$concerns[0]->article_title}}</li>
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
                <div class=" offset-lg-2 col-lg-8 col-md-12 offset-md-2">
                  <div class="blog-listing-inner">
                    <!---<div class="section-heding mb-5">
                      <h2 class="ys-headting">{{$concerns[0]->article_title}}</h2>
                    </div>--->
                    <div class="blog-content-area">
                      <div class="featured-img">
                        <img src="{{ url(config('app.article_image_url')).'/'.$concerns[0]->banner_image ?? '' }}">
                      </div>
                      <div class="blog-meta-list mb-4">
                        <div class="blog-meta-d">
                          {{$concerns[0]->created_at->format('M d, Y')}}
                        </div>
                        <div class="blog-meta-d">
                          Admin By @if($concerns[0]->expert)
                              {{ $concerns[0]->expert->name }}
                              @endif
                        </div>
                        <!-- <div class="blog-meta-d">
                          Comments (30)
                        </div> -->
                      </div>
                      
                      
                      {!! $concerns[0]->article_body !!}
                      
                      
                      
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