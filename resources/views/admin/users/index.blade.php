@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title">Users</div>
                    <div class="">
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-wave waves-effect waves-light me-2">
                                <i class="fe fe-plus mx-1 align-middle"></i>Add User </a>
                    </div>
            </div>
                <div class="card-body">
                    <table id="responsivemodal-DataTable" class="table table-bordered text-nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="width-10">S No.</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>User Type</th>
                            <th class="text-center w-25">Action</th>
                        </tr>
                    </thead>
                    <tbody>
              
                    @foreach($users as $key => $value)
                    <tr data-entry-id="{{ $value->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->name ?? '' }}</td>
                         <td>{{ $value->phone ?? '' }}</td>
                         <td>{{ $value->email ?? '' }}</td>
                         <td  class=" {{ $value->status == '1' ? 'text-success fs-15 fw-semibold' :'text-danger fs-15 fw-semibold '}}">
                            {{ $value->status == '1' ? 'Active' : 'Inactive' }}
                        </td>
                        <td> 
                            @foreach($value->roles as $key => $item)
                            <span class="text-success fs-15 fw-semibold">{{ $item->name }}</span>
                            @endforeach 
                        </td>
                        <td class="">
                            <div class="btn-list">
                                <a href="{{ route('users.edit', $value->id) }}" class="btn btn-icon btn-primary btn-wave waves-effect waves-light"data-bs-toggle="tooltip"data-bs-original-title="Edit">
                                    <i class="ri-pencil-fill lh-1" ></i>
                                </a>

                                <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle_{{ $value->id }}" data-bs-toggle="tooltip" data-bs-original-title="Delete" role="button">
                                            <i class="ri-delete-bin-7-line lh-1"></i>
                                        </a>                              
                            </div>

                          </td>

                        </tr>
                               @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach($users as $key => $value)
<div class="card-body">                             
<div class="modal fade" id="exampleModalToggle_{{ $value->id }}"
    aria-labelledby="exampleModalToggleLabel" tabindex="-1" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalToggleLabel">User
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete
            </div>
            <div class="modal-footer">
            <form id="deleteForm{{ $value->id }}" action=" {{ route('users.delete', $value->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
        </form>

                <button class="btn btn-primary"
                    data-bs-target="#exampleModalToggle2"
                    data-bs-toggle="modal">close</button>
            </div>
        </div>
    </div>
    </div>
    @endforeach
</div>

@endsection



