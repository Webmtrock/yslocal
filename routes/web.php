<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ConcernController;
use App\Http\Controllers\Admin\WebinarsController;
use App\Http\Controllers\Admin\ProgramsController;
use App\Http\Controllers\Admin\BatchController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\QueriesController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FrontEnd\ExpertsController;
use App\Http\Controllers\FrontEnd\WorkshopController;
use App\Http\Controllers\FrontEnd\ProgramController;
use App\Http\Controllers\FrontEnd\WebinarContoller;
use App\Http\Controllers\FrontEnd\HealthpediaController;
use App\Http\Controllers\FrontEnd\VideoGallaryController;
use App\Http\Controllers\FrontEnd\AboutController;
use App\Http\Controllers\FrontEnd\FaqController;
use App\Http\Controllers\FrontEnd\LandingPageFrontController;
use App\Http\Controllers\FrontEnd\ContactController;
use App\Http\Controllers\FrontEnd\ConcernsController;
use App\Http\Controllers\FrontEnd\RegisterExpertController;
use App\Http\Controllers\FrontEnd\CheckoutController;
use App\Http\Controllers\FrontEnd\RazorpayController;
use App\Http\Controllers\FrontEnd\UsersController;
use App\Http\Controllers\FrontEnd\ThankyouController;
use App\Http\Controllers\FrontEnd\FormDataController;

use App\Http\Controllers\Admin\expertwebsite\ExpertLeadController;
use App\Http\Controllers\Admin\expertwebsite\ExpertSettingController;

// LandingPageController 
use App\Http\Controllers\Admin\LandingPageController;

// ExpertWebsite  
use App\Http\Controllers\ExpertWebsite\ExpertWebsiteController;
use App\Http\Controllers\ExpertWebsite\ExpertWebsiteProgramController;
use App\Http\Controllers\ExpertWebsite\ExpertWebsiteWebinarContoller;
use App\Http\Controllers\ExpertWebsite\ExpertWebsiteHealthpediaController;
//ExpertBackend Controller
use App\Http\Controllers\Admin\expertwebsite\ExpertHomeController;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

