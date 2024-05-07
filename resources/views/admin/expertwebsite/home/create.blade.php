@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header page-title fw-semibold fs-20 mb-0">
                Section-1 
                </div> 
                <div class="card-body">

                        

                        <form action="{{route('add_section_1')}}" method="POST" enctype="multipart/form-data"
                            id="basic-form">
                            @csrf
                             <input type="hidden" value="{{ $datasecation1->id }}">
                            <input type="hidden" name="secation_type" id="id"
                                value="secation-1">
                        <input type="hidden" value="{{ auth()->user()->id }}" name="expert_id">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Expert Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" name="expert_image"
                                    class="form-control @error('expert_image') is-invalid @enderror"
                                    value="{{ old('expert_image', isset($data) ? $data->expert_image : '') }}"
                                    required>
                                @error('expert_image')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Expert title <span class="text-danger">*</span></label>
                                <input type="text" name="expert_title"
                                    class="form-control @error('expert_title') is-invalid @enderror"
                                    value="{{ old('expert_title', isset($data) ? $datasecation1->expert_title : '') }}"
                                    required>
                                @error('expert_title')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Button Url <span class="text-danger">*</span></label>
                                <input type="url" name="url"
                                    class="form-control @error('url') is-invalid @enderror"
                                    value="{{ old('url', isset($data) ? $data->url : '') }}"
                                    required>
                                @error('url')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2">Button Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="button_name"
                                    class="form-control @error('button_name') is-invalid @enderror"
                                    value="{{ old('button_name', isset($data) ? $data->button_name : '') }}"
                                    required>
                                @error('button_name')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3 mb-2">  
                            <hr class="border-dark"></div> 
                                <div class="row">
                                    <div class="form-group">
                                        <label for="name" class="mt-2">Expert Description <span
                                                class="text-danger">*</span></label>
                                        <textarea name="expert_description" class="ckeditor @error('expert_description') is-invalid @enderror"
                                            id="ckeditor"></textarea>
                                        @error('expert_description')
                                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
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



