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
                                <h5> {{ isset($data) && isset($data->id) ? 'Edit Permission' : 'Create Permission' }}</h5>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="row float-end">
                                        <div class="col-xl-12 d-flex float-end">
                                        <a href="{{route('permissions.index')}}" class="btn btn-primary btn-wave waves-effect waves-light me-2">
                                       Back </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="card-body">

                        <form action="{{route('permissions.store')}}" method="POST" enctype="multipart/form-data"
                            id="basic-form">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ isset($data) ? $data->id : '' }}">

                            <div class="form-group">
                                <label for="name" class="mt-2"> Title <span class="text-danger">*</span></label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                                    value="{{ old('title', isset($data) ? $data->title : '') }}" required>
                                @error('title')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name" class="mt-2"> Route Name <span class="text-danger">*</span></label>
                                <input type="text" name="route_name"
                                    class="form-control @error('route_name') is-invalid @enderror" placeholder="route_name"
                                    value="{{ old('route_name', isset($data) ? $data->route_name : '') }}" required>
                                @error('route_name')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
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