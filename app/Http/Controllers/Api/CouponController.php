<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\Admin\PrograminsCollection;
use App\Http\Resources\Admin\MyPrograminsCollection;
use App\Http\Resources\Admin\CartCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\ResponseBuilder;
use App\Helper\Helper;
use App\Models\Category;
use App\Models\Program;
use App\Models\Order;
use App\Models\Coupon;
use Lang;
use Auth;
use DB;

// use Laravel\Socialite\Facades\Socialite;

class CouponController extends Controller
{
    /**
     * User Register Function
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
   protected $badRequest = 400;
   protected $success = 200;

   public function couponApply(request $request){

    try {
        $validSet = [
           'coupon_code' => 'required',
           'program_id'  => 'required',
        ]; 

        $isInValid = $this->isValidPayload($request, $validSet);
        if($isInValid){
            return ResponseBuilder::error($isInValid,$this->badRequest);
        }


        $couponcode = Coupon::where('coupon_code', $request->coupon_code)->where('program_id',$request->program_id)->first();
        if(empty($couponcode)){

            return ResponseBuilder::error(trans('global.coupon_code_no_mach'),$this->badRequest);
        }
        if($couponcode){
                  return ResponseBuilder::success(trans('global.coupon_applied'), $this->success,$couponcode);

        }else{
            return "No Data Found";
        }
       // dd($couponcodeGet);

        // $programId = Coupon::where('coupon_code', $request->program_id)->first();
        // if(empty($couponcode)){

        //     return ResponseBuilder::error(trans('global.coupon_code_no_mach_program'),$this->badRequest);
        // }


        // $userCart->coupon_code=$couponcode->coupon_code;
        
        // $userCart->save();


         //$user = Auth::guard('api')->user();
    //dd($user);

        //$userCart = Cart:: userTempCartData($user->id);
        // $userCart = Program:: userTempCartData($user->id);
 
        // if(empty($userCart)){
        //     return ResponseBuilder::error(trans('global.emtpy_cart'),$this->badRequest);

        // }
        // $couponcode = Coupon::where('coupon_code', $request->coupon_code)->first();
        // if(empty($couponcode)){

        //     return ResponseBuilder::error(trans('global.coupon_code_no_mach'),$this->badRequest);
        // }

        //$getCoupon = Coupon::where($userCart->id == $request->coupon_code)->get();
       // dd($getCoupon);
        // $getCartVendor = $this->userCartVendorID($user->id); 
        // $getCoupon = Coupon::getCouponByVendor($request->coupon_code,$getCartVendor);
        //dd($getCoupon)
        
        /**If coupon code invalid */
        // if(empty($getCoupon)){
        //     return ResponseBuilder::error(trans('global.invalid_coupon_code'), $this->success);
        // }
        
        // $todayDate = date('Y-m-d');

        // if($getCoupon->valid_from > $todayDate || $getCoupon->valid_to < $todayDate){
        //     return ResponseBuilder::error(trans('global.expired_coupon_code'), $this->success);
        // }


        // $couponInventroy = CouponInventory::getCouponInventoryByUser($user->id,$getCoupon->coupon_code);
        // dd($couponInventroy);
        // /**if user already used coupon */
        // if($getCoupon->max_reedem<=count($couponInventroy)){
        //     return ResponseBuilder::error(trans('global.coupon_already_used'), $this->success);
        // }

        /**if Coupon usage limit has been reached */
        // if($getCoupon->remainig_user==0){
        //     return ResponseBuilder::error(trans('global.coupon_usage'), $this->success);
        // }

        // $cartCost = $this->cartTotal($user->id);

        // if($getCoupon->min_order_value > $cartCost){
        //     return ResponseBuilder::error(trans('global.copoun_min_value'),$this->success);
        // }
            
        // $userCart->coupon_code=$getCoupon->coupon_code;
        // $userCart->save();
       // $couponcode = Coupon::where('program_id', $request->program_id)->first();
    //      $userCartData= Program::getUserCart($user->id);

    //     //$programId = Coupon::where('id', $userCart->id)->first();

    //   // dd($userCartData);
    //     //dd($userCartData);
    //     $data['cartItems'] = new CartCollection($userCartData);

    //     if(!empty($userCart)){

    //         $data['cartPaymentSummary']= $this->cartPaymentSummary($user->id);
    //     }
       // return ResponseBuilder::success(trans('global.coupon_applied'), $this->success,$data);
    } catch (\Exception $e) {
        return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
        return ResponseBuilder::error(trans('global.SOMETHING_WENT'),$this->badRequest);
    }
}
  
}
