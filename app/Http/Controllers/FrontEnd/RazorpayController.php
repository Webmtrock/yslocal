<?php
  
namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
  
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Mail\SendPaymentSuccess;
use Session;
use App\Mail\SendUserpassword;

use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Order;
use App\Models\PatientDetail;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
  
class RazorpayController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(): View
    {        
        return view('frontend.razorpayView');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if($payment->status == 'Failed'){
            if($input['email']){
                $data = ['from_email' => env('MAIL_FROM_ADDRESS'),
                    'name' => env('MAIL_FROM_NAME'),
                    'subject' => 'Program',
                    'message' => 'Program payment failed.',
                ];
                Mail::to($input['email'])->send(new SendPaymentSuccess($data));
            }
            return redirect()->back()->with('error','Payment Failed');
        }else{
            if(auth()->check()){
                $userId = auth()->user()->id;
            }else{
                $userdata        = new User;
                $userdata->name  = $input['userName'];
                $userdata->email = $input['email'];
                $userdata->phone = $input['phone'];
                $userdata->save();
                $userId = $userdata->id;
            }
           
           
            $duration = ($input['duration'] == 'Individual') ? 0 : ($input['duration'] - 1);

            $data = [
                'user_id'      =>  $userId,
                'program_id'   =>  $input['program_id'],
                'amount_paid'  =>  $input['amount'],
                'planduration' =>  $duration,
                'type'         => 'program',
                'batch_id'     =>  $input['batch'],
                'parent_id'    =>  '0'

            ];

            // Insert the data into the database
            $orderID = DB::table('orders')->insertGetId($data);

            if($input['patient_copy_checkbox'] == '0'){
                $randomNumber = rand(10000000, 99999999);

                $userdata        = new User;    
                $userdata->name  = $input['patient_name'];
                $userdata->email = $input['patient_email'];
                $userdata->password = Hash::make($randomNumber);
                $userdata->phone = $input['patient_number'];
                $userdata->age = $input['patient_age'];
                $userdata->gender = $input['patient_gender'];
                $userdata->address = $input['patient_street'];
                $userdata->city = $input['patient_district'];
                $userdata->pincode = $input['patient_pin_code'];
                $userdata->state = $input['patient_state'];
                $userdata->country = $input['patient_country'];
                $userdata->save();
                
                $orderData = [
                    'user_id'      =>  $userdata->id,
                    'program_id'   =>  $input['program_id'],
                    'amount_paid'  =>  '0',
                    'planduration' =>  '0',
                    'type'         => 'program',
                    'batch_id'     =>  $input['batch'],
                    'parent_id'    =>  $userId
                ];
                DB::table('orders')->insertGetId($orderData);
                $myOrder = Order::where('id',$orderID)->first();
                if($input['patient_email']){
                    $data = ['from_email' => env('MAIL_FROM_ADDRESS'),
                        'name' => env('MAIL_FROM_NAME'),
                        'subject' => 'User Password',
                        'message' => 'User Password Send Successfully.',
                        'password' => $randomNumber
                    ];
                    Mail::to($input['patient_email'])->send(new SendUserpassword($data));
                }
                
            }
            

            if($input['email']){
                $data = ['from_email' => env('MAIL_FROM_ADDRESS'),
                    'name' => env('MAIL_FROM_NAME'),
                    'subject' => 'Program',
                    'message' => 'Program payment successfully.',
                ];
                Mail::to($input['email'])->send(new SendPaymentSuccess($data));
            }
            return redirect()->route('programthankyou',$input['program_id']);

          
        }
    }

    

    public function workshopFreeForm(Request $request)
    {
     
        if(auth()->check()){
            $userId = auth()->user()->id;
            User::where('id',$userId)->update(['landing_page_id',$request->landing_page_id]);
        }else{

            $dataUser = User::where('phone' ,$request->phone)->first();
            if($dataUser){
                
                $order_count =  Order::where('user_id',$dataUser->id)->where('landing_page_id',$request->landing_page_id)->count();
                if($order_count > 1){
                  $notification = [
                      'message'=>'Already purchased',
                      'alert-type'=>'error',
                  ];
                  return redirect()->back()->with($notification);
                }else{
                  Order::where('user_id',$dataUser->id)->update(['landing_page_id'=>$request->landing_page_id]);
                }
                
            }
            else{
                $randomNumber = rand(10000000, 99999999);

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'landing_page_id' => $request->landing_page_id,
                    'password' => Hash::make($randomNumber),
                ]);
                if($request->email){
                    $data = ['from_email' => env('MAIL_FROM_ADDRESS'),
                        'name' => env('MAIL_FROM_NAME'),
                        'subject' => 'User Password',
                        'message' => 'User Password Successfully.',
                        'password' => $randomNumber
                    ];
                    Mail::to($request->email)->send(new SendUserpassword($data));
                }
            }
            $userId = $user->id;
        }
        $data = [
            'user_id'    => $userId,
            'webinar_id' => $request->wibiner_id,
            'landing_page_id' => $request->landing_page_id,
            'amount_paid' => '0',
            'type'        => 'webinar',
        ];
        DB::table('orders')->insert($data);

        if($request->email){

           
                
           
            $data = ['from_email' => env('MAIL_FROM_ADDRESS'),
                'name' => env('MAIL_FROM_NAME'),
                'subject' => 'Workshop Free',
                'message' => 'Workshop free purchase successfully.',
            ];
            Mail::to($request->email)->send(new SendPaymentSuccess($data));
        }
        if($request->form_type == "landing"){
            return redirect()->route('landing-thankyou',$request->wibiner_id);
        }else{
            return redirect()->route('workshop-thankyou',$request->wibiner_id);
        }
        

    }

    public function WorkshopPaidForm(Request $request)
    { 
     
        $input = $request->all();
     
        $webinar_id  = ($input['wibiner_id']);
        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
            if(auth()->check()){
              
                $userId = auth()->user()->id;
                if($request->landing_page_id){
                    User::where('id',$userId)->update(['landing_page_id',$request->landing_page_id]);
                }
               
            }else{
                //dd( $request->all());
                $dataUser = User::where('phone' ,$request->phone)->first();

                if($dataUser){
                    if($request->landing_page_id){
                        $order_count =  Order::where('user_id',$dataUser->id)->where('landing_page_id',$request->landing_page_id)->count();
                        if($order_count > 1){
                            $notification = [
                                'message'=>'Already purchased',
                                'alert-type'=>'error',
                            ];
                            return redirect()->back()->with($notification);
                        }else{
                            Order::where('user_id',$dataUser->id)->update(['landing_page_id'=>$request->landing_page_id]);
                        }
                    }else{
                        $order_count =  Order::where('user_id',$dataUser->id)->count();
                        if($order_count > 1){
                            $notification = [
                                'message'=>'Already purchased',
                                'alert-type'=>'error',
                            ];
                            return redirect()->back()->with($notification);
                        }
                    }
                    


                    
                }

                $randomNumber = rand(10000000, 99999999);
               
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => Hash::make($randomNumber),
                    'landing_page_id' => isset($request->landing_page_id)?$request->landing_page_id:null,

                ]);
              
                if($request->email){
                    $data = ['from_email' => env('MAIL_FROM_ADDRESS'),
                        'name' => env('MAIL_FROM_NAME'),
                        'subject' => 'User Password',
                        'message' => 'User Password Send Successfully.',
                        'password' => $randomNumber
                    ];
                    Mail::to($request->email)->send(new SendUserpassword($data));
                }
                $userId = $user->id;
            }
            $data = [
                'user_id'    => $userId,
                'webinar_id' => $request->wibiner_id,
                'amount_paid' => $request->webinar_price,
                'landing_page_id' => isset($request->landing_page_id)?$request->landing_page_id:null,
                'type'        => 'webinar',
            ];
            // dd('hello');
            DB::table('orders')->insert($data);
            if($request->email){
                $data = ['from_email' => env('MAIL_FROM_ADDRESS'),
                    'name' => env('MAIL_FROM_NAME'),
                    'subject' => 'Workshop Paid',
                    'message' => 'Workshop paid purchase successfully.',
                ];
                Mail::to($request->email)->send(new SendPaymentSuccess($data));
            }
           // return redirect()->route('thankyou.index');
           if($request->form_type == "landing"){
            return redirect()->route('landing-thankyou',$request->wibiner_id);
        }else{
            return redirect()->route('workshop-thankyou',$request->wibiner_id);
        }
       
    }
}
