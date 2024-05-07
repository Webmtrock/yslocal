@extends('layouts.app')
@section('content')

<div class="content-wrapper">

    <div class="row">
        <div class="col-lg-12">
        <div class="card">
           
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 mt-auto">
                                <h5>{{ isset($coupon) ? 'Edit Coupon' : ' Create Coupon' }}</h5>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="row float-end">
                                        <div class="col-xl-12 d-flex float-end">
                                        <a href="{{route('coupon.index')}}" class="btn btn-primary btn-wave waves-effect waves-light me-2">
                                       Back </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <div class="card-body">



                    <form action="{{ isset($coupon) ? route('coupon.update', $coupon->id) : route('coupon.store') }}"
                        method="POST" enctype="multipart/form-data" id="basic-form">
                        @csrf
                        @if(isset($coupon))
                        @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="webinar_id" class="mt-2">Select Webinar/Program <span
                                            class="text-danger">*</span></label>
                                            <select  class="form-control" name="webinar_id">
                                            <option value="" disabled selected>Select Webinar/Program</option>
                                                <optgroup label="Select Webinar">
                                                @foreach($wibinar as $wibinars)
                                                    <option value="{{ $wibinars->id }}"
                                                        {{ old('webinar_id', (isset($coupon) && $coupon->webinar_id == $wibinars->id) ? 'selected' : '') }}>
                                                        {{ $wibinars->webinar_title }}
                                                    </option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Select Program" >
                                             @foreach($program as $programs)
                                                <option value="{{ $programs->id }}"
                                                    {{ old('program_id', isset($coupon) && $coupon->program_id == $programs->id ? 'selected' : '') }}>
                                                    {{ $programs->title }}
                                                </option>
                                                @endforeach

                                                </optgroup>
                                                </select>
                                                <span class="text-danger">{{($errors->first('webinar_id'))?$errors->first('webinar_id'):''}}</span>
                                     
                                    <!-- <select class="form-control" name="webinar_id">
                                        <option value="">Select Webinar</option>
                                        @foreach($wibinar as $wibinars)
                                        <option value="{{ $wibinars->id }}"
                                            {{ old('webinar_id', (isset($coupon) && $coupon->webinar_id == $wibinars->id) ? 'selected' : '') }}>
                                            {{ $wibinars->webinar_title }}
                                        </option>
                                        @endforeach
                                    </select> -->
                                </div>

                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="mt-2"> Select Program <span
                                            class="text-danger"></span></label>
                                    <select class="form-control" name="program_id">
                                        <option value="">Select Program</option>
                                        @foreach($program as $programs)
                                        <option value="{{ $programs->id }}"
                                            {{ old('program_id', isset($coupon) && $coupon->program_id == $programs->id ? 'selected' : '') }}>
                                            {{ $programs->title }}
                                        </option>
                                        @endforeach

                                    </select>

                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="select_plan" class="mt-2">Select Plan <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="select_plan">
                                        <option value="">Select Plan</option>
                                        <option
                                            {{ old('select_plan', isset($coupon) && $coupon->select_plan == 'Educational' ? 'selected' : '') }}>
                                            Educational</option>
                                        <option
                                            {{ old('select_plan', isset($coupon) && $coupon->select_plan == 'Treatment' ? 'selected' : '') }}>
                                            Treatment</option>
                                    </select>
                                    <span class="text-danger">{{($errors->first('select_plan'))?$errors->first('select_plan'):''}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="discount" class="mt-2">Discount in %</label>
                                    <input type="number" name="discount"
                                        class="form-control @error('discount') is-invalid @enderror"
                                        value="{{ old('discount', isset($coupon) ? $coupon->discount : '') }}">
                                        <span class="text-danger">{{($errors->first('discount'))?$errors->first('discount'):''}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_date" class="mt-2">Start Date</label>
                                    <input type="date" name="start_date"
                                        class="form-control @error('start_date') is-invalid @enderror"
                                        value="{{ old('start_date', isset($coupon) ? $coupon->start_date : '') }}">
                                        <span class="text-danger">{{($errors->first('start_date'))?$errors->first('start_date'):''}}</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_date" class="mt-2">End Date</label>
                                    <input type="date" name="end_date"
                                        class="form-control @error('end_date') is-invalid @enderror"
                                        value="{{ old('end_date', isset($coupon) ? $coupon->end_date : '') }}">
                                        <span class="text-danger">{{($errors->first('end_date'))?$errors->first('end_date'):''}}</span>
                                </div>
                            </div>
                        </div> 


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="coupon_code" class="mt-2">Coupon Code</label>
                                    <input type="text" id="coupon_code" name="coupon_code" 
                                        class="form-control @error('coupon_code') is-invalid @enderror"
                                        value="{{ old('coupon_code', isset($coupon) ? $coupon->coupon_code : '') }}">
                                        <span class="text-danger">{{($errors->first('coupon_code'))?$errors->first('coupon_code'):''}}</span>

                                </div>
                                
                            </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-info mt-4" onclick="generateCoupon()">Generate
                                    Coupon</button>
                                </div>
                            
                        </div>
                        <div>
                            @if(isset($coupon))
                            <button type="submit" class="btn bg-warning text-black mt-3 w-25 " name="update"
                                value="1">Update</button>
                            @else
                            <button type="submit" class="btn btn-warning text-black mt-3 w-20">Create</button>
                            @endif
                        </div>




                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
 <!-- Date & Time Picker JS -->
 <script src="../assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="../assets/js/date&time_pickers.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/custom.js"></script>

<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#ckeditor'))
    .catch(error => {
        console.error(error);
    });
</script>
<script>
function generateCoupon() {
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    var couponCode = '';
    var length = 8;

    for (var i = 0; i < length; i++) {
        couponCode += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    document.getElementById('coupon_code').value = couponCode;
}
</script>