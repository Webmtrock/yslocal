@extends('frontend.master') @section('title', 'Home') 
@section('content')

 <br>

<br>
<br>
<div class="payment">
  <div class="container">
 
    
    <div class="row">
        <div class="col-md-6">
          <h3>Checkout</h3>
          <p id="payer">PAYER DETAILS</p>

          
          @if(count($batchs) > 0)
              <label>Select Batch Start Date</label>
              <br>
             
              <select name="batch_id" id="batch" class="form-control">
                  <option value="">Select Batch Start Date</option>
                  @foreach($batchs as $val)
                      <?php
                          // Parse the batch start date and add 5 days
                          $batchStartDate = \Carbon\Carbon::parse($val->batch_end_date);
                          
                          // Check if the modified date is not less than the current date
                          $isNotLessThanCurrentDate = $batchStartDate->greaterThanOrEqualTo(\Carbon\Carbon::now(), 'day');
                      ?>

                      @if ($isNotLessThanCurrentDate)
                          <option value="{{ $val->id }}">{{ \Carbon\Carbon::parse($val->batch_start_date)->format('d F Y') }}</option>
                      @endif
                  @endforeach
              </select>
          @endif
          <label>Full name</label>
          </br>
          <input type="text" placeholder="Enter Name" value="{{auth()->user()->name ?? ''}}" id="full_name" class="form-control">
          <label>Email id</label>
          </br>
          <input type="email" placeholder="Enter E-mail" value="{{auth()->user()->email ?? ''}}" id="email" class="form-control">
          <label>Phone number</label>
          </br>
          <input type="text-number" placeholder="Enter Number" value="{{auth()->user()->phone ?? ''}}" id="phone_number"class="form-control">
          <p id="Patient">Patient Details</p>
          <input type="checkbox" name="chektype" id="copy_checkbox"> Same as above

          <br>
          <label>Full name</label>
          </br>
          <input type="text" placeholder="Enter Name" value="" id="patient_name" class="form-control">
          <label>Email id</label>
          </br>
          <input type="email" placeholder="Enter E-mail" value="" id="patient_email" class="form-control">
          <label>Phone number</label>
          </br>
          <input type="text-number" placeholder="Enter Number" value="" id="patient_number"class="form-control">
          <label>Age</label>
          </br>
          <input type="number"  value="" id="age" name="age" class="form-control">
          <label>Gender</label>
          </br>
          <select name="gender" id="gender"  class="form-control">
            <option value="male">Male</option>
            <option value="female">Female</option>
           
         </select>
        
          <br>
          <p id="Patient">Address</p>
          <br>
          <label>Flat No ./Street Name</label>
          </br>
          <input type="text" placeholder="Flat No ./Street Name" value="" id="street"class="form-control">
          <br>
          <label>City/Town/District</label>
          </br>
          <input type="text" placeholder="City/Town/District" value="" id="district"class="form-control">
          <br>
          <label>Pin Code</label>
          </br>
          <input type="number" placeholder="Pin Codet" value="" id="pin_code"class="form-control">
          <br>
          <label>State</label>
          </br>
          <input type="text" placeholder="State" value="" id="state"class="form-control">
          <br>
          <label>Country</label>
          </br>
          <input type="text" placeholder="Country" value="India" id="country"class="form-control">
        </div>

        <div class="col-md-6">
          <div class="right">
            <img src="{{ asset('uploads/'.$programs->image_url) }}">
            <h2 class="ys-heading">{{ $programs->title }}</h2>
            
            <h1>₹{{$ProgramPlanType->price - ($ProgramPlanType->price * $ProgramPlanType->discount / 100)}}
              
              @if($ProgramPlanType->discount >=1)
              <del>₹{{$ProgramPlanType->price}}</del>
              <i> {{$ProgramPlanType->discount}}% off</i>
              @endif
            </h1>
            <hr>
            <div class="row">
              <div class="col-6">
                <h3 style="color:#000000;">Total Price</h3> </br>
                @if($ProgramPlanType->discount >= 1)
                  <h3 style="color:#0FA654;">Total Discount</h3>
                @endif
                <h3 style="color:#0FA654;">Coupon Discount</h3>
              </div>
              <div class="col-6">
                <h3>
                  <strong>₹{{$ProgramPlanType->price}}</strong>
                </h3>
                @if($ProgramPlanType->discount >= 1)
                <h3 style="color:#0FA654;">
                  <strong>₹{{($ProgramPlanType->price * $ProgramPlanType->discount / 100)}}</strong>
                </h3>
                @endif
                <h3 style="color:#0FA654;">
                  <strong class="coupon_dis_val">{{isset($discount_amount)?$discount_amount:0}}</strong>
                </h3>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-6">
                <h2>Grand Total</h2>
              </div>
              <div class="col-6">
                <h3 id="grand_total">
                  <strong class="grand_total">₹{{$ProgramPlanType->price - ($ProgramPlanType->price * $ProgramPlanType->discount / 100)-(isset($discount_amount)?$discount_amount:0)}} </strong>
                </h3>
              </div>
            </div>
            <br>
            <center>
            <form action="{{ route('razorpay.payment.store') }}" method="POST">
     @csrf
              <input type="hidden" name="amount" value="{{$ProgramPlanType->price - ($ProgramPlanType->price * $ProgramPlanType->discount / 100)}}">
              <input type="hidden" name="program_id" value="{{$ProgramPlanType->program_id}}">
              <input type="hidden" name="userName" id="UserName" value="{{auth()->user()->name ?? ''}}">
              <input type="hidden" name="email"  id="UserEmail"value="{{auth()->user()->email ?? ''}}">
              <input type="hidden" name="phone"  id="UserPhone"value="{{auth()->user()->phone ?? ''}}">
              <input type="hidden" name="duration"  value="{{$ProgramPlanType->type_plan}}">
              <!-- Patient Details   -->
              <input type="hidden" name="patient_name" id="patient_names" value="">
              <input type="hidden" name="patient_email" id="patient_emails" value="">
              <input type="hidden" name="patient_number" id="patient_numbers" value="">
              <input type="hidden" name="patient_age" id="paye_age" value="">
              <input type="hidden" name="patient_gender" id="paye_gender" value="male">
              <input type="hidden" name="batch" id="paye_batch" value="">
              <input type="hidden" name="patient_street" id="paye_street" value="">
              <input type="hidden" name="patient_district" id="paye_district" value="">
              <input type="hidden" name="patient_pin_code" id="paye_pin_code" value="">
              <input type="hidden" name="patient_state" id="paye_state" value="">
              <input type="hidden" name="patient_country" id="paye_country" value="">
              <input type="hidden" name="patient_copy_checkbox" id="patient_copy_checkbox" value="0">
          
              

              <!-- Patient Details   -->

                <?php
                if(!empty($ProgramPlanType->discount)){
                  $final_amount = $ProgramPlanType->price - ($ProgramPlanType->price * $ProgramPlanType->discount / 100);
                }else{
                  $final_amount = $ProgramPlanType->price;
                }
                
                ?>
                <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY_ID') }}"
                  data-amount="{{$finalamount}}" data-buttontext="Pay Now" 
                  data-name="Yellowsquash.in" data-description="Program Payment" 
                  data-image="https://projectstaging.live/public/images/logo.png"
                  data-prefill.name="{{auth()->user()->name ?? ''}}" 
                  data-prefill.email="{{auth()->user()->email ?? auth()->user()->phone ?? ''}}" 
                  data-theme.color="#ff7529">
                </script>
                </form>
            </center>
            <div class="mb-4">
              <h3 id="have">Have a discount code?
              </h3>

              
            </div>
            <div class="mb-4">
              <form action="{{route('coupon.apply')}}" method="POST"  class="coupon_form">
               @csrf
              <input type="text" name="coupon_code" id="coupon_code" value="{{isset($coupon_code)?$coupon_code:''}}" required>
              <input type="hidden" name="total_price" value="{{$ProgramPlanType->price}}">
              <input type="hidden" name="program_id" value="{{$programs->id}}">
              <input type="hidden" name="program_discount" value="{{$ProgramPlanType->discount}}">
              <input type="hidden" name="plan_type_id" value="{{$ProgramPlanType->id}}">
              <input type="submit" class="btn btn-sm btn-primary" value="Apply">
               <!-- <span class="btn btn-success btn-sm apply_discount" > Apply </span> -->
             <p class="coupon_error" style="color:red;"> {{isset($error_message)?$error_message:''}}</p>
              </form>
          </div>
          </div>
        </div>
    
    </div>
    
    <br>
    <br>
    <br>
     @endsection
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>

      $(document).ready(function() {
        $('.apply_discount').on('click',function(){
         
          var coupon_code = $('#coupon_code').val();
          
          if(coupon_code == null || coupon_code == ''){
            $('.coupon_error').text('Please enter coupon code');

          }else{
            $.ajax({
                type: "POST",
                url: "{{ route('coupon.apply') }}",
                data: {program_id: "{{ $programs->id }}",coupon_code:coupon_code,total_price : "{{$ProgramPlanType->price}}",program_discount:"{{$ProgramPlanType->discount}}"},
                beforeSend: function(xhr) {
                  // Set the CSRF token in the request headers
                  xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
              },
                success: function(data) {
                     //console.log(data);
                     if(data.error == true){
                      $('.coupon_error').text(data.message);
                     }else{
                      $('.coupon_dis_val').html(data.discount_amount);
                      $('.grand_total').html(data.final_amount);
                      var razorpayScriptTag = document.querySelector('script[src="https://checkout.razorpay.com/v1/checkout.js"]');
                      var razorpayScriptTag = $('script[src="https://checkout.razorpay.com/v1/checkout.js"]');

                            // Remove the existing script tag
                            razorpayScriptTag.remove();

                            // Create a new script tag with the updated data-amount attribute
                            var newScriptTag = $('<script>')
                                .attr('src', 'https://checkout.razorpay.com/v1/checkout.js')
                                .attr('data-key', '{{ env('RAZORPAY_KEY_ID') }}')
                                .attr('data-amount', data.final_amount)
                                .attr('data-buttontext', 'Pay Now')
                                .attr('data-name', 'Yellowsquash.in')
                                .attr('data-description', 'Program Payment')
                                .attr('data-image', 'https://projectstaging.live/public/images/logo.png')
                                .attr('data-prefill.name', '{{ auth()->user()->name ?? '' }}')
                                .attr('data-prefill.email', '{{ auth()->user()->email ?? auth()->user()->phone ?? '' }}')
                                .attr('data-theme.color', '#ff7529');
                                console.log(newScriptTag);
                                $('body').append(newScriptTag);
                     }
                    // Ajax call completed successfully
                  //  alert("Form Submited Successfully");
                },
                error: function(data) {
                    // console.log(data);
                    // Some error in ajax call
                    alert("some Error");
                }
            });
          }

        });
          // $('.razorpay-payment-button').click(function() {
          //     var email = $('#email').val();
          //     var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          //     // if (emailRegex.test(email)) {
          //     //   alert('Valid email format');
          //     // } else {
          //     //   alert('Invalid email format');
          //     //   return false;
          //     // }
          // });
      
          // $('.razorpay-payment-button').click(function() {
          //     var email = $('#patient_email').val();
          //     var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          //     if (emailRegex.test(email)) {
          //       alert('Valid patient email format');
          //     } else {
          //       alert('Invalid patient email format');
          //       return false;
          //     }
          // });
          // $('.razorpay-payment-button').click(function() {
          //       alert('batch is required');
          //       return false;
          // });
          
      });

    $(document).ready(function() {
      $('#copy_checkbox').change(function() {
          CopyOldvalue();
      });
    });

