@extends('layouts.app')
@section('content')
@php
    use Illuminate\Support\Facades\File;
    @endphp

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 mt-auto">
                            Report Images
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="row float-end">
                                <div class="col-xl-12 d-flex float-end">
                                    <a href="{{ route('report.list') }}" class="btn btn-primary btn-wave waves-effect waves-light me-2">
                                        Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <div class="row">
                    @foreach($reportImages as $image)

                    @php
                    $file = $image->image;
                    $extension = File::extension($file);
                    @endphp
                    
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                @if ($extension === 'pdf') 
                                    <img src="{{ asset('public/images/pdf.png') }}" class="img-fluid" width="100" height="100">
                                    <a href="{{ asset('public/uploads/' . $image->image) }}" class="btn btn-primary mt-2" download>Download</a>
                                @else
                                    <img src="{{ asset('public/uploads/' . $image->image) }}" class="img-fluid" width="100" height="100">
                                    <a href="{{ asset('public/uploads/' . $image->image) }}" class="btn btn-primary mt-2" download>Download</a>
                                @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

