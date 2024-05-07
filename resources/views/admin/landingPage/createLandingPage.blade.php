@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header page-title fw-semibold fs-20 mb-0">
            </div>
            <div class="card-body">
               <form action="{{route('storelandingPage0')}}" method="POST" enctype="multipart/form-data"
                  id="basic-form">
                  @csrf
             
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="webinar_id" class="mt-2">Select webinar <span class="text-danger" >*</span></label>
                           <select class="form-control" id="webinar_id" name="webinar_id"  data-trigger name="choices-multiple-default" placeholder="">
                              <!-- <option value="">Select Category</option> -->
                              @foreach($webiners as $webiner)
                              <option value="{{ $webiner->id }}" {{ ($webiner->id ) ? 'selected' : '' }}>
                              {{ $webiner->webinar_title }}
                              </option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label for="name" class="mt-2">Button Name <span
                              class="text-danger">*</span></label>
                           <input type="text" name="button_name"
                              class="form-control @error('button_name') is-invalid @enderror"
                              value="{{ old('button_name', isset($data) ? $data->button_name : '') }}"
                              required>
                           @error('button_name')
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
<div class="content-wrapper">
   <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header page-title fw-semibold fs-20 mb-0">
                  Section-1 
               </div>
               <div class="card-body">
                  <form action="{{route('storelandingpage')}}" method="POST" enctype="multipart/form-data"
                     id="basic-form">
                     @csrf
                     
                     <div class="row">
                        <div class="form-group">
                           <label for="name" class="mt-2">Description <span
                              class="text-danger">*</span></label>
                           <textarea name="section1_des" class="ckeditor @error('section1_des') is-invalid @enderror"
                              id="ckeditor"></textarea>
                           @error('section1_des')
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
<div class="content-wrapper">
   <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header page-title fw-semibold fs-20 mb-0">
                  Section-2 
               </div>
               <div class="card-body">
                  <form action="{{route('storelandingPage2')}}" method="POST" enctype="multipart/form-data"id="basic-form">
                     @csrf
                   
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label for="name" class="mt-2">Session Time<span class="text-danger">*</span></label>
                           <input type="text" name="section2_session"
                              class="form-control @error('section2_session') is-invalid @enderror"
                              value="{{ old('section2_session', isset($data) ? $data->section2_session : '') }}"
                              required>
                           @error('section2_session')
                           <span class="invalid-feedback form-invalid fw-bold" role="alert">
                           {{ $message }}
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-6">
                           <label for="name" class="mt-2">title<span class="text-danger">*</span></label>
                           <input type="text" name="section2_title"
                              class="form-control @error('section2_title') is-invalid @enderror"
                              value="{{ old('section2_title', isset($data) ? $data->section2_title : '') }}"
                              required>
                           @error('section2_title')
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
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header page-title fw-semibold fs-20 mb-0">
                        Section-3 
                    </div>
                    <div class="card-body">
                        <form action="{{route('storelandingPage3')}}" method="POST" enctype="multipart/form-data" id="basic-form">
                            @csrf
                           
                            
                            <div class="row secation3Remove mt-3 mb-3">
                                <div class="form-group col-md-6">
                                    <label for="name" class="mt-2">Title<span class="text-danger">*</span></label>
                                    <input type="text" name="title[]" class="form-control" value="" required>
                                </div>
                          
                            <div class="form-group col-md-4">
                                <button id="secation3Title" type="button" class="btn btn-warning" style="margin-top: 27px;">ADD MORE</button>
                            </div>
                              </div>
                            
                            <div id="Addsecation3Title">
                                   
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label for="name" class="mt-2">Description <span class="text-danger">*</span></label>
                                <textarea name="section3_des" class="ckeditor @error('section3_des') is-invalid @enderror" id="ckeditor"></textarea>
                                @error('section3_des')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mt-3">
                                <input class="btn btn-primary" type="submit" value="{{ isset($data) ? 'Update' : 'Save' }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="content-wrapper">
   <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header page-title fw-semibold fs-20 mb-0">
                  Section-4
               </div>
               <div class="card-body">
                  <form action="{{route('storelandingPage4')}}" method="POST" enctype="multipart/form-data"id="basic-form">
                     @csrf
                   
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label for="name" class="mt-2">Title<span class="text-danger">*</span></label>
                           <input type="text" name="section4_title"
                              class="form-control @error('section4_title') is-invalid @enderror"
                              value="{{ old('section4_title', isset($data) ? $data->section4_title : '') }}"
                              required>
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
<div class="content-wrapper">
   <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header page-title fw-semibold fs-20 mb-0">
                Section-5 
               </div>
               <div class="card-body">
                  <form action="{{route('storelandingPage5')}}" method="POST" enctype="multipart/form-data"id="basic-form">
                     @csrf
                   
                     <div class="row">
                        <div class="form-group col-md-8">
                           <label for="name" class="mt-2">Title<span class="text-danger">*</span></label>
                           <input type="text" name="section5_title"
                              class="form-control @error('section5_title') is-invalid @enderror"
                              value="{{ old('section5_title', isset($data) ? $data->section5_title : '') }}"
                              required>
                        </div>
                        <div class="form-group col-md-8">
                           <label for="name" class="mt-2">Sub Title<span class="text-danger">*</span></label>
                           <input type="text" name="subtitle[]"
                              class="form-control @error('subtitle') is-invalid @enderror"
                              value="{{ old('subtitle', isset($data) ? $data->subtitle : '') }}">
                        </div>
                        <div class="form-group col-md-4">
                           <button id="secation5Title" type="button" class="btn btn-warning" style="margin-top: 27px;">ADD MORE</button>
                        </div>
                        <div id="Addsecation5Title">
                           
                        </div>
                        <div class="form-group col-md-8">
                           <label for="name" class="mt-2">Bottom Title<span class="text-danger">*</span></label>
                           <input type="text" name="section5_bottom_title"
                              class="form-control @error('section5_bottom_title') is-invalid @enderror"
                              value="{{ old('section5_bottom_title', isset($data) ? $data->section5_bottom_title : '') }}"
                              required>
                        </div>

                        <div class="form-group col-md-5">
                           <label for="name" class="mt-2">Image First<span class="text-danger">*</span></label>
                           <input type="file" name="section5_image_first"
                              class="form-control @error('section5_image_first') is-invalid @enderror"
                              value="{{ old('section5_image_first', isset($data) ? $data->section5_image_first : '') }}">
                          
                        </div>
                        <div class="form-group col-md-5">
                           <label for="name" class="mt-2">Image Second<span class="text-danger">*</span></label>
                           <input type="file" name="section5_image_sec"
                              class="form-control @error('section5_image_sec') is-invalid @enderror"
                              value="{{ old('section5_image_sec', isset($data) ? $data->section5_image_sec : '') }}">
                             
                        </div>
                        <div class="form-group col-md-5">
                           <label for="name" class="mt-2">Image Content first<span class="text-danger">*</span></label>
                           <input type="text" name="section5_imgcontent_first"
                              class="form-control @error('section5_imgcontent_first') is-invalid @enderror"
                              value="{{ old('section5_imgcontent_first', isset($data) ? $data->section5_imgcontent_first : '') }}"
                              required>
                        </div>
                        <div class="form-group col-md-5">
                           <label for="name" class="mt-2">Image Content Second<span class="text-danger">*</span></label>
                           <input type="text" name="section5_imgcontent_sec"
                              class="form-control @error('section5_imgcontent_sec') is-invalid @enderror"
                              value="{{ old('section5_imgcontent_sec', isset($data) ? $data->section5_imgcontent_sec : '') }}"
                              required>
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
<div class="content-wrapper">
   <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header page-title fw-semibold fs-20 mb-0">
                  Section-6
               </div>
               <div class="card-body">
                  <form action="{{route('storelandingPage6')}}" method="POST" enctype="multipart/form-data"id="basic-form">
                     @csrf
                   
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label for="name" class="mt-2">Title<span class="text-danger">*</span></label>
                           <input type="text" name="section6_title"
                              class="form-control @error('section6_title') is-invalid @enderror"
                              value="{{ old('section6_title', isset($data) ? $data->section6_title : '') }}"
                              required>
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
<div class="content-wrapper">
   <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header page-title fw-semibold fs-20 mb-0">
                  Section-7
               </div>
               <div class="card-body">
                  <form action="{{route('storelandingPage7')}}" method="POST" enctype="multipart/form-data"id="basic-form">
                     @csrf
                   
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label for="name" class="mt-2">Title<span class="text-danger">*</span></label>
                           <input type="text" name="section7_title"
                              class="form-control @error('section7_title') is-invalid @enderror"
                              value="{{ old('section7_title', isset($data) ? $data->section7_title : '') }}"
                              required>
                        </div>
                        <div class="form-group col-md-8">
                           <label for="name" class="mt-2">Sub Title<span class="text-danger">*</span></label>
                        <input type="text" name="subtitle[]"
                              class="form-control @error('subtitle') is-invalid @enderror"
                              value="{{ old('subtitle', isset($data) ? $data->subtitle : '') }}"> 
                        </div>
                        <div class="form-group col-md-4">
                           <button id="secation7Title" type="button" class="btn btn-warning" style="margin-top: 27px;">ADD MORE</button>
                        </div>
                        <div id="Addsecation7Title">
                                
                        </div>

                        <div class="form-group col-md-12">
                           <label for="name" class="mt-2">Description <span
                              class="text-danger">*</span></label>
                           <textarea name="section7_des" class="ckeditor @error('section7_des') is-invalid @enderror"
                              id="ckeditor"></textarea>
                           @error('section7_des')
                           <span class="invalid-feedback form-invalid fw-bold" role="alert">
                           {{ $message }}
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-6">
                           <label for="name" class="mt-2">Note Title<span class="text-danger">*</span></label>
                           <input type="text" name="section7_note_title"
                              class="form-control @error('section7_note_title') is-invalid @enderror"
                              value="{{ old('section7_note_title', isset($data) ? $data->section7_note_title : '') }}"
                              required>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
   ClassicEditor
       .create(document.querySelector('#ckeditor'))
       .catch(error => {
           console.error(error);
       });
       
   
