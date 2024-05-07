@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 mt-auto">
                                <h5> @if(isset($video))
                        Edit Video
                    @else
                        Add Video
                    @endif
                        </h5>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="row float-end">
                                        <div class="col-xl-12 d-flex float-end">
                                        <a href="{{route('video.index')}}" class="btn btn-primary btn-wave waves-effect waves-light me-2">
                                       Back </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="card-body">
                    <form id="videoForm" action="{{ isset($video) ? route('video.update', $video->id) : route('video.store') }}" 
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($video))
                            @method('PUT')
                        @endif

                        <div class="row mt-2">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="video_thumbnail">Video Thumbnail<span class="text-danger">*</span></label>
                                        <input type="file" name="video_thumbnail" class="form-control @error('video_thumbnail') is-invalid @enderror"id="video_thumbnail">
                                        @error('video_thumbnail')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                        <span class="text-danger">Video Thumbnail Dimensions Size 850*450</span>
                                        @if (isset($video->video_thumbnail))
                                        <div class="mt-2">
                                            <p>Video Thumbnail</p>
                                            <img src="{{ asset('uploads/videothumbnail/'.$video->video_thumbnail) }}" alt="Current Image"
                                                style="max-width: 200px;">
                                        </div>
                                        @endif
                                    </div>
                                 </div>
                        

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="add_video">Add Video</label>
                                    <input type="file" class="form-control @error('add_video') is-invalid @enderror"
                                           name="add_video">
                                    @error('add_video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    @if(isset($video->add_video))
                                    <div class="mt-2">
                                    @if(!empty($video->add_video))
                                        <p>Video</p>
                                       
                                        <video width="190" height="160px" controls>
                                            <source src="{{ asset('uploads/videos/'.$video->add_video) }}"f
                                                type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class ="row">
                            <div class="col-md-6">
                                <label for="video_link">Video link</label>
                                    <input type="text" class="form-control @error('video_link') is-invalid @enderror"
                                           name="video_link" value="{{ isset($video) ? $video->video_link : old('video_link') }}" placeholder="Enter the Video link">
                                    @error('video_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id" class="mt-2">Select Video Category <span class="text-danger" >*</span></label>
                                    <!-- <option value="">Select Video Category</option> -->
                                    <select class="form-control" id="category_id" name="category_id[]" multiple data-trigger name="choices-multiple-default" >
                                        <option value="">Select Video Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ (is_array(old('category_id')) && in_array($category->id, old('category_id'))) || (isset($video) && in_array($category->id, explode(',', $video->category_id))) ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="video_title">Video Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('video_title') is-invalid @enderror"
                                           name="video_title" value="{{ isset($video) ? $video->video_title : old('video_title') }}" placeholder="Enter the Video Title">
                                    @error('video_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="author_id">Select Video Author <span class="text-danger">*</span></label>
                                    <select class="form-control @error('author_id') is-invalid @enderror"
                                            name="author_id">
                                        <option value="">Select Video Author</option>
                                        @foreach($experts as $expert)
                                            <option value="{{ $expert->id }}"
                                                    {{ old('author_id', isset($video) && $video->author_id == $expert->id ? 'selected' : '') }}>
                                                {{ $expert->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('author_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
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
                                        <option value="1" {{ old('status', isset($video) && $video->status == '1' ? 'selected' : '') }}>Publish</option>
                                        <option value="0" {{ old('status', isset($video) && $video->status == '0' ? 'selected' : '') }}>Unpublish</option>

                                        </select>
                                    </div>
                            </div>
                        </div>
                        
                   
                        
                              <div class="row">
                            <div class="form-group">
                                <label for="name" class="mt-2">Summary<span class="text-danger">*</span></label>
                                 
                                @if (isset($video->summary))
                                <textarea name="summary" class="ckeditor @error('summary') is-invalid @enderror" id="ckeditor">{{ $video->summary }}</textarea>
                            @error('summary')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">{{ $message }}</span>
                            @enderror
                            @else
                                <textarea name="summary" class="ckeditor @error('summary') is-invalid @enderror" id="ckeditor"></textarea>
                            @endif
                            </div>
                        </div>
                        <div class="flex items-center justify-between ">
                            <button class="btn bg-primary text-white mt-3">Submit</button>
                            
                            
                        </div>
                    </form>
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
                       
