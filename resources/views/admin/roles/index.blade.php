
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title">Roles</div>
                <div class="">
                    <a href="{{ route('roles.create') }}"class="btn btn-primary btn-wave waves-effect waves-light me-2">
                        <i class="fe fe-plus mx-1 align-middle"></i>Create Roles </a>
                </div>
            </div>
            <div class="card-body">
                <table id="responsivemodal-DataTable" class="table table-bordered text-nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>S No.</th>
                        <th>Title</th>
                        <th>Permissions</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   
                    
                                @foreach($data as $key => $value)
                                <tr data-entry-id="{{ $value->id }}">
                                <td>{{ $loop->iteration ?? '' }}</td>
                                    <td>{{ $value->name  ?? '' }}</td>
                                    <td>
                                         @foreach($value->permissions as $key => $items) 
                                                    <span class="text-success fs-15 fw-semibold">{{$items->title}}sss</span>
                                                @endforeach
                                            </td>
                                            <td class="">
                                                <div class="btn-list">
                                              
                                                    <a href="{{ route('roles.edit', $value->id) }}" class="btn btn-icon btn-primary btn-wave waves-effect waves-light"data-bs-toggle="tooltip"data-bs-original-title="Edit">
                                                        <i class="ri-pencil-fill lh-1" ></i>
                                                    </a>
                                                    <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle{{ $value->id }}" data-bs-toggle="tooltip" data-bs-original-title="Delete" role="button">
                                                        <i class="ri-delete-bin-7-line lh-1"></i>
                                                    </a>
                                              
                                                </div>

                            
                                            </td>
                                           <!-- <td>
                                            <a href="{{ route('roles.edit', $value->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{ route('roles.destroy', $value->id) }}"class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Delete"  data-toggle="modal"data-target="#exampleModal{{ $value->id }}"><i class="fas fa-trash-alt"></i></a>
                                           </td> -->
                                    
                                </tr>
                                @endforeach
                                
                </tbody>
            </table>
        </div>
    </div>
</div>
@foreach($data as $key => $value)
<div class="card-body">
    <div class="modal fade" id="exampleModalToggle{{ $value->id }}"
        aria-labelledby="exampleModalToggleLabel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalToggleLabel">Roles</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm{{ $value->id }}" action="{{ route('roles.destroy', $value->id) }}"
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
