@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
       
        <div class="row">
            <div class="col-lg-12">

            <div class="card">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 mt-auto">
                                    <h5>Edit Expert</h5>
                                    <!-- {{ isset($data) ? 'Edit webinar' : 'Create webinar' }} -->
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="row float-end">
                                        <div class="col-xl-12 d-flex float-end">
                                        <a href="{{route('expert.index')}}" class="btn btn-primary btn-wave waves-effect waves-light me-2">
                                       Back </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="card-body">

                        
                        <form action="{{ route('expert.update',$expert->id) }}" method="POST"
                            enctype="multipart/form-data" id="update-form">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="expert_category_id" id="id"
                                value="{{old('name',$expert->expert_category_id)}}">
                            
                            <div class="row">
                            <div class="form-group col-md-6">
                                <label for="category_id" class="mt-2">Select Expert Category <span class="text-danger">*</span></label>
                                <select class="form-control" id="expert_category_id" name="expert_category_id[]" multiple data-trigger name="choices-multiple-default" placeholder="">
                                    <!-- <option value="">Select Category</option> -->
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ in_array($category->id, old('expert_category_id', explode(',', $expert->expert_category_id))) ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                                <div class="form-group col-md-6">
                                    <label for="name" class="mt-2"> Expert Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        value="{{old('name',$expert->name)}}" required>
                                    @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name" class="mt-2"> Expert Designation <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="expert_designation"
                                            class="form-control @error('expert_designation') is-invalid @enderror"
                                            value="{{ old('expert_designation', isset($expert) ? $expert->expert_designation : '') }}"
                                            required>
                                        @error('expert_designation')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                <div class="form-group col-md-6">
                                    <label for="name" class="mt-2"> Experience <span class="text-danger">*</span></label>
                                    <input type="text" name="expert_experience"
                                        class="form-control @error('expert_experience') is-invalid @enderror"
                                        value="{{ old('expert_experience', isset($expert) ? $expert->expert_experience : '') }}"
                                        required>
                                    @error('expertDesignation')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                            <div class="form-group col-md-6">
                                    <label for="name" class="mt-2"> Qualification <span class="text-danger">*</span></label>
                                    <input type="text" name="expert_qualification"
                                        class="form-control @error('expert_qualification') is-invalid @enderror"
                                        value="{{ old('expert_qualification', isset($expert) ? $expert->expert_qualification : '') }}"
                                        required>
                                    @error('expertDesignation')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name" class="mt-2"> Expert Language <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="expert_language"
                                        class="form-control @error('expert_language') is-invalid @enderror"
                                        value="{{ old('expert_language', isset($expert) ? $expert->expert_language : '') }}"
                                        required>
                                    @error('expertLanguage')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="mt-2" required> Expert Profile<span
                                                class="text-danger">*</span> <span style="color:#ff0000">(Please upload Image Dimension 400*400)</span></label>
                                        <input type="file" name="expert_profile"
                                            class="form-control @error('expert_profile') is-invalid @enderror">
                                        @error('expert_profile')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="mt-2"> Participant Enroled <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="participant_enrolled" min="0"
                                            class="form-control @error('participant_enrolled') is-invalid @enderror"
                                            value="{{ old('participant_enrolled', $expert->participant_enrolled ?? '') }}"
                                            >
                                        @error('participant_enrolled')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                </div>
                            </div>
                        </div>

                            <div class="mt-3">
                                <span class="pip">
                                    <img src="{{ url(config('app.expert_profile')).'/'.$expert->expert_profile ?? '' }}"
                                        alt="" width="150" height="100">
                                </span>
                            </div>
                                
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="mt-2" > Patients Treated</label>
                                        <input type="number" name=" patients_treated" min="0"
                                            class="form-control @error('patients_treated') is-invalid @enderror"
                                            value="{{ old('patients_treated', $expert->patients_treated ?? '') }}">
                                        @error('patients_treated')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="mt-2">Year Of Experiance <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="year_of_experiance"  min="0"
                                            class="form-control @error('year_of_experiance') is-invalid @enderror"
                                            value="{{ old('year_of_experiance', $expert->year_of_experiance ?? '') }}"
                                            >
                                        @error('year_of_experiance')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group mb-2">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="1" {{ old('status', isset($expert) && $expert->status == '1' ? 'selected' : '') }}>Publish</option>
                                            <option value="0" {{ old('status', isset($expert) && $expert->status == '0' ? 'selected' : '') }}>Unpublish</option>

                                            </select>
                                        </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="mt-2" > Video Link<span
                                                class="text-danger">*</span> <span style="color:#ff0000"></span></label>
                                        <input type="text" name="video_link" min="0"
                                            class="form-control @error('video_link') is-invalid @enderror"
                                            value="{{ old('video_link', $expert->profile_video ?? '') }}">
                                        @error('video_link')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror

                                    </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="mt-2" required> Expert Thumbnail<span
                                                class="text-danger">*</span> <span style="color:#ff0000"></span></label>
                                        <input type="file" name="expert_thumbnail"
                                            class="form-control @error('expert_thumbnail') is-invalid @enderror">
                                        @error('expert_thumbnail')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="mt-3">
                                <span class="pip">
                                    <img src="{{ url(config('app.expert_profile')).'/'.$expert->expert_thumbnail ?? '' }}"
                                        alt="" width="150" height="100">
                                </span>
                            </div>
                            </div>
                        <div class="row">
               <div class="form-group">
        <label for="name" class="mt-2">Expert Description <span class="text-danger">*</span></label>
        <textarea name="expert_description" class="form-control ckeditor @error('expert_description') is-invalid @enderror" id="expert_description" rows="3">{{ old('expert_description', isset($expert) ? $expert->expert_description : '') }}</textarea>
        @error('expert_description')
        <span class="invalid-feedback form-invalid fw-bold" role="alert">{{ $message }}</span>
        @enderror
        </div>
           </div>
           

                                
                            <div class="mt-3">
                                <input class="btn btn-primary" type="submit" value="Edit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#ckeditor'))
    .catch(error => {
        console.error(error);
    });
</script>