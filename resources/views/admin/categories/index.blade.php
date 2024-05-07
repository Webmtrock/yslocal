@extends('layouts.app')
@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif

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

        <div class="row">
            <div class="col-lg-12">
                <div class="row tabelhed d-flex justify-content-between">
                    <div class="col-lg-2 col-md-2 col-sm-2 d-flex">
                       
                    </div>

                    <div class="col-lg-10 col-md-10">
                        <div class="right-item d-flex justify-content-end">

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 mt-auto">
                                <h5>Categories</h5>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="row float-end">
                                <a href="{{ route('categories.create') }}"  class="btn btn-primary btn-wave waves-effect waves-light me-2">
                        <i class="fe fe-plus mx-1 align-middle"></i>Add Category </a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table">
                            <table id="responsivemodal-DataTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="width-10">S No.</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Categoy Images</th>
                                        <th>Category Images Thumbnail
                                        <th>Status</th>
                                        <th class="text-center w-25">Action</th>
                                    </tr>
                                </thead>



                                @foreach($categories as $key => $value)
                                <tr data-entry-id="{{ $value->id }}">
                                    <td>{{ $value->id ?? '' }}</td>
                                    <td>{{ $value->title ?? '' }}</td>
                                    <td>{{ $value->slug ?? '' }}</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                    @if($value->category_image)
                                    <div>
                                    <img src="{{ url(config('app.category-image')).'/'.$value->category_image ?? '' }}" alt="Category Image" style="width: 50px; height: 50px; border-radius: 50%;">
                                    </div>
                                @endif
                              </td>
                              <td style="text-align: center; vertical-align: middle;">
                                    @if($value->category_image_thumbnail)
                                    <div>
                                    <img src="{{ url(config('app.category-image-thumbnail')).'/'.$value->category_image_thumbnail ?? '' }}" alt="Category Image" style="width: 50px; height: 50px; border-radius: 50%;">
                                    </div>
                                @endif
                              </td>


                                    <td>
                                        <span
                                            class="{{ $value->status == '1' ? 'text-success fs-15 fw-semibold' : 'text-danger fs-15 fw-semibold' }}">
                                            {{ $value->status == '1' ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="">
                                                <div class="btn-list">
                                                    <a href="{{ route('categories.edit', $value->id) }}" class="btn btn-icon btn-primary btn-wave waves-effect waves-light"data-bs-toggle="tooltip"data-bs-original-title="Edit">
                                                        <i class="ri-pencil-fill lh-1" ></i>
                                                    </a>
                                                    <!-- <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle{{ $value->id }}" data-bs-toggle="tooltip" data-bs-original-title="Delete" role="button">
                                            <i class="ri-delete-bin-7-line lh-1"></i>
                                        </a> -->
                                                </div>
                                            </td>
                                </tr>
                                @endforeach

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($categories as $key => $value)
<div class="card-body">
    <div class="modal fade" id="exampleModalToggle{{ $value->id }}"
        aria-labelledby="exampleModalToggleLabel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalToggleLabel">Categories</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm{{ $value->id }}" action="{{ route('categories.destroy', $value->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle_{{ $value->id }}"
                        data-bs-toggle="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection