@extends('frontend.master')
@section('title', 'Home')
@section('content')
        

      <br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                  <h1 style="margin: 20px;">Gateway to wellness...</h1>
                  <img src="https://projectstaging.live/public/images/loginimage2 1 1.png" width="100%">
                  <img src="https://projectstaging.live/public/images/Group 2591 1.png" width="100%">
                </div>
                <div class="col-md-6">
                 
                    <div style="width: 100%;height: 100%;border: 1px solid #22C55E;border-radius: 20px;padding: 30px;    text-align: center;">

                      
                      <form class="login100-form validate-form" action="https://projectstaging.live/login" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="mRfgGB9sxHJurjKt50MCDoNlJ9QvHSQtbnO7pl9J" autocomplete="off">                               
                        
                        <h2 style="margin: 20px;" >Create Your Account</h2>
                        <div class="row">
                          <div class="col-md-12">
                            <input type="text" placeholder="Enter your mobile number" required="" class="ys-field">
                          </div>
                           
                          <div class="col-md-12">
                            <input type="text" placeholder="Enter your password" required="" class="ys-field">
                          </div>
                          
                          <div class="text-end pt-1">
                            <p class="mb-0"><a href="forgot-password.html" class="text-primary ms-1">Forgot Password?</a></p>
                        </div>
                          <div class="col-md-12">
                            <div class="form-cta">
                              <button type="submit" class="yst-btn " style="width: 100%;">Login  </button>
                            </div>
                          </div>
                        </div>
                                                        
                        
                        <div class="text-center pt-3">
                            <p class="text-dark mb-0">Signup as a user?<a href="https://projectstaging.live/register" class="text-primary ms-1">Sign Up</a></p>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
      <br><br><br><br>

        
 
 
 @endsection