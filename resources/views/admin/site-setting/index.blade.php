@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        @if(Session::has('success'))
            @section('scripts')
                <script>swal("Good job!", "{{ Session::get('success') }}", "success");</script>
            @endsection
        @endif

        @if(Session::has('error'))
            @section('scripts')
                <script>swal("Oops...", "{{ Session::get('error') }}", "error");</script>
            @endsection
        @endif
        <!-- Start:: row-7 -->
        <div class="row">
            <div>
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            Website Setting
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs tab-style-1 d-sm-flex d-block" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#sitesettings" aria-current="page" href="#sitesettings">Site Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#paymentsettings" href="#paymentsettings">Payment Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#emailsettings" href="#emailsettings">Email Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#topheadersetting" href="#topheadersetting">Top Header Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ourofferings" href="#ourofferings">Our Offerings</a>
                            </li>
                        </ul>

                        <!-- site settings start -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="sitesettings" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header border-bottom">
                                                Site Setting
                                            </div>
                                            <div class="card-body">
                                                <form action="{{ route('site-setting.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <label for="name" class="mt-2"> Logo 1 <span class="text-danger info">(Only jpeg, png, jpg files allowed)</span></label>
                                                                    <input type="file" name="logo_1" class="form-control @error('logo_1') is-invalid @enderror" accept="image/jpeg,image/png">
                                                                    <input type="hidden" class="form-control" name="logo_1_old" value="{{ isset($data) && isset($data['logo_1']) ? $data['logo_1'] : ''}}">
                                                                    @error('logo_1')
                                                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-5 mt-auto">
                                                                    @if(!empty($data['logo_1']))
                                                                        <div class="mt-3">
                                                                            <span class="pip" data-title="{{ $data['logo_1'] }}">
                                                                                <img src="{{ url(config('app.logo')).'/'.$data['logo_1'] ?? '' }}" alt="" width="150" height="50px">
                                                                            </span>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <label for="name" class="mt-2"> Favicon Ican <span class="text-danger info">(Only jpeg, png, jpg files allowed)</span></label>
                                                                    <input type="file" name="logo_2" class="form-control @error('logo_2') is-invalid @enderror" accept="image/jpeg,image/png">
                                                                    <input type="hidden" class="form-control" name="logo_2_old" value="{{ isset($data) && isset($data['logo_2']) ? $data['logo_2'] : ''}}">
                                                                    @error('logo_2')
                                                                        <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-5 mt-auto">
                                                                    @if(!empty($data['logo_2']))
                                                                        <div class="mt-3">
                                                                            <span class="pip" data-title="{{ $data['logo_2'] }}">
                                                                                <img src="{{ url(config('app.logo')).'/'.$data['logo_2'] ?? '' }}" alt="" width="150" height="50px">
                                                                            </span>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="name" class="mt-2">Admin Email <span class="text-danger">*</span></label>
                                                            <input type="email" name="admin_mail" class="form-control @error('admin_mail') is-invalid @enderror" placeholder="Admin Email" value="{{ old('admin_mail', isset($data) && isset($data['admin_mail']) ? $data['admin_mail'] : '') }}" required>
                                                            @error('admin_mail')
                                                                <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                                                    {{ $message }}
                                                                </span>
                                                            @enderror
                                                        </div>

                            <div class="mt-3">
                                <input class="btn btn-primary" type="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- site settings end -->
 <!-- payment settings start -->
 <div class="tab-pane" id="paymentsettings" role="tabpanel">
    <div class="text-muted">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        Payment Setting
                    </div>
                    <div class="card-body">
                        <form action="{{ route('site-setting.paymentstore') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="razorpay_live_key_id" class="mt-2">Razorpay Live Key ID</label>
                            <input type="text" name="razorpay_live_key_id" class="form-control @error('razorpay_live_key_id') is-invalid @enderror" placeholder="Razorpay Live Key ID" value="{{ old('razorpay_live_key_id', isset($data) && isset($data['razorpay_live_key_id']) ? $data['razorpay_live_key_id'] : '') }}" required>
                            @error('razorpay_live_key_id')
                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="razorpay_live_secret_id" class="mt-2">Razorpay Live Secret ID</label>
                            <input type="text" name="razorpay_live_secret_id" class="form-control @error('razorpay_live_secret_id') is-invalid @enderror" placeholder="Razorpay Live Secret ID" value="{{ old('razorpay_live_secret_id', isset($data) && isset($data['razorpay_live_secret_id']) ? $data['razorpay_live_secret_id'] : '') }}" required>
                            @error('razorpay_live_secret_id')
                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="razorpay_test_key_id" class="mt-2">Razorpay Test Key ID</label>
                            <input type="text" name="razorpay_test_key_id" class="form-control @error('razorpay_test_key_id') is-invalid @enderror" placeholder="Razorpay Test Key ID" value="{{ old('razorpay_test_key_id', isset($data) && isset($data['razorpay_test_key_id']) ? $data['razorpay_test_key_id'] : '') }}" required>
                            @error('razorpay_test_key_id')
                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="razorpay_test_secret_id" class="mt-2">Razorpay Test Secret ID</label>
                            <input type="text" name="razorpay_test_secret_id" class="form-control @error('razorpay_test_secret_id') is-invalid @enderror" placeholder="Razorpay Test Secret ID" value="{{ old('razorpay_test_secret_id', isset($data) && isset($data['razorpay_test_secret_id']) ? $data['razorpay_test_secret_id'] : '') }}" required>
                            @error('razorpay_test_secret_id')
                            <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="live_key_status" class="mt-2">Status</label>
                            <select class="form-select" aria-label="Default select example" name="razorpay_active_inactive_status" required>
    <option value="0" {{ isset($data) && isset($data['razorpay_active_inactive_status']) && $data['razorpay_active_inactive_status'] == 0 ? 'selected' : '' }}>Inactive</option>
    <option value="1" {{ isset($data) && isset($data['razorpay_active_inactive_status']) && $data['razorpay_active_inactive_status'] == 1 ? 'selected' : '' }}>Active</option>
