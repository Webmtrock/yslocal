@extends('frontend.master')
@section('title', 'Home')
@section('content')
<script src="https://wrmlabs.com/ys/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<!-- Choices Css -->
<link rel="stylesheet" href="https://wrmlabs.com/ys/assets/libs/choices.js/public/assets/styles/choices.min.css">
<br><br><br>
<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <div class="card custom-card user_dashboard">
            <div class="card-body">
               <div class="row">
                  <div class="col-sm-12">
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
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div id="patient" class="contentClass">
                        <section style="background-color: #eee;">
                           @foreach($patients as $key => $val)
                           <form class="login100-form validate-form" action="#" method="POST" enctype="multipart/form-data">
                              @csrf
                              <h2 style="margin: 20px;">Patient {{$key + 1}}</h2>
                              <div class="container">
                              <div class="row">
                                 <div class="col-md-6">
                                    <label>Full name</label>
                                    </br>
                                    <input type="text" placeholder="Enter Name" value="{{$val->getPatient->name}}"  class="ys-field" readonly>
                                 </div>  
                                 
                                 <div class="col-md-6">
                                    <label>Email id</label>
                                    </br>
                                    <input type="email" placeholder="Enter E-mail" value="{{$val->getPatient->email}}"  readonly class="ys-field">
                                 </div>   
                                 
                                 <div class="col-md-6">
                                    <label>Phone number</label>
                                    </br>
                                    <input type="text-number" placeholder="Enter Number" value="{{$val->getPatient->phone}}"  readonly class="ys-field">
                                 </div>   
                                 
                                 <div class="col-md-6">
                                    <label>Age</label>
                                    </br>
                                    <input type="number"  value="{{$val->getPatient->age}}"  name="age"  class="ys-field"  readonly>
                                 </div>  
                                 
                                 <div class="col-md-6">
                                    <label>Gender</label>
                                    </br>
                                    <select name="gender"   class="ys-field"  readonly>
                                       <option value="male">Male</option>
                                       <option value="female">Female</option>
                                    
                                    </select>
                                 </div>   
                                 
                                 <div class="col-md-6">
                                    <label>Flat No ./Street Name</label>
                                    </br>
                                    <input type="text" placeholder="Flat No ./Street Name" value="{{$val->getPatient->address}}"  readonly name="street_name" class="ys-field">
                                 </div>  
                                  
                                 <div class="col-md-6">
                                    <label>City/Town/District</label>
                                    </br>
                                    <input type="text" placeholder="City/Town/District" value="{{$val->getPatient->city}}"  readonly name="district" class="ys-field">
                                 </div>  
                                  
                                 <div class="col-md-6">
                                    <label>Pin Code</label>
                                    </br>
                                    <input type="number" placeholder="Pin Codet" value="{{$val->getPatient->pincode}}"  readonly name="pin_code"  class="ys-field">
                                 </div> 
                                   
                                 <div class="col-md-6">
                                    <label>State</label>
                                    </br>
                                    <input type="text" placeholder="State" value="{{$val->getPatient->state}}"  readonly name="state" class="ys-field">
                                 </div> 
                                   
                                 <div class="col-md-6">
                                    <label>Country</label>
                                    </br>
                                    <input type="text" placeholder="Country" value="India" readonly class="ys-field">
                                 </div>   
                                 
                              </div>
                              <!-- @if($key > 0)
                                 
                                    <div class="col-md-3">
                                       <div class="form-cta">
                                          <button type="submit" class="yst-btn " style="width: 100%;">Add </button>
                                       </div>
                                    </div>
                                
                              @endif -->
                                 </div>  
                           </form>
                           @endforeach
                          
                           @if($ProgramOrderData->planduration !=0)
                                @php $countdata = count($patients); @endphp
                              @for($i = 0; $i < $ProgramOrderData->planduration; $i++)
                                 <form class="login100-form validate-form" action="{{route('user.patient_store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{$ProgramOrderData->id}}">
                                    <h2 style="margin: 20px;">Patient {{$countdata + $i + 1}}</h2>
                                    <div class="container">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <label>Full name</label>
                                          </br>
                                          <input type="text" placeholder="Enter Name" required name="name" value=""  class="ys-field">
                                       </div>  
                                       
                                       <div class="col-md-6">
                                          <label>Email id</label>
                                          </br>
                                          <input type="email" placeholder="Enter E-mail" required name="email" value=""  class="ys-field">
                                       </div>   
                                       
                                       <div class="col-md-6">
                                          <label>Phone number</label>
                                          </br> 
                                          <input type="text-number" placeholder="Enter Number" required name="phone" value=""  class="ys-field">
                                       </div>   
                                       
                                       <div class="col-md-6">
                                          <label>Age</label>
                                          </br>
                                          <input type="number"  value=""  name="age" required  class="ys-field" >
                                       </div>  
                                       
                                       <div class="col-md-6">
                                          <label>Gender</label>
                                          </br>
                                          <select name="gender" class="ys-field" >
                                             <option value="male">Male</option>
                                             <option value="female">Female</option>
                                          
                                          </select>
                                       </div>   
                                       
                                       <div class="col-md-6">
                                          <label>Flat No ./Street Name</label>
                                          </br>
                                          <input type="text" placeholder="Flat No ./Street Name" value=""  name="street_name" class="ys-field">
                                       </div>  
                                       
                                       <div class="col-md-6">
                                          <label>City/Town/District</label>
                                          </br>
                                          <input type="text" placeholder="City/Town/District" value=""  name="district" class="ys-field">
                                       </div>  
                                       
                                       <div class="col-md-6">
                                          <label>Pin Code</label>
                                          </br>
                                          <input type="number" placeholder="Pin Codet" value=""  name="pin_code"  class="ys-field">
                                       </div> 
                                       
                                       <div class="col-md-6">
                                          <label>State</label>
                                          </br>
                                          <input type="text" placeholder="State" value=""  name="state" class="ys-field">
                                       </div> 
                                       
                                       <div class="col-md-6">
                                          <label>Country</label>
                                          </br>
                                          <input type="text" placeholder="Country" name="country" value="India" readonly class="ys-field">
                                       </div>   
                                       
                                    </div>
                                    
                                       
                                          <div class="col-md-3">
                                             <div class="form-cta">
                                                <button type="submit" class="yst-btn " style="width: 100%;">Add </button>
                                             </div>
                                          </div>
                                    
                                 
                                       </div>  
                                 </form>
                              @endfor
                           @endif  
                        </section>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<br><br><br><br>
   
@endsection