<!-- ============//Section 2=========== -->

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header page-title fw-semibold fs-20 mb-0">
                Section-2 
                </div>
                <div class="card-body">

                        <form action="{{route('add_section_2')}}" method="POST" enctype="multipart/form-data"
                            id="basic-form">

                            @csrf

                            <input type="hidden" name="secation_type" id="id"
                                value="">
                                <input type="hidden" name="secation_type" id="id"
                                value="secation-2">
                        <input type="hidden" value="{{ auth()->user()->id }}" name="expert_id">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', isset($data) ? $data->title : '') }}"
                                    required>
                                @error('title')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Benefit 1 Button <span class="text-danger">*</span></label>
                                <input type="text" name="button_name"
                                    class="form-control @error('expert_title') is-invalid @enderror"
                                    value="{{ old('expert_title', isset($data) ? $data->expert_title : '') }}"
                                    required>
                                @error('expert_title')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="mt-3 mb-2">  
                           
                                <div class="row">
                                    <div class="form-group">
                                        <label for="name" class="mt-2">Benefit Description <span
                                                class="text-danger">*</span></label>
                                        <textarea name="benifit_description" class="ckeditor @error('benifit_description') is-invalid @enderror"
                                            id="ckeditor"></textarea>
                                        @error('benifit_description')
                                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div> 
                                </div> 

                            <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Benefit 2 Button <span class="text-danger">*</span></label>
                                <input type="text" name="button_2"
                                    class="form-control @error('expert_title') is-invalid @enderror"
                                    value="{{ old('expert_title', isset($data) ? $data->expert_title : '') }}"
                                    required>
                                @error('expert_title')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3 mb-2">  
                           
                           <div class="row">
                               <div class="form-group">
                                   <label for="name" class="mt-2">Benefit Description <span
                                           class="text-danger">*</span></label>
                                   <textarea name="benifit_description" class="ckeditor @error('benifit_description') is-invalid @enderror"
                                       id="ckeditor"></textarea>
                                   @error('benifit_description')
                                       <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                           {{ $message }}
                                       </span>
                                   @enderror
                               </div>
                           </div> 
                           </div> 

                           <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Benefit 3 Button <span class="text-danger">*</span></label>
                                <input type="text" name="button_3"
                                    class="form-control @error('expert_title') is-invalid @enderror"
                                    value="{{ old('expert_title', isset($data) ? $data->expert_title : '') }}"
                                    required>
                                @error('expert_title')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                          <input type="hidden" value="section_1" name="section_1">

                        </div>
                        <div class="mt-3 mb-2">  
                           
                           <div class="row">
                               <div class="form-group">
                                   <label for="name" class="mt-2">Benefit Description <span
                                           class="text-danger">*</span></label>
                                   <textarea name="benifit_description" class="ckeditor @error('benifit_description') is-invalid @enderror"
                                       id="ckeditor"></textarea>
                                   @error('benifit_description')
                                       <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                           {{ $message }}
                                       </span>
                                   @enderror
                               </div>
                           </div> 
                           </div> 

                           <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Benefit 4 Button <span class="text-danger">*</span></label>
                                <input type="text" name="button_4"
                                    class="form-control @error('expert_title') is-invalid @enderror"
                                    value="{{ old('expert_title', isset($data) ? $data->expert_title : '') }}"
                                    required>
                                @error('expert_title')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3 mb-2">  
                           
                           <div class="row">
                               <div class="form-group">
                                   <label for="name" class="mt-2">Benefit Description <span
                                           class="text-danger">*</span></label>
                                   <textarea name="benifit_description" class="ckeditor @error('benifit_description') is-invalid @enderror"
                                       id="ckeditor"></textarea>
                                   @error('benifit_description')
                                       <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                           {{ $message }}
                                       </span>
                                   @enderror
                               </div>
                           </div> 
                           </div> 

                           <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Benefit 5 Button <span class="text-danger">*</span></label>
                                <input type="text" name="button_5"
                                    class="form-control @error('expert_title') is-invalid @enderror"
                                    value="{{ old('expert_title', isset($data) ? $data->expert_title : '') }}"
                                    required>
                                @error('expert_title')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3 mb-2">  
                           
                           <div class="row">
                               <div class="form-group">
                                   <label for="name" class="mt-2">Benefit Description <span
                                           class="text-danger">*</span></label>
                                   <textarea name="benifit_description" class="ckeditor @error('benifit_description') is-invalid @enderror"
                                       id="ckeditor"></textarea>
                                   @error('benifit_description')
                                       <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                           {{ $message }}
                                       </span>
                                   @enderror
                               </div>
                           </div> 
                           </div> 

                           <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Benefit 6 Button <span class="text-danger">*</span></label>
                                <input type="text" name="button_6"
                                    class="form-control @error('expert_title') is-invalid @enderror"
                                    value="{{ old('expert_title', isset($data) ? $data->expert_title : '') }}"
                                    required>
                                @error('expert_title')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3 mb-2">  
                           
                           <div class="row">
                               <div class="form-group">
                                   <label for="name" class="mt-2">Benefit Description <span
                                           class="text-danger">*</span></label>
                                   <textarea name="benifit_description" class="ckeditor @error('benifit_description') is-invalid @enderror"
                                       id="ckeditor"></textarea>
                                   @error('benifit_description')
                                       <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                           {{ $message }}
                                       </span>
                                   @enderror
                               </div>
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



<!-- ==============Section-3  ================= -->


<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header page-title fw-semibold fs-20 mb-0">
                Section-3
                </div>
                <div class="card-body">

                        <form action="{{route('add_section_3')}}" method="POST" enctype="multipart/form-data"
                            id="basic-form">

                            @csrf

                            <input type="hidden" name="secation_type" id="id"
                                value="">
           
                                <input type="hidden" name="secation_type" id="id"
                                value="secation-3">
                        <input type="hidden" value="{{ auth()->user()->id }}" name="expert_id">
                               
                            


                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Expert Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" name="expert_image"
                                    class="form-control @error('expert_image') is-invalid @enderror"
                                    value="{{ old('expert_image', isset($data) ? $data->expert_image : '') }}"
                                    required>
                                @error('expert_image')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Expert title <span class="text-danger">*</span></label>
                                <input type="text" name="expert_title"
                                    class="form-control @error('expert_title') is-invalid @enderror"
                                    value="{{ old('expert_title', isset($data) ? $data->expert_title : '') }}"
                                    required>
                                @error('expert_title')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Button Url <span class="text-danger">*</span></label>
                                <input type="url" name="url"
                                    class="form-control @error('url') is-invalid @enderror"
                                    value="{{ old('url', isset($data) ? $data->url : '') }}"
                                    required>
                                @error('url')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2">Button Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="button_name"
                                    class="form-control @error('button_name') is-invalid @enderror"
                                    value="{{ old('button_name', isset($data) ? $data->button_name : '') }}"
                                    required>
                                @error('button_name')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3 mb-2">  
                            <hr class="border-dark"></div> 
                                <div class="row">
                                    <div class="form-group">
                                        <label for="name" class="mt-2">Expert Description <span
                                                class="text-danger">*</span></label>
                                        <textarea name="expert_description" class="ckeditor @error('expert_description') is-invalid @enderror"
                                            id="ckeditor"></textarea>
                                        @error('expert_description')
                                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
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



