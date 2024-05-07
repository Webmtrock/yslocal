@extends('layouts.admin')
@section('content')
<body  class="login-img">
    <div id="loader" >
        <img src="{{ asset('public/admin/assets/images/media/loader.svg') }}" alt="">
    </div>
    <div class="page">
        <div class="page login-page">
            <div>
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                <img src="{{ asset('public/admin/assets/images/brand-logos/logo.png') }}" class="header-brand-img" alt="">
            </div>
        </div>

           <div class="container-login100">
               <div class="card wrap-login100 p-0">
                   <div class="card-body">
                   @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                   <form class="login100-form validate-form" action="{{ route('admin/store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <span class="login100-form-title">Registration</span>
                    <div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
                        <input type="text" class="form-control input100" name="name" id="input1" placeholder="Name" required>
                        <span class="focus-input100"></span>
                        
                        <span class="symbol-input100">
                            <i class="ri-user-fill" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
                        <input type="text" class="form-control input100" name="email" id="input2" placeholder="Email" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="ri-mail-fill" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-bs-validate = "Valid phone is required: ex@abc.xyz">
                        <input type="text" class="form-control input100" name="phone" id="input2" placeholder="phone" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="ri-phone-fill" aria-hidden="true"></i>
                        </span>
                    </div>



                           <div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
                               <input type="password" class="form-control input100" name="password" id="input3" placeholder="Password" required>
                               <span class="focus-input100"></span>
                               <span class="symbol-input100">
                                   <i class="ri-lock-fill" aria-hidden="true"></i>
                               </span>
                           </div>
                           <label class="custom-control custom-checkbox mt-4">
                               <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                               <span class="custom-control-label ms-1">Agree the <a href="terms.html" class="text-primary">terms and policy</a></span>
                           </label>
                           <div class="container-login100-form-btn">
                           <div class="mt-3">
                                <input class="btn btn-primary" type="submit" value="Save">
                            </div>
                               
                           </div>
                           <div class="text-center pt-3">
                               <p class="text-dark mb-0">Already have account?<a href="{{ route('admin/login') }}" class="text-primary ms-1">Sign In</a></p>
                           </div>
                       </form>
                   </div>

                   <div class="card-footer border-top">
                       <div class="d-flex justify-content-center my-3">
                           <a href="javascript:void(0);" class="social-login  text-center">
                               <i class="ri-google-fill"></i>
                           </a>
                           <a href="javascript:void(0);" class="social-login  text-center mx-4">
                               <i class="ri-facebook-fill"></i>
                           </a>
                           <a href="javascript:void(0);" class="social-login  text-center">
                               <i class="ri-twitter-fill"></i>
                           </a>
                       </div>
                   </div>

               </div>
           </div>
       </div>
   </div>
</div>
</body>
@endsection