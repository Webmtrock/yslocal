@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">


        <div class="row">
            <div class="col-lg-12">
                <div class="row tabelhed d-flex justify-content-between">
                    <div class="card">
                        <div class="card-header">
                        <div class="row">

                            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                                <div class="">
                                    <h1 class="page-title fw-semibold fs-20 mb-0">
                                    Coupons
                                    </h1>
                                    
                                </div>
                                    <div class="ms-auto pageheader-btn">
                                        <a href="{{route('coupon.create')}}" class="btn btn-primary btn-wave waves-effect waves-light me-2" >
                                            <i class="fe fe-plus mx-1 align-middle"></i>Create Coupon
                                        </a>
                                    </div>
                            </div>
                                    </div>
                                    </div>
                    
                    <!-- <div class="card">
                        <div class="card-header ">
                            <div class="row">
                            
                                <div class="col-xl-6 col-md-6 mt-auto">
                                        <h5>Coupons</h5>
                                    </div>
                                  
                                    <div class="col-xl-6 col-md-6">
                                        <div class="row float-end">
                                            <div class="col-xl-12 d-flex float-end">
                                            <a href="{{route('coupon.create')}}" class="btn btn-primary btn btn-lg  ">
                                                <i class="fe fe-plus mx-1 align-middle"></i>Create Coupon
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                         -->

                        <div class="card-body">
                            <div class="table">
                                <table id="responsivemodal-DataTable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col"> Webinar/ Program</th>
                                           
                                            <th scope="col">Select Plan</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">Coupon Code</th>
                                            <th scope="col">Discount</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    @foreach($coupon as $coupons)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{isset($coupons->wibinar->webinar_title)?$coupons->wibinar->webinar_title.'/':''}}{{$coupons->program->title ?? ''}}</th>
                                        
                                        <td>{{$coupons->select_plan ?? ''}}</td>
                                        <td>{{ isset($coupons->start_date) ? \Carbon\Carbon::parse($coupons->start_date)->toDateString() : '' }}
                                        </td>

                                        <td>{{ isset($coupons->end_date) ? \Carbon\Carbon::parse($coupons->end_date)->toDateString() : '' }}
                                        </td>

                                        <td>{{$coupons->coupon_code ?? ''}}</td>
                                        <td>{{$coupons->discount ?? ''}}</td>

                                        <td>
                                           
                                                <div class="btn-list">
                                <a href="{{  route('coupon.edit', ['id' => $coupons->id])}}" class="btn btn-icon btn-primary btn-wave waves-effect waves-light"data-bs-toggle="tooltip"data-bs-original-title="Edit">
                                    <i class="ri-pencil-fill lh-1" ></i>
                                </a>
                                <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle{{ $coupons->id }}" data-bs-original-title="Delete" role="button">
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

    @foreach($coupon as $coupons)

    <div class="modal fade" id="exampleModalToggle{{ $coupons->id }}" aria-labelledby="exampleModalToggleLabel{{ $coupons->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalToggleLabel{{ $coupons->id }}">Coupon</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm{{ $coupons->id }}" action="{{ route('coupon.delete', ['id' => $coupons->id]) }}" method="POST">
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