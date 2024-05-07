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
        <div class="row">
            <div class="col-lg-12">
                <div class="row tabelhed d-flex justify-content-between">

                    <div class="col-lg-10 col-md-10">

                        <div class="right-item d-flex justify-content-end">

                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 mt-auto">
                            <h5>{{$programName->title}}</h5>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="row float-end">
                                <div class="col-xl-12 d-flex float-end">
                                    <a href="{{ route('programs.session.add',$programName->id) }}"
                                    class="btn btn-primary btn-wave waves-effect waves-light me-2">
                        <i class="fe fe-plus mx-1 align-middle"></i>Add Session </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="table">
                    @forelse ($batchs as $key => $programs)
                        <h4 style="margin-top: 32px;margin-bottom: 19px;"># {{$programs->name}}</h4>
                        <table id="examples" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="width-10">S No.</th>
                                    
                                    <th>Session Title</th>
                                    <th>Start Date</th>
                                    <th>Start Time</th>
                                    <th>Session Duration (In Min)</th>
                                    <th>Status</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                           
                            @forelse($programs->getProgramSession as $key => $program)
                            <tr data-entry-id="{{ $program->id }}">
                                    <td>{{ $loop->iteration }}</td>
                               
                                <td>{{ $program->session_title ?? '-' }}</td>
                                <td>{{ $program->session_startdate ?? '-' }}</td>
                                <td>{{ $program->session_starttime ?? '-' }}</td>
                                <td>{{ $program->session_time ?? '-' }}</td>
                                 <td>
                                    @if($program->status == 1)
                                        <a class="btn btn-sm btn-success-light" data-bs-toggle="modal" href="#statusModalToggle_{{ $program->id }}" data-bs-toggle="tooltip" data-bs-original-title="Delete" role="button">
                                    Permanent
                                        </a>
                                    @else
                                        <a class="btn btn-sm btn-danger-light" data-bs-toggle="modal" href="#statusModalToggle_{{ $program->id }}" data-bs-toggle="tooltip" data-bs-original-title="Delete" role="button">
                                        Temporary
                                        </a>
                                    @endif
                                    
                                </td>
                                <td class="">
                                    <div class="btn-list">
                                        <a href="{{ route('programs.session.edit', ['id' => $program->id]) }}" class="btn btn-icon btn-primary btn-wave waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                            <i class="ri-pencil-fill lh-1"></i>
                                        </a>
                                        <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle_{{ $program->id }}" data-bs-toggle="tooltip" data-bs-original-title="Delete" role="button">
                                            <i class="ri-delete-bin-7-line lh-1"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                        <p class="text-center">No reord found !</p>
                    @endforelse
                           
                        </table>
                    @empty
                        <p class="text-center">No reord found !</p>
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@foreach($batchs as $key => $programs)
@foreach($programs->getProgramSession as $key => $program)
<div class="card-body">
    <div class="modal fade" id="exampleModalToggle_{{ $program->id }}"
        aria-labelledby="exampleModalToggleLabel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalToggleLabel">Program</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm{{ $program->id }}" action="{{ route('programs.session.delete', $program->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle_{{ $program->id }}"
                        data-bs-toggle="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endforeach
@foreach($batchs as $key => $programs)

@foreach ($programs->getProgramSession as $program)
<div class="card-body">
    <div class="modal fade" id="statusModalToggle_{{ $program->id }}"
        aria-labelledby="statusModalToggleLabel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="statusModalToggleLabel">Program</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to change status?
                </div>
                <div class="modal-footer">
                    <form  action="{{ route('programs_session.status', $program->id) }}"
                        method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                    <button class="btn btn-primary" data-bs-target="#statusModalToggle_{{ $program->id }}"
                        data-bs-toggle="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endforeach
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>


<script>
$(document).ready(function () {
    new DataTable('#example', {
        initComplete: function () {
            var api = this.api();
            api.columns().every(function (index) {
                if (index === 0 || index === 1 || index === 2 || index === 3 || index === 4 || index === 5) { // Apply dropdown only to the second column (index 1)
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                        .appendTo($(column.header()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                }
            });
        }
    });
});

</script>