<!-- ============//Section 4  Our Program=========== -->

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header page-title fw-semibold fs-20 mb-0">
                Section 4 
                </div>
                <div class="card-body">

                        <form action="{{route('add_section_4')}}" method="POST" enctype="multipart/form-data"
                            id="basic-form">
                            @csrf
                            <input type="hidden" name="secation_type" id="id"
                                value="">
                                <input type="hidden" name="secation_type" id="id"
                                value="secation-4">
                        <input type="hidden" value="{{ auth()->user()->id }}" name="expert_id">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Programs Title<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="program_title"
                                    class="form-control @error('program_title') is-invalid @enderror"
                                    value="{{ old('program_title', isset($data) ? $data->program_title : '') }}"
                                    required>
                                @error('program_title')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> program Description <span class="text-danger">*</span></label>
                                <input type="text" name="program_description"
                                    class="form-control @error('program_description') is-invalid @enderror"
                                    value="{{ old('program_description', isset($data) ? $data->program_description : '') }}"
                                    required>
                                @error('program_description')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Button Url <span class="text-danger">*</span></label>
                                <input type="url" name="url"
                                    class="form-control "
                                    value="">
                                @error('url')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2">Button Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="button_name"
                                    class="form-control @error('button_name') is-invalid @enderror"
                                    value="{{ old('button_name', isset($data) ? $data->button_name : '') }}"
                                    required>
                                @error('button_name')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
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

<!-- ============//Section 5 Our Workshops=========== -->

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header page-title fw-semibold fs-20 mb-0">
                Section 5
                </div>
                <div class="card-body">
                        <form action="{{route('add_section_5')}}" method="POST" enctype="multipart/form-data"
                            id="basic-form">
                            @csrf
                            <input type="hidden" name="secation_type" id="id"
                                value="">
                                <input type="hidden" name="secation_type" id="id"
                                value="secation-5">
                        <input type="hidden" value="{{ auth()->user()->id }}" name="expert_id">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2">Workshops Title<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="workshop_title"
                                    class="form-control @error('workshop_title') is-invalid @enderror"
                                    value="{{ old('workshop_title', isset($data) ? $data->workshop_title : '') }}"
                                    required>
                                @error('workshop_title')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2">Workshop Description <span class="text-danger">*</span></label>
                                <input type="text" name="workshop_description"
                                    class="form-control @error('workshop_description') is-invalid @enderror"
                                    value="{{ old('workshop_description', isset($data) ? $data->workshop_description : '') }}"
                                    required>
                                @error('workshop_description')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Button Url <span class="text-danger">*</span></label>
                                <input type="url" name="url"
                                    class="form-control "
                                    value="">
                                @error('url')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2">Button Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="button_name"
                                    class="form-control @error('button_name') is-invalid @enderror"
                                    value="{{ old('button_name', isset($data) ? $data->button_name : '') }}"
                                    required>
                                @error('button_name')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
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


<!-- ============Section 6=========== -->

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header page-title fw-semibold fs-20 mb-0">
                Section 6
                </div>
                <div class="card-body">

                        <form action="{{route('add_section_6')}}" method="POST" enctype="multipart/form-data"
                            id="basic-form">

                            @csrf

                            <input type="hidden" name="secation_type" id="id"
                                value="">
                                <input type="hidden" name="secation_type" id="id"
                                value="secation-6">
                        <input type="hidden" value="{{ auth()->user()->id }}" name="expert_id">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2">Feature Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="feature_title"
                                    class="form-control @error('feature_title') is-invalid @enderror"
                                    value="{{ old('feature_title', isset($data) ? $data->feature_title : '') }}"
                                    required>
                                @error('feature_title')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Feature image <span class="text-danger">*</span></label>
                                <input type="file" name="expert_image" 
                                class="form-control @error('expert_image') is-invalid @enderror"
                                value="{{ old('expert_image', isset($data) ? $data->fetaure_image : '') }}"
                                required
                                multiple> 

                                @error('fetaure_image')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
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


