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
                  <div class="col-sm-3">
                     <ul class="ulClass">
                        <li style="list-style-type:none;"> 
                           <button id="firstactive" class="linkClass" onclick= 
                              "displayContent(event, 'dashboard')"> 
                           <i class="fas fa-home"></i>	Dashboard 
                           </button> 
                        </li>
                        <li style="list-style-type:none;"> 
                           <button class="linkClass" onclick= 
                              "displayContent(event, 'webinar')"> 
                           <i class="fas fa-address-card"></i>	My Event 
                           </button> 
                        </li>
                        <li style="list-style-type:none;"> 
                           <button class="linkClass" onclick= 
                              "displayContent(event, 'program')"> 
                           <i class="fas fa-address-card"></i>	My Program 
                           </button> 
                        </li>
                        <!-- <li style="list-style-type:none;"> 
                           <button class="linkClass" onclick= 
                              "displayContent(event, 'patient')"> 
                           <i class="fas fa-user"></i> Patient Manage 
                           </button> 
                           </li> -->
                        <li style="list-style-type:none;"> 
                           <button class="linkClass" onclick= 
                              "displayContent(event, 'account')"> 
                           <i class="fas fa-user"></i> Account Details 
                           </button> 
                        </li>
                        <li style="list-style-type:none;"> 
                           <button class="linkClass" onclick= 
                              "displayContent(event, 'report')"> 
                           <i class="fas fa-user"></i> Report 
                           </button> 
                        </li>
                        <li style="list-style-type:none;"> 
                           <a href="{{route('user_logout')}}">
                           <button class="linkClass"> 
                           <i class="fas fa-user"></i> Logout 
                           </button> 
                           </a>
                        </li>
                     </ul>
                  </div>
                  <div class="col-sm-9">
                     <div id="dashboard" class="contentClass">
                        <section style="background-color: #eee;">
                           <div class="container py-3">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="card mb-4">
                                       <div class="card-body">
                                          <div class="row">
                                             <div class="col-sm-3">
                                                <p class="mb-0">Full Name</p>
                                             </div>
                                             <div class="col-sm-9">
                                                <p class="text-muted mb-0">{{auth()->user()->name}}</p>
                                             </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                             <div class="col-sm-3">
                                                <p class="mb-0">Email</p>
                                             </div>
                                             <div class="col-sm-9">
                                                <p class="text-muted mb-0">{{auth()->user()->email}}</p>
                                             </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                             <div class="col-sm-3">
                                                <p class="mb-0">Phone</p>
                                             </div>
                                             <div class="col-sm-9">
                                                <p class="text-muted mb-0">{{auth()->user()->phone}}</p>
                                             </div>
                                          </div>
                                          <hr>
                                       </div>
                                    </div>
                                    <a href="{{route('user_logout')}}" class="edit_profile">Logout</a>
                                 </div>
                              </div>
                           </div>
                        </section>
                     </div>
                     <div id="webinar" class="contentClass">
                        <section style="background-color: #eee;">
                           <div class="container py-3">
                              @foreach($WebinarOrderData as $webinar)
                              <div class="card mb-4">
                                 <div class="card-body">
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <div class="webinar_event_tag">{{$webinar->webinar->webinar_event_type ?? ''}}</div>
                                          <p class="mb-0">{{$webinar->webinar->webinar_title ?? ''}}
                                             @if(isset($webinar->webinar->id))
                                             <a href="{{ route('user.workshop', @$webinar->webinar->id) }}">View Detail</a>
                                             @endif
                                          </p>
                                       </div>
                                       <div class="col-sm-12">
                                          <p class="mb-0" style="color:#F9D120">By {{@$webinar->webinar->expert->name ?? ''}}</p>
                                       </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                       <div class="col-sm-6">
                                          <p class="text-muted mb-0"><b>Start on</b></p>
                                          <p style="color:#22C65F">{{ isset($webinar->webinar->webinar_start_date) ? \Carbon\Carbon::parse($webinar->webinar->webinar_start_date)->format('d-M-Y') : '' }} </p>
                                       </div>
                                       <div class="col-sm-6" style="position: relative;">
                                          <!-- Image container with absolute positioning -->
                                          <div style="position: absolute; top: 50%; right: 0; transform: translateY(-50%);">
                                             <a href="{{@$webinar->webinar->meeting_link ?? ''}}">   
                                             <img src="{{ asset('public/uploads/video-playicon.png') }}" alt="Play Icon" style="height: 30px; width: 30px;">
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                           </div>
                        </section>
                     </div>
                     <div id="program" class="contentClass">
                        <section style="background-color: #eee;">
                           <div class="container py-3">
                              @foreach($ProgramOrderData as $program)
                              <div class="card mb-4">
                                 <div class="card-body">
                                    <div class="row">
                                       @if(isset($program->program->id))
                                       <div class="col-sm-12">
                                          <p class="mb-0">{{$program->program->title ?? ''}} 
                                             <a href="{{ route('user.program',$program->program->id) }}">View Detail</a>
                                          </p>
                                          @if(isset($program->program->id) && $program->parent_id == '0' )
                                          @if($program->planduration != 0)
                                          <a href="{{ route('user.add_patient', @$program->id) }}" class="btn btn-info" style="float: right; background:#22C55E !important">Add Patient</a>
                                          @else
                                          <a href="{{ route('user.add_patient', @$program->id) }}" class="btn btn-info" style="float: right; background:#22C55E !important">View Patient</a>
                                          @endif
                                          @endif
                                       </div>
                                       <div class="col-sm-12">
                                          <p class="mb-0" style="color:#626054;">By {{$program->program->expert->name ?? 'No Register Expert '}}</p>
                                       </div>
                                       @endif   
                                    </div>
                                    <hr>
                                    <div class="row">
                                       <div class="col-sm-6">
                                          <p class="text-muted mb-0"><b>Start on</b></p>
                                          @if(isset($program->program))
                                          <p style="color:#22C65F">{{ date('d-F-Y', strtotime($program->program->program_start_date)) }}</p>
                                          @endif   
                                       </div>
                                       <div class="col-sm-6">
                                          &nbsp;
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                           </div>
                        </section>
                     </div>
                     <div id="account" class="contentClass">
                        <section style="background-color: #eee;">
                           <form class="login100-form validate-form" action="{{route('update_profile')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <h2 style="margin: 20px;">Update Your Details</h2>
                              <div class="container">
                                 <div class="col-md-12">
                                    <input type="name"  name="name" value="{{auth()->user()->name}}" class="ys-field" required="">
                                 </div>
                                 <div class="col-md-12">
                                    <input type="text" name="email" value="{{auth()->user()->email}}" class="ys-field" required="">
                                 </div>
                                 <div class="col-md-12">
                                    <!-- Choices JS -->
                                    <select class="form-control" data-trigger name="categories_id[]" id="choices-multiple-default" multiple>
                                    @foreach($category as $val)
                                    <option value="{{ $val->id }}" {{in_array($val->id, explode(',', auth()->user()->categories_id)) ? 'selected' : '' }}>
                                    {{ $val->title }}
                                    </option>
                                    @endforeach
                                    </select>
                                 </div>
                                 <br>
                                 <div class="col-md-6">
                                    <div class="form-cta">
                                       <button type="submit" class="yst-btn " style="width: 100%;">Update </button>
                                    </div>
                                 </div>
                              </div>
                           </form>
                           <br>
                           <form class="login100-form validate-form" action="{{route('chnage_password')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <h2 style="margin: 20px;">Change Password</h2>
                              <div class="container">
                                 <div class="col-md-12">
                                    <input type="password" placeholder="Enter Old Password"  name="old_password" value="" class="ys-field" required="">
                                    @error('old_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                                 <div class="col-md-12">
                                    <input type="password" placeholder="Enter New Password"  name="password" value="" class="ys-field" required="">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                                 <div class="col-md-12">
                                    <input type="password" placeholder="Re-Enter New Password" name="confirm_password" value="" class="ys-field" required="">
                                    @error('confirm_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-cta">
                                       <button type="submit" class="yst-btn " style="width: 100%;">Update </button>
                                    </div>
                                 </div>
                              </div>
                           </form>
                           <br><br>
                        </section>
                     </div>
                     <div id="report" class="contentClass">
                        <form id="report_form" action="{{ route('report_store') }}" method="post" enctype="multipart/form-data">
                           @csrf
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="select_program">Select Program:</label>
                                  
                                    <select name="program" id="select_program" onchange="updateHiddenInput()" class="ys-field form-control" required>
                                       <option value="">Select Program</option>
                                       @foreach($ProgramOrderData as $program)
                                       <option value="{{ $program->program->id }}" data-batch = "{{$program->batch_id}}">{{ $program->program->title ?? '' }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="report_title">Report Title:</label>
                                    <input type="text" id="report_title" name="report_title" class="form-control" required>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="report_description">Report Description:</label>
                                    <textarea id="report_description" name="report_description" class="form-control" rows="4" required></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="images">Attach Media:</label>
                                    <input type="file" id="image" name="image[]" class="form-control-file" multiple accept="image/*,application/pdf" required>
                                 </div>
                              </div>
                              <div class="col-md-6 mt-4 text-end">
                                 <input type="submit" value="Submit" class="btn btn-primary">
                              </div>
                           </div>
                           <input type="hidden" id="report_program" name="program_id">
                           <input type="hidden" id="batch_program" name="batch_id">
                        </form>
                        <table id="responsivemodal-DataTable" class="table table-bordered text-nowrap  mt-5" style="width:100%">
                           <thead>
                              <tr>
                                 <th>S No.</th>
                                 <th>Report Title</th>
                                 <th>Report Description</th>
                                 <th>Report</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($reports as $key => $report)
                              <tr>
                                 <td>{{ $key + 1 }}</td>
                                 <td>{{ $report->report_title }}</td>
                                 <td>{{ $report->report_description }}</td>
                                 <td>{{count($report->getReportImage)}}</td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<br><br><br><br>
<!-- Internal Choices JS -->
<script src="https://wrmlabs.com/ys/assets/js/choices.js"></script>
<!-- Custom JS -->
<script src="https://wrmlabs.com/ys/assets/js/custom.js"></script>
<script>
   document.getElementById("firstactive").click();
   
       function displayContent(event, contentNameID) { 
   
   let content = 
   document.getElementsByClassName("contentClass"); 
   let totalCount = content.length; 
   
   // Loop through the content class 
   // and hide the tabs first 
   for (let count = 0; 
   count < totalCount; count++) { 
   content[count].style.display = "none"; 
   } 
   
   let links = 
   document.getElementsByClassName("linkClass"); 
   totalLinks = links.length; 
   
   // Loop through the links and 
   // remove the active class 
   for (let count = 0; 
   count < totalLinks; count++) { 
   links[count].classList.remove("active"); 
   } 
   
   // Display the current tab 
   document.getElementById(contentNameID) 
   .style.display = "block"; 
   
   // Add the active class to the current tab 
   event.currentTarget.classList.add("active"); 
   }
   
</script>  
<style>
   ul.ulClass li .active
   {
   background: #22C55E !important;
   color: #ffffff !important;
   border: 1px solid #22C55E !important;
   }
   ul.ulClass li button {
   border: solid #22C55E !important;
   margin: 12px 0px;
   background: transparent;
   color: #000;
   border-radius: 0px !important;
   font-size: 22px;
   width: 100%;
   text-align: left;
   padding: 12px 10px;
   }
   ul.ulClass li button i {
   color:#F9D120;
   margin-right:10px;
   }
   .edit_profile{
   background: #22C65F;
   color: #fff;
   padding: 10px 21px;
   border-radius: 22px;
   float: right;
   }
   .ul_list_button li
   {
   background: #F9D120;
   margin-right: 10px;
   padding: 2px 12px;
   border-radius: 14px;
   }
   [data-value="Choice 2"] {
   display: none !important;
   visibility: hidden;
   }
   [data-value="Choice 3"] {
   display: none !important;
   visibility: hidden;
   }
</style>
<script>
   function updateHiddenInput() {
      
       var selectedValue = document.getElementById("select_program").value;
       document.getElementById("report_program").value = selectedValue;
       var selectElement = document.getElementById("select_program");
         var selectedOption = selectElement.options[selectElement.selectedIndex];
         var batchValue = selectedOption.getAttribute("data-batch");
       document.getElementById("batch_program").value = batchValue;
   }
</script>
@endsection