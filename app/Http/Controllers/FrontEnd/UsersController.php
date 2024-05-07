<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\WibinerUser;
use App\Models\Program;
use App\Models\WibinerSession;
use App\Models\WibinerWillLearn;
use App\Models\User;
use App\Models\Order;
use App\Models\ReportImage;
use App\Models\Report;


use App\Models\Role;
use App\Models\PatientDetail;
use Illuminate\Support\Facades\DB;

use App\Models\WibinerItFor;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPaymentSuccess;
use App\Mail\SendUserpassword;
use App\Models\Appointment;
use App\Helper\Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class UsersController extends Controller
{
   public function signup()
   { 
     return view("frontend.createuser");
   }

   public function SendOtp(Request $request)
   { 
    $request->validate([
        'phone' => 'required|numeric|digits:10', // Assuming 'phone' is unique in 'users' table
    ]);

        $data = $request->phone;
        $otp = mt_rand(1000, 9999);
        $user = User::where('phone', $request->phone)->where('otp_verified','1')->first();
        if(!$user){
            $user = User::where('phone', $request->phone)->where('otp_verified','0')->first();
            if(!$user){
                $newUser = new User ;
                $newUser->phone   = $request->phone;
                $newUser->otp     = $otp;
                $newUser->otp_expire_at = Carbon::now()->addMinute(5);
                $newUser->save();
                $role = Role::where('name','User')->first();
                $newUser->roles()->sync([$role->id]);
            }else{
                $user->otp  = $otp;
                $user->otp_expire_at = Carbon::now()->addMinute(5);
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
            return view("frontend.otp-verify",compact('data'))->with('success', 'OTP Send successfully.');
        }else{
            return redirect()->back()->with('error', 'The phone has already been taken.');
        }   
   
   }
   

   public function OtpVerifySubmit(Request $request)
   { 
        $enteredOTP = implode('', $request->otp);
        $phone = $request->phone;
        $user = User::where('phone', $phone)->first();
        if ($user && $user->otp == $enteredOTP) {
            $user->otp = null;
            $user->otp_verified = '1';
            $user->save();
            return view("frontend.signup",compact('phone'))->with('success', 'OTP verified successfully.');
        } else {
            return view("frontend.otp-verify")->with('error', 'Invelid OTP .');
        }
       
    
   }

   public function register()
   { 
    return view("frontend.signup");
   }
   
   
   public function login()
   { 
    return view("frontend.login");
   }
   
   
   public function dashboard()
   {    
        $ProgramOrderData = Order::with('program')->where('user_id',auth()->user()->id)->where('type','program')->get();

        $WebinarOrderData = Order::with('webinar')->where('user_id',auth()->user()->id)->where('type','webinar')->get();

        $category = Category::where('status','1')->get();
        $reports = Report::with('getReportImage')->get(); 
        return view("frontend.dashboard",compact('ProgramOrderData','WebinarOrderData','category','reports'));
   }
   
   public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'phone' => 'required|digits:10', // Assuming 'phone' is unique in 'users' table
            'password' => 'required|string|min:8', 
            'confirm_password' => 'required|string|same:password',
        ], [
            'phone.unique' => 'The phone number has already been taken.', // Custom message for unique rule
            'confirm_password.same' => 'The password confirmation does not match.',
        ]);

        $user = User::where('phone', $request->phone)->first();
        if($user){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->categories_id = implode(',', $request->input('categories_id'));

            $user->password = Hash::make($request->password); 
            $user->update();
            
            return redirect()->route('user.login')->with('success', 'User registration successful. Please login.');
          
        }else{
            return redirect()->back()->with('error', 'User does not exist.');

        }
       
    }

    public function UpdateProfile(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'email' => 'required', 
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        if($user){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->categories_id = implode(',', $request->input('categories_id'));
            $user->update();
            if ($user) {
                return redirect()->back()->with('success', 'Profile updated successfull.');
            } else {
                return redirect()->back()->with('error', 'Something went wrong, please try again.');
            }
        }else{
            return redirect()->back()->with('error', 'User does not exist.');

        }
        
       
    }

    public function UplodeReport(Request $request)
    {   
       
        if ($request->hasFile('file1')) {
            $image = $request->file('file1');
            $imageName1 = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads', $imageName1); 
        }
        if ($request->hasFile('file2')) {
            $image = $request->file('file2');
            $imageName2 = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads', $imageName2); 
        }
            $user = Report::where('user_id', auth()->user()->id)->delete();
            $report = new Report;
            $report->user_id = auth()->user()->id;
            $report->file1 = $imageName1 ?? null;
            $report->file2 = $imageName2 ?? null;
            $report->save();
            if ($report) {
                return redirect()->back()->with('success', 'Report updated successfull.');
            } else {
                return redirect()->back()->with('error', 'Something went wrong, please try again.');
            }
        
        
       
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:password',
        ]);
        $user = auth()->user();
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'The old password is incorrect.');
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    

   public function loginuser(Request $request)
   {
      Session::forget('success');
      $credentials = $request->validate([
         'phone' => 'required',
         'password' => 'required|string|min:8', 

     ]);

     if (Auth::attempt($credentials)) {
        
         return redirect()->route('user.dashboard')->with('success', 'Welcome to the dashboard!');
     } else {
        return redirect()->back()->with('error', 'User does not exist.');
         
     }
   }


   public function ResetPassword(Request $request)
   {    
        return view("frontend.reset-password");
   }

    public function ResetPasswordSendOtp(Request $request)
    {    
        $otp = mt_rand(1000, 9999);
        $user = User::where('phone', $request->phone)->first();
        if(!$user){
          return redirect()->back()->with('error', 'User does not exist.');
        }else{
            $user->otp  = $otp;
            $user->otp_expire_at = Carbon::now()->addMinute(5);
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
        $phone = $request->phone;
        return redirect()->route('user.forgot-verify',$phone);
    }

    public function ForgotPasswordVerify(Request $request,$phone)
    {    
            return view("frontend.resetpassword-otp",compact('phone'));
    }
    
    public function ResetPasswordVerify(Request $request)
    { 
        $enteredOTP = implode('', $request->otp);
        $phone = $request->user_phone;
        Session::put('phone_number', $phone);

        $user = User::where('phone', $phone)->first();
        if ($user && $user->otp == $enteredOTP) {
            $user->otp = null;
            $user->save();
            return redirect()->route('user.set-password')->with('success', 'OTP verified successfully.');
        } else {
            return redirect()->back()->with('error', 'OTP Does not match.');
        }
    }    
    public function ResetPasswordChange(Request $request)
    {    
        return view("frontend.resetpassword-change");
    }

    public function ResetPasswordSet(Request $request)
    {    
        $request->validate([
            'new_pass' => 'required|string|min:8',
            'confirom_pass' => 'required|string|same:new_pass',
        ]);

        $user = User::where('phone', $request->user_phone)->first();
        $user->password = Hash::make($request->new_pass);
        $user->save();
        if($user->email){
            $data = ['from_email' => env('MAIL_FROM_ADDRESS'),
                'name' => env('MAIL_FROM_NAME'),
                'subject' => 'Reset Password',
                'message' => 'ResetPassword Set Successfully.',
            ];
            Mail::to($user->email)->send(new SendPaymentSuccess($data));
        }
        return redirect()->route('user.login')->with('success', 'Password Change successfully.');
    }
    
    // public function WebinarCroneSetup(){
    //     $orderData = Order::with('webinar','user')->whereNotNull('webinar_id')->get();
    //     foreach($orderData as $val){
    //         $currentTime = now();
    //         $time =  Helper::showDateTimeComparison($val->webinar->webinar_start_date,$val->webinar->start_time,$val->webinar->duration);
    //         $timeDifferenceInHours = $currentTime->diffInHours($time['specificDateTime']);
    //         if ($timeDifferenceInHours == 1) { // Send reminder 1 hour before
    //             $this->sendWebinarReminderEmail($val->user->email, '1 hour');
    //         } elseif ($timeDifferenceInHours == 24) { // Send reminder 24 hours before
    //             $this->sendWebinarReminderEmail($val->user->email), '24 hours';
    //         } elseif ($timeDifferenceInHours == 0) { // Send reminder when current time matches webinar time
    //             $this->sendWebinarReminderEmail($val->user->email, 'now');
    //         }
    //     }
    //    // dd($orderData);
    // }

    public function sendWebinarReminderEmail($email,$reminderType) {
        if($email){
            $data = ['from_email' => env('MAIL_FROM_ADDRESS'),
                'name' => env('MAIL_FROM_NAME'),
                'subject' => ' Webinar will start at: '.$reminderType.' hour',
                'message' => 'Start Webinar.',
            ];
            Mail::to($email)->send(new SendPaymentSuccess($data));
        }
    }

    public function AddPatient($id) {
      //  dd($id);
        $ProgramOrderData = Order::where('type','program')->where('id',$id)->first();
       // dd($ProgramOrderData);
       
        if($ProgramOrderData){
            $patients = Order::with('getPatient')->where('parent_id',$ProgramOrderData->user_id)->where('program_id',$ProgramOrderData->program_id)->get();
        //    dd($patients);
            return view("frontend.patient",compact('patients','ProgramOrderData'));
        }else{
            return redirect()->route('user.dashboard')->with('error', "Program Patient Does Not exist..");

        }
    }

    public function StorePatient(Request $request) {
        $input = $request->all();
       
       
        $randomNumber = rand(10000000, 99999999);

        $userdata        = new User;    
        $userdata->name  = $input['name'];
        $userdata->email = $input['email'];
        $userdata->phone = $input['phone'];
        $userdata->age       = $input['age'];
        $userdata->gender    = $input['gender'];
        $userdata->address = $input['street_name'];
        $userdata->city  = $input['district'];
        $userdata->pincode  = $input['pin_code'];
        $userdata->state      = $input['state'];
        $userdata->country   = $input['country'];
        $userdata->password = Hash::make($randomNumber); 
        $userdata->save();
        $order = Order::where('id',$input['order_id'])->first();
        $count = ($order->planduration - 1);
        $order->planduration =$count;
        $order->update();
        $orderData = [
            'user_id'      =>  $userdata->id,
            'program_id'   =>  $order->program_id,
            'amount_paid'  =>  '0',
            'planduration' =>  '0',
            'type'         => 'program',
            'batch_id'     =>  $order->batch_id,
            'parent_id'    =>  $order->user_id
        ];
        DB::table('orders')->insertGetId($orderData);

        if($input['email']){
            $data = ['from_email' => env('MAIL_FROM_ADDRESS'),
                'name' => env('MAIL_FROM_NAME'),
                'subject' => 'User Password',
                'message' => 'User Password Successfully.',
                'password' => $randomNumber
            ];
            Mail::to($input['email'])->send(new SendUserpassword($data));
        }

        return redirect()->route('user.dashboard')->with('success', "Program Patient Add Successfully..");
    }    

    public function appointmentBooking()
    { 
      
        $appointment = Appointment::first();
         return view("frontend.appointment-booking",compact('appointment'));
    }
    
    public function reportStore(Request $request)
    {
        // $request->validate([
        //     'report_title' => 'required|string|max:255',
        //     'report_description' => 'required|string',
        //     'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' 
        // ]);


        $report = new Report();
        $report->user_id = auth()->id(); 
        $report->program_id =  $request->program_id; 
        $report->batch_id =  $request->batch_id; 
        $report->report_title = $request->report_title;
        $report->report_description = $request->report_description;
        $report->save();

        // Handle multiple image uploads
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
        
                // Create a new ReportImage instance for each image
                $reportImage = new ReportImage();
                $reportImage->report_id = $report->id;
                $reportImage->image = $imageName;
                $reportImage->save();
            }
        }

        return redirect()->back()->with('success', 'Report submitted successfully.');
    }
  
   

}