</script>
<script>
   $(document).ready(function() { 
       var i = 0;
       $("#secation3Title").click(function() {
           ++i;
           var newInputField = '<div class="row secation3Remove mt-3 mb-3">' + 
               '<div class="form-group col-md-6">' +
               '<label for="name" class="mt-2">Title<span class="text-danger">*</span></label>'+
               '<input type="text" name="title[]" class="form-control" value="" required>' +
               '</div>' +
               '<div class="form-group col-md-6">' +
               '<button class="btn btn-danger removesecation3" type="button" style="margin-top: 35px;">' +
               '<i class="bi bi-trash-fill"></i>' +
               '</button>' +
               '</div>' +
               '</div>';
           $("#Addsecation3Title").append(newInputField);
       });
       $("body").on("click", ".removesecation3", function() {
           $(this).closest(".secation3Remove").remove();
       });
   
   
   
       ////Secatiopn 5///
   
       $("#secation5Title").click(function() {
           ++i;
           var newInputField = '<div class="row secation5Remove mt-3 mb-3">' + 
               '<div class="form-group col-md-8">' +
               '<label for="name" class="mt-2">Sub Title<span class="text-danger">*</span></label>'+
               '<input type="text" name="subtitle[]" class="form-control" value="" required>' +
               '</div>' +
               '<div class="form-group col-md-4">' +
               '<button class="btn btn-danger removesecation5" type="button" style="margin-top: 35px;">' +
               '<i class="bi bi-trash-fill"></i>' +
               '</button>' +
               '</div>' +
               '</div>';
           $("#Addsecation5Title").append(newInputField);
       });
       $("body").on("click", ".removesecation5", function() {
           $(this).closest(".secation5Remove").remove();
       });
   
   
       ///Secation7////
   
       $("#secation7Title").click(function() {
           ++i;
           var newInputField = '<div class="row secation7Remove mt-3 mb-3">' + 
               '<div class="form-group col-md-8">' +
               '<label for="name" class="mt-2">Sub Title<span class="text-danger">*</span></label>'+
               '<input type="text" name="subtitle[]" class="form-control" value="" required>' +
               '</div>' +
               '<div class="form-group col-md-4">' +
               '<button class="btn btn-danger removesecation7" type="button" style="margin-top: 35px;">' +
               '<i class="bi bi-trash-fill"></i>' +
               '</button>' +
               '</div>' +
               '</div>';
           $("#Addsecation7Title").append(newInputField);
       });
       $("body").on("click", ".removesecation7", function() {
           $(this).closest(".secation7Remove").remove();
       });
   });
   
   
</script>