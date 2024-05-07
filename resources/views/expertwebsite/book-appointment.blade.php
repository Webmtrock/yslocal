@extends('expertwebsite.master')
@section('title', 'Home')
@section('content')


<div class="program-popular page-section" style="  background: #0EA89D;" >
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                  <div style="    color: #fff;">Home > Book Appointment</div>
                <h2 class="ys-headting" style="    color: #fff;">Book Appointment</h2>  
                 
              </div>
                </div>
              </div>
              </div>
        
<div class="book-appointment">
  <div class="container-fluid">

        <div class="left">
            <div class="row">
        
               <div class="col-md-4">
                  <h5>Appointment Scheduling Tips:</h5>
                 <ul>
                    <li>Lorem ipsum dolor sit amet consectetur. Nunc rutrum aliquam pharetra ipsum a. </li>
                    <li>Sed ultrices nec posuere tincidunt platea porttitor. Faucibus augue arcu non commodo nisi eleifend quisque.</li>
                    <li>Mauris massa placerat nisl pulvinar malesuada nibh egestas pellentesque suspendisse.</li>
                    <li>Fermentum eget suspendisse faucibus nulla id viverra sed.</li>
                 </ul>

              </div>
           
           
         <div class="col-md-8">
            <h3>Book Your Appointment for just&nbsp;₹ 999</h3>

            <p>Step 1: Fill Basic Details </p>
            <div class="row">
                <div class="col-md-6">

                    <input class="form-control border-none" type="text" placeholder="First Name">
                </div>
                <div class="col-md-6">
                    <input class="form-control border-none" type="text" placeholder="Last Name">
                </div>
                <div class="col-md-6">
                    <input class="form-control border-none" type="email" placeholder="Email Id">
                </div>
                <div class="col-md-6">
                    <input class="form-control border-none" type="text" placeholder="Phone Number">
                </div>
            </div>
            <p>Step 2: Add Appointment Reports (optional)</p>
            <label>Report Title</label>
            <input class="form-control border-none" type="text" placeholder="Eg: Blood Sugar Report">
            <label>Report Description</label>
            <input class="form-control border-none" type="text" placeholder="Write a short brief about your report">

            <input class="form-control border-none" type="file" placeholder="Upload file" style="width: 200px;">
            <a href="#" class="add-resource"> <img src="https://projectstaging.live/public/expertwebsite/images/plus.png" alt="" height="20px" width="20px"> Add Resource</a>

            <p style="padding-top: 30px;">Step 3: Select Date and Time</p>
            
        
           
         </div>
        </div>
    </div>


  </div>
</div>



<style>
    .book-appointment .top-color{
    background-color:  #0EA89D;
}
.book-appointment .container-fluid .left  { 
    padding-top: 50px
}
.book-appointment .container-fluid .left .row .col-md-4{
    
    padding-top: 10px
}
.book-appointment .container-fluid .left .row  .col-md-4 h5{
    padding-left: 14%;
}
.book-appointment .container-fluid .left .row  .col-md-4 ul{
    padding-left: 20%;
    font-size: 20px;
    font-family: poppins;
    font-weight: 500;
}
.book-appointment .container-fluid .left .row  .col-md-4 li{
    padding-top: 10px;
}
.book-appointment .container-fluid .left .row .col-md-8{
    padding-left: 7%;
    padding-right: 6%;
}
.book-appointment .container-fluid .left .row .col-md-8 p{
    font-family: poppins;
    font-weight: 400;
    font-size: 22px;
}
.book-appointment .container-fluid .left .row .col-md-8 input{
    margin-bottom: 20px;
   
}
.book-appointment .add-resource{
    text-decoration: none;
    color:  #595959;
}
</style>
 
 @endsection