Route::get('/clear-route-cache', function () {
    Artisan::call('route:clear');
    return 'Route cache cleared successfully!';
});



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
 
    // ExpertWebsite Routes
      Route::get('/webinar-crone', [UsersController::class, 'WebinarCroneSetup']);    // using

      Route::get('/expertwebsite', [ExpertWebsiteController::class, 'home'])->name('expert.website.home');    // using
      Route::get('/expertwebsite/programs', [ExpertWebsiteProgramController::class, 'programs'])->name('expert.website.programs');
      Route::get('/expertwebsite/program/{id}', [ExpertWebsiteProgramController::class, 'program'])->name('expert.website.program'); 
      Route::get('/expertwebsite/workshops', [ExpertWebsiteWebinarContoller::class, 'workshops'])->name('expert.website.workshops'); 
      Route::get('/expertwebsite/workshop/{id}', [ExpertWebsiteWebinarContoller::class, 'workshop'])->name('expert.website.workshop');
   
  
      
      Route::get('/expertwebsite/healthpedia', [ExpertWebsiteHealthpediaController::class, 'healthpedia'])->name('expert.website.healthpedia');     
      Route::get('/expertwebsite/healthpedia/{id}', [ExpertWebsiteHealthpediaController::class, 'healthpediadetail'])->name('expert.website.healthpediadetail');     
 
      
      Route::get('/expertwebsite/experts', [ExpertWebsiteController::class, 'experts'])->name('expert.website.experts');     
      Route::get('/expertwebsite/login', [ExpertWebsiteController::class, 'login'])->name('expert.website.login');     
      Route::get('/expertwebsite/about', [ExpertWebsiteController::class, 'about'])->name('expert.website.about');     
      Route::get('/expertwebsite/signup', [ExpertWebsiteController::class, 'signup'])->name('expert.website.signup');  
      Route::get('/expertwebsite/faq', [ExpertWebsiteController::class, 'faq'])->name('expert.website.faq');  
      Route::get('/expertwebsite/privacy', [ExpertWebsiteController::class, 'privacy'])->name('expert.website.privacy.policy');  
      Route::get('/expertwebsite/concerns', [ExpertWebsiteController::class, 'concerns'])->name('expert.website.concerns');     
      Route::get('/expertwebsite/gallery', [ExpertWebsiteController::class, 'gallery'])->name('expert.website.gallery');     
      Route::get('/expertwebsite/contact', [ExpertWebsiteController::class, 'contact'])->name('expert.website.contact');     
      Route::get('/expertwebsite/concerns', [ExpertWebsiteController::class, 'concerns'])->name('expert.website.concerns');     
      Route::get('/expertwebsite/book-appointment', [ExpertWebsiteController::class, 'bookappointment'])->name('expert.website.book.appointment');     
      Route::get('/expertwebsite/expert', [ExpertWebsiteController::class, 'expert'])->name('expert.website.expert');     
           
      Route::get('/expertwebsite/tnc', [ExpertWebsiteController::class, 'tnc'])->name('expert.website.tnc');     
    
    
    
    // frontend Routes
      //register
      Route::get('/signup', [UsersController::class,'signup'])->name('user.signup');
      Route::post('/send-otp', [UsersController::class,'SendOtp'])->name('user.sendOtp');
      Route::post('/otp-verify-submit', [UsersController::class,'OtpVerifySubmit'])->name('user.otpVerifySubmit');
      Route::post('/user/store', [UsersController::class, 'store'])->name('user.store');
      Route::get('/user/register', [UsersController::class, 'register'])->name('user.register');
      

      Route::get('/user/login', [UsersController::class,'login'])->name('user.login');
      Route::post('/user/login', [UsersController::class, 'loginuser'])->name('user.login');
      Route::get('/user/forgot-password', [UsersController::class,'ResetPassword'])->name('user.reset_password');
      Route::get('/user/forgot-verify/{phone}', [UsersController::class,'ForgotPasswordVerify'])->name('user.forgot-verify');
      Route::post('/user/forgot-password-send', [UsersController::class,'ResetPasswordSendOtp'])->name('user.reset_password_send');
      Route::post('/user/forgot-password-verify', [UsersController::class,'ResetPasswordVerify'])->name('user.reset_password_verify');
      Route::get('/user/set-password', [UsersController::class,'ResetPasswordChange'])->name('user.set-password');
      Route::Post('/user/reset-password-set', [UsersController::class,'ResetPasswordSet'])->name('user.reset-password-change');
      Route::get('/user-logout', function () {
            Auth::logout();
            return redirect()->route('user.login')->with('success', 'You have been logged out.');
      })->name('user_logout');
       
      Route::middleware('user')->group(function () {
            Route::get('/dashboard', [UsersController::class,'dashboard'])->name('user.dashboard');
            Route::post('/update-profile', [UsersController::class,'UpdateProfile'])->name('update_profile');
            Route::post('/uplode-report', [UsersController::class,'UplodeReport'])->name('uplode_report');
            Route::post('/reportstore', [UsersController::class,'reportstore'])->name('report_store');
            Route::get('/reports', [UsersController::class,'reportindex'])->name('report.index');
            Route::post('/chnage-password', [UsersController::class,'changePassword'])->name('chnage_password');
            Route::get('/add-patient/{id}', [UsersController::class,'AddPatient'])->name('user.add_patient');
            Route::post('/store-patient', [UsersController::class,'StorePatient'])->name('user.patient_store');
      });
      Route::get('/', [FrontendController::class, 'home'])->name('user.home');
      Route::get('/workshops', [WebinarContoller::class, 'workshops'])->name('user.workshops');
      Route::get('/workshop/{id}', [WebinarContoller::class, 'workshop'])->name('user.workshop');
      
      Route::get('/programs', [ProgramController::class, 'programs'])->name('user.programs');
      Route::get('/program/{id}', [ProgramController::class, 'program'])->name('user.program');
      Route::post('/get-plan', [ProgramController::class, 'getPlan'])->name('getplan.type');
      
      Route::get('/experts', [ExpertsController::class, 'experts'])->name('user.experts');
      Route::get('/expert/{id}', [ExpertsController::class, 'expert'])->name('user.expert');
      Route::post('/expert/submit', [ExpertsController::class, 'registerExpert'])->name('register.expert');

      Route::get('/healthpedia', [HealthpediaController::class, 'healthpedia'])->name('user.healthpedia');
      Route::get('/healthpedia/{id}', [HealthpediaController::class, 'healthpediadetail'])->name('user.healthpediadetail');
      
      Route::get('/video-gallery', [VideoGallaryController::class, 'videoGallary'])->name('user.video');

      Route::get('/concern', [ConcernsController::class, 'concerns'])->name('user.concerns');
      Route::get('/concern/{id}', [ConcernsController::class, 'concerndetail'])->name('user.concerndetail');
      
      
      
      Route::get('/about', [AboutController::class, 'about'])->name('user.about');
      Route::get('/privacy-policy', [AboutController::class, 'privacyPolicy'])->name('user.privacy.policy');
      Route::get('/terms-condition', [AboutController::class, 'termsCondition'])->name('user.termscondition');
      Route::get('/refund-policy', [AboutController::class, 'refundPolicy'])->name('user.refundpolicy');
      Route::get('/faq', [FaqController::class, 'faq'])->name('user.faq');
      Route::get('/contact', [ContactController::class, 'contact'])->name('user.contact');
      Route::get('/register-expert', [RegisterExpertController::class, 'register'])->name('user.register.expert');
      // Route::get('/privacy-policy', [ContactController::class, 'privacypolicy'])->name('user.privacy.policy');
      Route::get('/gallery', [ContactController::class, 'gallery'])->name('user.gallery');
     
      Route::post('/', [FormDataController::class, 'submitForm'])->name('submit.form');
      Route::post('/contact', [FormDataController::class, 'contactForm'])->name('contact.form');
      Route::post('/submit-form', [FormDataController::class, 'callbackForm'])->name('callback.form');
      Route::post('/thankyou/for-contact', [FormDataController::class, 'subscribeForm'])->name('newsletter.form');
      Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
      Route::post('/applycoupon', [CheckoutController::class, 'applyCoupon'])->name('coupon.apply');
      //// Start Deelesh Sain Create Route
      Route::get('/program-thankyou/{id}', [ThankyouController::class, 'Programthankyou'])->name('programthankyou');
      Route::get('/workshop-thankyou/{id}', [ThankyouController::class, 'Workshopthankyou'])->name('workshop-thankyou');
      Route::get('/landing-thankyou/{id}', [ThankyouController::class, 'landingthankyou'])->name('landing-thankyou');
      Route::get('/thankyou', [ThankyouController::class, 'thankyou'])->name('thankyou.index');
      Route::get('/contact-thankyou', [ThankyouController::class, 'contactthankyou'])->name('contact-thankyou.index');
    
    //// End Deelesh Sain Create Route
    Route::post('/thankyou', [RazorpayController::class, 'store'])->name('razorpay.payment.store');

    // Workshop Regiater Route
    // Route::POST('/store-form', [RazorpayController::class, 'workshopRegisterForm'])->name('store.form');
    
    // free workshop bokking
    Route::POST('/store-form', [RazorpayController::class, 'workshopFreeForm'])->name('razorpay.free.workshop');
    Route::POST('/pay', [RazorpayController::class, 'WorkshopPaidForm'])->name('razorpay.paid.workshop');

    

    

