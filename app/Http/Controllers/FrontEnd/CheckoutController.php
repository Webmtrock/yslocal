<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WibinerUser;
use App\Models\WibinerSession;
use App\Models\WibinerWillLearn;
use App\Models\WibinerItFor;
use App\Models\Coupon;

use App\Models\ProgramBatch;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Helper\Helper;
use Razorpay\Api\Api;
use App\Models\Order;
use Session;
use App\Models\Program;
use App\Models\ProgramPlanType;
use Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
   public function checkout(Request $request)
    { 
       
        if (Auth::check()){
           
            $planType = $request->plan_type_id;
            $programs = Program::find($request->program_id);
            if (!$programs) {
                abort(404); 
            }
            $batchs = ProgramBatch::where('program_id',$request->program_id)->get();
        
            $ProgramPlanType = ProgramPlanType::where('id',$planType)->first();
            $finalamount = ($ProgramPlanType->price - ($ProgramPlanType->price * $ProgramPlanType->discount / 100)) * 100;

            return view("frontend.checkout", compact('programs','planType','ProgramPlanType','finalamount','batchs'));
        }else{
            return view("frontend.login");
        }
        
        
    }

    // public function applyCoupon1(Request $request)
    // { 
    //     $coupon  = Coupon::where('coupon_code',request()->coupon_code)->first();
    //     if(!empty($coupon)){
    //         $coupon_detail = Coupon::where('program_id',request()->program_id)->first();
    //         if(!empty($coupon_detail)){
    //             $discount_amount = (request()->total_price * $coupon_detail->discount)/100;
    //            // print_r($discount_amount);
    //             $program_discount = request()->total_price * request()->program_discount / 100;
    //             $final_amount = request()->total_price - ($discount_amount+$program_discount);
    //             $data = [
    //                 'discount_amount'=>$discount_amount,
    //                 'final_amount' => $final_amount,
    //                 'success' => true,
    //             ];
    //             return response()->json($data);
    //         }else{
    //             $data = [
    //                 'message'=>'Program not found for this coupon',
    //                 'error' => true,
    //             ];
    //             return response()->json($data);
    //         }
           
    //     }else{
    //         $data = [
    //             'message'=>'Coupon code not found',
    //             'error' => true,
    //         ];
    //         return response()->json($data);
    //     }
    // }
    public function applyCoupon(Request $request)
    { 
        $coupon  = Coupon::where('coupon_code',request()->coupon_code)->first();
        $coupon_code = request()->coupon_code;
        if(!empty($coupon)){
            $coupon_detail = Coupon::where('program_id',request()->program_id)->first();
            if(!empty($coupon_detail)){
               $today =  Carbon::today();
                 if($coupon_detail->start_date <= $today && $coupon_detail->end_date >=  $today ){
                        $discount_amount = (request()->total_price * $coupon_detail->discount)/100;
                    //  print_r($coupon_detail->discount);
                       $program_discount = request()->total_price * request()->program_discount / 100;
                       $finalamount = request()->total_price - ($discount_amount+$program_discount);
                       $finalamount = $finalamount*100;
                       $batchs = ProgramBatch::where('program_id',$request->program_id)->get();
                       $programs = Program::find($request->program_id);
                       $ProgramPlanType = ProgramPlanType::where('id',$request->plan_type_id)->first();
                  // print_r($ProgramPlanType);
                    //   $ProgramPlanType = ProgramPlanType::where('id',$planType)->first();
                       //return redirect()->back()->with('finalamount')
                       return view("frontend.checkout", compact('finalamount','batchs','programs','ProgramPlanType','discount_amount','coupon_code'));
                 }else{
                    $discount_amount = 0;
                   $program_discount = request()->total_price * request()->program_discount / 100;
                   $finalamount = request()->total_price - ($discount_amount+$program_discount);
                   $finalamount = $finalamount*100;
                   $batchs = ProgramBatch::where('program_id',$request->program_id)->get();
                   $programs = Program::find($request->program_id);
                   $ProgramPlanType = ProgramPlanType::where('id',$request->plan_type_id)->first();
                   $error_message = "Coupon is expired.";
                    return view("frontend.checkout", compact('finalamount','batchs','programs','ProgramPlanType','discount_amount','error_message','coupon_code'));
                 }
              
            }else{
                    $discount_amount = 0;
                   $program_discount = request()->total_price * request()->program_discount / 100;
                   $finalamount = request()->total_price - ($discount_amount+$program_discount);
                   $finalamount = $finalamount*100;
                   $batchs = ProgramBatch::where('program_id',$request->program_id)->get();
                   $programs = Program::find($request->program_id);
                   $ProgramPlanType = ProgramPlanType::where('id',$request->plan_type_id)->first();
                   $error_message = "coupon not found for this program.";
                return view("frontend.checkout", compact('finalamount','batchs','programs','ProgramPlanType','discount_amount','error_message','coupon_code'));
            }
           
        }else{
         
                 $discount_amount = 0;
            //  print_r($coupon_detail->discount);
               $program_discount = request()->total_price * request()->program_discount / 100;
               $finalamount = request()->total_price - ($discount_amount+$program_discount);
               $finalamount = $finalamount*100;
               $batchs = ProgramBatch::where('program_id',$request->program_id)->get();
               $programs = Program::find($request->program_id);
               $ProgramPlanType = ProgramPlanType::where('id',$request->plan_type_id)->first();
               $error_message = "coupon not found";
            return view("frontend.checkout", compact('finalamount','batchs','programs','ProgramPlanType','discount_amount','error_message','coupon_code'));
        }
    }


   
}