@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
       
                     <div class="card">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 mt-auto">
                                    <h5>Edit Event</h5>
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
                    <form action="{{ route('webinars.update', $data->id) }}" method="POST" enctype="multipart/form-data" id="basic-form">


                      @csrf
                      <input type="hidden" name="preview" class="Privewcheck" value="">
                      @method('PUT')
                      
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
                                            <input type="hidden" class="form-control" name="webinar_imageOld"
                                        value="{{ isset($data) ? $data->webinar_image : ''}}">
                                        <span class="text-danger">Event Image Dimensions Size 300×400</span>
                                    @error('webinar_image')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
    @if(!empty($data->webinar_video))
        <div class="mt-2 mb-2">
            <p>Event Video:</p>
            <video width="200" height="160" controls>
            <source src="{{ $data->webinar_video }}">
                Your browser does not support the video tag.
            </video>
        </div>
    @endif
    <label for="webinar_video" class="mt-2">Event Video <span class="text-danger info"><span class="text-danger info">Event Video Dimensions Size 400*300</span></span></label>
    <input type="text" name="webinar_video" value="{{ $data->webinar_video ?? '' }}" class="form-control @error('webinar_video') is-invalid @enderror" >
    <input type="hidden" class="form-control" name="webinar_videoOld" value="{{ $data->webinar_video ?? '' }}">
    @error('webinar_video')
        <span class="invalid-feedback form-invalid fw-bold" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
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
                                                <option value="{{ $expert->id }}" {{ ($expert->id == old('expert_id', $data->expert_id)) ? 'selected' : '' }}>
                                                {{ $expert->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <input type="hidden" name="expert_id" value="{{auth()->user()->id}}">
                                @endif
                            
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
            <option value="{{ $week->id }}" {{ ($week->id == old('day', $data->day)) ? 'selected' : '' }}>
                {{ $week->name }}
            </option>
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
        <option value="" {{ old('webinar_event_type', $data->webinar_event_type) == '' ? 'selected' : '' }}>Select Event Type</option>
        <option value="Workshop" {{ old('webinar_event_type', $data->webinar_event_type) == 'Workshop' ? 'selected' : '' }}>Workshop</option>
        <option value="Webinar" {{ old('webinar_event_type', $data->webinar_event_type) == 'Webinar' ? 'selected' : '' }}>Event</option>
        <option value="Physical Event" {{ old('webinar_event_type', $data->webinar_event_type) == 'Physical Event' ? 'selected' : '' }}>Physical Event</option>
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
        <option value="09:00 AM" {{ $data->start_time == '09:00 AM' ? 'selected' : '' }}>09:00 AM</option>
                                                <option value="09:30 AM" {{ $data->start_time == '09:30 AM' ? 'selected' : '' }}>09:30 AM</option>
                                                <option value="10:00 AM" {{ $data->start_time == '10:00 AM' ? 'selected' : '' }}>10:00 AM</option>
                                                <option value="10:30 AM" {{ $data->start_time == '10:30 AM' ? 'selected' : '' }}>10:30 AM</option>
                                                <option value="11:00 AM" {{ $data->start_time == '11:00 AM' ? 'selected' : '' }}>11:00 AM</option>
                                                <option value="11:30 AM" {{ $data->start_time == '11:30 AM' ? 'selected' : '' }}>11:30 AM</option>
                                                <option value="12:00 PM" {{ $data->start_time == '12:00 PM' ? 'selected' : '' }}>12:00 PM</option>
                                                <option value="12:30 PM" {{ $data->start_time == '12:30 PM' ? 'selected' : '' }}>12:30 PM</option>
                                                <option value="01:00 PM" {{ $data->start_time == '01:00 PM' ? 'selected' : '' }}>01:00 PM</option>
                                                <option value="01:30 PM" {{ $data->start_time == '01:30 PM' ? 'selected' : '' }}>01:30 PM</option>
                                                <option value="02:00 PM" {{ $data->start_time == '02:00 PM' ? 'selected' : '' }}>02:00 PM</option>
                                                <option value="02:30 PM" {{ $data->start_time == '02:30 PM' ? 'selected' : '' }}>02:30 PM</option>
                                                <option value="03:00 PM" {{ $data->start_time == '03:00 PM' ? 'selected' : '' }}>03:00 PM</option>
                                                <option value="03:30 PM" {{ $data->start_time == '03:30 PM' ? 'selected' : '' }}>03:30 PM</option>
                                                <option value="04:00 PM" {{ $data->start_time == '04:00 PM' ? 'selected' : '' }}>04:00 PM</option>
                                                <option value="04:30 PM" {{ $data->start_time == '04:30 PM' ? 'selected' : '' }}>04:30 PM</option>
                                                <option value="05:00 PM" {{ $data->start_time == '05:00 PM' ? 'selected' : '' }}>05:00 PM</option>
                                                <option value="05:30 PM" {{ $data->start_time == '05:30 PM' ? 'selected' : '' }}>05:30 PM</option>
                                                <option value="06:00 PM" {{ $data->start_time == '06:00 PM' ? 'selected' : '' }}>06:00 PM</option>
                                                <option value="06:30 PM" {{ $data->start_time == '06:30 PM' ? 'selected' : '' }}>06:30 PM</option>
                                                <option value="07:00 PM" {{ $data->start_time == '07:00 PM' ? 'selected' : '' }}>07:00 PM</option>
                                                <option value="07:30 PM" {{ $data->start_time == '07:30 PM' ? 'selected' : '' }}>07:30 PM</option>
                                                <option value="08:00 PM" {{ $data->start_time == '08:00 PM' ? 'selected' : '' }}>08:00 PM</option>
                                                <option value="08:30 PM" {{ $data->start_time == '08:30 PM' ? 'selected' : '' }}>08:30 PM</option>
                                                <option value="09:00 PM" {{ $data->start_time == '09:00 PM' ? 'selected' : '' }}>09:00 PM</option>
                                                <option value="09:30 PM" {{ $data->start_time == '09:30 PM' ? 'selected' : '' }}>09:30 PM</option>
                                                <option value="10:00 PM" {{ $data->start_time == '10:00 PM' ? 'selected' : '' }}>10:00 PM</option>
                                                <option value="10:30 PM" {{ $data->start_time == '10:30 PM' ? 'selected' : '' }}>10:30 PM</option>
    </select>
</div>

</div>
<div class="row">
<div class="form-group col-md-6 mt-auto">
    <label for="name" class="mt-2">End Time <span class="text-danger">*</span></label>
    <select class="form-control" id="selectExpert" name="end_time">
        <option value="">Select Time</option>
        <option value="09:00 AM" {{ $data->end_time == '09:00 AM' ? 'selected' : '' }}>09:00 AM</option>
                                                <option value="09:30 AM" {{ $data->end_time == '09:30 AM' ? 'selected' : '' }}>09:30 AM</option>
                                                <option value="10:00 AM" {{ $data->end_time == '10:00 AM' ? 'selected' : '' }}>10:00 AM</option>
                                                <option value="10:30 AM" {{ $data->end_time == '10:30 AM' ? 'selected' : '' }}>10:30 AM</option>
                                                <option value="11:00 AM" {{ $data->end_time == '11:00 AM' ? 'selected' : '' }}>11:00 AM</option>
                                                <option value="11:30 AM" {{ $data->end_time == '11:30 AM' ? 'selected' : '' }}>11:30 AM</option>
                                                <option value="12:00 PM" {{ $data->end_time == '12:00 PM' ? 'selected' : '' }}>12:00 PM</option>
                                                <option value="12:30 PM" {{ $data->end_time == '12:30 PM' ? 'selected' : '' }}>12:30 PM</option>
                                                <option value="01:00 PM" {{ $data->end_time == '01:00 PM' ? 'selected' : '' }}>01:00 PM</option>
                                                <option value="01:30 PM" {{ $data->end_time == '01:30 PM' ? 'selected' : '' }}>01:30 PM</option>
                                                <option value="02:00 PM" {{ $data->end_time == '02:00 PM' ? 'selected' : '' }}>02:00 PM</option>
                                                <option value="02:30 PM" {{ $data->end_time == '02:30 PM' ? 'selected' : '' }}>02:30 PM</option>
                                                <option value="03:00 PM" {{ $data->end_time == '03:00 PM' ? 'selected' : '' }}>03:00 PM</option>
                                                <option value="03:30 PM" {{ $data->end_time == '03:30 PM' ? 'selected' : '' }}>03:30 PM</option>
                                                <option value="04:00 PM" {{ $data->end_time == '04:00 PM' ? 'selected' : '' }}>04:00 PM</option>
                                                <option value="04:30 PM" {{ $data->end_time == '04:30 PM' ? 'selected' : '' }}>04:30 PM</option>
                                                <option value="05:00 PM" {{ $data->end_time == '05:00 PM' ? 'selected' : '' }}>05:00 PM</option>
                                                <option value="05:30 PM" {{ $data->end_time == '05:30 PM' ? 'selected' : '' }}>05:30 PM</option>
                                                <option value="06:00 PM" {{ $data->end_time == '06:00 PM' ? 'selected' : '' }}>06:00 PM</option>
                                                <option value="06:30 PM" {{ $data->end_time == '06:30 PM' ? 'selected' : '' }}>06:30 PM</option>
                                                <option value="07:00 PM" {{ $data->end_time == '07:00 PM' ? 'selected' : '' }}>07:00 PM</option>
                                                <option value="07:30 PM" {{ $data->end_time == '07:30 PM' ? 'selected' : '' }}>07:30 PM</option>
                                                <option value="08:00 PM" {{ $data->end_time == '08:00 PM' ? 'selected' : '' }}>08:00 PM</option>
                                                <option value="08:30 PM" {{ $data->end_time == '08:30 PM' ? 'selected' : '' }}>08:30 PM</option>
                                                <option value="09:00 PM" {{ $data->end_time == '09:00 PM' ? 'selected' : '' }}>09:00 PM</option>
                                                <option value="09:30 PM" {{ $data->end_time == '09:30 PM' ? 'selected' : '' }}>09:30 PM</option>
                                                <option value="10:00 PM" {{ $data->end_time == '10:00 PM' ? 'selected' : '' }}>10:00 PM</option>
                                                <option value="10:30 PM" {{ $data->end_time == '10:30 PM' ? 'selected' : '' }}>10:30 PM</option>
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
    <label for="whatsapp_link" class="mt-2"> Whatsapp group link</label>
    <input type="text" name="whatsapp_link" class="form-control @error('whatsapp_link') is-invalid @enderror" placeholder="Whatsapp Link" value="{{ old('whatsapp_link', isset($data) ? $data->whatsapp_link : '') }}">
    @error('whatsapp_link')
        <span class="invalid-feedback form-invalid fw-bold" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<!-- <div class="form-group col-md-6">
    <label for="meeting_link" class="mt-2"> Webinar Meeting Link</label>
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

                        
                            <!-- @if(isset($wibinerSessions))
                                @foreach($wibinerSessions as $index => $wibinerSession)
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="session_will_cover" class="mt-2">Session Will Cover<span class="text-danger">*</span></label>
                                            <div>Heading</div>
                                            <input type="text" name="heading[{{ $index }}][heading]" class="form-control @error('heading') is-invalid @enderror" placeholder=" " value="{{ old('inputs.'.$index.'.heading', $wibinerSession->heading) }}" required>
                                            @error('inputs.'.$index.'.heading')
                                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                            <div>Defination</div>  
                                            <input type="text" name="definition[{{ $index }}][definition]" class="form-control mb-4 @error('definition') is-invalid @enderror" placeholder=" " value="{{ old('inputs.'.$index.'.definition', $wibinerSession->definition) }}" required>
                                            @error('inputs.'.$index.'.definition')
                                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                        @if($index > 0)
                                            <div class="d-flex justify-content-end">
                                                <button  type="button" class="btn btn-danger  DeleteRow"><i class="bi bi-trash-fill"></i> Remove</button>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                    <div class ="row">
                                        <div class="form-group col-md-6">
                                            <div id="newinput"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="d-flex justify-content-end">
                                                <button id="session_will_cover" type="button" class="btn btn-warning" data-count="{{count($wibinerSessions)}}">Add MORE</button>
                                            </div>
                                        </div>
                                    </div>
                            @else
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="session_will_cover" class="mt-2">Session Will Cover<span class="text-danger">*</span></label>
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
                                        <button id="session_will_cover" type="button" class="btn btn-warning">ADD MORE</button>
                                    </div>
                                </div>
                            </div>
                            @endif




                          @if(isset($wibinerWillLearn))
                            @foreach($wibinerWillLearn as $index => $wibinerSession)
                                <div class="row" id="youWillLearnRow{{ $index }}">
                                    <div class="form-group col-md-6">
                                        <label for="you_Will_learn_input_{{ $index }}" class="mt-2">You Will Learn<span class="text-danger">*</span></label>
                                        <input type="text" id="you_Will_learn_input_{{ $index }}" name="title[{{ $index }}][title]" class="form-control @error('you_Will_learn.'.$index.'.title') is-invalid @enderror" placeholder=" " value="{{ old('titles.'.$index.'.title', $wibinerSession->title) }}" required>
                                        @error('you_Will_learn.'.$index.'.title')
                                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                    @if($index > 0)
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-danger removeYouWillLearn" data-row="{{ $index }}"> <i class="bi bi-trash-fill"></i>Remove</button>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            <div class ="row">
                                    <div class="form-group col-md-6 ">
                                        <div id="youWillLearnFieldsContainer"></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="d-flex justify-content-end">
                                            <button id="add_more_you_will_learn" type="button" class="btn btn-warning" data-count="{{count($wibinerWillLearn)}}">Add MORE</button>
                                        </div>
                                    </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="you_Will_learn_input" class="mt-2"><span class="text-danger">*</span></label>
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





                            @if(isset($wibinerItFor))
                            @foreach($wibinerItFor as $index => $wibinerSession)
                                <div class="row" id="whoIsItForRow{{ $index }}">
                                    <div class="form-group col-md-6">
                                        <label for="who_is_it_for_{{ $index }}" class="mt-2">Who is it For<span class="text-danger">*</span></label>
                                        <input type="text" id="who_is_it_for_{{ $index }}" name="who_title[{{ $index }}][who_title]" class="form-control @error('who_titles.'.$index.'.who_title') is-invalid @enderror" placeholder=" " value="{{ old('who_titles.'.$index.'.who_title', $wibinerSession->who_title) }}" required>
                                        @error('who_titles.'.$index.'.who_title')
                                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                    @if($index > 0)
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-danger removeWhoIsItFor" data-row="{{ $index }}">Remove</button>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            <div class ="row">
                                <div class="form-group col-md-6 ">
                                    <div id="youWillLearnFieldswhoIsItFor"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="d-flex justify-content-end">
                                    <button id="who_it_for" type="button" class="btn btn-warning" data-count="{{count($wibinerItFor)}}">Add MORE</button>
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
                           <!------ Edit Webinar Review images ----->
                           <div class="mt-3 mb-2">
                            <hr class="border-dark">
                        </div> 
                                <div class="row">
                                    <div class="form-group">
                                        <label for="name" class="mt-2">Overview <span
                                                class="text-danger">*</span></label>
                                        <textarea name="overview" class="ckeditor @error('overview') is-invalid @enderror"
                                            id="ckeditor">{{ $data->overview }}</textarea>
                                        @error('overview')
                                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 mt-5">
                                        <div id="image_fields">
                                            @foreach($webinarimages as $keys => $webinarimagessssss)
                                           
                                            @if ($webinarimagessssss->image == 'https://projectstaging.live/uploads')
                                            
                                        @else
                                        <div class="RemoveImageRomve" data-row="{{ $keys }}">
                                         <label for="image" class="mt-2">Review Image<span class="text-danger">*</span></label>
                                            <!-- <input type="file" name="image[{{ $keys }}][image]" class="form-control @error('image') is-invalid @enderror" placeholder=" " value="{{ old('image', isset($webinarimagessssss) ? $webinarimagessssss->image : '') }}"> -->
                                            @error('image')
                                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                            @if(isset($webinarimagessssss->image))
                                                <img src="{{ asset($webinarimagessssss->image) }}" alt="Current Image" style="max-width: 200px;">
                                            @endif
                                            
                                            <div class="form-group col-md-6 mt-4">
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-danger removeImage" data-id="{{$webinarimagessssss->id}}"><i class="bi bi-trash-fill"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-md-6 mt-4">
                                            <label for="image" class="mt-2">Review Image Add<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="d-flex justify-content-end">
                                                <button type="button" id="add_image" class="btn btn-warning">Add More</button>
                                            </div>
                                        </div>
                                        <div id="Addimage"></div>
                                       
                                    </div>
                                </div>





                                <div class="row">
                                           
                                <div class="form-group col-md-6 mt-4">
                                        <div id="image_fields">
                                            
                                            @foreach($webinarvideos as $keys => $webinarvideo)
                                            @if ($webinarvideo->video != null)

                                                <div class="RemoveVideoRomve" data-row="{{ $keys }}">
                                                    <!-- <input type="file" name="video[{{ $keys }}][video]" class="form-control @error('video') is-invalid @enderror" placeholder=" " value="{{ old('video', isset($webinarvideo) ? $webinarvideo->video : '') }}"> -->
                                                
                                                @error('video')
                                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                                @if(isset($webinarvideo->video))
                                                <video width="200" height="160" controls>
                                                        <source src="{{ url(config('app.uploads')).'/'.$webinarvideo->video ?? '' }}">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                    
                                                    @endif
                                                <div class="form-group col-md-6">
                                                    <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-danger removeVideo" data-id="{{$webinarimagessssss->id}}">
                                          <i class="bi bi-trash-fill"></i>
                                            </button>  
                                                    </div>
                                                </div>
                                                <!-- </div> -->
                                                @else
                                                @endif

                                                @endforeach
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <div class="row">
                                        <div class="form-group col-md-6">
                                          <label for="image" class="mt-2">Review Add Video<span class="text-danger">*</span></label>
                                            </div>
                                          <div id="Addvideo"></div>
                                          <div class="d-flex justify-content-end">
                                                 <button type="button" id="add_video" class="btn btn-warning">Add More</button>
                                            </div>
                                        </div>
                                       </div>


                        


<!-- <div class="row">
    <hr class="border-dark">
    <div class="form-group col-md-6">
        <label for="image" class="mt-2">Review Add Video<span class="text-danger">*</span></label>
    </div>
    <div class="form-group col-md-6">
        <div class="d-flex justify-content-end">
            <button type="button" id="add_video" class="btn btn-warning">Add More</button>
        </div>
    </div>
    <div id="Addvideo"></div>
</div> -->



        <!------ Edit Webinar Review videos ----->

                             </div> 
                                <div class="row">
                                    <div class="form-group">
                                        <label for="name" class="mt-2">Event Description <span
                                                class="text-danger">*</span></label>
                                        <textarea name="description" class="ckeditor @error('description') is-invalid @enderror"
                                            id="ckeditor">{{ $data->description }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ old('status', isset($data) && $data->status == '1' ? 'selected' : '') }}>Publish</option>
                                            <option value="0" {{ old('status', isset($data) && $data->status == '0' ? 'selected' : '') }}>Unpublish </option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="row mt-5">
                               <div class="col">
                                 <input class="btn btn-primary" type="submit" value="{{ isset($data) ? 'Update' : 'Save' }}">
                                 <td> 
                                 <button class="btn btn-secondary" id="preview-button" type="button">Preview</button>
                                </td>
                                </div>
                            </div>

                </form>
                        <form method="POST" action="{{route('webinars.session.recording.update',$data->id)}}">
    @csrf <!-- This generates a CSRF token for security -->
    <div class="col-md-6 mt-5"> <!-- Added mt-5 for top margin spacing -->
        <div class="form-group">
            <label>Session Recording <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('session_recording') is-invalid @enderror"
                name="webinar_session_recording" value="{{$data->webinar_session_recording}}" placeholder="webinar_session_recording">
            @error('session_recording')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary  mt-3">Update</button>
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
$(document).ready(function() {
    var sessionCount = $('#session_will_cover').data('count');
    
    // Add session input fields
    $("#session_will_cover").click(function () {
        sessionCount++;
        var newRow = `
            <div class="rowWrapper">
                <div class="row">
                    <div class="text-end">
                        <button class="btn btn-danger DeleteRow" type="button">
                            <i class="bi bi-trash-fill"></i> Remove
                        </button>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="heading" class="mt-2">Heading</label>
                        <input type="text" name="heading[${sessionCount - 1}][heading]" class="form-control m-input heading-input">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="definition" class="mt-2">Defination</label>
                        <input type="text" name="definition[${sessionCount - 1}][definition]" class="form-control m-input definition-input">
                    </div>
                </div>
            </div>`;
        $('#newinput').append(newRow);
    });
  
   


    // Remove session input fields
    $("body").on("click", ".DeleteRow", function () {
        $(this).closest(".rowWrapper").remove();
    });

   
    // Add more "Who is it For" input fields
    $("#add_more_who_is_it_for").click(function() {
        addInputField('youWillLearnFieldswhoIsItFor', 'who_title[]');
    });

    function addInputField(containerId, fieldName) {
        var newInputField = `
            <div class="row youWillLearnRow">
                <div class="form-group col-md-6">
                    <input type="text" name="${fieldName}" class="form-control" placeholder=" ">
                </div>
                <div class="form-group col-md-6">
                    <button class="btn btn-danger removeYouWillLearn" type="button">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </div>
            </div>`;
        $("#" + containerId).append(newInputField);
    }

    // Remove "You Will Learn" input fields
    $("body").on("click", ".removeYouWillLearn", function() {
        $(this).closest(".youWillLearnRow").remove();
    });
});
</script> -->


<!-- <script>
$(document).ready(function() {
    // Function to add a new "You Will Learn" input field
    function addYouWillLearnField(containerId, fieldName) {
    var newInputField = `
        <div class="row youWillLearnRow mt-3 mb-3">
            <div class="form-group col-md-12">
                <input type="text" name="${fieldName}" class="form-control" placeholder=" ">
            </div>
            <div class="form-group col-md-6">
                <button class="btn btn-danger removeYouWillLearn" type="button">
                    <i class="bi bi-trash-fill"></i> Remove
                </button>
            </div>
        </div>`;
    $("#" + containerId).append(newInputField);
}


    // Add more "You Will Learn" input fields
    $("#add_more_you_will_learn").click(function() {
    var count = $('#add_more_you_will_learn').data('count');
    addYouWillLearnField('youWillLearnFieldsContainer', 'title['+ count +'][title]');
    $('#add_more_you_will_learn').data('count', count + 1); // Update the count data attribute
});


    // Remove "You Will Learn" input fields
    $("body").on("click", ".removeYouWillLearn", function() {
        $(this).closest(".youWillLearnRow").remove();
    });

    // Ensure correct initial setup for existing "You Will Learn" sections
    $(".removeYouWillLearn").each(function() {
        var index = $(this).closest('.youWillLearnRow').index();
        if (index === 0) {
            $(this).remove(); // Remove remove button for the first section
        }
    });
});

</script> -->


<!-- <script>
$(document).ready(function() {
    // Function to add a new "You Will Learn" input field
    function addYouWillLearnField(containerId, fieldName) {
    var newInputField = `
        <div class="row youWillLearnRow mt-3 mb-3">
            <div class="form-group col-md-12">
            <div>
                <input type="text" name="${fieldName}" class="form-control" placeholder=" ">
            </div>
            </div>
            <div class="form-group col-md-6">
                <button class="btn btn-danger removeYouWillLearn" type="button">
                    <i class="bi bi-trash-fill"></i> Remove
                </button>
            </div>
        </div>`;
    $("#" + containerId).append(newInputField);
}


    // Add more "You Will Learn" input fields
    $("#who_it_for").click(function() {
    var count = $('#who_it_for').data('count');
    addYouWillLearnField('youWillLearnFieldswhoIsItFor', 'who_title['+ count +'][who_title]');
    $('#who_it_for').data('count', count + 1); // Update the count data attribute
});


    // Remove "You Will Learn" input fields
    $("body").on("click", ".removeYouWillLearn", function() {
        $(this).closest(".youWillLearnRow").remove();
    });

    // Ensure correct initial setup for existing "You Will Learn" sections
    $(".removeYouWillLearn").each(function() {
        var index = $(this).closest('.youWillLearnRow').index();
        if (index === 0) {
            $(this).remove(); // Remove remove button for the first section
        }
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
var form = document.getElementById("basic-form");
document.getElementById("preview-button").addEventListener("click", function () {
    $('.Privewcheck').val('preview');
  form.submit();
});
</script>
<!--  Add Webinar reviews images Script Start  -->

<script>
   $(document).ready(function() { 
    var image = 1;
    $("#add_image").click(function() {
      image++;
        var newInputField = '<div class="RemoveImageRomve mt-3 mb-3">' + 
            '<div class="form-group col-md-6">' +
            ' <label for="image1">Review Image </label>'+
            '<input type="file" name="image[]" class="form-control" placeholder=" ">' +
            '</div>' +
            '<div class="form-group col-md-6">' +
            '<button class="btn btn-danger removeImage" type="button">' +
            '<i class="bi bi-trash-fill"></i>' +
            '</button>' +
            '</div>' +
            '</div>';
        $("#Addimage").append(newInputField);
    });
    $("body").on("click", ".removeImage", function() {
      $(this).closest(".RemoveImageRomve").remove();
   });
});
</script>
<script>
   $(document).ready(function() {
        $('.removeImage').click(function(){
            var id = $(this).data('id');
            $.ajax({
                type: "get",
                url: "{{ route('remove-webinar-review-image') }}",
                data: { 
                    imageId: id 
                },
                success: function(response){
                    $(this).closest('.RemoveImageRomve').remove();
                }
            });
        });
    });
</script>



<!--  Add Webinar reviews images Script End  -->

<!--  Add Webinar reviews Video Script start  -->
<script>
   $(document).ready(function() { 
    var video = 1;
    $("#add_video").click(function() {
      video++;
        var newInputField = '<div class="RemoveVideoRomve mt-3 mb-3">' + 
            '<div class="form-group col-md-6">' +
            ' <label for="video1">Review Video </label>'+
            '<input type="file" name="video[]" class="form-control" placeholder=" ">' +
            '</div>' +
            '<div class="form-group col-md-6">' +
            '<button class="btn btn-danger removeVideo" type="button">' +
            '<i class="bi bi-trash-fill"></i>' +
            '</button>' +
            '</div>' +
            '</div>';
        $("#Addvideo").append(newInputField);
    });
    $("body").on("click", ".removeVideo", function() {
      $(this).closest(".RemoveVideoRomve").remove();
   });
});
</script>
<script>
   $(document).ready(function() {
        $('.removeVideo').click(function(){
            var id = $(this).data('id');
            $.ajax({
                type: "get",
                url: "{{ route('remove-webinar-review-video') }}",
                data: { 
                    videoId: id 
                },
                success: function(response){
                    $(this).closest('.RemoveVideoRomve').remove();
                }
            });
        });
    });
</script>

<!--  Add Webinar reviews Video Script end  -->
@endsection