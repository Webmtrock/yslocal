@extends('layouts.app')
@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 mt-auto">
                                <h5>Update Webinar Session</h5>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="row float-end">
                                        <div class="col-xl-12 d-flex float-end">
                                        <a href="{{route('webinar.session_list',$data->webinar_id)}}" class="btn btn-primary btn-wave waves-effect waves-light me-2">
                                       Back </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="card-body">
                    <form  action="{{route('webinar.session_update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$data->webinar_id}}" name="webinar_id">
                            <div class="row mt-2">
                                <div class="form-group col-md-6">
                                    <label for="date" class="mt-2">Event Start Date <span class="text-danger">*</span></label>
                                    <input type="date" name="webinar_start_date" class="form-control @error('webinar_start_date') is-invalid @enderror" placeholder="Webinar Start Date" value="{{ old('webinar_start_date', isset($data) ? $data->webinar_start_date : '') }}" required>
                                    @error('webinar_start_date')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 mt-auto">
                                    <label for="name" class="mt-2">On Which Day <span class="text-danger">*</span></label>
                                    <select class="form-control" id="selectExpert" name="day">
                                        <option value="">Select Day</option>
                                        @foreach($weeks as $week)
                                            <option value="{{ $week->id }}" {{ $data->day == $week->id ? 'selected' : '' }}>{{ $week->name }}</option>
                                        @endforeach
                                    </select>
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
                                    <label for="meeting_link" class="mt-2">Meeting Link </label>
                                    <input type="text" name="meeting_link" class="form-control @error('meeting_link') is-invalid @enderror" placeholder="Webinar Meeting Link" value="{{ old('meeting_link', isset($data) ? $data->meeting_link : '') }}">
                                    @error('meeting_link')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="recording_link" class="mt-2">Recording Link </label>
                                    <input type="text" name="recording_link" class="form-control @error('recording_link') is-invalid @enderror" placeholder="Webinar Meeting Link" value="{{ old('recording_link', isset($data) ? $data->recording_link : '') }}">
                                    @error('recording_link')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Session Resource <span class="text-danger">*</span></label>
                                            <div class="flex items-center border border-black">
                                                <select class="w-full py-2 text-sm px-2 outline-none  rounded-sm border-opacity-50" name="file_type" style="border:none;width:50%">
                                                    <option>Select File Type</option>
                                                    
                                                    <option value="pdf" {{ @$WebinarSessionResource->file_type == 'pdf' ? 'selected' : '' }} >PDF</option>
                                                    <option value="image" {{  @$WebinarSessionResource->file_type == 'image' ? 'selected' : '' }}>IMAGE</option>
                                                </select>
                                               <label class="bg-yellow-500 px-8 font-semibold cursor-pointer hover:scale-90 hover:bg-yellow-300 hover:text-black tracking-wide py-2 rounded-sm text-white">Upload<input  type="file" name="document[]" multiple  class="hidden"></label>
                                               @foreach($allWebinarSessionResource as $valsss) 
                                                @if($valsss->file_type == 'image')
                                                    <img src="{{ asset('uploads/'.$valsss->file_path) }}" alt="" style="height: 82px;width: 94px;" class="img"><strong class="removeImage" data-id="{{$valsss->id}}" style="color:red; margin-left: -12px; position: absolute;">X</strong>
                                                @else
                                                <a href="{{ asset('uploads/'.$valsss->file_path) }}" target="_blank"><button class="btn btn-info" type="button"> View Pdf</button></a>
                                            
                                                @endif
                                               @endforeach
                                            </div>
                                        </div>
                                    </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-success" value="save">Update</button>
                                <!-- <button type="submit" class="btn btn-success" value="save_continue">Save & Continue</button> -->
                            </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

