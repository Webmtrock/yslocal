<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\Admin\PrograminsCollection;
use App\Http\Resources\Admin\MyPrograminsCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\ResponseBuilder;
use App\Helper\Helper;
use App\Models\Category;
use App\Models\Program;
use App\Models\Order;
use App\Models\User;
use Lang;
use Auth;
use DB;
use Hash;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPaymentSuccess;

// use Laravel\Socialite\Facades\Socialite;

class PatientController extends Controller
{
    /**
     * User Register Function
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
   protected $badRequest = 400;
   protected $success = 200;

   public function addPatient(Request $request)
   {
       DB::beginTransaction();
           try {
                $validSet = [
                   'name' => 'required',
                   'email' => 'required',
                   'phone' => 'required',
                   'age' => 'required',
                   'gender' => 'required',
                   'address' => 'required',
                   'city' => 'required',
                   'pincode' => 'required',
                   'state' => 'required',
                   'country' => 'required',
               ];
              
                  $isInvalid = $this->isValidPayload($request, $validSet);
                  if ($isInvalid) {
                      return ResponseBuilder::error($isInvalid, 400); 
                  }
           
                  $user = Auth::guard('api')->user();           
                  if (!$user) {
                      return response()->json(['status' => false, 'message' => 'User not found'], 404);
                  }
           
                  $addpatient = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'age' => $request->age,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'city' => $request->city,
                    'pincode' => $request->pincode,
                    'state' => $request->state,
                    'country' => $request->country,
                ]);  
              
                // $store =  $addpatient->save();

                $addpatientDetails = Order::create([
                    'user_id' =>  $addpatient->id,
                    'parent_id' =>  $user->id,
                    'program_id' => $request->program_id,
                    'batch_id' => $request->batch_id,
                ]); 
            
                DB::commit();
                return ResponseBuilder::successMessage(trans('global.ADD_PATIENT'), 200);
   
       } catch (\Exception $e) {
           DB::rollback();
           return ResponseBuilder::error($e->getMessage().' at line '.$e->getLine() .' at file '.$e->getFile(),$this->badRequest);
           return response()->json(['status' => false, 'message' => 'Something went wrong'], 500); 
          }
   }
       
}