</select>

                        </div>
                    </div>
                    <div class="mt-3">
                                <input class="btn btn-primary" type="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- payment settings end -->
<!-- email settings start -->
<div class="tab-pane" id="emailsettings" role="tabpanel">
    <div class="text-muted">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        Email Setting
                    </div>
                    <div class="card-body">
                        <form action="{{ route('site-setting.emailstore') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="mail_mailer" class="mt-2">Mail Mailer</label>
                                    <input type="text" name="mail_mailer" class="form-control @error('mail_mailer') is-invalid @enderror" placeholder="Mail Mailer" value="{{ old('mail_mailer', isset($data) && isset($data['mail_mailer']) ? $data['mail_mailer'] : '') }}" required>
                                    @error('mail_mailer')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mail_host" class="mt-2">Mail Host</label>
                                    <input type="text" name="mail_host" class="form-control @error('mail_host') is-invalid @enderror" placeholder="Mail Host" value="{{ old('mail_host', isset($data) && isset($data['mail_host']) ? $data['mail_host'] : '') }}" required>
                                    @error('mail_host')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="mail_port" class="mt-2">Mail Port</label>
                                    <input type="text" name="mail_port" class="form-control @error('mail_port') is-invalid @enderror" placeholder="Mail Port" value="{{ old('mail_port', isset($data) && isset($data['mail_port']) ? $data['mail_port'] : '') }}" required>
                                    @error('mail_port')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mail_from_name" class="mt-2">Mail From Name</label>
                                    <input type="text" name="mail_from_name" class="form-control @error('mail_from_name') is-invalid @enderror" placeholder="Mail From Name" value="{{ old('mail_from_name', isset($data) && isset($data['mail_from_name']) ? $data['mail_from_name'] : '') }}" required>
                                    @error('mail_from_name')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="mail_username" class="mt-2">Mail Username</label>
                                    <input type="text" name="mail_username" class="form-control @error('mail_username') is-invalid @enderror" placeholder="Mail Username" value="{{ old('mail_username', isset($data) && isset($data['mail_username']) ? $data['mail_username'] : '') }}" required>
                                    @error('mail_username')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mail_password" class="mt-2">Mail Password</label>
                                    <input type="password" name="mail_password" class="form-control @error('mail_password') is-invalid @enderror" placeholder="Mail Password" value="{{ old('mail_password', isset($data) && isset($data['mail_password']) ? $data['mail_password'] : '') }}" required>
                                    @error('mail_password')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="mail_encryption" class="mt-2">Mail Encryption</label>
                                    <input type="text" name="mail_encryption" class="form-control @error('mail_encryption') is-invalid @enderror" placeholder="Mail Encryption" value="{{ old('mail_encryption', isset($data) && isset($data['mail_encryption']) ? $data['mail_encryption'] : '') }}" required>
                                    @error('mail_encryption')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mail_from_address" class="mt-2">Mail From Address</label>
                                    <input type="email" name="mail_from_address" class="form-control @error('mail_from_address') is-invalid @enderror" placeholder="Mail From Address" value="{{ old('mail_from_address', isset($data) && isset($data['mail_from_address']) ? $data['mail_from_address'] : '') }}" required>
                                    @error('mail_from_address')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-3">
                                <input class="btn btn-primary" type="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tab-pane" id="topheadersetting" role="tabpanel">
    <div class="text-muted">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        Top Header Setting
                    </div>
                    <div class="card-body">
                        <form action="{{ route('site-setting.topheaderstore') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="top_header_text" class="mt-2"><span class="text-danger">*</span> Top Header Text</label>
                                    <input type="text" name="top_header_text" class="form-control @error('top_header_text') is-invalid @enderror" placeholder="Top Header Text" value="{{ old('top_header_text', isset($data) && isset($data['top_header_text']) ? $data['top_header_text'] : '') }}" required>
                                    @error('top_header_text')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="top_header_button_text" class="mt-2"> <span class="text-danger">* </span> Top Header Button text</label>
                                    <input type="text" name="top_header_button_text" class="form-control @error('top_header_button_text') is-invalid @enderror" placeholder="Button Text" value="{{ old('top_header_button_text', isset($data) && isset($data['top_header_button_text']) ? $data['top_header_button_text'] : '') }}" required>
                                    @error('top_header_button_text')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="top_header_button_link" class="mt-2"><span class="text-danger">* </span> Top Header Button Link</label>
                                    <input type="text" name="top_header_button_link" class="form-control @error('top_header_button_link') is-invalid @enderror" placeholder="Top Header Button Link" value="{{ old('top_header_button_link', isset($data) && isset($data['top_header_button_link']) ? $data['top_header_button_link'] : '') }}" required>
                                    @error('top_header_button_link')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                             
                            </div>
                           
                            <div class="mt-3">
                                <input class="btn btn-primary" type="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane" id="ourofferings" role="tabpanel">
    <div class="text-muted">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                    Our Offerings
                    </div>
                    <div class="card-body">
                        <form action="{{ route('site-setting.ourofferingstore') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                               <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="our_offerings_program_name" class="mt-2"><span class="text-danger">*</span> Our Offering Program Name</label>
                                    <input type="text" name="our_offerings_program_name" class="form-control @error('our_offerings_program_name') is-invalid @enderror" placeholder="Our Offering Program Name" value="{{ old('our_offerings_program_name', isset($data) && isset($data['our_offerings_program_name']) ? $data['our_offerings_program_name'] : '') }}" >
                                    @error('our_offerings_program_name')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="our_offerings_workshop_name" class="mt-2"><span class="text-danger">*</span> Our Offering Workshop Name</label>
                                    <input type="text" name="our_offerings_workshop_name" class="form-control @error('our_offerings_workshop_name') is-invalid @enderror" placeholder="Our Offering Workshop Name" value="{{ old('our_offerings_workshop_name', isset($data) && isset($data['our_offerings_workshop_name']) ? $data['our_offerings_workshop_name'] : '') }}">
                                    @error('our_offerings_workshop_name')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                </div>
                                <div class="row">
                                <div class="form-group col-md-6">
                     <label for="our_offerings_program_image" class="mt-2"> <span class="text-danger">* </span> Our Offering Program images</label>
                     <input type="file" name="our_offerings_program_image" class="form-control @error('our_offerings_program_image') is-invalid @enderror" placeholder="Button Text">
                        @error('our_offerings_program_image')
                     <span class="invalid-feedback form-invalid fw-bold" role="alert">
                          {{ $message }}
                   </span>
                   @enderror
                     @if($data['our_offerings_program_image'])
                 <img src="{{ asset('public/images/' . $data['our_offerings_program_image']) }}" alt="Offerings Program Image">
                 @endif
                   </div>

                                <div class="form-group col-md-6">
                                    <label for="top_header_button_text" class="mt-2"> <span class="text-danger">* </span> Our Offering Workshop images</label>
                                    <input type="file" name="our_offerings_workshop_image" class="form-control @error('our_offerings_workshop_image') is-invalid @enderror" placeholder="Button Text">
                                    @error('our_offerings_workshop_image')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                    @if($data['our_offerings_workshop_image'])
                                <img src="{{ asset('public/images/' . $data['our_offerings_workshop_image']) }}" alt="Our Offering Workshop images">
                             @endif
                                </div>
                                </div>
                                <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="our_offerings_healthpedia_name" class="mt-2"><span class="text-danger">*</span> Our Offering Healthpedia Name</label>
                                    <input type="text" name="our_offerings_healthpedia_name" class="form-control @error('our_offerings_healthpedia_name') is-invalid @enderror" placeholder="Our Offering Healthpedia Name" value="{{ old('our_offerings_healthpedia_name', isset($data) && isset($data['our_offerings_healthpedia_name']) ? $data['our_offerings_healthpedia_name'] : '') }}">
                                    @error('our_offerings_healthpedia_name')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="our_offerings_consultation_name" class="mt-2"><span class="text-danger">*</span> Our Offering Consultation Name</label>
                                    <input type="text" name="our_offerings_consultation_name" class="form-control @error('our_offerings_consultation_name') is-invalid @enderror" placeholder="Our Offering Healthpedia Name" value="{{ old('our_offerings_consultation_name', isset($data) && isset($data['our_offerings_consultation_name']) ? $data['our_offerings_consultation_name'] : '') }}">
                                    @error('our_offerings_consultation_name')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                </div>
                                <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="our_offerings_healthpedia_image" class="mt-2"> <span class="text-danger">* </span> Our Offering Healthpedia images</label>
                                    <input type="file" name="our_offerings_healthpedia_image" class="form-control @error('our_offerings_healthpedia_image') is-invalid @enderror" placeholder="Button Text">
                                    @error('our_offerings_healthpedia_image')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                    @if($data['our_offerings_healthpedia_image'])
                                <img src="{{ asset('public/images/' . $data['our_offerings_healthpedia_image']) }}" alt="our_offerings_healthpedia_image">
                             @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="our_offerings_consultation_image" class="mt-2"> <span class="text-danger">* </span> Our Offering Consultation images</label>
                                    <input type="file" name="our_offerings_consultation_image" class="form-control @error('image') is-invalid @enderror" placeholder="Button Text">
                                    @error('our_offerings_consultation_image')
                                    <span class="invalid-feedback form-invalid fw-bold" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                    @if($data['our_offerings_consultation_image'])
                                <img src="{{ asset('public/images/' . $data['our_offerings_consultation_image']) }}" alt="our_offerings_consultation_image">
                             @endif
                                </div>
                               </div>
                            
                           
                            <div class="mt-3">
                                <input class="btn btn-primary" type="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- email settings end -->
@endsection
