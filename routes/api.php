<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\ExpertsController;
use App\Http\Controllers\Api\AticlesController;
use App\Http\Controllers\Api\ProgramController;
use App\Http\Controllers\Api\BookAppointmentController;
use App\Http\Controllers\Api\WebinarController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\PaymentsController;
use App\Http\Controllers\Api\WishlistController;
use App\Http\Controllers\Api\VideoController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\NotificationController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::POST('register', [AuthController::class, 'register']);
Route::POST('deactivate-account', [AuthController::class, 'DeactivateAccount']);
Route::POST('login', [AuthController::class, 'login']);
Route::POST('check-users', [AuthController::class, 'checkUsers']);
Route::POST('forgot-password', [AuthController::class, 'forgotPassword']);
Route::POST('send-otp',[AuthController::class,'sendOtp']);
Route::POST('verify-otp',[AuthController::class,'verifyOtp']);
Route::POST('reset-password', [AuthController::class, 'resetPassword']);
Route::POST('categories-list',[CategoriesController::class,'categoriesList']);
Route::POST('experts',[ExpertsController::class,'expertsList']);
Route::POST('experts-search',[ExpertsController::class,'expertsSerach']);
Route::POST('aticles',[AticlesController::class,'aticlesList']);
Route::POST('aticles-single-list',[AticlesController::class,'aticlesSingleList']);
Route::POST('aticles-search',[AticlesController::class,'aticlesSearch']);
Route::GET('my-webinar',[WebinarController::class,'myWebinar']);
Route::POST('my-webinar-search', [WebinarController::class, 'myWebinarSearch']);
Route::POST('webinar-list-search', [WebinarController::class, 'webinarListSearch']);
Route::POST('my-program',[ProgramController::class,'myProgramList']);
Route::POST('my-program-search', [ProgramController::class, 'myProgramListSearch']);
Route::POST('program-list-search', [ProgramController::class, 'programListSearch']);
Route::POST('validate-program-purchase', [ProgramController::class, 'validateProgramPurchase']);



//Route::GET('my-program/{title}', [ProgramController::class,'search']);

Route::get('expert-program',[ProgramController::class,'expertProgram']);
Route::get('expert-aticles',[AticlesController::class,'aticlesExpert']);
Route::get('expert-webinar',[WebinarController::class,'expertMyWebinar']);
Route::get('expert-video',[VideoController::class,'expertVideo']);
Route::post('change-password', [AuthController::class, 'changePassword']); 
Route::post('add-book-appointment', [BookAppointmentController::class, 'addBookAppointment']); 
Route::POST('contact-us', [PageController::class, 'contactus']);
Route::post('payments', [PaymentsController::class, 'sendPayments']);
Route::GET('search', [HomeController::class, 'searchResult']);
Route::GET('webinar-search', [HomeController::class, 'webinarsearchResult']);
Route::GET('aticles-search', [HomeController::class, 'aticlessearchResult']);
Route::POST('add-patient', [PatientController::class, 'addPatient']);
Route::POST('coupon-apply', [CouponController::class, 'couponApply']);
Route::GET('home', [HomeController::class, 'home']);


Route::group(['as' => 'api.', 'middleware' =>['auth:api']], function(){
    Route::POST('program',[ProgramController::class,'programList']);
    Route::get('webinar',[WebinarController::class,'webinarList']);
    Route::GET('list', [WishlistController::class, 'list']);
    Route::GET('list-program', [WishlistController::class, 'listProgram']);
    Route::GET('list-expert', [WishlistController::class, 'listExpert']);
    Route::POST('add-remove-wishlist', [WishlistController::class, 'addRemoveWishlist']);
    Route::POST('add-remove-wishlist-program', [WishlistController::class, 'addRemoveWishlistProgram']);
    Route::POST('add-remove-wishlist-expert', [WishlistController::class, 'addRemoveWishlistExpert']);
    Route::post('webiners', [PaymentsController::class, 'webinerSendPayments']);
    Route::GET('logout', [AuthController::class, 'logout']);
    Route::GET('user-profile', [AuthController::class, 'userProfile']);
    Route::POST('update-profile', [AuthController::class, 'updateProfile']);
    Route::POST('subscribe-our-newsletter', [AuthController::class, 'SubscribeOurNewsletter']);
    Route::GET('expert-home', [HomeController::class, 'expertHome']);
    Route::POST('my-program-patient-detail',[ProgramController::class,'myProgramPatientDetail']);
    Route::GET('notification-list', [NotificationController::class, 'notificationList']);
    Route::POST('notification-delete', [NotificationController::class, 'notificationDelete']);
    


});