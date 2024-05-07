@extends('frontend.master')
@section('title', 'Home')
@section('content')
<style>
.verification-code {
    max-width: 300px;
    position: relative;
    margin:50px auto;
    text-align:center;
}
.control-label{
  display:block;
  margin:40px auto;
  font-weight:900;
}
.verification-code--inputs input[type=text] {
    border: 2px solid #e1e1e1;
    width: 46px;
    height: 46px;
    padding: 10px;
    text-align: center;
    display: inline-block;
  box-sizing:border-box;
}

     .align_center
     {
         display: flex;
    align-items: center;
    flex-wrap: wrap;
     }
 </style>

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
      <div style="width: 100%;border: 1px solid #22C55E;border-radius: 20px;padding: 142px;    text-align: center;">
      <form class="login100-form validate-form" action="{{route('user.otpVerifySubmit')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2 style="margin: 20px;" >Verification Code</h2>
        <div class="row">
          
          <div class="col-md-12">
          <div class="verification-code">
          <div class="verification-code--inputs">
            <input type="text" name="otp[]" maxlength="1" />
            <input type="text" name="otp[]" maxlength="1" />
            <input type="text" name="otp[]" maxlength="1" />
            <input type="text" name="otp[]" maxlength="1" />

          </div>
          <input type="hidden" name="phone" value="{{@$data}}" />
        </div>
          </div>
          
          <div class="col-md-12">
            <div class="form-cta">
               <button type="submit" class="yst-btn " style="width: 100%;">Verify Otp </button>
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

 var verificationCode = [];
$(".verification-code input[type=text]").keyup(function (e) {
  
  // Get Input for Hidden Field
  $(".verification-code input[type=text]").each(function (i) {
    verificationCode[i] = $(".verification-code input[type=text]")[i].value; 
    $('#verificationCode').val(Number(verificationCode.join('')));
    //console.log( $('#verificationCode').val() );
  });

  //console.log(event.key, event.which);

  if ($(this).val() > 0) {
    if (event.key == 1 || event.key == 2 || event.key == 3 || event.key == 4 || event.key == 5 || event.key == 6 || event.key == 7 || event.key == 8 || event.key == 9 || event.key == 0) {
      $(this).next().focus();
    }
  }else {
    if(event.key == 'Backspace'){
        $(this).prev().focus();
    }
  }

}); // keyup

$('.verification-code input').on("paste",function(event,pastedValue){
  console.log(event)
  $('#txt').val($content)
  console.log($content)
  //console.log(values)
});

$editor.on('paste, keydown', function() {http://jsfiddle.net/5bNx4/#run
var $self = $(this);            
              setTimeout(function(){ 
                var $content = $self.html();             
                $clipboard.val($content);
            },100);
     });
     </script>
