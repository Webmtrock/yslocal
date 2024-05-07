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
        <h1>Your payment was successful.</br>
          Invoice will be shared to your registered e-mail shortly </h1>
        </br> <h2>for daily updates & info</h2>
        <button type="button" class="btn">Join WhatsApp Group</button>
     </div>
 
    </div>
  </div>
@endsection


