@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                            <div class="card-header ">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 mt-auto">
                    
                                        Add Appointment
                                
                                        </h5>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="row float-end">
                                            <!-- <div class="col-xl-12 d-flex float-end">
                                            <a href="{{route('appointment.list')}}" class="btn btn-primary btn-wave waves-effect waves-light me-2">
                                        Back </a>
                                                
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <div class="card-body">
                        <form id="videoFormd" action="{{route('appointment.store')}}" 
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            

                            <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="video_thumbnail">Appointment Link<span class="text-danger">*</span></label>
                                            <input type="text" name="link" class="form-control">
                                        </div>
                                    </div>
                            </div>
                            
                            
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="add_video">Appointment Price</label>
                                        <input type="number" class="form-control"
                                            name="price">
                                    </div>
                                </div>
                                
                            </div>
                            
                    
                            
                            
                            <div class="flex items-center justify-between ">
                                <button class="btn bg-primary text-white mt-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#ckeditor'))
    .catch(error => {
        console.error(error);
    });
</script>
                       
