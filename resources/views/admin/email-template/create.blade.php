@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
       
        <div class="row">
            <div class="col-lg-12">

            <div class="card">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 mt-auto">
                                <h5>{{ isset($data) && isset($data->id) ? 'Edit Email Template' : 'Create Email Template' }}</h5>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="row float-end">
                                        <div class="col-xl-12 d-flex float-end">
                                        <a href="{{route('emails.index')}}" class="btn btn-primary btn-wave waves-effect waves-light me-2">
                                       Back </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="card-body">
                        <form action="{{ route('emails.store') }}" method="POST" enctype="multipart/form-data" id="basic-form">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ isset($data) ? $data->id : '' }}">
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="mt-2"> From Name <span class="text-danger">*</span></label>
                                    <input type="text" name="from_name" class="form-control @error('from_name') is-invalid @enderror" placeholder="From Name" value="{{ old('from_name', isset($data) ? $data->from_name : '') }}" required>
                                    @error('from_name')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name" class="mt-2"> From Email <span class="text-danger">*</span></label>
                                    <input type="text" name="from_email" class="form-control @error('from_email') is-invalid @enderror" placeholder="From Email" value="{{ old('from_email', isset($data) ? $data->from_email : '') }}" required>
                                    @error('from_email')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="mt-2"> Email Category <span class="text-danger">*</span></label>
                                    <input type="text" name="email_category" class="form-control @error('email_category') is-invalid @enderror" placeholder="Email Key" value="{{ old('email_category', isset($data) ? $data->email_category : '') }}" required>
                                    @error('email_category')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name" class="mt-2"> Email Subject <span class="text-danger">*</span></label>
                                    <input type="text" name="email_subject" class="form-control @error('email_subject') is-invalid @enderror" placeholder="Email Subject" value="{{ old('email_subject', isset($data) ? $data->email_subject : '') }}" required>
                                    @error('email_subject')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                              <label for="name" class="mt-2"> Email Content <span class="text-danger">*</span></label>
                                  <textarea name="content" class="ckeditor @error('content') is-invalid @enderror" id="ckeditor" required="required">{{ empty(old('content')) ? (isset($data) ? $data->email_content : '') : old('content') }}</textarea>
                                @error('content')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror

                                <!-- <div id="editor" name="content" class="ckeditor @error('content') is-invalid @enderror" id="ckeditor" required="required">{{ empty(old('content')) ? (isset($data) ? $data->email_content : '') : old('content') }} >
                                    </div> -->
                            </div>
          <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="mt-2"> Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control form-select @error('status') is-invalid @enderror" required>
                                        <option value="" {{ old('status') ? ((old('status') == '') ? 'selected' : '' ) : ( (isset($data) && $data->status == 0) ? 'selected' : '' ) }} >Select Status</option>
                                        <option value="1" {{ old('status') ? ((old('status') == 1) ? 'selected' : '' ) : ( (isset($data) && $data->status == 1) ? 'selected' : '' ) }} >Active</option>
                                        <option value="0" {{ old('status') ? ((old('status') == 0) ? 'selected' : '' ) : ( (isset($data) && $data->status == 0) ? 'selected' : '' ) }} >In-Active</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mt-3">
                                <input class="btn btn-primary" type="submit" value="{{ isset($data) && isset($data->id) ? 'Update' : 'Save' }}">
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