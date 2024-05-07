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
                    <h2>Appointment Booking</h2>
                  </div>
                  <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                      </ol>
                    </nav>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <!--------Inner Banner End-->

        <!-------appointment---->
        <div class="contact-support page-section">
          <div class="container">
            <div class="contact-us-inner pt-4 pb-4">
              <div class="row">
                <div class="col-sm-12">
                    <!-- Calendly inline widget begin -->
                    <div class="calendly-inline-widget" data-url="{{ $appointment->link }}?hide_landing_page_details=1&hide_gdpr_banner=1&primary_color=f7db27" style="min-width:320px;height:700px;"></div>
                    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
                    <!-- Calendly inline widget end -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!------appointment--->

        
      
 
 
 @endsection