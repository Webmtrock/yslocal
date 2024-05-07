@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
       
                     <div class="card">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 mt-auto">
                                    <h5>Create Event</h5>
                                    <!-- {{ isset($data) ? 'Edit webinar' : 'Create webinar' }} -->
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="row float-end">
                                        <div class="col-xl-12 d-flex float-end">
                                        <a href="{{route('webinars.index')}}" class="btn btn-primary btn-wave waves-effect waves-light me-2">
                                       Back </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="card-body">
                    <form  action="{{ route('webinars.store') }}" method="POST" enctype="multipart/form-data" id="basic-form">
                    
                    
                
                      @csrf
                      <input type="hidden" name="preview" value="" class="Privewcheck">
                            <input type="hidden" name="id" id="id"value="{{ isset($data) ? $data->id : '' }}">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    @if(!empty($data->webinar_image))
                                        <div class="mt-3">
                                            <span class="pip" data-title="{{$data->webinar_image}}">
                                                <img src="{{ url(config('app.webinar_image')).'/'.$data->webinar_image ?? '' }}" alt="" width="150" height="100">
                                            </span> 
                                        </div>
                                    @endif
                                    <label for="name" class="mt-2"> Event Image <span class="text-danger info">(Only jpeg, png, jpg files allowed)</span></label>
                                    <input type="file" name="webinar_image"
                                            class="form-control @error('webinar_image') is-invalid @enderror">
                                    
                                    @error('webinar_image')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                               
                                <div class="form-group">
                                    <label for="category_id" class="mt-2">Select Category <span class="text-danger" >*</span></label>
                                    <select class="form-control" id="category_id" name="category_id[]" multiple data-trigger name="choices-multiple-default" placeholder="">
                                        <!-- <option value="">Select Category</option> -->
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ (is_array(old('category_id')) && in_array($category->id, old('category_id'))) || (isset($data) && in_array($category->id, explode(',', $data->category_id))) ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <span class="text-danger">Webinar Image Dimensions Size 300×400</span>

                            </div>
                            <div class="row">
                               
                                <div class="form-group col-md-6"> 
                                    <label for="title" class="mt-2">Event Title <span class="text-danger">*</span></label>
                                    <input type="text" name="webinar_title" class="form-control @error('title') is-invalid @enderror" placeholder="Webinar Title" value="{{ old('webinar_title', isset($data) ? $data->webinar_title : '') }}" required>
                                    @error('webinar_title')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">

                                @if(auth()->user()->roles->pluck('name')->first() == 'Admin')
                                <div class="form-group col-md-6 mt-auto">
                                    <label for="name" class="mt-2">Webinar Related To Which Expert <span class="text-danger">*</span></label>
                                    <select class="form-control @error('expert') is-invalid @enderror" name="expert_id" required>
                                            <option value="">Select Program Expert</option>
                                            @foreach($experts as $expert)
                                            <option value="{{ $expert->id }}">{{ $expert->name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                                @else
                                    <input type="hidden" name="expert_id" value="{{auth()->user()->id}}">
                                @endif
                               
                                <div class="form-group col-md-6">
                                   
                                                    @if(!empty($data->webinar_video))
                                        <div class="mt-2 mb-2">
                                            <p>Event Video:</p>
                                            <video width="200" height="160" controls>
                                                <source src="{{ url(config('app.webinar_image')).'/'.$data->webinar_video ?? '' }}"
                                                    type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    @endif
                                    <label for="name" class="mt-2">Event Video <span class="text-danger info">Event Video Dimensions Size 400*300</span></label>
                                    <input type="text" name="webinar_video" class="form-control @error('webinar_video') is-invalid @enderror" accept=".mp4,">
                                    <!-- <input type="hidden" class="form-control" name="webinarvideoOld" value=""> -->
                                    @error('webinar_video')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                     
                                    
                            </div>
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="date" class="mt-2">Event Start Date <span class="text-danger">*</span></label>
                                    <input type="date" name="webinar_start_date" class="form-control @error('webinar_start_date') is-invalid @enderror" placeholder="Webinar Start Date" value="{{ old('webinar_start_date', isset($data) ? $data->webinar_start_date : '') }}" required>
                                    @error('webinar_start_date')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>




                                <!-- <div class="form-group col-md-6 mt-auto">
                                    <label for="name" class="mt-2">On Which Day <span class="text-danger">*</span></label>
                                    <select class="form-control" id="selectExpert" name="day">
                                        <option value="">Select Day</option>
                                        @foreach($weeks as $week)
                                            <option value="{{ $week->id }}" {{ old('day', $week->day) == $week->id ? 'selected' : '' }}>{{ $week->name }}</option>
                                        @endforeach
                                    </select>
                                </div> -->
</div>
                    <div class="form-group col-md-6">
                                    <label for="number_of_enrollments" class="mt-2"> No.Of Enrollments <span class="text-danger">*</span></label>
                                    <input type="number" name="number_of_enrollments" class="form-control @error('number_of_enrollments') is-invalid @enderror" placeholder="No.Of Enrollments" value="{{ old('number_of_enrollments', isset($data) ? $data->number_of_enrollments : '') }}" required>
                                    @error('number_of_enrollments')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
<div class="form-group col-md-6 mt-auto">
    <label for="name" class="mt-2">Event Type <span class="text-danger">*</span></label>
    <select class="form-control" id="selectEventType" name="webinar_event_type">
        <option value="">Select Event Type</option>
        <option value="Workshop" {{ old('webinar_event_type') == 'Workshop' ? 'selected' : '' }}>Workshop</option>
        <option value="Webinar" {{ old('webinar_event_type') == 'Webinar' ? 'selected' : '' }}>Webinar</option>
        <option value="Physical Event" {{ old('webinar_event_type') == 'Physical Event' ? 'selected' : '' }}>Physical Event</option>
    </select>
</div>
                
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="duration" class="mt-2"> Duration in minutes <span class="text-danger">*</span></label>
                                    <input type="number" name="duration" class="form-control @error('duration') is-invalid @enderror" placeholder="Example:- 120 Min" value="{{ old('duration', isset($data) ? $data->duration : '') }}" required>
                                    @error('duration')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 mt-auto">
                                    <label for="name" class="mt-2">Start Time <span class="text-danger">*</span></label>
                                    <select class="form-control" id="selectExpert" name="start_time">
                                        <option value="">Select Time</option>
                                        <option value="09:00 AM">09:00 AM</option>
                                        <option value="09:30 AM">09:30 AM</option>
                                        <option value="10:00 AM">10:00 AM</option>
                                        <option value="10:30 AM">10:30 AM</option>
                                        <option value="11:00 AM">11:00 AM</option>
                                        <option value="11:30 AM">11:30 AM</option>
                                        <option value="12:00 PM">12:00 PM</option>
                                        <option value="12:30 PM">12:30 PM</option>
                                        <option value="01:00 PM">01:00 PM</option>
                                        <option value="01:30 PM">01:30 PM</option>
                                        <option value="02:00 PM">02:00 PM</option>
                                        <option value="02:30 PM">02:30 PM</option>
                                        <option value="03:00 PM">03:00 PM</option>
                                        <option value="03:30 PM">03:30 PM</option>
                                        <option value="04:00 PM">04:00 PM</option>
                                        <option value="04:30 PM">04:30 PM</option>
                                        <option value="05:00 PM">05:00 PM</option>
                                        <option value="05:30 PM">05:30 PM</option>
                                        <option value="06:00 PM">06:00 PM</option>
                                        <option value="06:30 PM">06:30 PM</option>
                                        <option value="07:00 PM">07:00 PM</option>
                                        <option value="07:30 PM">07:30 PM</option>
                                        <option value="08:00 PM">08:00 PM</option>
                                        <option value="08:30 PM">08:30 PM</option>
                                        <option value="09:00 PM">09:00 PM</option>
                                        <option value="09:30 PM">09:30 PM</option>
                                        <option value="10:00 PM">10:00 PM</option>
                                        <option value="10:30 PM">10:30 PM</option>
                                    </select>
                                </div>
</div>
<div class="row">
<div class="form-group col-md-6 mt-auto">
    <label for="name" class="mt-2">End Time <span class="text-danger">*</span></label>
    <select class="form-control" id="selectExpert" name="end_time">
        <option value="">Select Time</option>
        <option value="09:00 AM">09:00 AM</option>
        <option value="09:30 AM">09:30 AM</option>
        <option value="10:00 AM">10:00 AM</option>
        <option value="10:30 AM">10:30 AM</option>
        <option value="11:00 AM">11:00 AM</option>
        <option value="11:30 AM">11:30 AM</option>
        <option value="12:00 PM">12:00 PM</option>
        <option value="12:30 PM">12:30 PM</option>
        <option value="01:00 PM">01:00 PM</option>
        <option value="01:30 PM">01:30 PM</option>
        <option value="02:00 PM">02:00 PM</option>
        <option value="02:30 PM">02:30 PM</option>
        <option value="03:00 PM">03:00 PM</option>
        <option value="03:30 PM">03:30 PM</option>
        <option value="04:00 PM">04:00 PM</option>
        <option value="04:30 PM">04:30 PM</option>
        <option value="05:00 PM">05:00 PM</option>
        <option value="05:30 PM">05:30 PM</option>
        <option value="06:00 PM">06:00 PM</option>
        <option value="06:30 PM">06:30 PM</option>
        <option value="07:00 PM">07:00 PM</option>
        <option value="07:30 PM">07:30 PM</option>
        <option value="08:00 PM">08:00 PM</option>
        <option value="08:30 PM">08:30 PM</option>
        <option value="09:00 PM">09:00 PM</option>
        <option value="09:30 PM">09:30 PM</option>
        <option value="10:00 PM">10:00 PM</option>
        <option value="10:30 PM">10:30 PM</option>
    </select>
</div>
                                <div class="form-group col-md-6">
                                    <label for="webinar_price" class="mt-2"> Event Price <span class="text-danger">*</span></label>
                                    <input type="text" name="webinar_price" class="form-control @error('webinar_price') is-invalid @enderror" placeholder=" Webinar Price" value="{{ old('webinar_price', isset($data) ? $data->webinar_price : '') }}" required>
                                    @error('webinar_price')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="whatsapp_link" class="mt-2"> Whatsapp group link </label>
                                    <input type="text" name="whatsapp_link" class="form-control @error('whatsapp_link') is-invalid @enderror" placeholder="Whatsapp Link" value="{{ old('whatsapp_link', isset($data) ? $data->whatsapp_link : '') }}">
                                    @error('whatsapp_link')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <!-- <div class="form-group col-md-6">
                                    <label for="meeting_link" class="mt-2"> Webinar Meeting Link </label>
                                    <input type="text" name="meeting_link" class="form-control @error('meeting_link') is-invalid @enderror" placeholder="Webinar Meeting Link" value="{{ old('meeting_link', isset($data) ? $data->meeting_link : '') }}">
                                    @error('meeting_link')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div> -->

                                <div class="form-group col-md-6">
                                <label  class="mt-2"> Expert Designation <span class="text-danger">*</span></label>
                                    <input type="text" name="expert_designation" class="form-control @error('expert_designation') is-invalid @enderror"  value="{{ old('expert_designation', isset($data) ? $data->expert_designation : '') }}" required>
                                    @error('expert_designation')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                           
                            
            


                            <!-- @if(isset($wibinerWillLearn))
                            @foreach($wibinerSessions as $index => $wibinerSession)
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="session_will_cover" class="mt-2">Session Will Cover<span class="text-danger">*</span></label>
                                    <div>Heading</div>
                                    <input type="text" name="heading[]" class="form-control @error('heading') is-invalid @enderror" placeholder=" " value="{{ old('heading[].'.$index.'.heading', $wibinerSession->heading) }}" required>
                                    @error('inputs.'.$index.'.heading')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    <div>Defination</div>  
                                    <input type="text" name="definition[]" class="form-control mb-4 @error('definition') is-invalid @enderror" placeholder=" " value="{{ old('definition[].'.$index.'.definition', $wibinerSession->definition) }}" required>
                                    @error('inputs.'.$index.'.definition')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="d-flex justify-content-end">
                                        <button  type="button" class="btn btn-danger  DeleteRow"><i class="bi bi-trash-fill"></i> Remove</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                                <div class ="row">
                                    <div class="form-group col-md-6">
                                    <div id="newinput"></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                            <div class="d-flex justify-content-end">
                                                <button id="session_will_cover" type="button" class="btn btn-warning">Add MORE</button>
                                            </div>
                                        </div>
                                </div>
                            @else
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="" class="mt-2">Session Will Cover<span class="text-danger">*</span></label>
                                    <div>Heading</div>
                                    <input type="text" name="heading[]" class="form-control @error('heading') is-invalid @enderror" placeholder=" " value="{{ old('heading', isset($data) ? $data->heading : '') }}" required>
                                    @error('heading')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                    <div>Defination</div>  
                                    <input type="text" name="definition[]" class="form-control mb-4 @error('definition') is-invalid @enderror" placeholder=" " value="{{ old('definition', isset($data) ? $data->definition : '') }}" required>
                                    @error('definition')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    <div id="newinput"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="d-flex justify-content-end">
                                    <button id="session_will_cover" type="button" class="btn btn-warning mt-5 mb-5">ADD MORE</button>
                                    </div>
                                </div>
                            </div>
                            @endif


                            @if(isset($wibinerWillLearn))
                            @foreach($wibinerWillLearn as $index => $wibinerSession)
                                <div class="row" id="youWillLearnRow{{ $index }}">
                                    <div class="form-group col-md-6">
                                        <label for="you_Will_learn_input_{{ $index }}" class="mt-2">You Will Learn<span class="text-danger">*</span></label>
                                        <input type="text" id="you_Will_learn_input_{{ $index }}" name="titles[{{ $index }}][title]" class="form-control @error('you_Will_learn.'.$index.'.title') is-invalid @enderror" placeholder=" " value="{{ old('titles.'.$index.'.title', $wibinerSession->title) }}" required>
                                        @error('you_Will_learn.'.$index.'.title')
                                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-danger removeYouWillLearn" data-row="{{ $index }}"> <i class="bi bi-trash-fill"></i>Remove</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class ="row">
                                    <div class="form-group col-md-6 ">
                                        <div id="youWillLearnFieldsContainer"></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="d-flex justify-content-end">
                                            <button id="add_more_you_will_learn" type="button" class="btn btn-warning">Add MORE</button>
                                        </div>
                                    </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="you_Will_learn_input" class="mt-2">You Will Learn<span class="text-danger">*</span></label>
                                    <input type="text" id="you_Will_learn_input" name="title[]" class="form-control @error('you_Will_learn') is-invalid @enderror" placeholder=" " value="{{ old('you_Will_learn', isset($data) ? $data->you_Will_learn : '') }}" required>
                                    @error('you_Will_learn')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="d-flex justify-content-end">
                                        <button id="add_more_you_will_learn" type="button" class="btn btn-warning">ADD MORE</button>
                                    </div>
                                </div>
                            </div>
                            <div id="youWillLearnFieldsContainer"></div>
                            @endif


                            @if(isset($wibinerWillLearn))
                            @foreach($wibinerItFor as $index => $wibinerSession)
                                <div class="row" id="whoIsItForRow{{ $index }}">
                                    <div class="form-group col-md-6">
                                        <label for="who_is_it_for_{{ $index }}" class="mt-2">Who is it For<span class="text-danger">*</span></label>
                                        <input type="text" id="who_is_it_for_{{ $index }}" name="who_titles[{{ $index }}][who_title]" class="form-control @error('who_titles.'.$index.'.who_title') is-invalid @enderror" placeholder=" " value="{{ old('who_titles.'.$index.'.who_title', $wibinerSession->who_title) }}" required>
                                        @error('who_titles.'.$index.'.who_title')
                                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-danger removeWhoIsItFor" data-row="{{ $index }}">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class ="row">
                                <div class="form-group col-md-6 ">
                                    <div id="youWillLearnFieldswhoIsItFor"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="d-flex justify-content-end">
                                        <button id="add_more_who_is_it_for" type="button" class="btn btn-warning">Add MORE</button>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="who_is_it_for" class="mt-2">Who is it For<span class="text-danger">*</span></label>
                                    <input type="text" id="who_is_it_for" name="who_title[]" class="form-control @error('you_Will_learn') is-invalid @enderror" placeholder=" " value="{{ old('you_Will_learn', isset($data) ? $data->you_Will_learn : '') }}" required>
                                    @error('who_is_it_for')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="d-flex justify-content-end">
                                        <button id="add_more_who_is_it_for" type="button" class="btn btn-warning">ADD MORE</button>
                                    </div>
                                </div>
                                <div id="youWillLearnFieldswhoIsItFor"></div> 
                            </div>
                            @endif -->
                            <!------ Add Webinar Review images ----->
                            <div class="mt-3 mb-2">  
                                <hr class="border-dark"></div> 
                                <div class="row">
                                    <div class="form-group">
                                        <label for="name" class="mt-2">Overview <span
                                                class="text-danger">*</span></label>
                                        <textarea name="overview" class="ckeditor @error('overview') is-invalid @enderror"
                                            id="ckeditor"></textarea>
                                        @error('overview')
                                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
<div class="row">
    <hr class="border-dark">
    <div class="form-group col-md-6">
        <label for="image" class="mt-2">Event Review Image<span class="text-danger">*</span></label>
        <input type="file" id="image" name="image[]" class="form-control @error('image') is-invalid @enderror" placeholder=" " value="{{ old('image', isset($data) ? $data->image : '') }}"> @error('image')
        <span class="invalid-feedback form-invalid fw-bold" role="alert">
            {{ $message }}
        </span> @enderror
    </div>
    <div class="form-group col-md-6">
        <div class="d-flex justify-content-end">
            <button id="add_more_image" type="button" class="btn btn-warning">ADD MORE</button>
        </div>
    </div>
    <div id="Addimage"></div>
</div>

    <!------ Add Webinar Review images ------>
    
    <!------ Add Webinar Review videos ----->
<div class="row">
    <hr class="border-dark">
    <div class="form-group col-md-6">
        <label for="video" class="mt-2">Event Review Video<span class="text-danger">*</span></label>
        <input type="file" id="video" name="video[]" class="form-control @error('video') is-invalid @enderror" placeholder=" " value="{{ old('video', isset($data) ? $data->video : '') }}"> @error('video')
        <span class="invalid-feedback form-invalid fw-bold" role="alert">
            {{ $message }}
        </span> @enderror
    </div>
    <div class="form-group col-md-6">
        <div class="d-flex justify-content-end">
            <button id="add_more_video" type="button" class="btn btn-warning">ADD MORE</button>
        </div>
    </div>
    <div id="Addvideo"></div>
</div>


    <!------ Add Webinar Review videos ------>
                                
                             <div class="mt-3 mb-2">  
                                <hr class="border-dark"></div> 
                                <div class="row">
                                    <div class="form-group">
                                        <label for="name" class="mt-2">Webinar Description <span
                                                class="text-danger">*</span></label>
                                        <textarea name="description" class="ckeditor @error('description') is-invalid @enderror"
                                            id="ckeditor"></textarea>
                                        @error('description')
                                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div> 
                                <div class="col-md-6 mt-4">
                     <div class="form-group mb-2">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Publish</option>
            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Unpublish</option>
        </select>
    </div>
</div>
                     <div class="mt-5">
                                <input class="btn btn-primary" type="submit"
                                    value="{{ isset($data) ? 'Update' : 'Save' }}">
                                    <button class="btn btn-secondary" id="preview-button" type="button">Preview</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- <script>
       var i = 0;
       $("#session_will_cover").click(function (){
        ++i;
        var newRowAdd = '<div class="rowWrapper">' +
        '<div class="row">' +
        '<div class="text-end">' +
                    '<button class="btn btn-danger DeleteRow" type="button">' +
                    '<i class="bi bi-trash-fill"></i> Remove</button>' +
                    '</div>' +
                    '<div class="form-group col-md-12">' +
                    '<label for="heading" class="mt-2">Heading</label>' +
                    '<input type="text" name="heading[]" class="form-control m-input heading-input">' +
                    '</div>' +
                    '<div class="form-group col-md-12">' +
                    '<label for="definition" class="mt-2">Definition</label>' +
                    '<input type="text" name="definition[]" class="form-control m-input definition-input">' +
                    '</div>' +
                    '</div>' +
                
                    '</div>';
                $('#newinput').append(newRowAdd);
            });;
            $("body").on("click", ".DeleteRow", function ()
            {
                $(this).closest(".rowWrapper").remove();
            });




            $(document).ready(function() {
    var i = 0;
    $("#add_more_you_will_learn").click(function() {
        ++i;
        var newInputField = '<div class="row youWillLearnRow mt-3 mb-3">' + 
            '<div class="form-group col-md-6">' +
            '<input type="text" name="title[]" class="form-control" placeholder=" ">' +
            '</div>' +
            '<div class="form-group col-md-6">' +
            '<button class="btn btn-danger removeYouWillLearn" type="button">' +
            '<i class="bi bi-trash-fill"></i>' +
            '</button>' +
            '</div>' +
            '</div>';
        $("#youWillLearnFieldsContainer").append(newInputField);
    });
    $("body").on("click", ".removeYouWillLearn", function() {
        $(this).closest(".youWillLearnRow").remove();
    });
});


            $(document).ready(function()
            { 
                var i = 0;
                $("#add_more_who_is_it_for").click(function() {
                    ++i;
                    var newInputField = '<div class="row youWillLearnRow mt-3 mb-3">' + 
                    '<div class="form-group col-md-6">' +
                    '<input type="text" name="who_title[]" class="form-control" placeholder=" ">' +
                    '</div>' +
                    '<div class="form-group col-md-6">' +
                    '<button class="btn btn-danger removeYouWillLearn" type="button">' +
                    '<i class="bi bi-trash-fill"></i>' +
                    '</button>' +
                    '</div>' +
                    '</div>';
                    $("#youWillLearnFieldswhoIsItFor").append(newInputField);
                });
                $("body").on("click", ".removeYouWillLearn", function() {
                    $(this).closest(".youWillLearnRow").remove();
                });
            });
            
    </script> -->

<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const deleteButtons = document.querySelectorAll('.DeleteRow');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('.row');
                row.parentNode.removeChild(row); 
            });
        });
        const addMoreButton = document.getElementById('session_will_cover');
        addMoreButton.addEventListener('click', function() {
            
        });
    });
