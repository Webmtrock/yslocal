@extends('frontend.master')
@section('title', 'Home')
@section('content')
<br><br><br>
<div class="container">

  <div class="row">
    <div class="col-md-6">
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
      <h1 style="margin: 20px;">Gateway to wellness...</h1>
      <img src="https://projectstaging.live/public/images/loginimage2 1 1.png" width="100%">
      <img src="https://projectstaging.live/public/images/Group 2591 1.png" width="100%">
    </div>
    <div class="col-md-6">
      <div style="width: 100%;border: 1px solid #22C55E;border-radius: 20px;padding: 142px;    text-align: center;">
      <form class="login100-form validate-form" action="{{route('user.reset_password_send')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2 style="margin: 20px;" >Reset Password</h2>
        <div class="row">
          
          <div class="col-md-12">
            <input type="text" placeholder="Enter your mobile number" name="phone" value="{{old('phone') ?? ''}}" class="ys-field" required>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="col-md-12">
            <div class="form-cta">
               <button type="submit" class="yst-btn " style="width: 100%;">Send Otp </button>
              </div>
            </div>
          </div>
           
        </form>
       </div>
      </div>
    </div>
   </div>
      
<br><br><br>
        
 
 
 @endsection