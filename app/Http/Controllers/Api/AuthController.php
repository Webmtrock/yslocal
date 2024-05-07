<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\ResponseBuilder;
use App\Helper\Helper;
use App\Models\User;
use App\Models\Setting;
use App\Models\VendorProfile;
use App\Models\SubscribeData;
use App\Models\DriverProfile;
use App\Models\EmailTemplate;
use App\Models\Role;
use App\Models\Notification;
use Illuminate\Http\Response;
use App\Models\SocialAccount;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Validator;
use Auth;
use DB;
use Hash;
use Socialite;
use App\Mail\NewSignUp;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Http;
// use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * User Register Function
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    private $badRequest = 400;
    private $success = 200;

    public function register(Request $request)
    {
        DB::beginTransaction();
        try {
             $validSet = [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
                'phone' => 'required',
            ];
            $errorMessage = [
            'phone.unique' =>'The phone number has already been taken.',
        ];
        $isInvalid = $this->isValidPayload($request, $validSet, $errorMessage);
        if ($isInvalid) {
            return ResponseBuilder::error($isInvalid, 400); 
        }
        
        $user_id = $request->input('id');

        $user = User::where('id', $user_id)->first();
      
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found'], 404);
        }
        
        // Update user information
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'categories_id' => $request->categories_id,
        ]);
        
        $user->roles()->sync($request->type);
        // Fetch email template and data for the email
         $mail_data = EmailTemplate::getMailByMailCategory('newuserregister');

         $data = Setting::getDataByKey('logo_1');
         $img = url('/'.config('app.logo').'/'.$data->value);
         $arr1 = array( '{image}', '{name}');
        $arr2 = array( $img, $user->name);
         $msg1 = $mail_data->email_content;
         $msg = str_replace($arr1, $arr2, $msg1);
        
        // Configure email parameters
          $config = [
            'from_email' => isset($mail_data->from_email) ? $mail_data->from_email : env('MAIL_FROM_ADDRESS'),
            'name' => isset($mail_data->from_name) ? $mail_data->from_name : env('MAIL_FROM_NAME'),
            'subject' => $mail_data->email_content,
            'message' => $msg,
        ];
        
      
      
        // Send the email to the user's email address
        Mail::to($request->email)->send(new NewSignUp($config));

        DB::commit();
        
        return ResponseBuilder::successMessage(trans('global.REGISTER_SUCCESS'), 200);

    } catch (\Exception $e) {
        DB::rollback();
        return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
        return response()->json(['status' => false, 'message' => 'Something went wrong'], 500); 
       }

    
    }


    /**
     * User Login Function
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    // public function login(Request $request)
    // {
    //     DB::beginTransaction();
    //     try {
    //         // Validation start
    //         $validSet = [
    //             'email' => 'required',
    //             'password' => 'required',
    //         ]; 

    //         // $errorMessage = [
    //         //     'password.regex' => 'Password must contain at least 8 character with 1 uppercase letter, 1 lowercase letter, 1 number and 1 special character',
    //         // ];

    //         $isInValid = $this->isValidPayload($request, $validSet);
    //         if($isInValid){
    //             return ResponseBuilder::error($isInValid, $this->badRequest);
    //         }
    //         // Validation end

    //       // $user = User::getUserByEmailOrPhone($request->email);
        
    //        $user = User::join('role_user','users.id','role_user.user_id')->where('role_user.role_id',$request->role)->where(function ($query) use ($request) {
    //             $query->where('users.email', $request->email)->orWhere('users.phone', $request->email);
    //         })->where('users.status', 1)->first();
  
         
    //         if(!$user) {
    //             return ResponseBuilder::error(trans('global.NOT_REGISTERED'), $this->badRequest);
    //         }

    //         if(!$user->status) {
    //             return ResponseBuilder::error(trans('global.USER_BLOCKED'), $this->badRequest);
    //         }

    //         if(!Auth::attempt(['email' => $request->email, 'password' => $request->password]) && 

    //         !Auth::attempt(['phone' => $request->email, 'password' => $request->password])){
    //             return ResponseBuilder::error(trans('global.RECORD_NOT_FOUND'), $this->badRequest);
    //         }

    //         $user = Auth::user();
    //         $user->device_id = $request->device_id ?? null;
    //         $user->device_token = $request->device_token ?? null;
    //         $user->save();
    //         $token = auth()->user()->createToken('API Token')->accessToken;
    //         $this->response->user_data = new UserResource($user);
    //         $this->response->notification_count = Notification::where('user_id', $user->id)->where('seen', 0)->count();

    //         DB::commit();
    //         return ResponseBuilder::successwithToken($token, $this->response, trans('global.LOGIN_SUCCESS'), $this->success);

    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
    //         return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
    //     }
    // }
    public function login(Request $request)
    {

        $validSet = [
            'phone' => 'required',
            'password' => 'required',
            'role' => 'required',
            
        ];

        $isInValid = $this->isValidPayload($request, $validSet);
        if($isInValid){
            return ResponseBuilder::error($isInValid, $this->badRequest);
        }

        try { 
            // $user = User::getUserByEmailOrPhone($request->phone); 
            
             $user = User::join('role_user','users.id','role_user.user_id')->where('role_user.role_id',$request->role)->where(function ($query) use ($request) {
                $query->where('users.phone', $request->phone)->orWhere('users.phone', $request->phone);
            })->where('users.status', 1)->first();
               
        //  dd($user);
            if($user)
            {  
                
                if(!$user->status)
                {
                    return ResponseBuilder::error(trans('global.USER_BLOCKED'),$this->badRequest);
                }
              
                $user->device_token = $request->device_token;
                $user->save();
            
               $loginData = ['phone' => request('phone'), 'password' => request('password')];
        //  dd(Auth::attempt($loginData));
                if(Auth::attempt($loginData)){

                    $user = Auth::user();
                    $accessToken = $user->createToken('Token')->accessToken;
                    $token = $accessToken;
                    $data = $this->setAuthResponse($user);
                    return ResponseBuilder::successwithToken($token, $data, 'Login Success', $this->success);

                }
                else{
                   return ResponseBuilder::error('Oops! Your password seems to be incorrect. Please try again or click on “Forgot Password” to get a new one.', $this->badRequest);
                }
            } 
            else
            {
                return ResponseBuilder::error('Login Details Incorrect',$this->badRequest); 
            }
            return ResponseBuilder::error('Login Details Incorrect',$this->badRequest); 
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT').$e->getMessage(), $this->badRequest);
        }
    }
    /**
     * User Forgot Password Function
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * User Verify OTP Function
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    // public function verifyOTP(Request $request) {
    //     try {
    //         // Validation start
    //         $validSet = [
    //             'email' => 'required | email',
    //             'otp' => 'required | integer',
    //         ]; 

    //         $isInValid = $this->isValidPayload($request, $validSet);
    //         if($isInValid){
    //             return ResponseBuilder::error($isInValid, $this->badRequest);
    //         }
    //         // Validation end
            
    //         $user = User::getUserByEmail($request->email);

    //         if(!$user) {
    //             return ResponseBuilder::error(trans('global.NOT_REGISTERED'), $this->badRequest);
    //         }

    //         if(!$user->status) {
    //             return ResponseBuilder::error(trans('global.USER_BLOCKED'), $this->badRequest);
    //         }

    //         if((!isset($user->otp_created_at)) || (empty($user->otp_created_at)) || (isset($user->otp_created_at)) && ((strtotime($user->otp_created_at) + 900) < strtotime(now()))) {
    //             return ResponseBuilder::error(trans('global.OTP_EXPIRED'), $this->badRequest);
    //         }
    //         if((!isset($user->otp)) || (empty($user->otp)) || (isset($user->otp)) && ($request->otp != $user->otp)) {
    //             return ResponseBuilder::error(trans('global.INVALID_OTP'), $this->badRequest);
    //         }

    //         $user->otp_created_at = $user->otp = NULL;
    //         $user->save();

    //         return ResponseBuilder::successMessage(trans('global.OTP_VERIFIED'), $this->success);

    //     } catch (\Exception $e) {
    //         return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
    //     }
    // }

    /**
     * Resend OTP
     * @param \Illuminate\Http\Request $request, phone, otp
     * @return \Illuminate\Http\Response
     */
    // public function resendOTP(Request $request) {
    //     try {
    //         // Validation start
    //         $validSet = [
    //             'email' => 'required | email',
    //         ]; 

    //         $isInValid = $this->isValidPayload($request, $validSet);
    //         if($isInValid){
    //             return ResponseBuilder::error($isInValid, $this->badRequest);
    //         }
    //         // Validation end
 
    //         $user = User::getUserByEmail($request->email);

    //         if(!$user) {
    //             return ResponseBuilder::error(trans('global.NOT_REGISTERED'), $this->badRequest);
    //         }

    //         if(!$user->status) {
    //             return ResponseBuilder::error(trans('global.USER_BLOCKED'), $this->badRequest);
    //         }

    //         $data = $this->sendOTP($request->email, $user);

    //         $this->response->otp = $data;

    //         return ResponseBuilder::success(trans('global.OTP_SENT'),$this->success, $this->response);

    //     } catch (\Exception $e) {
    //         return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
    //     }
    // }

    /**
     * Send OTP
     * @param \Illuminate\Http\Request $request, phone, otp
     * @return \Illuminate\Http\Response
     */
    // public function sendOTP($email, $user) {
        
    //     $otp = Helper::generateOtp();
    //     $user->otp = $otp;
    //     $user->otp_created_at = now();
    //     $user->save();
    //     $mail_data = EmailTemplate::getMailByMailCategory('forgetpassword');
    //     $data = Setting::getDataByKey('logo_1');
    //     $img = url('/'.config('app.logo').'/'.$data->value);
    //     $arr1 = array('{otp}', '{image}', '{name}');
    //     $arr2 = array($otp, $img, $user->name);
    //     $msg = $mail_data->email_content;
    //     $msg = str_replace($arr1, $arr2, $msg);
    //     $config = ['from_email' => isset($mail_data->from_email) ? $mail_data->from_email : env('MAIL_FROM_ADDRESS'),
    //         'name' => isset($mail_data->name) ? $mail_data->name : env('MAIL_FROM_NAME'),
    //         'subject' => $mail_data->subject, 
    //         'message' => $msg,
    //     ];
        
    //     Mail::to($email)->send(new NewSignUp($config));
        
    //     return $otp;
    // }

    /**
     * Reset Password
     * @param \Illuminate\Http\Request $request, phone, otp
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(Request $request) {
        try {
            // Validation start
            $validSet = [
                'phone' => 'required|regex:/^[0-9]{10,}$/',
                'password' => 'required | string | min:8 | same:confirm_password',
                'confirm_password' => 'required | string | min:8',
            ]; 

          
            $isInValid = $this->isValidPayload($request, $validSet);
            if($isInValid){
                return ResponseBuilder::error($isInValid, $this->badRequest);
            }

            $user = User::getUserByEmailReset($request->phone);
            $user->password = Hash::make($request->password);
            $user->save();
        //     $mail_data = EmailTemplate::getMailByMailCategory('Reset password');
        //     $data = Setting::getDataByKey('logo_1');
        //     $img = url('/'.config('app.logo').'/'.$data->value);
        //     $arr1 = array('{image}');
        //     $arr2 = array($img);
        //     $msg = $mail_data->email_content;
        //     $msg = str_replace($arr1, $arr2, $msg);
        //     $config = ['from_email' => isset($mail_data->from_email) ? $mail_data->from_email : env('MAIL_FROM_ADDRESS'),
        //         'name' => isset($mail_data->from_name) ? $mail_data->from_name : env('MAIL_FROM_NAME'),
        //         'subject' => $mail_data->email_subject,  'message' => $msg,
               
        //     ];
        //    Mail::to($request->email)->send(new NewSignUp($config));
            DB::commit();
            return ResponseBuilder::successMessage(trans('global.PASSWORD_CHANGED'), $this->success);

        } catch (\Exception $e) {
            return $e->getMessage().'at line'.$e->getLine().''.$e->getFile();
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
        }
    }

    /**
     * User Profile
     * @return \Illuminate\Http\Response
     */
    public function userProfile() {
        try {
           
            $user = Auth::guard('api')->user();  
            $this->response = new UserResource($user);
            // $this->response->user_data = new UserResource($user);
            // $this->response->notification_count = Notification::where('user_id', $user->id)->where('seen', 0)->count();
            return ResponseBuilder::successMessage(trans('global.profile_detail'), $this->success, $this->response); 
        } catch (\Exception $e) {
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
        }
    }

    /**
     * User Profile Update
     * @param \Illuminate\Http\Request $request, name, email, phone
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request) {
        DB::beginTransaction();
        try {
             $user = Auth::guard('api')->user();
            // Validation start
            $validSet = [
                // 'name' => 'required | string',
                // 'email' => 'required | string',
                // 'phone' => 'required | string',
                //'profile_image' => 'nullable | mimes:jpeg,png,jpg',
            ]; 

            $isInValid = $this->isValidPayload($request, $validSet);
            if($isInValid){
                return ResponseBuilder::error($isInValid, $this->badRequest);
            }
            // Validation end

            $imagePath = config('app.profile_image');
            $profileImageOld = $user->profile_image;

            $user->name           = isset($request->name) ? $request->name : '';
            $user->email          = isset($request->email) ? $request->email : '';
            $user->phone          = isset($request->phone) ? $request->phone : '';
            $user->age            = isset($request->age) ? $request->age : '';
            $user->gender         = isset($request->gender) ? $request->gender : '';
            $user->location       = isset($request->location) ? $request->location : '';
            $user->timezone       = isset($request->timezone) ? $request->timezone : '';
            $user->languages       = isset($request->languages) ? $request->languages : '';
            $user->professional_title       = isset($request->professional_title) ? $request->professional_title : '';
            $user->short_bio       = isset($request->short_bio) ? $request->short_bio : '';
            $user->categories_id       = isset($request->categories_id) ? $request->categories_id : '';

            $user->profile_image  = $request->hasfile('profile_image') ? Helper::storeImage($request->file('profile_image'), $imagePath, $profileImageOld) : (isset($profileImageOld) ? $profileImageOld : '');
            $user->update();

            // $this->response = new UserResource($user);
            // $this->response->user_data = new UserResource($user);
            // $this->response->notification_count = Notification::where('user_id', $user->id)->where('seen', 0)->count();

            DB::commit();
            return ResponseBuilder::successMessage(trans('global.PROFILE_UPDATED'), $this->success); 
            
        } catch (\Exception $e) {
            DB::rollback();
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
        }
    }

    /**
     * Change Password API
     * @param \Illuminate\Http\Request $request, name, email, phone
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        try {
            // $user = Auth::guard('api')->user();
            // Validation start

            $user = User::getUserByEmailReset($request->email);

            

            $validSet = [
                //'old_password' => 'required',
                // 'new_password' => 'required | string | min:8 | same:confirm_password | different:old_password',
                'new_password' => ['required', 'regex:/^.*(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%]).*$/', 'string', 'min:8', 'same:confirm_password','different:old_password'],
                'confirm_password' => 'required',
            ];
            
            // $errorMessage = [
            //     'new_password.regex' => 'Password must contain at least 8 character with 1 uppercase letter, 1 lowercase letter, 1 number and 1 special character',
            // ];
            // return $validSet;

            $isInValid = $this->isValidPayload($request, $validSet);
            if($isInValid){
                return ResponseBuilder::error($isInValid, $this->badRequest);
            }
            // Validation end

            // if(!Hash::check($request->old_password,$user->password)) {
            //     return ResponseBuilder::error(trans('global.INCORRECT_OLD_PASSWORD'), $this->badRequest);
            // }


            $user->password = Hash::make($request->new_password);
            $user->update();

            return ResponseBuilder::successMessage(trans('global.PASSWORD_CHANGED'), $this->success); 
            
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage(),$this->badRequest);
        }
    }
    
    
    // public function updateLocation(Request $request) {
    //     try {

    //         $user = Auth::guard('api')->user();
    //         $validSet = [
    //             // 'latitude'  => 'required',
    //             // 'longitude' => 'required',
    //             'zip' =>       'required',
    //         ]; 
    //         $isInValid = $this->isValidPayload($request, $validSet);
    //         if($isInValid){
    //             return ResponseBuilder::error($isInValid, $this->badRequest);
    //         }
    //         $data = $this->lookForPoints($request->zip);
    //         if($user) {
    //             $user->current_location = $request->zip;
    //             $user->save();
    //         }
    //         if(!$data) {
    //             return ResponseBuilder::error(trans('global.not_found'), $this->notFound);
    //         }
    //         // $data = $this->getAddress($request->latitude, $request->longitude);
    //         $this->response->address = $data['formatted_address'];
    //         return ResponseBuilder::success(trans('global.location_update'), $this->success, $this->response); 

    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //         return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
    //     }
    // }
    // public function updateLocation(Request $request) {
    //     try {

    //         $user = Auth::guard('api')->user();
    //         $validSet = [
    //             'latitude'  => 'required',
    //             'longitude' => 'required',
    //         ]; 
    //         $isInValid = $this->isValidPayload($request, $validSet);
    //         if($isInValid){
    //             return ResponseBuilder::error($isInValid, $this->badRequest);
    //         }
    //         if($user) {
    //             $user->latitude = $request->latitude;
    //             $user->longitude = $request->longitude;
    //             $user->save();
    //         }
    //         $data = $this->getAddress($request->latitude, $request->longitude);
    //         $this->response->address = $data;
    //         return ResponseBuilder::success(trans('global.location_update'), $this->success, $this->response); 

    //     } catch (\Exception $e) {
    //         return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
    //     }
    // }

    /**
     * User Vendor Register Function
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    // public function vendorRegister(Request $request) {
    //     DB::beginTransaction();
    //     try {
    //         $user = Auth::guard('api')->user();
    //         $vendor_exists = vendorProfile::getDataByUserId($user->id);
    //         if($vendor_exists) {
    //             return ResponseBuilder::error(trans('global.VENDOR_REGISTRATION_EXISTS'), $this->success);
    //         }
    //         // Validation start
    //         $validSet = [
    //             'store_name' => 'required',
    //             'phone' => 'required',
    //             'location' => 'required',
    //             'store_image' => 'required | mimes:jpeg,png,jpg',
    //         ]; 
    //         $isInValid = $this->isValidPayload($request, $validSet);
    //         if($isInValid){
    //             return ResponseBuilder::error($isInValid, $this->badRequest);
    //         }
    //         // Validation end
    //         $imagePath = config('app.vendor_document');
    //         $getLatiLong = $this->lookForPoints($request->location);
    //         $vendorData = VendorProfile::create(
    //         [
    //             'user_id' => $user->id,
    //             'store_name' => $request->store_name,
    //             'phone' => $request->phone,
    //             'store_image' => $request->hasfile('store_image') ? Helper::storeImage($request->file('store_image'), $imagePath, $request->storeImageOld) : (isset($request->storeImageOld) ? $request->storeImageOld : ''),
    //             'location' => $request->location,
    //             'long'   =>  $getLatiLong['geometry']['location']['lng'] ?? '',
    //             'lat'    =>  $getLatiLong['geometry']['location']['lat'] ?? '',
    //             'status' => 0,
    //         ]);
    //         if($vendorData) {
    //             $user->store_id = $vendorData->id;
    //             $user->is_vendor = 1;
    //             $user->save();
    //         }
            
    //         DB::table('role_user')->insert(['user_id' => $user->id, 'role_id' => 4]);

    //         /**Mail to admin */
    //         $settingData = Setting::getAllSettingData();
    //         $img = url('/'.config('app.logo').'/'.$settingData['logo_1']);
    //         $mailData = EmailTemplate::getMailByMailCategory(strtolower('approval pending'));
    //         if(isset($mailData)) {

    //             $arr1 = array('{image}', '{user_type}', '{email}');
    //             $arr2 = array($img, 'Vendor', $user->email);

    //             $msg = $mailData->email_content;
    //             $msg = str_replace($arr1, $arr2, $msg);
               
    //             $config = [
    //                 'from_email' => isset($mailData->from_email) ? $mailData->from_email : env('MAIL_FROM_ADDRESS'),
    //                 'name' => isset($mailData->from_name) ? $mailData->from_name : env('MAIL_FROM_NAME'),
    //                 'subject' => 'Vendor' .$mailData->email_subject, 
    //                 'message' => $msg,
    //             ];
  
    //             if(isset($settingData['admin_mail']) && !empty($settingData['admin_mail'])){
    //                 Mail::to($settingData['admin_mail'])->send(new NewSignUp($config));
    //             }
    //         }

    //         DB::commit();
    //         return ResponseBuilder::successMessage(trans('global.VENDOR_REGISTRATION'), $this->success);

    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
    //     }
    // }

    /**
     * User logout Function
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Email Invitation
     * @return \Illuminate\Http\Response
     */
    // public function emailInvitation(Request $request) {
    //     try {
    //         $user = Auth::guard('api')->user();

    //         $validSet = [
    //             'email' => 'required | email',
    //         ]; 

    //         $isInValid = $this->isValidPayload($request, $validSet);
            
    //         if($isInValid){
    //             return ResponseBuilder::error($isInValid, $this->badRequest);
    //         }

    //         $userData = User::getUserByEmail($request->email);
    //         if($userData) {
    //             if(isset($userData->store_id)) {
    //                 return ResponseBuilder::error(trans('global.already_manager'),$this->badRequest);
    //             }
    //             $password = '';
    //             // $userData->store_id = $user->vendor->id;
    //             $userData->store_id = $user->store->id;
    //             $userData->save();
    //         }
    //         else {
    //             $password = Helper::generatePassword(10);

    //             $new_user = User::create([
    //                 'email' => $request->email,
    //                 // 'store_id' => $user->vendor->id,
    //                 'store_id' => $user->store->id,
    //                 'password' => Hash::make($password),
    //                 'emp_status' => 1,
    //             ]);

    //             $new_user->roles()->sync(2);
    //         }

    //         //mail to user
    //         $mail_data = EmailTemplate::getMailByMailCategory('email-invitation');

    //         $data = Setting::getDataByKey('logo_1');
    //         $img = url('/'.config('app.logo').'/'.$data->value);
    //         $arr1 = array('{username}', '{image}', '{password}');
    //         $arr2 = array($request->email, $img, $password);

    //         $msg = $mail_data->email_content;
    //         $msg = str_replace($arr1, $arr2, $msg);

    //         $config = ['from_email' => isset($mail_data->from_email) ? $mail_data->from_email : env('MAIL_FROM_ADDRESS'),
    //             'name' => isset($mail_data->from_name) ? $mail_data->from_name : env('MAIL_FROM_NAME'),
    //             'subject' => $mail_data->email_subject, 
    //             'message' => $msg,
    //         ];

    //         Mail::to($request->email)->send(new NewSignUp($config));

    //         return ResponseBuilder::successMessage(trans('global.INVITATION_SENT'), $this->success); 
    //     } catch (\Exception $e) {
    //         return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
    //     }
    // }

    public function usersoftdelete()
    {
    try {
        $user = Auth::guard('api')->user();
        
        $user->delete();

        return ResponseBuilder::successMessage(trans('global.DELETED'), $this->success);

        } catch (\Exception $e) {
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
        }
    }
    // public function verifyEmailOTP(Request $request) {

    //     try {
    //         // Validation start
    //         $validSet = [
    //             'email' => 'required | email',
    //             'otp' => 'required | integer',
    //         ]; 


    //         $isInValid = $this->isValidPayload($request, $validSet);
    //         if($isInValid){
    //             return ResponseBuilder::error($isInValid, $this->badRequest);
    //         }
    //         // Validation end
            
    //         $user = User::getUserByEmail($request->email);

    //         if(!$user) {
    //             return ResponseBuilder::error(trans('global.NOT_REGISTERED'), $this->badRequest);
    //         }

    //         if(!$user->status) {
    //             return ResponseBuilder::error(trans('global.USER_BLOCKED'), $this->badRequest);
    //         }

    //         if((!isset($user->otp_created_at)) || (empty($user->otp_created_at)) || (isset($user->otp_created_at)) && ((strtotime($user->otp_created_at) + 900) < strtotime(now()))) {
    //             return ResponseBuilder::error(trans('global.OTP_EXPIRED'), $this->badRequest);
    //         }
    //         if((!isset($user->otp)) || (empty($user->otp)) || (isset($user->otp)) && ($request->otp != $user->otp)) {
    //             return ResponseBuilder::error(trans('global.INVALID_OTP'), $this->badRequest);
    //         }
             
    //         // $user = Auth::user();
    //         $user->otp_created_at = $user->otp = NULL;
    //         $user->device_id = $request->device_id ?? null;
    //         $user->device_token = $request->device_token ?? null;
    //         $user->save();
    //         $token = $user->createToken('Token')->accessToken;
    //         // $token = auth()->user()->createToken('API Token')->accessToken;
            
    //         $mail_data = EmailTemplate::getMailByMailCategory('email verify otp');

    //         $data = Setting::getDataByKey('logo_1');
    //         $img = url('/'.config('app.logo').'/'.$data->value);
    //         $arr1 = array('{username}', '{image}');
    //         $arr2 = array($user->first_name, $img);

    //         $msg = $mail_data->email_content;
    //         $msg = str_replace($arr1, $arr2, $msg);

    //         $config = ['from_email' => isset($mail_data->from_email) ? $mail_data->from_email : env('MAIL_FROM_ADDRESS'),
    //             'name' => isset($mail_data->from_name) ? $mail_data->from_name : env('MAIL_FROM_NAME'),
    //             'subject' => $mail_data->email_subject, 
    //             'message' => $msg,
    //         ];

    //         Mail::to($request->email)->send(new NewSignUp($config));

    //         $this->response->user_data = new UserResource($user);
    //         $this->response->notification_count = Notification::where('user_id', $user->id)->where('seen', 0)->count();
    //         // return ResponseBuilder::successMessage(trans('global.VERIFIED'), $this->success);


    //         return ResponseBuilder::successwithToken($token, $this->response, trans('global.VERIFIED'), $this->success);
    //         // return ResponseBuilder::successMessage( $this->response, trans('global.LOGIN_SUCCESS'), $this->success);


    //         // return ResponseBuilder::successMessage(trans('global.INVITATION_SENT'), $this->success); 

    //     } catch (\Exception $e) {
    //         return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
    //     }
    // }


    // public function driverRegister(Request $request)
    // {
        
    //     DB::beginTransaction();
    //     try {
    //         // $user = Auth::guard('api')->user();

    //       //  $driver_exists = driverProfile::getDataByUserId($user->id);

    //         // if($driver_exists) {
    //         //     return ResponseBuilder::error(trans('global.DRIVER_REGISTRATION_EXISTS'), $this->success);
    //         // }
    //         // Validation start

    //         $validSet = [

    //             'dob'                =>  'required | date | before:today',
    //             //'aadhar_no'          => 'required | unique:driver_profiles,aadhar_no',
    //             'identity_card'          => 'required | unique:driver_profiles,identity_card',
    //             'insurance_no'             => 'required | unique:driver_profiles,insurance_no',
    //             //'pan_no'             => 'required | unique:driver_profiles,pan_no',
    //             'vehicle_no'         => 'required | unique:driver_profiles,vehicle_no',
    //             'licence_no'         => 'required | unique:driver_profiles,licence_no',
    //             //'bank_statement'     => 'required | mimes:jpeg,png,jpg',
    //             //'pan_card_image'     => 'required | mimes:jpeg,png,jpg',
    //             //'aadhar_front_image' => 'required | mimes:jpeg,png,jpg',
    //            // 'aadhar_back_image'  => 'required | mimes:jpeg,png,jpg',
    //             'licence_front_image'=> 'required | mimes:jpeg,png,jpg',
    //             'licence_back_image' => 'required | mimes:jpeg,png,jpg',
    //             'id_front_image' => 'required | mimes:jpeg,png,jpg',
    //             'id_back_image' => 'required | mimes:jpeg,png,jpg',
    //             'insurance' => 'required | mimes:jpeg,png,jpg',
    //             'first_name' => 'required',
    //             'middle_name' => 'required',
    //             'last_name' => 'required',
    //             'email' => 'required | email | unique:users,email,NULL,id,deleted_at,NULL',
    //             'phone' => 'required',
    //             'password' => 'required',
    //         ]; 

    //         $isInValid = $this->isValidPayload($request, $validSet);
    //         if($isInValid){
    //             return ResponseBuilder::error($isInValid, $this->badRequest);
    //         }
    //         // Validation end
            
    //         $user = User::create([
    //             'first_name' => $request->first_name,
    //             'middle_name' => $request->middle_name,
    //             'last_name' => $request->last_name,
    //             'email' => $request->email,
    //             'phone' => $request->phone,
    //             // 'location' => $request->location,
    //             'address_1'     => $request->address_1,
    //             'address_2'     =>$request->address_2,
    //             'city'          =>$request->city,
    //             'state'         =>$request->state,
    //             'code'      =>$request->zip_code,
    //             'other_instruction' =>$request->other_instruction,
    //             'password' => Hash::make($request->password),

    //         ]);
           
    //         $userId =   $user->id;
    //         $imagePath = config('app.driver_document');
    //         $vendorData = DriverProfile::create([
    //              'user_id'   => $userId,
    //              'dob'       => $request->dob,
    //              'aadhar_no' => $request->aadhar_no,
    //              'identity_card' => $request->identity_card,
    //              'insurance_no' => $request->insurance_no,
    //              'pan_no'    => strtoupper($request->pan_card_number),
    //              'vehicle_no' => $request->vehicle_no,
    //              'licence_no' => $request->licence_no,
    //              'address_1'     => $request->address_1,
    //              'address_2'     =>$request->address_2,
    //              'city'          =>$request->city,
    //              'state'         =>$request->state,
    //              'code'      =>$request->zip_code,
    //             //'bank_statement' => $request->hasfile('bank_statement') ? Helper::storeImage($request->file('bank_statement'), $imagePath) : '',
    //             //'pan_card_image' => $request->hasfile('pan_card_image') ? Helper::storeImage($request->file('pan_card_image'), $imagePath) :'',
    //             //'aadhar_front_image' => $request->hasfile('aadhar_front_image') ? Helper::storeImage($request->file('aadhar_front_image'), $imagePath) :  '',
    //             //'aadhar_back_image' => $request->hasfile('aadhar_back_image') ? Helper::storeImage($request->file('aadhar_back_image'), $imagePath) : '',
    //             'licence_front_image' => $request->hasfile('licence_front_image') ? Helper::storeImage($request->file('licence_front_image'), $imagePath) : '',
    //             'licence_back_image' => $request->hasfile('licence_back_image') ? Helper::storeImage($request->file('licence_back_image'), $imagePath) : '',
    //             'id_front_image' => $request->hasfile('id_front_image') ? Helper::storeImage($request->file('id_front_image'), $imagePath) : '',
    //             'id_back_image' => $request->hasfile('id_back_image') ? Helper::storeImage($request->file('id_back_image'), $imagePath) : '',
    //             'insurance' => $request->hasfile('insurance') ? Helper::storeImage($request->file('insurance'), $imagePath) : '',
    //         ]);

    //         $user->is_driver = true;
    //         $user->save();
            
    //         DB::table('role_user')->insert(['user_id' => $user->id, 'role_id' => 7]);





    //         /**Mail to admin */
    //         // $settingData = Setting::getAllSettingData();
        
    //         // $img = url('/'.config('app.logo').'/'.$settingData['logo_1']);
    //         // $mailData = EmailTemplate::getMailByMailCategory(strtolower('approval pending'));
    //         // if(isset($mailData)) {

    //         //     $arr1 = array('{image}', '{user_type}', '{number}');
    //         //     $arr2 = array($img, 'Driver', $user->phone);

    //         //     $msg = $mailData->email_content;
    //         //     $msg = str_replace($arr1, $arr2, $msg);
               
    //         //     $config = [
    //         //         'from_email' => isset($mailData->from_email) ? $mailData->from_email : env('MAIL_FROM_ADDRESS'),
    //         //         'name' => isset($mailData->from_name) ? $mailData->from_name : env('MAIL_FROM_NAME'),
    //         //         'subject' => 'Driver' .$mailData->email_subject, 
    //         //         'message' => $msg,
    //         //     ];
  
    //         //     if(isset($settingData['admin_mail']) && !empty($settingData['admin_mail'])){
    //         //         Mail::to($settingData['admin_mail'])->send(new NewSignUp($config));
    //         //     }

    //         // }
    //         DB::commit();
    //         return ResponseBuilder::successMessage(trans('global.DRIVER_REGISTRATION'), $this->success);

    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
    //         return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
    //     }
    // }

    // public function driverUpdateProfile(Request $request)
    // {
    //     DB::beginTransaction();
    //     try {
    //     $validSet = [
    //         //'dob'                  => 'required | date | before:today',
    //         //'aadhar_no'          => 'required | unique:driver_profiles,aadhar_no',
    //         //'pan_no'             => 'required | unique:driver_profiles,pan_no',
    //         // 'identity_card'        => 'required | unique:driver_profiles,identity_card',
    //         // 'insurance_no'         => 'required | unique:driver_profiles,insurance_no',
    //         // 'vehicle_no'           => 'required | unique:driver_profiles,vehicle_no',
    //         // 'licence_no'           => 'required | unique:driver_profiles,licence_no',
    //         //'licence_front_image'  => 'required | mimes:jpeg,png,jpg',
    //         //'licence_back_image'   => 'required | mimes:jpeg,png,jpg',
    //         //'id_front_image'       => 'required | mimes:jpeg,png,jpg',
    //         //'id_back_image'        => 'required | mimes:jpeg,png,jpg',
    //         //'insurance'            => 'required | mimes:jpeg,png,jpg',
    //         // 'first_name'           => 'required',
    //         // 'middle_name'          => 'required',
    //         // 'last_name'            => 'required',
    //         // 'phone'                => 'required',
    //     ];
        
    //     $isInvalid = $this->isValidPayload($request, $validSet);
    //     if ($isInvalid) {
    //         return ResponseBuilder::error($isInvalid, $this->badRequest);
    //     }
    //     $user = Auth::guard('api')->user();
    //     $driverProfile = DriverProfile::where('user_id', $user->id)->first();
    //     $profileImagePath = config('app.profile_image');
    //     $imagePath = config('app.driver_document');
    //     $profileImageOld = null;
    //     if ($driverProfile) {
    //         $driverProfile->update([
    //             'dob'               => $request->dob,
    //             'identity_card'    => $request->identity_card,
    //             'insurance_no'     => $request->insurance_no,
    //             'pan_no'           => strtoupper($request->pan_card_number),
    //             'vehicle_no'       => $request->vehicle_no,
    //             'licence_no'       => $request->licence_no,

                
    //             //'licence_back_image'=> $request->hasfile('licence_back_image') ? Helper::storeImage($request->file('licence_back_image'), $imagePath) : '',
    //             //'id_front_image'   => $request->hasfile('id_front_image') ? Helper::storeImage($request->file('id_front_image'), $imagePath) : '',
    //             //'id_back_image'    => $request->hasfile('id_back_image') ? Helper::storeImage($request->file('id_back_image'), $imagePath) : '',
    //             //'insurance'        => $request->hasfile('insurance') ? Helper::storeImage($request->file('insurance'), $imagePath) : '',
    //         ]);
            
    //         if ($request->hasfile('licence_front_image')) {
    //             $driverProfile->update([
    //                 'licence_front_image' => Helper::storeImage($request->file('licence_front_image'), $imagePath),
    //             ]);
    //         }
    //         if ($request->hasfile('licence_back_image')) {
    //             $driverProfile->update([
    //                 'licence_back_image' => Helper::storeImage($request->file('licence_back_image'), $imagePath),
    //             ]);
    //         }
    //         if ($request->hasfile('id_front_image')) {
    //             $driverProfile->update([
    //                 'id_front_image' => Helper::storeImage($request->file('id_front_image'), $imagePath),
    //             ]);
    //         }
    //         if ($request->hasfile('id_back_image')) {
    //             $driverProfile->update([
    //                 'id_back_image' => Helper::storeImage($request->file('id_back_image'), $imagePath),
    //             ]);
    //         }
    //         if ($request->hasfile('insurance')) {
    //             $driverProfile->update([
    //                 'insurance' => Helper::storeImage($request->file('insurance'), $imagePath),
    //             ]);
    //         }
    //         $user->update([
    //             'first_name'    => $request->first_name,
    //             'middle_name'   => $request->middle_name,
    //             'last_name'     => $request->last_name,
    //             'email'         => $request->email,
    //             'phone'         => $request->phone,
    //             'location'      => $request->location,

    //             'address_1'     => $request->address_1,
    //             'address_2'     =>$request->address_2,
    //             'city'          =>$request->city,
    //             'state'         =>$request->state,
    //             'code'      =>$request->zip_code,
    //             'other_instruction' =>$request->other_instruction,
    //             'password'      => Hash::make($request->password),
    //             //'profile_image' => $request->hasFile('profile_image')? Helper::storeImage($request->file('profile_image'), $profileImagePath, $profileImageOld) : (isset($profileImageOld) ? $profileImageOld : '')
    //         ]);

    //         if ($request->hasFile('profile_image')) {
    //             $user['profile_image'] = Helper::storeImage($request->file('profile_image'), $profileImagePath, $profileImageOld);
    //         } elseif (isset($profileImageOld)) {
    //             $user['profile_image'] = $profileImageOld;
    //         } else {
    //             $user['profile_image'] = '';
    //         }
           
    //         DB::commit();
    //         return ResponseBuilder::successMessage(trans('global.DRIVER_PROFILE_UPDATED'), $this->success);
    //     }
    //     else
    //     {
    //         DB::rollback();
    //         return ResponseBuilder::error(trans('global.DRIVER_PROFILE_NOT_FOUND'), $this->notFound);
    //     }
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         // return $e->getMessage();
    //         return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
    //         return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
    //     }
    // }

    /**
     * Social Login
     * @param \Illuminate\Http\Request $request, name, email, phone
     * @return \Illuminate\Http\Response
     */
    // public function social(Request $request) {
    //     try {
    //         // Validation start
    //         $validSet = [
    //             'provider' => 'required|in:google,apple',
    //             'token' => 'required'
    //         ];

    //         $isInValid = $this->isValidPayload($request, $validSet);
    //         if($isInValid){
    //             return ResponseBuilder::error($isInValid, $this->badRequest);
    //         }
    //         // Validation end

    //         $social_user = Socialite::driver($request->provider)->stateless()->userFromToken($request->token);
    //         // dd($social_user);
    //         if (!$social_user) {
    //             throw new Error(Str::replaceArray('?', [$request->provider], __('messages.invalid_social')));
    //         }
            
    //         // dd($social_user->getName());
    //         $account = SocialAccount::where('provider_user_id', $social_user->getId())
    //                                 ->where('provider', $request->provider)
    //                                 ->with('user')->first();

    //         // dd($account);
    //         if($account) {

    //             $user = User::where(["id" => $account->user_id])->first();
                
    //             $user->device_id = $request->device_id ? $request->device_id : "";
    //             $user->device_token = $request->device_token ? $request->device_token : "";
    //             $user->social_profile_image = $social_user->getAvatar();
    //             $user->save();
    //             $token = $user->createToken('Social Token')->accessToken;

    //             $this->response = new UserResource($user);

    //             return ResponseBuilder::successwithToken($token, $this->response, trans('global.LOGIN_SUCCESS'), $this->success);
    //         }

    //         $fname = $social_user->getName() ? $social_user->getName() : "";
    //         $lname = $social_user->getNickname() ? $social_user->getNickname() : "";
    //         $loginEmail = $social_user->getEmail() ? $social_user->getEmail() : $social_user->getId() . '@' . $request->provider . '.com';
    //         $loginName =  $fname . $lname;

    //         // create new user and social login if user with social id not found.
    //         $user = User::where("email", $loginEmail)->first();
    //         if (!$user) {
    //             $user = User::create([
    //                 'first_name' => $fname,
    //                 'last_name' => $lname,
    //                 'name' => $loginName,
    //                 'email' => $loginEmail,
    //                 'social_profile_image' => !empty($social_user->getAvatar()) ? $social_user->getAvatar() : NULL,
    //                 'password' => Hash::make($social_user->getId()),
    //                 'email_verified_at' => now(),
    //                 'device_id' => $request->device_id ? $request->device_id : "",
    //                 'device_token' => $request->device_token ? $request->device_token : "",
    //             ]);

    //             //mail to user
    //             $mail_data = EmailTemplate::getMailByMailCategory('signup');

    //             $data = Setting::getDataByKey('logo_1');
    //             $img = url('/'.config('app.logo').'/'.$data->value);

    //             $arr1 = array('{name}', '{image}');
    //             $arr2 = array($loginName, $img);

    //             $msg = $mail_data->email_content;
    //             $msg = str_replace($arr1, $arr2, $msg);

    //             $config = ['from_email' => isset($mail_data->from_email) ? $mail_data->from_email : env('MAIL_FROM_ADDRESS'),
    //                 'name' => isset($mail_data->from_name) ? $mail_data->from_name : env('MAIL_FROM_NAME'),
    //                 'subject' => $mail_data->email_subject, 
    //                 'message' => $msg,
    //             ];

    //             Mail::to($loginEmail)->send(new SendMail($config));
    //         }
    //         $user->roles()->sync(2);

    //         SocialAccount::create([
    //             'user_id' => $user->id,
    //             'provider' => $request->provider,
    //             'provider_user_id' => $social_user->getId(),
    //         ]);

    //         $user->device_id = $request->device_id ? $request->device_id : '';
    //         $user->device_token = $request->device_token ? $request->device_token : '';
    //         $token = $user->createToken('Social Token')->accessToken;
    //         $this->response = new UserResource($user);

    //         return ResponseBuilder::successwithToken($token, $this->response, trans('global.LOGIN_SUCCESS'), $this->success);
            
    //     } catch (\Exception $e) {
    //         return ResponseBuilder::error($e->getMessage(),$this->badRequest);
    //     }
    // }


    // public function requestForDistributor(Request $request)
    // {
    //     $validSet = [
    //         'first_name' => 'required',
    //         'middle_name' => 'required',
    //         'last_name' => 'required',
    //         'email' => 'required | email | unique:users,email,NULL,id,deleted_at,NULL',
    //         'phone' => 'required|numeric|unique:users,phone,NULL,id,deleted_at,NULL',
    //         'address1'=>'required',
    //         'address2'=>'required',
    //         'city'=>'required',
    //         'state'=>'required',
    //         'zipcode'=>'required',
    //         'profile_image'=>'nullable',
    //     ]; 

    //     $errorMessage = [
    //         'phone.unique' => 'The phone number has already been taken.',
    //     ];

    //     $isInValid = $this->isValidPayload($request, $validSet,$errorMessage);
    //     if($isInValid){
    //         return ResponseBuilder::error($isInValid, $this->badRequest);
    //     }
    //     try {
    //         //code...
    //         $imagePath = config('app.profile_image');
    //         $data = [
    //             'first_name' => $request->first_name,
    //             'middle_name' => $request->middle_name,
    //             'last_name' => $request->last_name,
    //             'email' => $request->email,
    //             'phone' => $request->phone,
    //             'address1'=> $request->address1,
    //             'address2'=>$request->address2,
    //             'city'=>$request->city,
    //             'state'=>$request->state,
    //             'code'=>$request->zipcode,
    //             'distributor_status'=>'pending'
    //         ];
    //         if(isset($request->profile_image)){
    //             $data['profile_image'] = Helper::storeImage($request->file('profile_image'), $imagePath) ;
    //         }
    //         $distributor = User::updateOrCreate([
    //             'id'    => $request->id,
    //         ],$data);
    //         $distributor->roles()->sync([8]);
    //         return ResponseBuilder::successMessage(trans('Registration done'), $this->success);
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }
    // }
    
    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric|digits:10',
        ]);
        if ($validator->fails()) {
            return ResponseBuilder::error($validator->errors()->first(), $this->badRequest);
        }   
        $data = $request->phone; 
        $userstore = User::create([
            'phone' => $data, 
        ]);
        $otp = mt_rand(1000, 9999);
        $user = User::where('phone', $request->phone)->first();
        if(!$user){
            $newUser = User::create([
                'phone'     => $request->phone,
                'otp'       => $otp,
                'otp_expire_at' => Carbon::now()->addMinute(15)
            ]);
            $role = Role::where('title','User')->first();
            $newUser->roles()->sync([$role->id]);
        }else{
            $user->otp  = $otp;
            $user->otp_expire_at = Carbon::now()->addMinute(15);
            $user->save();
        }

        $response = Http::get('https://api.authkey.io/request', [
            'authkey' => '651ef6692f009509',
            'mobile' => $request->phone,
            'country_code' => '91',
            'sid' => '7919',
            'company' => 'YellowSquash',
            'otp' => $otp
        ]);
        if ($response->successful()) {
            $data = [
                'otp' => $otp,
            ];
        } else {
           $errorMessage = $response->json()['message'];
           Log::error("Failed to send OTP: $errorMessage");
           return response()->json(['error' => "Failed to send OTP: $errorMessage"], 500);
        }
        $data = [
            'otp'   =>  $otp,
        ];
        return ResponseBuilder::successMessage('Otp send successfully',$this->success,$data);
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric|digits:10',
            'otp' => 'required|numeric',
        ]);
        
        if ($validator->fails()) {
            return ResponseBuilder::error($validator->errors()->first(), $this->badRequest);
        }
        
        $user = User::where('phone', $request->phone)->first();
        if ($user && $user->otp == $request->otp) {
            
            // $token = $user->createToken('api-token')->plainTextToken;
              $accessToken = $user->createToken('Token')->accessToken;
                    // $tokenValue = $accessToken->id;
                    $token = $accessToken;
            $response = new Response();
            $response->action = isset($user->name) ? true : false; 
            $this->setAuthResponse($user);
            $user->otp = null;
            $user->otp_expire_at = null;
            $user->status = 1;
            $user->save();
            return ResponseBuilder::successMessage('OTP Matched Successfully', $this->success, ['user_id' => $user->id, 'token' => $token]);
        } else {
            return response()->json(['error' => 'Otp does not match'], 400);
        }
    }
    public function setAuthResponse($user)
    {   
        return $user;
        $this->response->user = new UserResource($user);
    }


    public function sendOtpEmail($phone)
{
    // Find the user by phone number
    $user = User::where('phone', $phone)->first();

    if (!$user) {
        // If user not found, return an error response
        return ResponseBuilder::error('User not found', $this->notFound);
    }

    // Validate phone number if necessary
    $validator = Validator::make(['phone' => $phone], [
        'phone' => 'required',
    ]);

    if ($validator->fails()) {
        return ResponseBuilder::error($validator->errors()->first(), $this->badRequest);
    }

    // Generate OTP
    $otp = mt_rand(1000, 9999);

    // Update user's OTP and expiry time
    $user->otp = $otp;
    $user->otp_expire_at = Carbon::now()->addMinute(15);
    $user->save();

    // Prepare data for response
    $data = ['otp' => $otp];

    // Return success response
    return ResponseBuilder::successMessage('OTP sent successfully', $this->success, $data);
}


    public function forgotPassword(Request $request)
    {
        try {
            $validSet = [
                'phone' => 'required',
            ]; 
            $isInValid = $this->isValidPayload($request, $validSet);
            if($isInValid){
                return ResponseBuilder::error($isInValid, $this->badRequest);
            }
            $user = User::getUserByEmail($request->phone);
          
            if(!$user) {
                return ResponseBuilder::error(trans('global.NOT_REGISTERED'), $this->badRequest);
            }
            if(!$user->status) {
                return ResponseBuilder::error(trans('global.USER_BLOCKED'), $this->badRequest);
            }
            
            $data = $this->sendOtpEmail($request->phone, $user);
      
                
                  return $data;
        //    $this->response->otp = $data['otp'];
            
            
        } catch (\Exception $e) {
            return ResponseBuilder::error($e->getMessage(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
        }
    }

    public function logout()
    {
        try {
            Auth::guard('api')->user()->token()->revoke();
            return ResponseBuilder::successMessage('Logout user successfully', $this->success); 
        } catch (\Exception $e) {   
            return ResponseBuilder::error($e->getMessage(), $this->badRequest);
        }
    }


    public function SubscribeOurNewsletter(Request $request)
    {
        DB::beginTransaction();
        try {
             $validSet = [
                'email' => 'required', 
            ];
        $isInvalid = $this->isValidPayload($request, $validSet);
        if ($isInvalid) {
            return ResponseBuilder::error($isInvalid, 400); 
        }
        $data = SubscribeData::create([
            'email' => $request->email,
        ]);
        DB::commit();
        return ResponseBuilder::successMessage(trans('global.Newsletter'), 200);

    } catch (\Exception $e) {
        DB::rollback();
        return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
        return response()->json(['status' => false, 'message' => 'Something went wrong'], 500); 
       }

    }
    

    public function DeactivateAccount(Request $request)
    {   
        try {
                $user = Auth::guard('api')->user();
                $user->update(['status' => '0']);
                return ResponseBuilder::successMessage(trans('global.Account_Deactivated'), 200);

        }
        catch(\Exception $e){
            return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
        }
    }

    public function checkUsers(Request $request)
    {
        
        try {

                //  $phoneGet = $request->phone;
                //  $data = User::where('phone', $phoneGet)->get();
              
            //      $data = User::join('role_user','users.id','role_user.user_id')->where('role_user.role_id',$request->role)->where(function ($query) use ($request) {
            //     $query->where('users.phone', $request->phone)->orWhere('users.phone', $request->phone);
            // })->where('users.status', 1)->first();
                
               $phone = $request->phone;
               $role = $request->role;
            
                 $data = User::where('phone', $phone)
                        ->whereHas('roles', function($query) use ($role) {
                            $query->where('id', $role);
                        })
                        ->where('status', 1)
                        ->first();
            // dd( $data);
            
            
            if ($data === null) {
                return response()->json([
                    'status' => 'false',
                    'message' => 'User Not Exists'
                ], 200);
            } else {
                if ($data->status == 0) {
                    return response()->json([
                        'status' => 'true',
                        'message' => 'User Exists and user register is '
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 'false',
                        'message' => 'User Exists and user register is not '
                    ], 200);
                }
            }


        
        
    } catch (\Exception $e) {
        DB::rollback();
        return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
        return response()->json(['status' => false, 'message' => 'Something went wrong'], 500); 
       }
    }
}
