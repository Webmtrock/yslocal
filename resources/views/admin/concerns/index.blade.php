@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="row tabelhed d-flex justify-content-between">
                <div class="d-flex align-items-end flex-row-reverse"></div>
                <div class="col-lg-10 col-md-10">
                    <div class="right-item d-flex justify-content-end"></div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row">

                        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                                <div class="">
                                    <h1 class="page-title fw-semibold fs-20 mb-0">
                                    New Concern
                                    </h1>
                                    
                                </div>
                                <div class="ms-auto pageheader-btn">
                                    <a href="{{route('concern.create')}}" class="btn btn-primary btn-wave waves-effect waves-light me-2" fdprocessedid="qcq6y">
                                        <i class="fe fe-plus mx-1 align-middle"></i>Add Concern
                                    </a>
                                    <a href="{{route('concern.show')}}" class="btn btn-success btn-wave waves-effect waves-light"   >
                                        Drafted Concern
                                    </a>
                                </div>
                    

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table">
                            <table id="responsivemodal-DataTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Concern Title</th>
                                        <th scope="col">Summary</th>
                                        <th scope="col">Categories</th>
                                        <th scope="col">Select Concern Author</th>
                                        <th scope="col">Banner Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                @foreach($concerns as $key => $concern)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$concern->article_title ?? ''}}</td>
                                    <td>{{$concern->summary ?? ''}}</td>
                                    <td>{{$concern->categories_name}}</td>
                                    <td>{{$concern->experts->name ?? ''}}</td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('public/uploads/'.$concern->banner_image) }}" alt="Image"
                                                style="width: 60px; height: 60px; border-radius: 50%;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-list">
                                            <a href="{{ route('concern.edit', ['id' => $concern->id]) }}" class="btn btn-icon btn-primary btn-wave waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                <i class="ri-pencil-fill lh-1"></i>
                                            </a>
                                            <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle{{ $concern->id }}" data-bs-original-title="Delete" role="button">
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

   
    <!-- Modal -->
    @foreach($concerns as $key => $concern)
    <div class="modal fade" id="exampleModalToggle{{ $concern->id }}" aria-labelledby="exampleModalToggleLabel{{ $concern->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalToggleLabel{{ $concern->id }}">Concerns</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm{{ $concern->id }}" action="{{ route('concern.destroy', $concern->id) }}" method="POST">
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