function CopyOldvalue() {
    if ($('#copy_checkbox').is(':checked')) {
        var fullName = $('#full_name').val();
        $('#patient_name').val(fullName);
        var Email = $('#email').val();
        $('#patient_email').val(Email);
        var phone_number = $('#phone_number').val();
        $('#patient_number').val(phone_number);
        var fullName = $('#full_name').val();
        $('#patient_names').val(fullName);
        var Email = $('#email').val();
        $('#patient_emails').val(Email);
        var phone_number = $('#phone_number').val();
        $('#patient_numbers').val(phone_number);
        var copy_checkbox = $('#copy_checkbox').val();
        $('#patient_copy_checkbox').val('1');
       
    } else {
        
        $('#patient_copy_checkbox').val('0');
        $('#patient_name').val('');
        $('#patient_email').val('');
        $('#patient_number').val('');
        $('#patient_names').val('');
        $('#patient_emails').val('');
        $('#patient_numbers').val('');
    }
}

          $(document).ready(function() {
            $('#full_name').keyup(function() {
              var valueToFill = $(this).val();
              $('#UserName').val(valueToFill);
            });
            $('#age').keyup(function() {
              var valueToFill = $(this).val();
              $('#paye_age').val(valueToFill);
            });
            

            $('#email').keyup(function() {
              var valueToFill = $(this).val();
              $('#UserEmail').val(valueToFill);
            });

            $('#phone_number').keyup(function() {
              var valueToFill = $(this).val();
              $('#UserPhone').val(valueToFill);
            });

            $('#patient_name').keyup(function() {
              var valueToFill = $(this).val();
              $('#patient_names').val(valueToFill);
            });
            $('#patient_email').keyup(function() {
              var valueToFill = $(this).val();
              $('#patient_emails').val(valueToFill);
            });
            $('#patient_number').keyup(function() {
              var valueToFill = $(this).val();
              $('#patient_numbers').val(valueToFill);
            });

            $('#gender').on('change', function() {
              var valueToFill = $(this).val();
              $('#paye_gender').val(valueToFill);
          });

          $('#batch').on('change', function() {
              var valueToFill = $(this).val();
              $('#paye_batch').val(valueToFill);
          });

          
            $('#street').keyup(function() {
              var valueToFill = $(this).val();
              $('#paye_street').val(valueToFill);
            });

            $('#district').keyup(function() {
              var valueToFill = $(this).val();
              $('#paye_district').val(valueToFill);
            });

            $('#pin_code').keyup(function() {
              var valueToFill = $(this).val();
              $('#paye_pin_code').val(valueToFill);
            });

            $('#state').keyup(function() {
              var valueToFill = $(this).val();
              $('#paye_state').val(valueToFill);
            });
            $('#country').keyup(function() {
              var valueToFill = $(this).val();
              $('#paye_country').val(valueToFill);
            });

            
           

          });

      </script>