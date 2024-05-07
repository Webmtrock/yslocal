@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12">
                <div class="row tabelhed d-flex justify-content-between">
                  
                    <div class="card">
                        <div class="card-header">
                        <div class="row">

                            <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                                <div class="">
                                    <h1 class="page-title fw-semibold fs-20 mb-0">
                                    Experts
                                    </h1>
                                    
                                </div>
                                    <div class="ms-auto pageheader-btn">
                                        <a href="{{route('expert.create')}}" class="btn btn-primary btn-wave waves-effect waves-light me-2" >
                                            <i class="fe fe-plus mx-1 align-middle"></i>Create Expert
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
                                            <th scope="col">Select Category</th>
                                            <th scope="col">Expert Name</th>
                                            <th scope="col">Expert Profile</th>
                                            <th scope="col">Expert Designation</th>
                                            <th scope="col">Experience</th>
                                            <th scope="col">Qualification</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Expert Language</th>
                                            <!-- <th scope="col">Expert Description</th> -->
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    @foreach($expert as $experts)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$experts->categories_name ?? ''}}</th>
                                        <td>{{$experts->name ?? ''}}</td>
                                        <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img src="{{ url(config('app.expert_profile')).'/'.$experts->expert_profile ?? '' }}" alt="Image"
                                                style="width: 60px; height: 60px; border-radius: 50%;">
                                        </div>
                                    </td>
                                        
                                        <td>{{$experts->expert_designation ?? ''}}</td>
                                        <td>{{$experts->expert_experience ?? ''}}</td>
                                        <td>{{$experts->expert_qualification ?? ''}}</td>
                                        <td  class=" {{ $experts->status == '1' ? 'text-success fs-15 fw-semibold' :'text-danger fs-15 fw-semibold '}}">
                                            {{ $experts->status == '1' ? 'Publish' : 'Unpublish ' }}
                                        </td>
                                        
                                        <td>{{$experts->expert_language ?? ''}}</td>
                                        <!-- <td>{{$experts->expert_description ?? ''}}</td> -->

                                        <td>
                                            <div class="btn-list d-flex">
                                                <a href="expert/{{$experts->id}}/edit" class="btn btn-icon btn-primary btn-wave waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                    <i class="ri-pencil-fill lh-1"></i>
                                                </a>
                                                <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle{{ $experts->id }}" data-bs-original-title="Delete" role="button">
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


    @foreach ($expert as $experts)
    <div class="modal fade" id="exampleModalToggle{{ $experts->id }}" aria-labelledby="exampleModalToggleLabel{{ $experts->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalToggleLabel{{ $experts->id }}">Experts</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm{{ $experts->id }}" action="{{ route('expert.destroy', ['id' => $experts->id]) }}" method="POST">
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