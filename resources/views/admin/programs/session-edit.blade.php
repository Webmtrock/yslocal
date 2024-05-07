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
                <div class="card-header page-title fw-semibold fs-20 mb-0">
                    Edit Program Session
                </div>
                <div class="card-body">
                    <form  action="{{route('programs.session.update',$ProgramSession->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$programId}}" name="program_id">
                       


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><strong>Want to Copy Resources? <span class="text-danger">*</span></strong></label>
                                        <select class="form-control" id="select_program">
                                            <option value="">Select Program</option>
                                            @foreach($programs as $program)
                                                <option value="{{$program->id}}">{{$program->title}}</option>
                                            @endforeach    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4" id="show_batch" style="display:none;" >
                                    <div class="form-group">
                                        <label>Batch Type<span class="text-danger">*</span></label>
                                        <select  class="form-control" id="batch">
                                                
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4" id="show_resorce" style="display:none;" >
                                    <div class="form-group">
                                        <label>Session Resource Type <span class="text-danger">*</span></label>
                                        <select name="show_resorce" class="form-control" id="resorce">
                                                
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 mb-2"> <hr class="border-dark"></div> 
                            <div class="row" id="appendSession">

                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Batch <span class="text-danger">*</span></label>
                                            <select name="batch_id" class="form-control">
                                                <option value="">Select Batch</option>
                                                @foreach($allBatch as $val)
                                                    <option value="{{$val->id}}" {{ $val->id == $ProgramSession->program_batch_id ? 'selected' : '' }}>{{$val->name}}</option>
                                                @endforeach    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Session Recording <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('session_recording') is-invalid @enderror"
                                                name="session_recording" value="{{$ProgramSession->session_recording}}" id="session_recording" placeholder="Session Recording">
                                            @error('session_recording')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
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
                                                    
                                                    <option value="pdf" {{ @$ProgramSessionResource->file_type == 'pdf' ? 'selected' : '' }} >PDF</option>
                                                    <option value="image" {{  @$ProgramSessionResource->file_type == 'image' ? 'selected' : '' }}>IMAGE</option>
                                                </select>
                                               <label class="bg-yellow-500 px-8 font-semibold cursor-pointer hover:scale-90 hover:bg-yellow-300 hover:text-black tracking-wide py-2 rounded-sm text-white">Upload<input  type="file" name="document[]" multiple  class="hidden"></label>
                                               @foreach($allProgramSessionResource as $valsss) 
                                                @if($valsss->file_type == 'image')
                                                    <img src="{{ asset('uploads/'.$valsss->file_path) }}" alt="" style="height: 82px;width: 94px;" class="img"><strong class="removeImage" data-id="{{$valsss->id}}" style="color:red; margin-left: -12px; position: absolute;">X</strong>
                                                @else
                                                <a href="{{ asset('uploads/'.$valsss->file_path) }}" target="_blank"><button class="btn btn-info" type="button"> View Pdf</button></a>
                                            
                                                @endif
                                               @endforeach
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name"> Session Title<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="session_title" value="{{$ProgramSession->session_title}}"
                                            class="form-control @error('session_title') is-invalid @enderror" placeholder="Session Recording" required id="session_title" name="session_title">
                                            @error('session_title')
                                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                            
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Session Duration <span class="text-danger">* (Please add duration in Minutes)</span></label>
                                            <input type="number"
                                                class="form-control @error('session_duration') is-invalid @enderror"
                                                name="session_duration" value="{{$ProgramSession->session_time}}">
                                            @error('session_duration')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label>Start Date <span class="text-danger">*</span></label>
                                            <input type="date" value="{{$ProgramSession->session_startdate}}" required class="form-control @error('start_date') is-invalid @enderror"
                                                name="start_date">
                                            @error('start_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Session Meeting Link <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('meeting_link') is-invalid @enderror"
                                                name="meeting_link" value="{{$ProgramSession->session_meetinglink}}">
                                            @error('meeting_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                
                                   
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Session Start Time <span class="text-danger">*</span></label>
                                            <select name="starttime" class="form-control">
                                                <option>Select Time</option>
                                                <option value="09:00 AM" {{ $ProgramSession->session_starttime == '09:00 AM' ? 'selected' : '' }}>09:00 AM</option>
                                                <option value="09:30 AM" {{ $ProgramSession->session_starttime == '09:30 AM' ? 'selected' : '' }}>09:30 AM</option>
                                                <option value="10:00 AM" {{ $ProgramSession->session_starttime == '10:00 AM' ? 'selected' : '' }}>10:00 AM</option>
                                                <option value="10:30 AM" {{ $ProgramSession->session_starttime == '10:30 AM' ? 'selected' : '' }}>10:30 AM</option>
                                                <option value="11:00 AM" {{ $ProgramSession->session_starttime == '11:00 AM' ? 'selected' : '' }}>11:00 AM</option>
                                                <option value="11:30 AM" {{ $ProgramSession->session_starttime == '11:30 AM' ? 'selected' : '' }}>11:30 AM</option>
                                                <option value="12:00 PM" {{ $ProgramSession->session_starttime == '12:00 PM' ? 'selected' : '' }}>12:00 PM</option>
                                                <option value="12:30 PM" {{ $ProgramSession->session_starttime == '12:30 PM' ? 'selected' : '' }}>12:30 PM</option>
                                                <option value="01:00 PM" {{ $ProgramSession->session_starttime == '01:00 PM' ? 'selected' : '' }}>01:00 PM</option>
                                                <option value="01:30 PM" {{ $ProgramSession->session_starttime == '01:30 PM' ? 'selected' : '' }}>01:30 PM</option>
                                                <option value="02:00 PM" {{ $ProgramSession->session_starttime == '02:00 PM' ? 'selected' : '' }}>02:00 PM</option>
                                                <option value="02:30 PM" {{ $ProgramSession->session_starttime == '02:30 PM' ? 'selected' : '' }}>02:30 PM</option>
                                                <option value="03:00 PM" {{ $ProgramSession->session_starttime == '03:00 PM' ? 'selected' : '' }}>03:00 PM</option>
                                                <option value="03:30 PM" {{ $ProgramSession->session_starttime == '03:30 PM' ? 'selected' : '' }}>03:30 PM</option>
                                                <option value="04:00 PM" {{ $ProgramSession->session_starttime == '04:00 PM' ? 'selected' : '' }}>04:00 PM</option>
                                                <option value="04:30 PM" {{ $ProgramSession->session_starttime == '04:30 PM' ? 'selected' : '' }}>04:30 PM</option>
                                                <option value="05:00 PM" {{ $ProgramSession->session_starttime == '05:00 PM' ? 'selected' : '' }}>05:00 PM</option>
                                                <option value="05:30 PM" {{ $ProgramSession->session_starttime == '05:30 PM' ? 'selected' : '' }}>05:30 PM</option>
                                                <option value="06:00 PM" {{ $ProgramSession->session_starttime == '06:00 PM' ? 'selected' : '' }}>06:00 PM</option>
                                                <option value="06:30 PM" {{ $ProgramSession->session_starttime == '06:30 PM' ? 'selected' : '' }}>06:30 PM</option>
                                                <option value="07:00 PM" {{ $ProgramSession->session_starttime == '07:00 PM' ? 'selected' : '' }}>07:00 PM</option>
                                                <option value="07:30 PM" {{ $ProgramSession->session_starttime == '07:30 PM' ? 'selected' : '' }}>07:30 PM</option>
                                                <option value="08:00 PM" {{ $ProgramSession->session_starttime == '08:00 PM' ? 'selected' : '' }}>08:00 PM</option>
                                                <option value="08:30 PM" {{ $ProgramSession->session_starttime == '08:30 PM' ? 'selected' : '' }}>08:30 PM</option>
                                                <option value="09:00 PM" {{ $ProgramSession->session_starttime == '09:00 PM' ? 'selected' : '' }}>09:00 PM</option>
                                                <option value="09:30 PM" {{ $ProgramSession->session_starttime == '09:30 PM' ? 'selected' : '' }}>09:30 PM</option>
                                                <option value="10:00 PM" {{ $ProgramSession->session_starttime == '10:00 PM' ? 'selected' : '' }}>10:00 PM</option>
                                                <option value="10:30 PM" {{ $ProgramSession->session_starttime == '10:30 PM' ? 'selected' : '' }}>10:30 PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label>Session Description <span class="text-danger">*</span></label>
                                            <textarea id="ckeditor" name="session_description" class="ckeditor form-control @error('session_description') is-invalid @enderror">{{$ProgramSession->session_description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                    <input type="submit" value="Update & Continue" class="btn btn-success">
                                </div>
                                </form>  
                                <form method="POST" action="{{route('programs.session.recording.update',$ProgramSession->id)}}">
    @csrf <!-- This generates a CSRF token for security -->
    <div class="col-md-6 mt-5"> <!-- Added mt-5 for top margin spacing -->
        <div class="form-group">
            <label>Session Recording <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('session_recording') is-invalid @enderror"
                name="session_recording" value="{{$ProgramSession->session_recording}}" id="session_recording" placeholder="Session Recording">
            @error('session_recording')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-success  mt-3">Update</button>
</form>
    </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.removeImage').click(function(){
            var id = $(this).data('id');
            $.ajax({
                type: "get",
                url: "{{route('remove_resorce_image')}}", // Replace "remove_image.php" with the URL of your server-side script to handle image removal
                data: { 
                imageId: id // Pass the ID of the image to be removed
                },
                success: function(response){
                    window.location.reload();
                }
            });
        });
   

        $('#select_program').change(function() {
            $('#show_batch').show();
            $('#resorce').html('');
            var selectedOption = $(this).val();
            $.ajax({
                url: "{{route('append_batch')}}",
                type: 'GET',
                data: {
                    option: selectedOption
                },
                success: function(response) {
                    $('#batch').html(response.html);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('#batch').change(function() {
            $('#show_resorce').show();

            var selectedOption = $(this).val();
            $.ajax({
                url: "{{route('append_resorce')}}",
                type: 'GET',
                data: {
                    option: selectedOption
                },
                success: function(response) {
                    $('#resorce').html(response.html);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

    });

ClassicEditor
    .create(document.querySelector('#ckeditor'))
    .catch(error => {
        console.error(error);
    });
</script>

