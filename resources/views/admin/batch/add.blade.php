@extends('layouts.app')
@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header page-title fw-semibold fs-20 mb-0">
                    Create Batch
                </div>
                <div class="card-body">
                    <form  action="{{route('batch.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{Request()->id}}" name="program_id">
                            <!-- <div class="mt-3 mb-2"> <hr class="border-dark"></div>  -->
                            <div class="row">
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Batch Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('batch_name') is-invalid @enderror"
                                                name="batch_name" required id="batch_name" placeholder="Batch name">
                                            @error('batch_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="date" class="mt-2">Batch Start Date <span class="text-danger">*</span></label>
                                    <input type="date" name="batch_start_date" class="form-control @error('batch_start_date') is-invalid @enderror" placeholder="Webinar Start Date" value="{{ old('batch_start_date', isset($data) ? $data->batch_start_date : '') }}" required>
                                    @error('batch_start_date')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date" class="mt-2">Batch Enrollment End Date <span class="text-danger">*</span></label>
                                    <input type="date" name="batch_end_date" class="form-control @error('batch_end_date') is-invalid @enderror" placeholder="Webinar End Date" value="{{ old('batch_end_date', isset($data) ? $data->batch_end_date : '') }}" required>
                                    @error('batch_end_date')
                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                          
                          


                             <div class="mt-3">
                                <button type="submit" class="btn btn-success" name="action" value="save">Save</button>
                            </div>
                            
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#ckeditor'))
    .catch(error => {
        console.error(error);
    });
</script>


