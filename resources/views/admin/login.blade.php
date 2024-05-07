
@extends('layouts.admin')
@section('content')
<body  class="login-img">
    <div id="loader" >
        <img src="{{ asset('admin/assets/images/media/loader.svg') }}" alt="">
    </div>
    <div class="page">
        <div class="page login-page">
            <div>
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <img src="{{ asset('admin/assets/images/brand-logos/logo.png') }}" class="header-brand-img" alt="">
                    </div>
                </div>
                <div class="container-login100">
                    <div class="card  wrap-login100 p-0">
                        <div class="card-body">
                            <form class="login100-form validate-form" action="{{ route('admin/getlogin') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <span class="login100-form-title">Login</span>
                                <div class="wrap-input100 validate-input" data-bs-validate="Valid email is required: ex@abc.xyz">
                                    <input type="text" class="form-control input100" name="email" id="input" placeholder="Email" required>
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="ri-mail-fill" aria-hidden="true"></i>
                                    </span>
                                </div>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="wrap-input100 validate-input" data-bs-validate="Password is required">
                                    <input type="password" class="form-control input100" name="password" id="input2" placeholder="Password" required>
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="ri-lock-fill" aria-hidden="true"></i>
                                    </span>
                                </div>
                                 @error('password')
                                 <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                                 @if ($errors->any())
                                 <div class="alert alert-danger mt-3">
                                    @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                                 @endif
                                 <div class="text-end pt-1">
                                    <p class="mb-0"><a href="forgot-password.html" class="text-primary ms-1">Forgot Password?</a></p>
                                </div>
                                <div class="container-login100-form-btn">
                                    <div class="mt-3">
                                        <input class="login100-form-btn btn-primary" type="submit" value="Login">
                                    </div>
                                </div>
                                <div class="text-center pt-3">
                                    <p class="text-dark mb-0">Not a member?<a href="{{ route('admin/register') }}" class="text-primary ms-1">Create an Account</a></p>
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

