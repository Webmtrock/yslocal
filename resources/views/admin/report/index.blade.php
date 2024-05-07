@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="row tabelhed d-flex justify-content-between">
                <div class="d-flex align-items-end flex-row-reverse"></div>
                <div class="col-lg-10 col-md-10">
                    <div class="right-item d-flex justify-content-end"></div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row">

                        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                                <div class="">
                                    <h1 class="page-title fw-semibold fs-20 mb-0">
                                     Reports
                                    </h1>
                                    
                                </div>
                                <div class="ms-auto pageheader-btn">
                                    <!-- <a href="{{route('article.create')}}" class="btn btn-primary btn-wave waves-effect waves-light me-2" fdprocessedid="qcq6y">
                                        <i class="fe fe-plus mx-1 align-middle"></i>Add Report
                                    </a> -->
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
                                        <th scope="col">User Name</th>
                                        <th scope="col">Programs</th>
                                        <th scope="col">Batch</th>
                                        <th scope="col">Report Title</th>
                                        <th scope="col">Report Description</th>
                                        <!-- <th scope="col">File-2</th> -->
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                @foreach($Report as $key => $app)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$app->user->name ?? ''}}</td>
                                    <td>{{$app->programName->title ?? ''}}</td>
                                    <td>{{$app->batchName->name ?? ''}}</td>
                                    <td>{{$app->report_title ?? ''}}</td>
                                    <td>{{$app->report_description ?? ''}}</td>
                                
                                    <td>
                                        <div class="btn-list">
                                            <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle{{ $app->id }}" data-bs-original-title="Delete" role="button">
                                                <i class="ri-delete-bin-7-line lh-1"></i>
                                              </a>
                                              <a href="{{ route('show-report-images', $app->id) }}" class="btn btn-icon btn-primary btn-wave waves-effect waves-light view-report" data-bs-toggle="tooltip" data-bs-original-title="View" data-toggle="modal" data-target="#reportImagesModal">
                                                <i class="ri-eye-fill"></i>
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

   
    <!-- Modal -->
    @foreach($Report as $key => $app)
    <div class="modal fade" id="exampleModalToggle{{ $app->id }}" aria-labelledby="exampleModalToggleLabel{{ $app->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalToggleLabel{{ $app->id }}">Report</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm{{ $app->id }}" action="{{ route('report.delete', $app->id) }}" method="POST">
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

