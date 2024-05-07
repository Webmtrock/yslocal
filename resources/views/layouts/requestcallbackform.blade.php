<div class="call-back-section page-section">
          <div class="container">
            <div class="row">
              <div class="col-md-5">
                <div class="call-back-left">
                  <div class="cb-img">
                    <img src="public/images/cb-img.png">
                  </div>
                  <div class="adds-logo mt-2">
                    <img src="public/images/add1.png">
                    <img src="public/images/add2.png">
                  </div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="call-back-right">
                  <div class="section-heding">
                    <h2 class="ys-headting">Request A <span>Call back</span></h2>
                  </div>
                  <p>Have questions or want to know more about our programs?  Request a callback! Just fill out the form, and we'll reach out. Simple and convenient.</p>
                  <div class="section-form mt-4 pt-2">
                      
                      
       
                            
                  <form class="support-form mt-3" method="POST" action="{{route('callback.form')}}">
                        @csrf
                      <div class="row">
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