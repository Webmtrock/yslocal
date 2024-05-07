@extends('layouts.app') 
@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        {{ isset($data) && isset($data->id) ? 'Edit Profile' : 'Create User' }}
                    </div>
                    <div class="card-body">

                        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data"id="basic-form">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ isset($data) ? $data->id : '' }}">

                           <div class="row">
                                 <div class="form-group col-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', isset($data) ? $data->name : '') }}" name="name" id="name" placeholder="Enter the Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', isset($data) ? $data->email : '') }}" name="email" id="email" placeholder="Enter the email" readonly>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="row">
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
                                        accept="image/jpeg,image/png">
                                    <input type="hidden" class="form-control" name="profileImageOld"
                                        value="{{ isset($data) ? $data->profile_image : ''}}">
                                    @error('profileImage')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row ">
                                                                    <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ old('status', isset($data) && $data->status == '1' ? 'selected' : '') }}>Active</option>
                                        </select>
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