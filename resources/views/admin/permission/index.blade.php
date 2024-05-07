@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title">Permissions</div>
                <div class="">
                    <a href="{{ route('permissions.create') }}"
                                        class="btn btn-primary btn-wave waves-effect waves-light me-2">
                                        <i class="fe fe-plus mx-1 align-middle"></i>Create Permission
                                    </a>
                </div>
            </div>

            
            <div class="card-body">
                <table id="responsivemodal-DataTable" class="table table-bordered text-nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>S No.</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     @if(count($data)>0)
                                @php
                                isset($_GET['items']) ? $items = $_GET['items'] : $items = 10;
                                isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;
                                $i = (($page-1)*$items)+1;
                                @endphp
                                @foreach($data as $key => $value)
                                <tr data-entry-id="{{ $value->id }}">
                                    <td>{{ $i++ ?? ''}}</td>
                                    <td>{{ $value->title ?? '' }}</td>
                                    <td class="">
                                                <div class="btn-list">
                                                    <a href="{{ route('permissions.edit', $value->id) }}" class="btn btn-icon btn-primary btn-wave waves-effect waves-light"data-bs-toggle="tooltip"data-bs-original-title="Edit">
                                                        <i class="ri-pencil-fill lh-1" ></i>
                                                    </a>
                                                    <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle{{ $value->id }}" data-bs-toggle="tooltip" data-bs-original-title="Delete" role="button">
                                            <i class="ri-delete-bin-7-line lh-1"></i>
                                        </a>
                                                </div>
                                            </td>
                                    <!-- <td class="text-center">
                                        <a href="{{ route('permissions.edit', $value->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('permissions.destroy', $value->id) }}"class="btn btn-danger btn-sm" data-toggle="modal"data-target="#exampleModal{{ $value->id }}"><i class="fas fa-trash-alt"></i></a>
                                    </td> -->
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3">No Data Found</td>
                                </tr>
                                @endif
                            </table>
                            @if ((request()->get('keyword')) || (request()->get('items')))
                            {{ $data->appends(['keyword' => request()->get('keyword'),'items' => request()->get('items')])->links() }}
                            @else
                            @endif
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
                    <form id="deleteForm{{ $value->id }}" action="{{ route('permissions.destroy', $value->id) }}"
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