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
                            <th>Email</th>
                            <th>Number</th>
                            <th>Concern</th>
                            <th>Related to</th>
                        </tr>
                    </thead>
                    <tbody>
              
                    @foreach($concernform as $key => $value)
                    <tr data-entry-id="{{ $value->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->name ?? '' }}</td>
                         <td>{{ $value->email ?? '' }}</td>
                         <td>{{ $value->number ?? '' }}</td>
                         <td>{{ $value->concern ?? '' }}</td>
                         <td>{{ $value->related_to ?? '' }}</td>

                        </tr>
                               @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


</div>

@endsection