</script> -->

<!-- <script>
    
    document.addEventListener("DOMContentLoaded", function() {
        const removeButtons = document.querySelectorAll('.removeYouWillLearn');
        removeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const rowId = this.getAttribute('data-row');
                const row = document.getElementById('youWillLearnRow' + rowId);
                row.remove();
            });
        });
    });
</script> -->

<!-- <script>
 
    document.addEventListener("DOMContentLoaded", function() {
        const removeButtons = document.querySelectorAll('.removeWhoIsItFor');
        removeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const rowId = this.getAttribute('data-row');
                const row = document.getElementById('whoIsItForRow' + rowId);
                row.remove();
            });
        });
    });
</script> -->
<script>
var form = document.getElementById("basic-form");
document.getElementById("preview-button").addEventListener("click", function () {
    if (form.checkValidity()) {
        $('.Privewcheck').val('preview');
        form.submit();
    } else {
        $('input:invalid').addClass('invalid');
        alert("Please fill out all required fields.");
    }
});
</script>

<!--  Add Webinar reviews images Script Start  -->
<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#ckeditor'))
    .catch(error => {
        console.error(error);
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   $(document).ready(function() { 
    var i = 0;
    $("#add_more_image").click(function() {
        ++i;
        var newInputField = '<div class="row imageRemove mt-3 mb-3">' + 
            '<div class="form-group col-md-6">' +
            '<input type="file" name="image[]" class="form-control" placeholder=" ">' +
            '</div>' +
            '<div class="form-group col-md-6">' +
            '<button class="btn btn-danger removeYouWillLearn" type="button">' +
            '<i class="bi bi-trash-fill"></i>' +
            '</button>' +
            '</div>' +
            '</div>';
        $("#Addimage").append(newInputField);
    });
    $("body").on("click", ".removeYouWillLearn", function() {
        $(this).closest(".imageRemove").remove();
    });
});
</script>

<!--  Add Webinar reviews images Script End  -->

<!--  Add Webinar reviews video Script Start  -->
<script>
   $(document).ready(function() { 
    var i = 0;
    $("#add_more_video").click(function() {
        ++i;
        var newInputField = '<div class="row imageRemove mt-3 mb-3">' + 
            '<div class="form-group col-md-6">' +
            '<input type="file" name="video[]" class="form-control" placeholder=" ">' +
            '</div>' +
            '<div class="form-group col-md-6">' +
            '<button class="btn btn-danger removeYouWillLearn" type="button">' +
            '<i class="bi bi-trash-fill"></i>' +
            '</button>' +
            '</div>' +
            '</div>';
        $("#Addvideo").append(newInputField);
    });
    $("body").on("click", ".removeYouWillLearn", function() {
        $(this).closest(".imageRemove").remove();
    });
});
</script>

<!--  Add Webinar reviews video Script End  -->

@endsection