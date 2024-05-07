@extends('frontend.master')
@section('title', 'Home')
@section('content')
<script src="https://wrmlabs.com/ys/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<!-- Choices Css -->
<link rel="stylesheet" href="https://wrmlabs.com/ys/assets/libs/choices.js/public/assets/styles/choices.min.css">
<br><br><br>
<div class="container">
  <div class="row">
    <div class="col-md-6">
    
      <h1 style="margin: 20px;">Gateway to wellness...</h1>
      <img src="https://projectstaging.live/public/images/loginimage2 1 1.png" width="100%">
      <img src="https://projectstaging.live/public/images/Group 2591 1.png" width="100%">
    </div>
    <div class="col-md-6 align_center">
    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
      <div style="width: 100%;border: 1px solid #22C55E;border-radius: 20px;padding: 30px;    text-align: center;">
      <form class="login100-form validate-form" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2 style="margin: 20px;" >Create Your Account</h2>
        <div class="row">
          <div class="col-md-12">
            <input type="name" placeholder="Enter your name" name="name" value="{{old('name')}}"  class="ys-field" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-12">
            <input type="text" placeholder="Enter your mobile number" name="phone" value="{{$phone ?? ''}}" class="ys-field" required readonly>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-12">
            <input type="email" placeholder="Enter your Email Id" name="email" value="{{$email ?? ''}}" class="ys-field" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          @php
              $category = \App\Helper\Helper::GetCategory();
          @endphp
          <div class="col-md-12">
           
            <div class="col-md-12">
    <div class="input-group">
        <input type="text" placeholder="Enter your mobile number" name="phone" value="{{$phone ?? ''}}" class="ys-field" required readonly>
        <div class="input-group-append" style="width:100%; margin-bottom: 25px;">
            <button style="background:linear-gradient(to bottom, #FFE575 10%,#F9D121 100%); border:none; color:#000000; width:100%;" type="button" class="btn btn-primary" id="openCategoryPopup">Select Interest</button>
            <br>
        </div>
        <br>
    </div>
    @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Category Popup -->
<div class="modal" id="categoryPopup">
    <div class="modal-dialog">
        <div class="modal-content" style="background: #ffffff;border: 2px solid #000000;     width: 65%;">
            <div class="modal-header">
                <center><h5 class="modal-title">Select Your Interest</h5></center>
                <button type="button" class="close" id="closeCategoryPopup">&times;</button>
            </div>
            <div class="modal-body">
                <div class="category-list">
                    @foreach($category as $categorys)

                        <div class="form-check form_btn_check">
                            <input style="visibility:hidden;" class="form-check-input category-checkbox" name="categories_id[]" type="checkbox" value="{{ $categorys->id }}" id="category_{{ $categorys->id }}">
                            <label class="form-check-label" for="category_{{ $categorys->id }}">
                                <center><img style="width:40px; height:40px;" src="{{ url(config('app.category-image')).'/'.$categorys->category_image ?? '' }}"> <br>{{ $categorys->title }}</center>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <center><button style="background: #F9D122;border: none;" type="button" class="btn btn-secondary" id="closeCategoryPopup">Finish</button></center>
            </div>
        </div>
    </div>
