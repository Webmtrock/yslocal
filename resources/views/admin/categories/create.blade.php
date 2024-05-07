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
                                <h5>{{ isset($data) && isset($data->id) ? 'Edit Create Categories' : 'Create Categories' }}</h5>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="row float-end">
                                        <div class="col-xl-12 d-flex float-end">
                                        <a href="{{route('categories.index')}}" class="btn btn-primary btn-wave waves-effect waves-light me-2">
                                       Back </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="card-body">

                        <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data"
                            id="basic-form">
                            @csrf
                            <div class="row">
                            <input type="hidden" name="id" id="id" value="{{ isset($data) ? $data->id : '' }}">

                                <div class="form-group col-6">
                                    <label>Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" id="title" placeholder="Enter the Title" value="{{ old('title', $data->title ?? '') }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                <label>Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug', $data->slug ?? '') }}" >
                                    </div>
                                   

                            
                                    <div class="form-group col-md-6">
                            <label for="Status" class="mt-2">Status</label>
                            <select class="form-select" aria-label="Default select example" name="status" required>
    <option value="0" {{ isset($data) && isset($data['status']) && $data['status'] == 0 ? 'selected' : '' }}>Inactive</option>
    <option value="1" {{ isset($data) && isset($data['status']) && $data['status'] == 1 ? 'selected' : '' }}>Active</option>
             </select>
                     </div>
                                <div class="row ">
                                    <div class="form-group col-md-6">
                                    
                                    @if(!empty($data->category_image))
                                    <div class="mt-3">
                                        <span class="pip" data-title="{{$data->category_image}}">
                                            <img src="{{ url(config('app.category-image')).'/'.$data->category_image ?? '' }}"
                                                alt="" width="150" height="100">
                                        </span>
                                    </div>
                                    @endif
                                    <label for="name" class="mt-2">Category Image <span class="text-danger info">(Only
                                            jpeg, png, jpg files allowed)</span></label>
                                    <input type="file" name="category_image"
                                        class="form-control @error('category_image') is-invalid @enderror"
                                        accept="image/jpeg,image/png" >
                                    <input type="hidden" class="form-control" name="category_imageOld"
                                        value="{{ isset($data) ? $data->category_image : ''}}">
                                    @error('category_image')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-md-6">
                                    @if(!empty($data->category_image_thumbnail))
                                    <div class="mt-3">
                                        <span class="pip" data-title="{{$data->category_image_thumbnail}}">
                                            <img src="{{ url(config('app.category-image-thumbnail')).'/'.$data->category_image_thumbnail ?? '' }}"
                                                alt="" width="150" height="100">
                                        </span>
                                    </div>
                                    @endif
                                    <label for="name" class="mt-2">Category Image Thumbnail <span class="text-danger info">(Only
                                            jpeg, png, jpg files allowed)</span></label>
                                    <input type="file" name="category_image_thumbnail"
                                        class="form-control @error('category_image_thumbnail') is-invalid @enderror"
                                        accept="image/jpeg,image/png" >
                                    <input type="hidden" class="form-control" name="category_image_thumbnailOld"
                                        value="{{ isset($data) ? $data->category_image_thumbnail : ''}}">
                                    @error('category_image_thumbnail')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <!-- <div class="form-group col-md-6">
                                    <div class="row">
                                         <div class="col-md-7">
                                            <label for="name" class="mt-2">category image <span class="text-danger info">(Only jpeg, png, jpg files allowed)</span></label>
                                            <input type="file" name="category_image" class="form-control @error('category_image') is-invalid @enderror" accept="image/jpeg,image/png">
                                            <input type="hidden" class="form-control" name="category_image_old" value="">
                                             @error('category_image')
                                             <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                {{ $message }}
                                            </span>
                                             @enderror
                                            </div>
                                            <div class="col-md-5 mt-auto">
                                                @if(!empty($data['category_image']))
                                                <div class="mt-3">
                                                     <span class="pip" data-title="{{ $data['category_image'] }}">
                                                        <img src="" alt="" width="150" height="50px">
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div> -->


                            <div class="mt-3">
                            <input type="submit" value="submit" class="btn btn-primary mt-3">
                                   
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
