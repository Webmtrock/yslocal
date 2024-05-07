  <div class="row">
              <div class="section-heding text-center mb-3">
                <h2 class="ys-headting">Subscribe Our Newsletter</h2>
              </div>
              <div class="section-desc text-center">
                Get our latest blogs aligned with your interest directly in your inbox. Don't miss out – join the YellowSquash community today!

              </div>
              <div class="subscription-form">
                  
                  <form class="support-form mt-3" method="POST" action="{{ route('newsletter.form') }}">
                      @csrf
                  <input type="email" name="email" required>
                  
                  <div class="form-cta text-center">
                    <button type="submit" class="yst-btn">Subscribe  <i class="fa-solid fa-arrow-right"></i></button>
                  </div>
                  
                </form>
                <span style="color:red">{{$errors->first('email')}}</span>
                  
               
              </div>
              <div class="guidline text-center">
                No ads, No trails, No Commitments
              </div>
              <div class="adds-logo">
                <img src="/public/images/add1.png">
                <img src="/public/images/add2.png">
              </div>
            </div>