</div>

            
            
            <input type="text" placeholder="Enter your mobile number" name="phone" value="{{$phone ?? ''}}" class="ys-field" required readonly>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          
          
          <div class="col-md-12">
    <div class="input-group">
        <input type="password" placeholder="Enter your password" name="password" id="password" class="ys-field password-toggle" required>
        <div class="input-group-append">
            <span class="input-group-text toggle-password">
                <i class="fa fa-eye" id="togglePassword"></i>
            </span>
        </div>
    </div>
    @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-12">
    <div class="input-group">
        <input type="password" placeholder="Confirm password" name="confirm_password" id="confirm_password" class="ys-field password-toggle" required>
        <div class="input-group-append">
            <span class="input-group-text toggle-password">
                <i class="fa fa-eye" id="toggleConfirmPassword"></i>
            </span>
        </div>
    </div>
    @error('confirm_password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>




          <div class="text-end pt-1">
            <p class="mb-0"><a href="forgot-password.html" class="text-primary ms-1">Forgot Password?</a></p>
          </div>
          <div class="col-md-12">
            <div class="form-cta">
               <button type="submit" class="yst-btn " style="width: 100%;">Signup </button>
              </div>
            </div>
          </div>
           <div class="text-center pt-3">
            <p class="text-dark mb-0">Signup as a user?<a href="{{route('user.signup')}}" class="text-primary ms-1">Sign Up</a></p>
          </div>
        </form>
       </div>
      </div>
    </div>
   </div>
   <br>
<br><br>
<style>
    .align_center
     {
         display: flex;
    align-items: center;
    flex-wrap: wrap;
     }

   ul.ulClass li .active
   {
   background: #22C55E !important;
   color: #ffffff !important;
   border: 1px solid #22C55E !important;
   }
   ul.ulClass li button {
   border: solid #22C55E !important;
   margin: 12px 0px;
   background: transparent;
   color: #000;
   border-radius: 0px !important;
   font-size: 22px;
   width: 100%;
   text-align: left;
   padding: 12px 10px;
   }
   ul.ulClass li button i {
   color:#F9D120;
   margin-right:10px;
   }
   .edit_profile{
   background: #22C65F;
   color: #fff;
   padding: 10px 21px;
   border-radius: 22px;
   float: right;
   }
   .ul_list_button li
   {
   background: #F9D120;
   margin-right: 10px;
   padding: 2px 12px;
   border-radius: 14px;
   }
   [data-value="Choice 2"] {
    display: none !important;
    visibility: hidden;
}
[data-value="Choice 3"] {
    display: none !important;
    visibility: hidden;
}

.password-toggle {
    position: relative;
}

.toggle-password {
    cursor: pointer;
    position: absolute;
    right: 10px;
    top: 30%;
    transform: translateY(-50%);
}
.custom-checkbox-label {
    position: relative;
    display: flex;
    align-items: center;
    cursor: pointer;
    padding-left: 30px;
}

.custom-checkbox-label .custom-checkbox-icon {
    position: absolute;
    left: 0;
    top: 0;
    width: 20px;
    height: 20px;
    border: 2px solid #ccc;
    border-radius: 3px;
}

.custom-checkbox-label input[type="checkbox"] {
    display: none;
}

.custom-checkbox-label input[type="checkbox"]:checked + .custom-checkbox-icon::after {
    content: '';
    display: block;
    width: 12px;
    height: 12px;
    background-color: #007bff;
    border-radius: 2px;
    position: absolute;
    left: 4px;
    top: 4px;
}
.form-check.form_btn_check {
    display: inline-block;
}
.form-check.form_btn_check label {
    display: grid;
    background: #ffffff;
    border: 2px solid #000000;
    padding: 12px 20px;
    margin: 10px 0px;
    font-size: 10px;
    border-radius: 6px;
    text-align: center;
}
.category-list .form-check {
    display: inline-block;
}
.form_btn_check input[type="checkbox"]:checked + label {
    background-color: #F9D122; /* Change to your desired background color */
    color:#000000;
}
</style>

        
<script src="https://wrmlabs.com/ys/assets/js/choices.js"></script>
<!-- Custom JS -->
<script src="https://wrmlabs.com/ys/assets/js/custom.js"></script>

<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        var passwordInput = document.getElementById('password');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });

    document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
        var confirmPasswordInput = document.getElementById('confirm_password');
        if (confirmPasswordInput.type === 'password') {
            confirmPasswordInput.type = 'text';
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            confirmPasswordInput.type = 'password';
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var openCategoryPopupButton = document.getElementById('openCategoryPopup');
    var closeCategoryPopupButtons = document.querySelectorAll('#closeCategoryPopup');
    var saveSelectedCategoriesButton = document.getElementById('saveSelectedCategories');
    var categoryPopup = document.getElementById('categoryPopup');
    var categoryCheckboxes = document.querySelectorAll('.category-checkbox');
    var choicesMultipleDefault = document.getElementById('choices-multiple-default');

    openCategoryPopupButton.addEventListener('click', function() {
        categoryPopup.style.display = 'block';
    });

    closeCategoryPopupButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            categoryPopup.style.display = 'none';
        });
    });

    saveSelectedCategoriesButton.addEventListener('click', function() {
        var selectedCategories = [];
        categoryCheckboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                selectedCategories.push(checkbox.value);
            }
        });
        choicesMultipleDefault.value = selectedCategories.join(',');
        categoryPopup.style.display = 'none';
    });
});

</script>

 
 @endsection