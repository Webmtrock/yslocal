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
.col-md-2.background-data {
    background-color: #2e28280d;
}
span.top_video_image_tag {
    position: absolute;
    left: 0px;
    bottom: 20px;
    left: 20px;
    background: #F9D122;
    padding: 0px 10px;
    border-radius: 7px;
}
.button_video_play {
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #22C65F;
    background: #89898952;
    border-radius:20px;
    font-size: 45px;
}
.close_btn_align
{
    position: absolute;
    right: 0px;
    background: #fff;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    padding: 0px 0px 0px 8px;
    font-size: 22px;
    font-weight: bold;
    margin: 7px;
    color: #22C760;
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
                      <a class="nav-link {{ $current_route == 'user.video' ? 'active' : '' }}" aria-current="page" href="{{route('user.video')}}" style="color:black;">Videos</a>
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
                   
                      <h2 class="ys-headting mx-3">Latest Videos</h2>
                    </div>
                    <div class="row">
                        
                    @forelse($articles as $article)    
                    <div class="col-lg-6  ">
                        <div class="blog-list">
                          <div class="blog-img">
                            @if($article->add_video)
                          <!-- <video width="320" height="240" controls poster="{{asset('uploads/'.$article->video_thumbnail)}}">
                            <source src="{{ url(config('app.program_video_url')).'/'.$article->add_video ?? '' }}" type="video/mp4">
                          
                          </video> -->
                          
                          
                          <i onclick="openModal('{{ url(config('app.program_video_url')).'/'.$article->add_video ?? '' }}?autoplay=0')" class="fa-solid fa-play-circle button_video_play"></i> 
                          
                          
                          <img src="{{ env('PROGRAM_VIDEO_THUMBNAIL') . '/' . ($article->video_thumbnail ?? '') }}">




                          @endif

                          <span class="top_video_image_tag">@if($article->expert)
                              {{ $article->expert->name }}
                              @endif</span>
                          </div>
    
    

<!-- The Modal -->
<div id="videoModal" class="modal" style="background:#acaaaa80">
  <div class="modal-content" style="top: 20%;">
    <span class="close close_btn_align" onclick="closeModal()">&times;</span>
    <iframe id="videoIframe" width="100%" height="315" src="" title="YouTube video player" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" frameborder="0"></iframe>
  </div>
</div>

<script>
// Get the modal
var modal = document.getElementById("videoModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
function openModal(videoUrl) {
  // Set the iframe source
  document.getElementById('videoIframe').src = videoUrl;
  // Show the modal
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
function closeModal() {
  // Pause the video
  var videoIframe = document.getElementById('videoIframe');
  videoIframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
  // Clear the iframe source
  document.getElementById('videoIframe').src = '';
  // Hide the modal
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    // Pause the video
    var videoIframe = document.getElementById('videoIframe');
    videoIframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
    // Clear the iframe source
    document.getElementById('videoIframe').src = '';
    // Hide the modal
    modal.style.display = "none";
  }
}
</script>


                          
                          
                          
                          <div class="blog-con">
                            <div class="blog-meta">
                              <ul>
                          <li>
                              <!-- @if($article->expert)
                              {{ $article->expert->name }}
                              @endif -->
                              </li>
                          <!-- <li>|</li> -->
                          <li><i class="fas fa-calendar" style="color:#22c55e"></i> {{$article->created_at->format('M d, Y | h:i A')}}</li>
                        </ul>
                            </div>
                            <div class="blog-title">
                              <a href="">{{ ucfirst($article->video_title) }}</a>
                            
                              

                              <p class="video_description_{{$article->id}}">
                              <?php
                              $description = strip_tags($article->summary); 
                             // $description = html_entity_decode($article->summary); 
                              
                              $words = explode(' ', $description); 
                              $first50Words = implode(' ', array_slice($words, 0, 10)); // Get the first 10 words
                              ?>
                              {{ $first50Words }}<span class="load_more_text_{{$article->id}}" onclick="loadMoreText({{$article->id}});" style="color: green;">...Read More</span>
                              <div class="r-post-btn"></div> <!-- Close the div -->
                              

                          </p>
                          <p class="video_description_long_{{$article->id}}" style="display: none;">
                              <?php
                              // No need to strip tags here again since you're showing the full description
                              ?>
                              {{ $description }}
                              <div class="r-post-btn"></div> <!-- Close the div -->
                          </p>




                            </div>
                         
                          
                          </div>

                        </div>
                      </div>
                      @empty
                      <div class="pt-5 d-flex justify-content-center align-items-center flex-column">
                        <img src="https://www.yellowsquash.in/assets/images/empty.png" class="mx-auto" style="width: 30%;">
                        <div class="text-center text-black text-16 tracking-wide py-2">It’s empty in here</div>
                        <div class="text-center text-black text-opacity-40 text-18 tracking-wide">
                            <span>No video found.</span>
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
                    <form class="blog-search" action="{{ route('user.video') }}" method="GET">
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
                        <a href="{{ route('user.video') }}/?cat={{ $activeCat->id }}#mainstart" class="text-black">
                          <li>{{ $activeCat->title }}</li></a>
                        @endforeach
                        </ul>
                        
                      </div>
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
@include('layouts.subscribenewsletter')  <!-- This includes the Subscribe Our Newsletter -->
 
          </div>
</div>
 
      <!----Newsletter End-------------->
 


 @endsection
 <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
   

    function loadMoreText(id) {
     
    //  var summary = $('.video_description').data('summary');
      $('.video_description_long_'+id).show();
      $('.video_description_'+id).hide();
      $('.load_more_text_'+id).hide();
    }
</script>

