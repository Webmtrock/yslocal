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
      <form class="login100-form validate-form" action="{{route('user.reset-password-change')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2 style="margin: 20px;" >Create New Password</h2>
        <div class="row">
          <input type="hidden" value="{{ Session::get('phone_number') }}" name="user_phone">
          <div class="col-md-12">
            <input type="password" placeholder="Enter new password" name="new_pass" value="{{old('new_pass')}}"  class="ys-field" required>
            @error('new_pass')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-12">
            <input type="password" placeholder="Enter confirom password" name="confirom_pass" value="{{$confirom_pass ?? ''}}" class="ys-field" required>
            @error('confirom_pass')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="col-md-12">
            <div class="form-cta">
               <button type="submit" class="yst-btn " style="width: 100%;">Reset and Sing in </button>
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