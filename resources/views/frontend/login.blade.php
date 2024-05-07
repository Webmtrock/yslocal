@extends('frontend.master')
@section('title', 'Home')
@section('content')

<br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                  <h1 style="margin: 20px;">Gateway to wellness...</h1>
                  <img src="https://projectstaging.live/public/images/loginimage2 1 1.png" width="100%">
                  <img src="https://projectstaging.live/public/images/Group 2591 1.png" width="100%">
                </div>
                <div class="col-md-6 align_center">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                    <div style="width: 100%;border: 1px solid #22C55E;border-radius: 20px;padding: 30px;    text-align: center;">
                    <form class="login100-form validate-form" action="{{ route('user.login') }}" method="POST" enctype="multipart/form-data">
                        @csrf                             
                        <h2 style="margin: 20px;" >Login</h2>
                        <div class="row">
                          <div class="col-md-12">
                            <input type="text" placeholder="Enter your mobile number" name="phone" class="ys-field">
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                           
                          <div class="col-md-12">
                            <input type="password" placeholder="Enter your password" name="password" class="ys-field">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          
                          <div class="text-end pt-1">
                            <p class="mb-0"><a href="{{route('user.reset_password')}}" class="text-primary ms-1">Forgot Password?</a></p>
                        </div>
                          <div class="col-md-12">
                            <div class="form-cta">
                              <button type="submit" class="yst-btn " style="width: 100%;">Login </button>
                            </div>
                          </div>
                        </div>
                        <div class="text-center pt-3">
                            <p class="text-dark mb-0">Signup as a user?<a href="https://projectstaging.live/signup  " class="text-primary ms-1">Sign Up</a></p>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
<br>
<br><br>
<style>
    .align_center
     {
         display: flex;
    align-items: center;
    flex-wrap: wrap;
     }
</style>


 @endsection