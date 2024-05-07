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

            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 mt-auto">
                            <h5>Videos</h5>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="row float-end">
                                <div class="col-xl-12 d-flex float-end">
                                    <a href="{{ route('video.create') }}"
                                    class="btn btn-primary btn-wave waves-effect waves-light me-2">
                                    <i class="fe fe-plus mx-1 align-middle"></i>Add Video </a>

                                </div>
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
                                    <th>Video Category</th>
                                    <th>Video title</th>
                                    <th>Video Author</th>
                                    <th>Video Status</th>
                                    <th>Video thumbnail</th>
                                    <th class="text-center w-25">Action</th>
                                </tr>
                            </thead>
                                @foreach($video as $videos)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$videos->categories_name}}</td>
                                    <td>{{$videos->video_title ?? ''}}</td>
                                    <td>{{$videos->expert->name ?? ''}}</td>
                                    <td  class=" {{ $videos->status == '1' ? 'text-success fs-15 fw-semibold' :'text-danger fs-15 fw-semibold '}}">
                                            {{ $videos->status == '1' ? 'Published' : 'UnPublished' }}
                                        </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('uploads/videothumbnail/'.$videos->video_thumbnail) }}" alt="Image"
                                                style="width: 60px; height: 60px; border-radius: 50%;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-list">
                                        <a href="{{ route('video.edit', ['id' => $videos->id]) }}" class="btn btn-icon btn-primary btn-wave waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                            <i class="ri-pencil-fill lh-1"></i>
                                        </a> 
                                        
                                            <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle{{ $videos->id }}" data-bs-original-title="Delete" role="button">
                                                <i class="ri-delete-bin-7-line lh-1"></i>
                                            </a>
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
@foreach($video as $videos)
    <div class="modal fade" id="exampleModalToggle{{ $videos->id }}" aria-labelledby="exampleModalToggleLabel{{ $videos->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalToggleLabel{{ $videos->id }}">Articles</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm{{ $videos->id }}" action="{{ route('video.destroy', $videos->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                    <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
