@extends('expertwebsite.master')
@section('title', 'Home')
@section('content')

 <!--- Popular program-->
         <div class="program-popular page-section" style="  background: #0EA89D;" >
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                  <div style="    color: #fff;">Home > FAQs</div>
                <h2 class="ys-headting" style="    color: #fff;">FAQs</h2>  
                 
              </div>
                </div>
              </div>
              </div>
               
             

<div class="program-explore page-section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="faq-section">
        <div class="container">
             <div class="row">
            <div class="col-lg-7">
              <div class="faq-right">
                <div class="row faq-right-row">
                  <div class="col-md-12">
                    <div class="section-heding">
                      <h2 class="ys-headting">Frequently  Asked Questions</h2>
                    </div>
                  </div>
                  
                </div>
                <div class="faq-list list-group nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link active" id="faq1" data-bs-toggle="tab" data-bs-target="#faq1-content" type="button" role="tab" aria-controls="nav-adhd" aria-selected="true">What kind of programs does YellowSquash offer?</button>
                      <button class="nav-link" id="faq2" data-bs-toggle="tab" data-bs-target="#faq2-content" type="button" role="tab" aria-controls="nav-gdd" aria-selected="false" tabindex="-1">Are the programs dispensed through only live sessions?</button>
                      <button class="nav-link" id="faq3" data-bs-toggle="tab" data-bs-target="#faq3-content" type="button" role="tab" aria-controls="nav-gdd" aria-selected="false" tabindex="-1">What if I am not available for the program time slots?</button>
                      <button class="nav-link" id="faq4" data-bs-toggle="tab" data-bs-target="#faq4-content" type="button" role="tab" aria-controls="nav-gdd" aria-selected="false" tabindex="-1">What if I miss a session?</button>
                      <button class="nav-link" id="faq5" data-bs-toggle="tab" data-bs-target="#faq5-content" type="button" role="tab" aria-controls="nav-gdd" aria-selected="false" tabindex="-1">Where can I reach for technical issues?</button>
                      <button class="nav-link" id="faq6" data-bs-toggle="tab" data-bs-target="#faq6-content" type="button" role="tab" aria-controls="nav-gdd" aria-selected="false" tabindex="-1">How can one become an instructor with YellowSquash?</button>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="faq-left">
                <div class="tab-content p-3 border bg-light" id="nav-tabContent1">
                  <div class="tab-pane fade active show" id="faq1-content" role="tabpanel" aria-labelledby="faq1">
                    <div class="faq-ans">
                      <div class="ans-heading">
                        What kind of programs does YellowSquash offer?
                      </div>
                      <div class="ans-text">
                        YellowSquash Programs are well thought through well being programs. We cover all aspects of human wellness – nutritional, physical, mental, emotional, intellectual, social and spiritual.
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="faq2-content" role="tabpanel" aria-labelledby="faq2">
                    <div class="faq-ans">
                      <div class="ans-heading">
                        Are the programs dispensed through only live sessions?
                      </div>
                      <div class="ans-text">
                       For the time being, programs are being conducted through live classes so that you can clear all your doubts and queries. However, in near future we will also have recorded version of these live programs available for subscription at a lower cost.
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="faq3-content" role="tabpanel" aria-labelledby="faq3">
                    <div class="faq-ans">
                      <div class="ans-heading">
                        What if I am not available for the program time slots?
                      </div>
                      <div class="ans-text">
                        If you are not available for the time slots of the program, please check later on. We will soon have recorded version of the courses held in the past.
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="faq4-content" role="tabpanel" aria-labelledby="faq4">
                    <div class="faq-ans">
                      <div class="ans-heading">
                        What if I miss a session?
                      </div>
                      <div class="ans-text">
                        Not to worry! All participants who have subscribed to a program can access all previously held recorded classes in their account.
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="faq5-content" role="tabpanel" aria-labelledby="faq5">
                    <div class="faq-ans">
                      <div class="ans-heading">
                        Where can I reach for technical issues?
                      </div>
                      <div class="ans-text">
                        You can write to info@yellowsquash.in or call +91 120 435 6959 for any technical queries.
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="faq6-content" role="tabpanel" aria-labelledby="faq6">
                    <div class="faq-ans">
                      <div class="ans-heading">
                        How can one become an instructor with YellowSquash?
                      </div>
                      <div class="ans-text">
                        YellowSquash follows a rigorous process to vet an instructor. Once registered, YellowSquash team requires you to fill in a detailed profile form along with submission of relevant certifications. Additionally, there are telephonic and/ or video interviews to qualify as a YellowSquash expert. Kindly note that this necessary to maintain the quality we aspire and promise to our consumers.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="faq-left-bimg">
                  <img src="public/images/faq.png">
                </div>
              </div>
            </div>
          </div>  <!-- This includes from resources -> views ->  layouts -->
         
        </div>
      </div>
              </div>
             </div>
          </div>
        </div>
        
         <!------Call Back End---->
 
          
      
 
 
 @endsection