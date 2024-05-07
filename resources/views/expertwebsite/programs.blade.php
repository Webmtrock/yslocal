@extends('expertwebsite.master')
@section('title', 'Home')
@section('content')
        


<!------ Program Explore----------->
         
        <!------ Program Explore----------->

        <!--- Popular program-->
        <div class="program-popular page-section" style="  background: #0EA89D;" >
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                  <div style="    color: #fff;">Home > Programs</div>
                <h2 class="ys-headting" style="    color: #fff;">Explore Programs</h2>  
                 
              </div>
                </div>
              </div>
              </div>
              
                      <div class="program-popular page-section" style="  background:#F8F8F8;padding-bottom: 0px;" >
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                  <div>Lorem ipsum dolor sit amet consectetur. Suspendisse turpis nunc pretium mi cursus molestie sit. Purus ultrices porta cursus sodales. Vel sollicitudin eget vitae nulla justo tortor fusce. Egestas laoreet massa nibh lorem netus aliquam ut.
Scelerisque sit lectus fermentum est tincidunt et amet lobortis nunc. Cursus faucibus blandit pellentesque elementum commodo maecenas quis aenean enim.</div>
                
                 
              </div>
               <div class="col-md-6"><img src="https://projectstaging.live/public/uploads/1711963881_millets-3-1600x900.jpg.png" style=" position: relative; top: -150px; border-radius: 10px; ">
               </div>
              
                </div>
              </div>
              </div>
              
              
        <div class="program-popular page-section" id="mainstart" style="background: #fff;padding-top: 0px;">
          <div class="container">
            <div class="row">
               
              <div class="col-lg-8">
                <div class="tab-content mt-5" id="nav-tabContent">
                  <div class="tab-pane fade active show" id="progTab1-content" role="tabpanel" aria-labelledby="progTab1">
                      @foreach($programs as $key => $value)
                        <div class="popular-program-list">
                            <div class="prog-list row">
                                <div class="prog-img col-md-4">
                                  <a href="{{ route('expert.website.program', ['id' => $value->id]) }}">
                                     

                                        <img src="{{ asset('uploads/'.$value->image_url) }}">
                                    
                                        </a>
                                </div>
                                <div class="prog-img col-md-8">
                                    <div class="prog-right-con">
                                      <div class="prog-meta">
                                        <div class="prog-cat-list">
                                          <ul>
                                           
                                            {{$value->category->title ?? ""}}
                                            <!-- <li>Learning Disorders</li> --> 
                                          </ul>

                                        </div>
                                        
                                      </div>
                                      <div class="prog-title">
                                          <a href="{{ route('expert.website.program', ['id' => $value->id]) }}" class="text-dark">
                                            {{$value->title}}
                                          </a>
                                      </div>
                                      <div class="prog-desc">
                                        <p>
                                            <?php
                                            $programDescription = strip_tags($value->program_description); 
                                            $words = explode(' ', $programDescription); 
                                            $first50Words = implode(' ', array_slice($words, 0, 20)); // Get the first 50 words
                                            echo $first50Words;
                                            ?>....</p>
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
                                          </div>
                                          <div class="expert_date">
                                            
                                          <i class="fas fa-calendar"></i> {{$value->created_at->format('M d, Y | h:i A')}}  {{$value->created_at->addHours(2)->format('h:i A')}}

                                          </div>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  
                  </div>

                </div>
                </div>
              
               
          
              
                <div class="col-lg-4 ">
                <div class="ys-sidebar">
                  <div class="sidebar-heading text-center mt-4 mb-4">
                    <h2 class="ys-seidebar-heading">Upcoming Workshops</h2>
                  </div>
                  @foreach($wibiner as $key => $value)
                  
                  <div class="upcoming-block">
                    <div class="upcoming-list">
                      <div class="upcomingList-img">
                      <a href="{{ route('user.workshop', ['id' => $value->id]) }}">
                      <img src="{{ url(config('app.webinar_image') . '/' . ($value->webinar_image ?? '')) }}">
                     </a>
                      </div>
                      <div class="upcomingList-con">
                      <div class="upcomingList-date">
                          <i class="fa-regular fa-calendar"></i> {{$value->created_at->format('M d, Y | h:i A')}}  {{$value->created_at->addHours(2)->format('h:i A')}}
                        </div>
                        <div class="upcomingList-title">
                        <a href="{{ route('user.workshop', ['id' => $value->id]) }}" class="text-black">
                        {{$value->webinar_title}}
                        </a>
                          
                        </div>
                        <div class="upcomingList-expert">
                          By {{$value->expert ? $value->expert->name : 'No Webinar Listed '}}
                          </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                
                </div>
              </div>
            </div>
          </div>
        </div>  
        <!----popular program end--->

        <!------Call Back-------->
       <div class="call-back-section page-section">
          <div class="container">
            <div class="row">
              <div class="col-md-5">
                <div class="call-back-left">
                  <div class="cb-img">
                    <img src="../public/expertwebsite/images/cb-img.png">
                  </div>
                  <div class="adds-logo mt-2">
                    <img src="../public/expertwebsite/images/add1.png">
                    <img src="../public/expertwebsite/images/add2.png">
                  </div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="call-back-right">
                  <div class="section-heding">
                    <h2 class="ys-headting">Request A <span>Call back</span></h2>
                  </div>
                  <p>Curabitur a porta ligula, eget interdum ipsum. Mauris blandit urna in magna rhoncus volutpat. Proin consequat rhoncus dui, ut tincidunt nulla.</p>
                  <div class="section-form mt-4 pt-2">
                      
                      
            
                    <form class="support-form mt-3" method="POST" action="https://projectstaging.live/?">
                        <input type="hidden" name="_token" value="JMAHx1Luim8xAvVyImbVwQvlKJ4mol9GDTdIHN3g" autocomplete="off">                      <div class="row">
                        <div class="col-md-6">
                          <input type="text" placeholder="Full Name" required="" name="name" class="ys-field">
                        </div>
                        <div class="col-md-6">
                          <input type="email" placeholder="Email Id" required="" name="email" class="ys-field">
                        </div>
                        <div class="col-md-12">
                          <input type="text" placeholder="Phone Number" required="" name="number" class="ys-field">
                        </div>
                        <div class="col-md-12">
                          <textarea type="text" placeholder="Message" name="message" class="ys-field"></textarea>
                        </div>
                        <input type="hidden" value="callback" name="belongs_to">
                        <div class="col-md-12 mb-2">
                          <div class="form-cta">
                            <button type="submit" class="yst-btn">Send Request  <i class="fa-solid fa-arrow-right"></i></button>
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
        <!------Call Back End---->


     
 @endsection