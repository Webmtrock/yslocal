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
                                    <a href="{{ route('batch.add',$programName->id) }}"
                                    class="btn btn-primary btn-wave waves-effect waves-light me-2">
                        <i class="fe fe-plus mx-1 align-middle"></i>Add Batch </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="width-10">S No.</th>
                                    <th>Batch Name</th>
                                    <th class="text-center w-25">Action</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th class="width-10">S No.</th>
                                    <th>Batch Name</th>
                                    <th class="text-center w-25">Action</th>
                                </tr>
                            </thead>
                            @foreach($batchs as $key => $batch)
                            <tr data-entry-id="{{ $batch->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $batch->name; }}</td>
                                <td class="">
                                    <div class="btn-list">
                                        <a href="{{ route('batch.edit', ['id' => $batch->id]) }}" class="btn btn-icon btn-primary btn-wave waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                            <i class="ri-pencil-fill lh-1"></i>
                                        </a>
                                        <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle_{{ $batch->id }}" data-bs-toggle="tooltip" data-bs-original-title="Delete" role="button">
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

@foreach ($batchs as $batch)
<div class="card-body">
    <div class="modal fade" id="exampleModalToggle_{{ $batch->id }}"
        aria-labelledby="exampleModalToggleLabel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalToggleLabel">Batch</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm{{ $batch->id }}" action="{{ route('batch.delete', $batch->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle_{{ $batch->id }}"
                        data-bs-toggle="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
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
                if (index === 0 || index === 1 ) { // Apply dropdown only to the second column (index 1)
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