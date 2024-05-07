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
                            <h5>Appointment</h5>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="row float-end">
                                <div class="col-xl-12 d-flex float-end">
                                    <a href="{{ route('appointment.add') }}"
                                    class="btn btn-primary btn-wave waves-effect waves-light me-2">
                                    <i class="fe fe-plus mx-1 align-middle"></i>Add Appointment </a>

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
                                    <th>Appointment Link</th>
                                    <th>Appointment Price</th>
                                    <th class="text-center w-25">Action</th>
                                </tr>
                            </thead>
                            @foreach($Appointment as $key => $app)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$app->link ?? ''}}</td>
                                    <td>{{$app->price ?? ''}}</td>
                                    
                                    <td>
                                        <div class="btn-list">
                                            <a href="{{ route('appointment.edit', ['id' => $app->id]) }}" class="btn btn-icon btn-primary btn-wave waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                <i class="ri-pencil-fill lh-1"></i>
                                            </a>
                                            <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle{{ $app->id }}" data-bs-original-title="Delete" role="button">
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

</div>
<!-- Modal -->
@foreach($Appointment as $key => $app)
    <div class="modal fade" id="exampleModalToggle{{ $app->id }}" aria-labelledby="exampleModalToggleLabel{{ $app->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalToggleLabel{{ $app->id }}">Appointments</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete appointment?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm{{ $app->id }}" action="{{ route('appointment.delete', $app->id) }}" method="POST">
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
