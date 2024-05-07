<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\Admin\CategoryCollection;
use App\Http\Controllers\Controller;
use Razorpay\Api\Api;
use Session;
use Illuminate\Http\Request;
use App\Helper\ResponseBuilder;
use App\Helper\Helper;
use App\Models\WibinerUser;
use App\Models\ProgramFaq;
use App\Models\User;
use Lang;
use Auth;
use DB;
use Hash;

// use Laravel\Socialite\Facades\Socialite;

class PaymentsController extends Controller
{
    /**
     * User Register Function
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
   protected $badRequest = 400;
   protected $success = 200;

    public function sendPayments(Request $request)
    {        
        $input = $request->all();
        // dd($input);

        // $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

        //  dd($api);
        // $payment = $api->payment->fetch($input['razorpay_payment_id']);
       
    //    dd($payment);
       $payment = $input['razorpay_payment_id'];
       
        if (Auth::guard('api')->user()) {

          $user = Auth::guard('api')->user();
// dd($user);
            if ($user) {
                $user->update([

                    // 'name' => $request->	name,
                    // 'phone' => $request->phone,
                    // 'email' => $request->email,
                    'age' => $request->age,
                    'gender' => $request->gender,
                    'razorpay_order_Id' => $request->razorpay_order_Id,
                    'razorpay_signature' => $request->razorpay_signature,
                    'address' => $request->address,
                    'city' => $request->city,
                    'pincode' => $request->pincode,
                    'state' => $request->state,
                    'country' => $request->country,
                ]);
            } else {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
            $data = [
                'user_id'    => $user->id,
                'program_id' => $input['program_id'],
                'batch_id' => $input['batch_id'],
                'amount_paid' => $input['amount'],
                'planduration' => $input['planduration'],
                'couponcode' => $input['couponcode'] ?? '',
                'type'        => 'program',
            ];
            DB::table('orders')->insert($data);
            return ResponseBuilder::successMessage(trans('global.PAYMENTS_SUCCESS'), $this->success);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        


    }
    public function webinerSendPayments(Request $request)
    {        
        $input = $request->all();

        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
       
        $user = Auth::guard('api')->user();
          $data = [
                'user_id'    => $user->id,
                'webinar_id' => $input['webinar_id'],
                'amount_paid' => $input['amount'],
                'type'        => 'webinar',
            ];
            DB::table('orders')->insert($data);
            return ResponseBuilder::successMessage(trans('global.PAYMENTS_SUCCESS'), $this->success);
       

        // if (Auth::guard('api')->user()) {

        //   $user = Auth::guard('api')->user();
        //   $data = [
        //         'user_id'    => $user->id,
        //         'webinar_id' => $input['webinar_id'],
        //         'amount_paid' => $input['amount'],
        //         'type'        => 'webinar',
        //     ];
        //     DB::table('orders')->insert($data);
        //     return ResponseBuilder::successMessage(trans('global.PAYMENTS_SUCCESS'), $this->success);
        // } else {
        //     return response()->json(['message' => 'Invalid credentials'], 401);
        // }
        


    }
}
