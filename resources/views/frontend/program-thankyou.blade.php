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
        <button type="button" style="color:#fff;" class="btn"><a href="{{$program_detail->whatsapp_group_url}}" class="text-black" style="color:#fff !important;"><i class="fa-brands fa-whatsapp"></i> Join WhatsApp Group</a></button></br></br>
        
        
        <br>
       
        
     </div>
     
     
     <div class="container">
         <div class="row">
             <div class="col-sm-2">
             </div>
             <div class="col-sm-4">
                 <div class="thankyoubox">
                     
                     <i class="fa fa-file" style="color:#45A973;"></i>
                    
                    <a  href="{{ $program_detail->intake_from_link }}" target="_blank" class="btn btn-success">Fill Intake Form</a> 
                 </div>
             </div>
             <div class="col-sm-4">
                 <div class="thankyoubox">
                    
                    <i class="fa fa-users" style="color:#ec9494;"></i>
                    
                    @if(auth()->check())
        <a href="{{route('user.dashboard')}}" class="btn btn-success mt-1">Add manage member</a>

        @else
        <a href="{{route('user.login')}}" class="btn btn-success mt-1">Add manage member</a>
        @endif 
                 </div>
             </div>
             <div class="col-sm-2">
             </div>
         </div>
     </div>
     
 

@endsection


