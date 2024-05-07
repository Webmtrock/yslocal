@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header page-title fw-semibold fs-20 mb-0">
                Theme Setting
                </div> 
                <div class="card-body">

                        

                        <form action="{{route('add_section_1')}}" method="POST" enctype="multipart/form-data"
                            id="basic-form">
                            @csrf
                            <input type="hidden" value="{{ auth()->user()->id }}" name="expert_id">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="mt-2"> Primary Color <span
                                            class="text-danger">*</span></label>
                                    <input type="color" name="primary_color"
                                        class="form-control" style="width: 100px;" required>
                                    @error('primary_color')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name" class="mt-2"> Secondry Color <span
                                            class="text-danger">*</span></label>
                                    <input type="color" name="secondry_color"
                                        class="form-control" style="width: 100px;" required>
                                    @error('primary_color')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="mt-2"> Button Color <span class="text-danger">*</span></label>
                                    <input type="color" name="btn-color"
                                        class="form-control" style="width: 100px;" required>
                                    @error('btn-color')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                              
                            </div>

                        
                            <div class="mt-3">
                                <input class="btn btn-primary" type="submit"
                                    value="{{ isset($data) ? 'Update' : 'Save' }}">
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
