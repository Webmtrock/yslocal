@extends('layouts.app')
@section('content')
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
                    <div class="col-lg-10 col-md-10">
                        <div class="right-item d-flex justify-content-end">

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 mt-auto">
                                    <h5>Events Session</h5>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="row float-end">
                                        <div class="col-xl-12 d-flex float-end">
                                        <a href="{{route('webinar.session_add',$id)}}" class="btn btn-primary btn-wave waves-effect waves-light me-2">
                                    <i class="fe fe-plus mx-1 align-middle"></i>Add Event Session </a>
                                            
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
                                            <th scope="col">Id</th>
                                            <th scope="col">Event Start Date </th>
                                            <th scope="col">Day	</th>
                                            <th scope="col">Duration</th>
                                            <th scope="col">Meeting link </th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    @foreach($data as $key => $value)
                                        <tr data-entry-id="{{ $value->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                            <td>
                                                
                                            {{ \Carbon\Carbon::parse($value->webinar_start_date)->format('d/m/Y')}}

                                            </td>
                                            <td>{{ $value->day ?? '' }}</td>
                                            <td>{{ $value->duration ?? '' }}</td>
                                            <td><p>{{ $value->meeting_link ?? ''}}</p> </td>
                                            <td>
                                                <div class="btn-list">
                                                    <a href="{{ route('webinar.session_edit', $value->id) }}" class="btn btn-icon btn-primary btn-wave waves-effect waves-light"data-bs-toggle="tooltip"data-bs-original-title="Edit">
                                                        <i class="ri-pencil-fill lh-1" ></i>
                                                    </a>
                                                    <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle_{{ $value->id }}" data-bs-toggle="tooltip" data-bs-original-title="Delete" role="button">
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
    @foreach($data as $key => $value)
<div class="card-body">                             
<div class="modal fade" id="exampleModalToggle_{{ $value->id }}"
    aria-labelledby="exampleModalToggleLabel" tabindex="-1" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalToggleLabel">Event
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete
            </div>
            <div class="modal-footer">
            <form id="deleteForm{{ $value->id }}" action="{{ route('webinar.session_delete', $value->id) }}" method="POST">
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