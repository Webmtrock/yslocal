@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="row tabelhed d-flex justify-content-between">
                
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                        <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                                <div class="">
                                    <h1 class="page-title fw-semibold fs-20 mb-0">
                                    Email Template
                                    </h1>
                                    
                                </div>
                                <div class="ms-auto pageheader-btn">
                                    <a href="{{ route('emails.create') }}" class="btn btn-primary btn-wave waves-effect waves-light me-2" fdprocessedid="qcq6y">
                                        <i class="fe fe-plus mx-1 align-middle"></i>Create Email
                                    </a>

                             </div>
                        </div>
                        </div>
                    </div>
    
            <div class="card-body">
                <table id="responsivemodal-DataTable" class="table table-bordered text-nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>S No.</th>
                        <th>From Name</th>
                        <th>From Email</th>
                        <th>Email Category</th>
                        <th>Email Subject</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                    <tr data-entry-id="{{ $value->id }}">
                        <td>{{ $loop->iteration ?? ''}}</td>
                        <td>{{ $value->from_name ?? '' }}</td>
                        <td>{{ $value->from_email ?? '' }}</td>
                        <td>{{ $value->email_category ?? '' }}</td>
                        <td>{{ $value->email_subject ?? '' }}</td>
                        <td class="">
                             <div class="btn-list">
                                <a href="{{ route('emails.edit', $value->id) }}" class="btn btn-icon btn-primary btn-wave waves-effect waves-light"data-bs-toggle="tooltip"data-bs-original-title="Edit">
                                    <i class="ri-pencil-fill lh-1" ></i>
                                </a>
                                <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle{{ $value->id }}" data-bs-original-title="Delete" role="button">
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
</div>
</div>
@foreach($data as $key => $value)
    <div class="modal fade" id="exampleModalToggle{{ $value->id }}" aria-labelledby="exampleModalToggleLabel{{ $value->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalToggleLabel{{ $value->id }}">Articles</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm{{ $value->id }}" action="{{ route('emails.destroy', $value->id) }}" method="POST">
                    
                        @method('DELETE')
                        @csrf
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