//Razorpay Payment Gateway
// Route::get('/payment', [RazorpayPaymentsController::class, 'index']);
// Route::post('/payment', [RazorpayPaymentsController::class, 'store']);

////////////////theme settings





// Route::get("/theme-setting", function(){
//     return View::make("admin.expertwebsite.theme-setting.theme-setting");
// })->name("theme-setting");
Route::get('/experttheme-setting', [ExpertSettingController::class, 'expertthemesetting'])->name('experttheme-setting');
Route::post('/expertthemesetting/store', [ExpertSettingController::class, 'expertthemesettingstore'])->name('expertthemesetting.store');










/////////////////theme settings








    //ExpertWebsite Routes
    Route::post('/add_section_1', [ExpertHomeController::class, 'addSection1'])->name('add_section_1');
    Route::post('/add_section_2', [ExpertHomeController::class, 'addSection2'])->name('add_section_2');
    Route::post('/add_section_3', [ExpertHomeController::class, 'addSection3'])->name('add_section_3');
    Route::post('/add_section_4', [ExpertHomeController::class, 'addSection4'])->name('add_section_4');
    Route::post('/add_section_5', [ExpertHomeController::class, 'addSection5'])->name('add_section_5');
    Route::post('/add_section_6', [ExpertHomeController::class, 'addSection6'])->name('add_section_6');
    Route::post('/add_section_7', [ExpertHomeController::class, 'addSection7'])->name('add_section_7');
    Route::post('/add_section_8', [ExpertHomeController::class, 'addSection8'])->name('add_section_8');
    Route::resource('/home', ExpertHomeController::class);
      

    // Backend Routes 
    
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin/getlogin');
    Route::get('/register', [AdminLoginController::class, 'registerindex'])->name('admin/register');
    Route::post('/register', [AdminLoginController::class, 'store'])->name('admin/store');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin/logout');

    Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin/login');
    Route::get('/experts/login', [AdminLoginController::class, 'expertLogin'])->name('expert.login');
    Route::post('/expertlogin/submit', [AdminLoginController::class, 'expertLoginSubmit'])->name('expert_login.submit');
    Route::get('appointment-booking', [UsersController::class,'appointmentBooking'])->name('appointment.booking');
    
    Route::get('landingpage/{slug?}', [LandingPageFrontController::class,'landingpage'])->name('landingpage');

    //admin routes
    Route::middleware('admin')->prefix('admin')->group(function () {
        
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
            Route::resource('roles', RolesController::class);
            //role and permission
            Route::resource('permissions', PermissionsController::class);

            Route::resource('webinars', WebinarsController::class);
            Route::get('/remove-webinar-review-image', [WebinarsController::class, 'WebinarReviewImageRemove'])->name('remove-webinar-review-image');
            Route::get('/remove-webinar-review-video', [WebinarsController::class, 'WebinarReviewVideoRemove'])->name('remove-webinar-review-video');
            Route::post('/webinars/session-recording-update/{id}', [WebinarsController::class, 'WebinarSessionrecording'])->name('webinars.session.recording.update');
            //Route::put('/admin/webinars/{webinar}', [WebinarsController::class, 'update'])->name('webinars.update');

            ////////////////////////////////////////////////webinar session ///////////////////////////////////////////////////////
            Route::get('/webinar-session-list/{id}', [WebinarsController::class, 'WebinarSessionList'])->name('webinar.session_list');
            Route::get('/webinar-session-add/{id}', [WebinarsController::class, 'WebinarSessionAdd'])->name('webinar.session_add');
            Route::post('/webinar-session-store/{id}', [WebinarsController::class, 'WebinarSessionStore'])->name('webinar.session_store');
            Route::get('/webinar-session-edit/{id}', [WebinarsController::class, 'WebinarSessionEdit'])->name('webinar.session_edit');
            Route::post('/webinar-session-update/{id}', [WebinarsController::class, 'WebinarSessionUpdate'])->name('webinar.session_update');
            Route::delete('/webinar-session-delete/{id}', [WebinarsController::class, 'WebinarSessionDelete'])->name('webinar.session_delete');
            ////////////////////////////////////////////////webinar session ///////////////////////////////////////////////////////

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
            
            //Article
            Route::resource('article', ArticleController::class);
            Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
            // Route::delete('article/delete/{id}', [ArticleController::class, 'delete'])->name('article.delete');
            Route::delete('article/delete/{id}', [ArticleController::class, 'destroy'])->name('article.delete');
            Route::put('/article/{id}', [ArticleController::class, 'update'])->name('article.update');
            Route::get('/articles/drafted', [ArticleController::class, 'draftedIndex'])->name('article.draftedIndex');

            // Concerns

            Route::resource('concern', ConcernController::class);
            Route::get('/concern/edit/{id}', [ConcernController::class, 'edit'])->name('concern.edit');
            // Route::delete('article/delete/{id}', [ArticleController::class, 'delete'])->name('article.delete');
            Route::delete('concern/delete/{id}', [ConcernController::class, 'destroy'])->name('concern.delete');
            Route::put('/concern/{id}', [ConcernController::class, 'update'])->name('concern.update');
            Route::get('/concern/drafted', [ConcernController::class, 'show'])->name('concern.show');
            
            //programs

            Route::get('/programs', [ProgramsController::class, 'index'])->name('programs.index');
            Route::get('/program-remove-file', [ProgramsController::class, 'ProgramRemoveImage'])->name('program_remove_file');
            Route::get('/programs/create', [ProgramsController::class, 'create'])->name('programs.create');
            Route::post('/programs/store', [ProgramsController::class, 'store'])->name('programs.store');
            Route::get('/programs/edit/{id}', [ProgramsController::class, 'edit'])->name('programs.edit');
            Route::put('/programs/update/{id}', [ProgramsController::class, 'update'])->name('programs.update');
            Route::delete('/programs/delete/{id}', [ProgramsController::class, 'delete'])->name('programs.delete');  
            Route::post('/programs/status/{id}', [ProgramsController::class, 'Status'])->name('programs.status');  
            

            //Program Session
            Route::get('/programs/session-list/{id}', [ProgramsController::class, 'ProgramSecationList'])->name('programs.session.list');
            Route::get('/programs/session-add/{id}', [ProgramsController::class, 'ProgramSecationAdd'])->name('programs.session.add');
            Route::post('/programs/session-store/', [ProgramsController::class, 'ProgramSecationStore'])->name('programs.session.store');
            Route::get('/programs/session-edit/{id}', [ProgramsController::class, 'ProgramSecationEdit'])->name('programs.session.edit');
            Route::post('/programs/session-update/{id}', [ProgramsController::class, 'ProgramSecationUpdate'])->name('programs.session.update');
            Route::post('/programs/session-recording-update/{id}', [ProgramsController::class, 'ProgramSessionrecording'])->name('programs.session.recording.update');
            Route::delete('programs/session-delete/{id}', [ProgramsController::class, 'ProgramSecationDelete'])->name('programs.session.delete');
            Route::get('/programs/append-batch', [ProgramsController::class, 'AppendBatch'])->name('append_batch');
            Route::get('/programs/append-resorce', [ProgramsController::class, 'AppendResorce'])->name('append_resorce');
            Route::get('/remove-resorce-image', [ProgramsController::class, 'ResorceImageRemove'])->name('remove_resorce_image');
            Route::get('/remove-review-image', [ProgramsController::class, 'ReviewImageRemove'])->name('remove_review_image');
            Route::post('/programs-session/status/{id}', [ProgramsController::class, 'ProgramSessionStatus'])->name('programs_session.status');  
            
            //Program Session

            //Batch Secation
            Route::get('/batch-list/{id}', [BatchController::class, 'BatchList'])->name('batch.list');
            Route::get('/batch-add/{id}', [BatchController::class, 'BatchAdd'])->name('batch.add');
            Route::post('/batch-store', [BatchController::class, 'BatchStore'])->name('batch.store');
            Route::get('/batch-edit/{id}', [BatchController::class, 'BatchEdit'])->name('batch.edit');
            Route::post('/batch-update/{id}', [BatchController::class, 'BatchUpdate'])->name('batch.update');
            Route::delete('batch-delete/{id}', [BatchController::class, 'BatchDelete'])->name('batch.delete');
            //Program Secation


            //////Appointment////////////
            Route::get('/appointment-list', [AppointmentController::class, 'index'])->name('appointment.list');
            Route::get('/appointment-add', [AppointmentController::class, 'add'])->name('appointment.add');
            Route::post('/appointment-store', [AppointmentController::class, 'store'])->name('appointment.store');
            Route::get('/appointment-edit/{id}', [AppointmentController::class, 'edit'])->name('appointment.edit');
            Route::post('/appointment-update/{id}', [AppointmentController::class, 'update'])->name('appointment.update');
            Route::delete('/appointment-delete/{id}', [AppointmentController::class, 'delete'])->name('appointment.delete');  
            //////Appointment////////////

            //////Report////////////

            Route::get('/report-list', [ReportController::class, 'index'])->name('report.list');
            Route::get('/report-add', [ReportController::class, 'add'])->name('report.add');
            Route::post('/report-store', [ReportController::class, 'store'])->name('report.store');
            Route::get('/report-showimages/{id}', [ReportController::class, 'showreportimages'])->name('show-report-images');
            // Route::get('/report-edit/{id}', [AppointmentController::class, 'edit'])->name('report.edit');
            // Route::post('/report-update/{id}', [AppointmentController::class, 'update'])->name('report.update');
            Route::delete('/report-delete/{id}', [ReportController::class, 'delete'])->name('report.delete');



            //////Report////////////
            
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
            Route::post('/site-setting/topheaderstore', [SettingController::class, 'topheaderstore'])->name('site-setting.topheaderstore');
            Route::post('/site-setting/ourofferingstore', [SettingController::class, 'ourofferingstore'])->name('site-setting.ourofferingstore');
            Route::post('/site-setting/emailstore', [SettingController::class, 'emailstore'])->name('site-setting.emailstore');
            Route::resource('users', UserController::class);
            Route::resource('frontend', FrontendController::class);

        //videos
            Route::resource('video',VideoController::class);
            Route::get('/videos/{id}/edit', [VideoController::class, 'edit'])->name('video.edit');
            
            Route::get('/newsletter', [QueriesController::class, 'newsletter'])->name('newsletter');
            Route::get('/contactform', [QueriesController::class, 'contactform'])->name('contactform');
            Route::get('/concernform', [QueriesController::class, 'concernform'])->name('concernform');

            
            // Route::get('/process_payment', [RazorpayController::class, 'index']);
            // Route::get('/runcmd', function () {
            //     // Run the Composer command to require the Razorpay package
            //     Artisan::call('composer require razorpay/razorpay
            //     ');

            //     return 'Razorpay package installation initiated.';
            // });
            
        
            // Route::post('update-live-key-status', 'Admin\SettingController@updateLiveKeyStatus')->name('site-setting.updateLiveKeyStatus');
            
            
            
            // landingPage

            Route::get('landingPage-health',[LandingPageController::class,'landingPage'])->name('landingPage-health');
            Route::get('landingPage-health-list',[LandingPageController::class,'landingPageList'])->name('landingPage-health-List');
            Route::post('landingPage1',[LandingPageController::class,'updatelandingPage'])->name('landingPage');
            Route::post('landingPage2',[LandingPageController::class,'updatelandingPage2'])->name('update2secation');
            Route::post('landingPage3',[LandingPageController::class,'updatelandingPage3'])->name('landingPage3');
            Route::post('landingPage4',[LandingPageController::class,'updatelandingPage4'])->name('landingPage4');
            Route::post('landingPage5',[LandingPageController::class,'updatelandingPage5'])->name('landingPage5');
            Route::post('landingPage6',[LandingPageController::class,'updatelandingPage6'])->name('landingPage6');
            Route::post('landingPage7',[LandingPageController::class,'updatelandingPage7'])->name('landingPage7');
            Route::post('landingPage0',[LandingPageController::class,'updatelandingPage0'])->name('landingPage0');
            
            //////landing page lead/////////////////

            Route::get('landingPage-lead',[ExpertLeadController::class,'index'])->name('landingPage-lead');

            ////////////////////////////store///////////////////////////

            Route::get('landing-page/create', [LandingPageController::class, 'landingPagecreate'])->name('landingPageCreatesss');
            Route::post('landingPage-store1',[LandingPageController::class,'storelandingPage'])->name('storelandingpage');
            Route::post('landingPage-store2',[LandingPageController::class,'storelandingPage2'])->name('storelandingPage2');
            Route::post('landingPage-store3',[LandingPageController::class,'storelandingPage3'])->name('storelandingPage3');
            Route::post('landingPage-store4',[LandingPageController::class,'storelandingPage4'])->name('storelandingPage4');
            Route::post('landingPage-store5',[LandingPageController::class,'storelandingPage5'])->name('storelandingPage5');
            Route::post('landingPage-store6',[LandingPageController::class,'storelandingPage6'])->name('storelandingPage6');
            Route::post('landingPage-store7',[LandingPageController::class,'storelandingPage7'])->name('storelandingPage7');
            Route::post('landingPage-store0',[LandingPageController::class,'storelandingPage0'])->name('storelandingPage0');



        ///////////////////////////store////////////////////////////////////////////////



            Route::post('landing-page/store', [LandingPageController::class, 'landingPagestore'])->name('landingPageStore');
            Route::get('landing-page/edit/{id}', [LandingPageController::class, 'landingPageEdit'])->name('landingPageEdit');


        //appointment booking

    

    });