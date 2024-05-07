@extends('layouts.app')
@section('content')
<div class="content-wrapper">
   <!-- Content -->
   <div class="container-xxl flex-grow-1 container-p-y">
      @if(Session::has('success'))
      @section('scripts')
      <script>
         swal("Good job!", "{{ Session::get('success') }}", "success");
      </script>
      @endsection
      @endif
      @if(Session::has('error'))
      @section('scripts')
      <script>
         swal("Oops...", "{{ Session::get('error') }}", "error");
      </script>
      @endsection
      @endif
      <style>
      </style>
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header ">
                  <div class="row">
                     <div class="col-xl-6 col-md-6 mt-auto">
                        <h5>{{ isset($data) && isset($data->id) ? 'Edit Role' : 'Create Role' }}</h5>
                     </div>
                     <div class="col-xl-6 col-md-6">
                        <div class="row float-end">
                           <div class="col-xl-12 d-flex float-end">
                              <a href="{{route('roles.index')}}" class="btn btn-primary btn-wave waves-effect waves-light me-2">
                              Back </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data"
                     id="basic-form">
                     @csrf
                     <input type="hidden" name="id" id="id" value="{{ isset($data) ? $data->id : '' }}">
                     <div class="form-group">
                        <label for="name" class="mt-2"> Title <span class="text-danger">*</span></label>
                        <input type="text" name="name"
                           class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                           value="{{ old('title', isset($data) ? $data->name : '') }}" required>
                        @error('title')
                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                        {{ $message }}
                        </span>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label class="mt-2"> Permissions <span class="text-danger">*</span></label>
                        <div>
                           @php
                           $count = 0;
                           @endphp
                           @foreach($permissions as $key => $value)
                           @if($count % 4 == 0)
                           <div class="row">
                              @endif
                              <div class="col-md-3">
                                 <div class="form-check">
                                    <input type="checkbox" name="permissions[]" id="permission_{{ $key }}" value="{{ $key }}" class="form-check-input custom-checkbox"
                                    {{ (in_array($key, old('permissions', [])) || isset($data) && $data->permissions->contains($key)) ? 'checked' : '' }} style="border: 1px solid #000;">
                                    <label class="form-check-label" for="permission_{{ $key }}">{{ $value }}</label>
                                 </div>
                              </div>
                              @php
                              $count++;
                              @endphp
                              @if($count % 4 == 0)
                           </div>
                           @endif
                           @endforeach
                           @if($count % 4 != 0)
                        </div>
                        @endif
                     </div>
                     @error('permissions')
                     <span class="invalid-feedback form-invalid fw-bold" role="alert">{{ $message }}</span>
                     @enderror
               </div>
               <div class="mt-3">
               {{ auth()->user()->roles->pluck('name')->first() }}
               
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