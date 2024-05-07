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
                                    <h5>Create Expert</h5>
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

                        <form action="{{ route('expert.store') }}" method="POST" enctype="multipart/form-data"
                            id="basic-form">

                            @csrf

                            <input type="hidden" name="expert_category_id" id="id"
                                value="{{ isset($data) ? $data->id : '' }}">
           

                                <!-- <div class="form-group col-md-6 ">
                                    <label for="selectExpert" class="mt-2 me-2">Select Expert Category <span class="text-danger">*</span></label>
                                    <button type="button" class="btn btn-primary mb-1 ms-2" data-bs-toggle="modal" data-bs-target="#formmodal" data-bs-whatever="@mdo">+</button>
                                    <select class="form-control flex-grow-1" id="selectExpert" name="expert_category_id">
                                        <option value="">Select Expert Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                
                            </div> -->
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id" class="mt-2">Select Expert Category <span class="text-danger" >*</span></label>
                                    <!-- <button type="button" class="btn btn-primary mb-1 ms-2" data-bs-toggle="modal" data-bs-target="#formmodal" data-bs-whatever="@mdo">+</button> -->
                                    <select class="form-control" id="expert_category_id" name="expert_category_id[]" multiple data-trigger name="choices-multiple-default" placeholder="">
                                        <!-- <option value="">Select Category</option> -->
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"  && in_array($category)>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Expert Name <span class="text-danger">*</span></label>
                                <input type="text" name="name"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value=""
                                    required>
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
                                    value="{{ old('expert_designation', isset($data) ? $data->expert_designation : '') }}"
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
                                    value="{{ old('expert_experience', isset($data) ? $data->expert_experience : '') }}"
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
                                    value="{{ old('expert_qualification', isset($data) ? $data->expert_qualification : '') }}"
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
                                    value="{{ old('expert_language', isset($data) ? $data->expert_language : '') }}"
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
                                        <label for="name" class="mt-2">Upvote Rating  <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="participant_enrolled"
                                            class="form-control @error('participant_enrolled') is-invalid @enderror"
                                            value="{{ old('participant_enrolled', isset($data) ? $data->participant_enrolled : '') }}"
                                            >
                                        @error('participant_enrolled')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                </div>
                        </div>
                        </div>
                                
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="mt-2" > Patients Treated</label>
                                        <input type="number" name=" patients_treated"
                                            class="form-control @error('patients_treated') is-invalid @enderror">
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
                                        <input type="number" name="year_of_experiance"
                                            class="form-control @error('year_of_experiance') is-invalid @enderror"
                                            value="{{ old('year_of_experiance', isset($data) ? $data->year_of_experiance : '') }}"
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
                                    <div class="form-group">
                                        <label for="name" class="mt-2" >Video Link<span
                                                class="text-danger">*</span> <span style="color:#ff0000"></span></label>
                                        <input type="text" name="profile_video"
                                            class="form-control @error('profile_video') is-invalid @enderror">
                                        @error('profile_video')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror

                                    </div>
                                </div>

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
                                </div>
                             
                            </div>
                        </div>
                           <div class="mt-3 mb-2">
                               <hr class="border-dark">
                           </div>
                           <div class="row">
                            <div class="form-group">
                                <label for="name" class="mt-2">Expert Description <span  class="text-danger">*</span></label>
                                <textarea name="expert_description" class="ckeditor @error('expert_description') is-invalid @enderror"
                                            id="ckeditor"></textarea>
                                        @error('expert_description')
                                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
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


                            <div class="mt-3">
                                <input class="btn btn-primary" type="submit"
                                    value="{{ isset($data) ? 'Update' : 'Save' }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
                       
                       <div class="card-body">
                           <!-- <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal"
                                   data-bs-target="#formmodal" data-bs-whatever="@mdo">+
                                   </button> -->
                          
                           <div class="modal fade" id="formmodal" tabindex="-1"
                               aria-labelledby="exampleModalLabel" aria-hidden="true">
                               <div class="modal-dialog">
                                   <div class="modal-content">
                                       <div class="modal-header text-center">
                                           <h5 class="modal-title " id="exampleModalLabel">Create New Category</h5>
                                           <button type="button" class="btn-close" data-bs-dismiss="modal"
                                               aria-label="Close"></button>
                                       </div>
                                       <div class="modal-body">
                                           <form>
                                               <div class="mb-3">
                                                   <input type="text" class="form-control" id="recipient-name" placeholder="Create New Category">
                                               </div>
                                              
                                           </form>
                                       </div>
                                       <div class="modal-footer">
                                           <button type="button" class="btn btn-primary">Add Category</button>
                                           
                                           <button type="button" class="btn btn-secondary float-end" data-bs-dismiss="modal">Cancel</button>

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
