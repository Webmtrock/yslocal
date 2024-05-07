@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
            <div class="col-lg-12">
            <div class="card">
            <div class="card-header">
           <div class="row">
        <div class="col-xl-6 col-md-6 mt-auto">
            <!-- <h5>Create User</h5> -->
            <h5>{{ isset($data) ? 'Edit User' : 'Create User' }}</h5>
        </div>
         <div class="col-xl-6 col-md-6">
            <div class="row float-end">
                <div class="col-xl-12 d-flex float-end">
                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-wave waves-effect waves-light me-2">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-body">

                        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data"id="basic-form">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ isset($data) ? $data->id : '' }}">

                           <div class="row">
                                 <div class="form-group col-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', isset($data) ? $data->name : '') }}" name="name" id="name" placeholder="Enter the Name" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', isset($data) ? $data->email : '') }}" name="email" id="email" placeholder="Enter the email" required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                            </div>

                                <div class="row">
                                        <div class="form-group col-6">
                                            <label>Phone</label>
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', isset($data) ? $data->phone : '') }}" name="phone" id="phone" placeholder="Enter the phone" required>
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <!-- <label class="mt-2">Role <span class="text-danger">*</span></label> -->
                                            <label class="mt-2">Role <span class="text-danger">*</span></label>
                                            <!-- <select name="role[]"
                                                class="form-control role select2 form-select @error('role') is-invalid @enderror"required >
                                                <option> Role Type</option>
                                                @foreach($roles as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ (in_array($key, old('role', [])) || isset($data) && $data->roles->contains($key)) ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                                @endforeach

                                            </select> -->
                                            <select name="role[]" class="form-control role select2 form-select @error('role') is-invalid @enderror" required>
                                    <option value="">Role Type</option>
                                    @foreach($roles as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ (in_array($key, old('role', [])) || isset($data) && $data->roles->contains($key)) ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>


                                                @error('role')
                                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror

                                
                                    </div>
                                    <div class="row ">
                                    <div class="form-group col-md-6">
                                    @if(!empty($data->profile_image))
                                    <div class="mt-3">
                                        <span class="pip" data-title="{{$data->profile_image}}">
                                            <img src="{{ url(config('app.profile_image')).'/'.$data->profile_image ?? '' }}"
                                                alt="" width="150" height="100">
                                        </span>
                                    </div>
                                    @endif
                                    <label for="name" class="mt-2"> Profile Image <span class="text-danger info">(Only
                                            jpeg, png, jpg files allowed)</span></label>
                                    <input type="file" name="profileImage"
                                        class="form-control @error('profileImage') is-invalid @enderror"
                                        accept="image/jpeg,image/png" >
                                    <input type="hidden" class="form-control" name="profileImageOld"
                                        value="{{ isset($data) ? $data->profile_image : ''}}">
                                    @error('profileImage')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ old('status', isset($data) && $data->status == '1' ? 'selected' : '') }}>Active</option>
                                            <option value="0" {{ old('status', isset($data) && $data->status == '0' ? 'selected' : '') }}>Inactive</option>
                                        </select>
                                    </div>
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



@endsection
