@extends('layouts.app')
@section('content')

<div class="content-wrapper">

    <div class="row">
        <div class="col-lg-12">
        <div class="card">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 mt-auto">
                                <h5>{{ isset($article) ? 'Edit Blog' : 'New Blog' }}</h5>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="row float-end">
                                        <div class="col-xl-12 d-flex float-end">
                                        <a href="{{route('article.index')}}" class="btn btn-primary btn-wave waves-effect waves-light me-2">
                                       Back </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="card-body">

                    <form
                        action="{{ isset($article) ? route('article.update', $article->id) : route('article.store') }}"
                        method="POST" enctype="multipart/form-data" id="basic-form">
                        @csrf
                        <input type="hidden" name="preview" value="" class="Privewcheck">
                        @if(isset($article))
                        @method('PUT')
                        @endif

                        <!-- 
                            <input type="hidden" name="expert_category_id" id="id"
                                value="{{ isset($data) ? $data->id : '' }}"> -->
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="article_title" class="mt-2 fw-semibold mb-1">Article Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="article_title"
                                        class="form-control @error('article_title') is-invalid @enderror"
                                        value="{{ old('article_title', isset($article) ? $article->article_title : '') }}">

                                    @error('article_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id" class="mt-2">Select Category <span class="text-danger" >*</span></label>
                                    <select class="form-control" id="category_id" name="category_id[]" multiple data-trigger name="choices-multiple-default" placeholder="">
                                        <!-- <option value="">Select Category</option> -->
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ (is_array(old('category_id')) && in_array($category->id, old('category_id'))) || (isset($article) && in_array($category->id, explode(',', $article->category_id))) ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            



                            @if(auth()->user()->roles->pluck('name')->first() == 'Admin')
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                <label for="name" class="mt-2"> Select Article Author <span
                                                    class="text-danger">*</span></label>
                                                <select class="form-control" name="expert_id" required>
                                                    <option value="">Select Author</option>
                                                    @foreach($experts as $expert)
                                                    <option value="{{ $expert->id }}"
                                                        {{ old('expert_id', isset($article) && $article->expert_id == $expert->id ? 'selected' : '') }}>
                                                        {{ $expert->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('expert_id'))
                                                <span class="text-danger">{{ $errors->first('expert_id') }}</span>
                                                @endif
                                        </div>
                                    </div>
                            @else
                                <input type="hidden" name="expert_id" value="{{auth()->user()->id}}">
                            @endif
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="mt-2"> Article Slug <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="article_slug" required
                                        class="form-control @error('article_slug') is-invalid @enderror"
                                        value="{{ old('article_slug', isset($article) ? $article->article_slug : '') }}"
                                        required>
                                    @error('article_slug')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                                <label for="name" class="mt-2"> Expert Name <span class="text-danger">*</span></label>
                                <input type="text" name="name"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value=""
                                    required>
                                @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div> -->


                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="name" class="mt-2" > Meta Tag </label>
                                    <input type="text" name="meta_tag"
                                        class="form-control @error('meta_tag') is-invalid @enderror"
                                        value="{{ old('meta_tag', isset($article) ? $article->meta_tag : '') }}">

                                    @error('meta_tag')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="mt-2" > Meta Description </label>
                                    <input type="text" name="meta_description"
                                        class="form-control @error('meta_description') is-invalid @enderror"
                                        value="{{ old('meta_description', isset($article) ? $article->meta_description : '') }}">
                                    @error('meta_description')
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
                                        <label for="name" class="mt-2" required> Banner Image<span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="banner_image"
                                            class="form-control @error('banner_image') is-invalid @enderror">
                                        @error('banner_image')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <span class="text-danger">Banner Image Dimensions Size 300×400</span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="mt-2" required>Status <span
                                                class="text-danger">*</span></label>
                                                <select class="form-control" id="selectEventType" name="status">
                                            <option value="Under review" {{ isset($article) && $article->status == 'Under review' ? 'selected' : '' }}>Under review</option>
                                            <option value="Waiting for Approval" {{ isset($article) && $article->status == 'Waiting for Approval' ? 'selected' : '' }}>Waiting for Approval</option>
                                            <option value="Published" {{ isset($article) && $article->status == 'Published' ? 'selected' : '' }}>Published</option>
                                        </select>


                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    @if (isset($article->banner_image))
                                    <div class="mt-2">
                                        <p>Banner Image:</p>
                                        <img src="{{ asset('public/uploads/'.$article->banner_image) }}" alt="Current Image"
                                            style="max-width: 180px;">
                                    </div>
                                    @endif
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                            @if (isset($article))                              
                                                <label for="name" class="mt-2"> Article Created Date</label>
                                                <input type="text" name="article_createdDate" value="{{ $article->created_at->format('d-m-Y') }}"
                                                    class="form-control @error('article_createdDate') is-invalid @enderror" >
                                                @error('article_createdDate')
                                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                                @endif
                                     </div>
                                </div> 
                            </div>
                            
                                

                        <div class="form-group">
                            <label for="name" class="mt-2"> Summary <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="summary" rows="3" required
                                name="summary">{{ old('summary', isset($article) ? $article->summary : '') }}</textarea>
                            @error('summary')
                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>


                        <div class="row">
                            <div class="form-group">
                                <label for="name" class="mt-2"> Artical body <span class="text-danger">*</span></label>
                                <textarea name="article_body" required
                                    class="ckeditor @error('article_body') is-invalid @enderror"
                                    id="ckeditor">{{ old('article_body', isset($article) ? $article->article_body : '') }}</textarea>
                                @error('article_body')
                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                         
                        <div class="row mt-3">
                            <div class="col-sm-6 ">
                                <button class="btn bg-warning mr-3" type="submit">Publish</button>
                                @if(!isset($article))
                                <!-- <button class="btn bg-secondary text-white ml-3">Save as Draft</button> -->
                                <button type="submit" name="save_as_draft" class="btn bg-secondary text-white ml-3"
                                    value="1">Save as Draft</button>

                                @endif
                                @if(isset($article))
                                <!-- <button class="btn bg-secondary text-white ml-3">Save as Draft</button> -->
                                <button type="submit" name="save_as_draft" class="btn bg-secondary text-white ml-3"
                                    value="1">Update</button>

                                @endif
                                <td> 
                          <a class="btn bg-secondary text-white ml-3" id="preview-button">Preview</a>
                            </td>



                            </div>

                                <div class="text-end  class col-sm-6 ">
                                    <button class="btn bg-danger text-white ml-auto ">Cancel</button>
                                </div>
                        </div>
                </div>
                
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#ckeditor'))
    .catch(error => {
        console.error(error);
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
var form = document.getElementById("basic-form");
document.getElementById("preview-button").addEventListener("click", function (event) {
    event.preventDefault(); 
    $('.Privewcheck').val('preview');
    form.submit(); 
});
</script>

@endsection

