<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\WebinarsController;
use App\Http\Controllers\Admin\ProgramsController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FrontEnd\ExpertsController;
use App\Http\Controllers\FrontEnd\WorkshopController;
use App\Http\Controllers\FrontEnd\ProgramController;
use App\Http\Controllers\FrontEnd\WebinarContoller;
use App\Http\Controllers\FrontEnd\HealthpediaController;
use App\Http\Controllers\FrontEnd\AboutController;
use App\Http\Controllers\FrontEnd\FaqController;
use App\Http\Controllers\FrontEnd\ContactController;
use App\Http\Controllers\FrontEnd\RegisterExpertController;
use App\Http\Controllers\FrontEnd\CheckoutController;
use App\Http\Controllers\FrontEnd\RazorpayPaymentsController;
use App\Http\Controllers\FrontEnd\UsersController;
use App\Http\Controllers\FrontEnd\ThankyouController;
use App\Http\Controllers\FrontEnd\FormDataController;

// use App\Http\Controllers\Admin\RazorpayController;
use Illuminate\Support\Facades\Artisan;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('admin.login');
// });
 

    // frontend Routes
      //register
      Route::get('/signup', [UsersController::class,'signup'])->name('user.signup');
      Route::get('/user/store', [UsersController::class,'store'])->name('user.store');
      Route::get('/login', [UsersController::class,'login'])->name('user.login');
      Route::get('/dashboard', [UsersController::class,'dashboard'])->name('user.dashboard');

      Route::get('/', [FrontendController::class, 'home'])->name('user.home');
      Route::get('/workshops', [WebinarContoller::class, 'workshops'])->name('user.workshops');
      Route::get('/workshop/{id}', [WebinarContoller::class, 'workshop'])->name('user.workshop');
      
      Route::get('/programs', [ProgramController::class, 'programs'])->name('user.programs');
      Route::get('/program/{id}', [ProgramController::class, 'program'])->name('user.program');
      Route::post('/get-plan', [ProgramController::class, 'getPlan'])->name('getplan.type');
      
      Route::get('/experts', [ExpertsController::class, 'experts'])->name('user.experts');
      Route::get('/expert/{id}', [ExpertsController::class, 'expert'])->name('user.expert');
      
      Route::get('/healthpedia', [HealthpediaController::class, 'healthpedia'])->name('user.healthpedia');
      Route::get('/healthpedia/{id}', [HealthpediaController::class, 'healthpediadetail'])->name('user.healthpediadetail');
      
      
      Route::get('/about', [AboutController::class, 'about'])->name('user.about');
      Route::get('/faq', [FaqController::class, 'faq'])->name('user.faq');
      Route::get('/contact', [ContactController::class, 'contact'])->name('user.contact');
      Route::get('/register-expert', [RegisterExpertController::class, 'register'])->name('user.register.expert');
      Route::get('/privacy-policy', [ContactController::class, 'privacypolicy'])->name('user.privacy.policy');
     Route::get('/gallery', [ContactController::class, 'gallery'])->name('user.gallery');
     
    Route::post('/', [FormDataController::class, 'submitForm'])->name('submit.form');
    Route::post('/contact', [FormDataController::class, 'contactForm'])->name('contact.form');
    Route::post('/thankyou', [FormDataController::class, 'callbackForm'])->name('callback.form');

     
    Route::get('/checkout/{id}', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('/thankyou', [ThankyouController::class, 'thankyou'])->name('thankyou.index');

//Razorpay Payment Gateway
// Route::get('/payment', [RazorpayPaymentsController::class, 'index']);
// Route::post('/payment', [RazorpayPaymentsController::class, 'store']);
      
      

    // Backend Routes 
    
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin/getlogin');
    Route::get('/register', [AdminLoginController::class, 'registerindex'])->name('admin/register');
    Route::post('/register', [AdminLoginController::class, 'store'])->name('admin/store');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin/logout');

    Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin/login');
    Route::middleware('admin')->prefix('admin')->group(function () {
        
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('roles', RolesController::class);


//role and permission
    Route::resource('permissions', PermissionsController::class);
    Route::resource('webinars', WebinarsController::class);
    //Route::put('/admin/webinars/{webinar}', [WebinarsController::class, 'update'])->name('webinars.update');


//Expert
    Route::resource('/expert', ExpertController::class);
    Route::post('/expert/create', [ExpertController::class, 'store'])->name('expert.store');
    Route ::get('/expert/{id}/edit',[ExpertController::class, 'edit']);
    Route ::put('/expert/{id}/update',[ExpertController::class, 'update'])->name('expert.update');
    Route::delete('expert/{id}/delete', [ExpertController::class, 'destroy'])->name('expert.destroy');

// Users 

    
    Route::delete('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');

// Categories
    Route::resource('categories', CategoriesController::class);
    // Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
    // Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    // Route::post('/categories/store', [CategoriesController::class, 'store'])->name('categories.store');
    // Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    // Route::put('/categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    // Route::delete('/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');


    //Article
    Route::resource('article', ArticleController::class);
    Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    // Route::delete('article/delete/{id}', [ArticleController::class, 'delete'])->name('article.delete');
    Route::delete('article/delete/{id}', [ArticleController::class, 'destroy'])->name('article.delete');
    Route::put('/article/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::get('/articles/drafted', [ArticleController::class, 'draftedIndex'])->name('article.draftedIndex');

    
      //programs

    Route::get('/programs', [ProgramsController::class, 'index'])->name('programs.index');
    Route::get('/programs/create', [ProgramsController::class, 'create'])->name('programs.create');
    Route::post('/programs/store', [ProgramsController::class, 'store'])->name('programs.store');
    Route::get('/programs/edit/{id}', [ProgramsController::class, 'edit'])->name('programs.edit');
    Route::put('/programs/update/{id}', [ProgramsController::class, 'update'])->name('programs.update');
    Route::delete('/programs/delete/{id}', [ProgramsController::class, 'delete'])->name('programs.delete');  
    

    //Program Session
    Route::get('/programs/session-list/{id}', [ProgramsController::class, 'ProgramSecationList'])->name('programs.session.list');
    Route::get('/programs/session-add/{id}', [ProgramsController::class, 'ProgramSecationAdd'])->name('programs.session.add');
    Route::post('/programs/session-store/', [ProgramsController::class, 'ProgramSecationStore'])->name('programs.session.store');
    Route::get('/programs/session-edit/{id}', [ProgramsController::class, 'ProgramSecationEdit'])->name('programs.session.edit');
    Route::post('/programs/session-update/{id}', [ProgramsController::class, 'ProgramSecationUpdate'])->name('programs.session.update');
    Route::delete('programs/session-delete/{id}', [ProgramsController::class, 'ProgramSecationDelete'])->name('programs.session.delete');

    //Program Session

//Coupon

    Route::resource('coupon', CouponsController::class);
    Route::get('/coupon', [CouponsController::class, 'index'])->name('coupon.index');
    Route::get('/coupon/edit/{id}', [CouponsController::class, 'edit'])->name('coupon.edit');
    Route::put('/coupon/{id}', [CouponsController::class, 'update'])->name('coupon.update');
    Route::delete('coupon/delete/{id}', [CouponsController::class, 'destroy'])->name('coupon.delete');


//Email template

    Route::resource('emails', EmailTemplateController::class);
    Route::resource('site-setting', SettingController::class);
    Route::post('/site-setting/paymentstore', [SettingController::class, 'paymentstore'])->name('site-setting.paymentstore');
    Route::post('/site-setting/emailstore', [SettingController::class, 'emailstore'])->name('site-setting.emailstore');
    Route::resource('users', UserController::class);
    Route::resource('frontend', FrontendController::class);

//videos
    Route::resource('video',VideoController::class);
    Route::get('/videos/{id}/edit', [VideoController::class, 'edit'])->name('video.edit');
    // Route::get('/process_payment', [RazorpayController::class, 'index']);
    // Route::get('/runcmd', function () {
    //     // Run the Composer command to require the Razorpay package
    //     Artisan::call('composer require razorpay/razorpay
    //     ');

    //     return 'Razorpay package installation initiated.';
    // });
    
   

    // Route::post('update-live-key-status', 'Admin\SettingController@updateLiveKeyStatus')->name('site-setting.updateLiveKeyStatus');


});