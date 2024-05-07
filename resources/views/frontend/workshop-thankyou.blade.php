@extends('frontend.master')
@section('title', 'Home')
@section('content')
<head>
<style>

.thankyou{
    text-align: center;
    height: 600px;
    margin-top: 50px;
}
.thankyou img{
    width: 242px;
    height: 242px;
}
.thankyou h1{
   font-family: poppins;
   font-size: 26px;
   font-weight: 400;
   margin-top: 30px;

}
.thankyou h2{
    font-family: poppins;
    font-size: 24px;
    font-weight: 500;
    
 
 }
 .thankyou button{
    background: linear-gradient(#2CAD68,#0E6034);
    border: none;
    width: 386px;
    height: 76px;
    color: #ffffff;
    font-family: poppins;
    font-weight: 600;
    font-size: 26PX;
 }
</style>

</head>
      <div class="thankyou">

      <img src="{{ asset('public/images/Thankyou.png') }}" alt="thankyou">
        <h1>Thankyou for purchasing {{$webinar_detail->webinar_title}}.</br>
           </h1>
    
        <button type="button" class="btn"><a href="{{$webinar_detail->whatsapp_link}}" target="_blank" class="text-black">Join WhatsApp Group</a></button>
        <br>
       <!-- <br>
        //@if(auth()->check())
        <a href="{{route('user.dashboard')}}" class="btn btn-success">Add manage member</a>

        @else
        <a href="{{route('user.login')}}" class="btn btn-success">Add manage member</a>
        @endif --->
     </div>
     
 

@endsection