<!-- ============Section 7=========== -->
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header page-title fw-semibold fs-20 mb-0">
                Section-7
                </div>
                <div class="card-body">

                        <form action="{{route('add_section_7')}}" method="POST" enctype="multipart/form-data"
                            id="basic-form">
                            @csrf
                            <input type="hidden" name="secation_type" id="id"
                                value="">
                                <input type="hidden" name="secation_type" id="id"
                                value="secation-7">
                        <input type="hidden" value="{{ auth()->user()->id }}" name="expert_id">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2">Call Back Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="call_title"
                                    class="form-control @error('call_title') is-invalid @enderror"
                                    value="{{ old('call_title', isset($data) ? $data->call_title : '') }}"
                                    required>
                                @error('call_title')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Call Back Description <span class="text-danger">*</span></label>
                                <input type="text" name="call_description"
                                    class="form-control @error('call_description') is-invalid @enderror"
                                    value="{{ old('call_description', isset($data) ? $data->call_description : '') }}"
                                    required>
                                @error('call_description')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Call Image <span class="text-danger">*</span></label>
                                <input type="file" name="expert_image" 
                                class="form-control @error('expert_image') is-invalid @enderror"
                                value="{{ old('expert_image', isset($data) ? $data->call_image : '') }}"
                                required
                                multiple> 

                                @error('expert_image')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> App Store Image <span class="text-danger">*</span></label>
                                <input type="file" name="app_store_img" 
                                class="form-control @error('app_store_img') is-invalid @enderror"
                                value="{{ old('app_store_img', isset($data) ? $data->app_image : '') }}"
                                required
                                multiple> 

                                @error('app_store_img')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Google store Image <span class="text-danger">*</span></label>
                                <input type="file" name="google_img" 
                                class="form-control @error('google_img') is-invalid @enderror"
                                value="{{ old('google_img', isset($data) ? $data->goggle_image : '') }}"
                                required
                                multiple> 

                                @error('google_img')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Button Url <span class="text-danger">*</span></label>
                                <input type="url" name="url"
                                    class="form-control @error('url') is-invalid @enderror"
                                    value="{{ old('url', isset($data) ? $data->url : '') }}"
                                    required>
                                @error('url')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                           
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2">Button Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="button_name"
                                    class="form-control @error('button_name') is-invalid @enderror"
                                    value="{{ old('button_name', isset($data) ? $data->button_name : '') }}"
                                    required>
                                @error('button_name')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
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


<!-- ============Section 8=========== -->
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header page-title fw-semibold fs-20 mb-0">
                Section-8
                </div>
                <div class="card-body">

                        <form action="{{route('add_section_8')}}" method="POST" enctype="multipart/form-data"
                            id="basic-form">
                            @csrf
                            <input type="hidden" name="secation_type" id="id"
                                value="">
                                <input type="hidden" name="secation_type" id="id"
                                value="secation-8">
                        <input type="hidden" value="{{ auth()->user()->id }}" name="expert_id">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2">Download Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="call_title"
                                    class="form-control @error('call_title') is-invalid @enderror"
                                    value="{{ old('call_title', isset($data) ? $data->call_title : '') }}"
                                    required>
                                @error('call_title')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Description <span class="text-danger">*</span></label>
                                <input type="text" name="description"
                                    class="form-control @error('description') is-invalid @enderror"
                                    value="{{ old('description', isset($data) ? $data->description : '') }}"
                                    required>
                                @error('description')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Download Image <span class="text-danger">*</span></label>
                                <input type="file" name="expert_image" 
                                class="form-control @error('expert_image') is-invalid @enderror"
                                value="{{ old('expert_image', isset($data) ? $data->download_image : '') }}"
                                required
                                multiple> 

                                @error('download_image')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> App Store Image <span class="text-danger">*</span></label>
                                <input type="file" name="app_store_img" 
                                class="form-control @error('app_store_img') is-invalid @enderror"
                                value="{{ old('app_store_img', isset($data) ? $data->app_image : '') }}"
                                required
                                multiple> 

                                @error('app_store_img')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mt-2"> Google store Image <span class="text-danger">*</span></label>
                                <input type="file" name="google_img" 
                                class="form-control @error('google_img') is-invalid @enderror"
                                value="{{ old('google_img', isset($data) ? $data->goggle_image : '') }}"
                                required
                                multiple> 

                                @error('goggle_image')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
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
@endsection
<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#ckeditor'))
    .catch(error => {
        console.error(error);
    });
</script>
