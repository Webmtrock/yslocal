<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Tax;
use App\Helper\Helper;
use Razorpay\Api\Api;
use Session;
use Exception;

class RazorpayController extends Controller
{
    
    public function index()
    {
       return view('admin.process_payment');
   }
     

   public function store(Request $request)
   { 

       
       $data = [
           'name' => $request->name,
           'email' => $request->email,
           'phone_number' => $request->phone_number,
           'description' => $request->description,
           'payment_id' => $request->razorpay_payment_id,
           'amount' => $request->amount,
       ];
   
       // Razorpay payment logic
       $api = new Api("rzp_test_qzGgwBUWLI80dr", "vKS4mZy2eqsZFjLXrrgRFP7C");
   
       if (isset($request->razorpay_payment_id)) {
           try {
               $payment = $api->payment->fetch($request->razorpay_payment_id);
               $response = $api->payment->fetch($request->razorpay_payment_id)->capture(array('amount' => $payment['amount'])); 
               // Payment captured successfully
               Session::put('success', 'Payment successful');
               
               // Store data in the database
               Setting::create($data);
               
               return redirect()->back();
           } catch (Exception $e) {
               // Error capturing payment
               Session::put('error', $e->getMessage());
               return redirect()->back();
           }
       } else {
           // No razorpay payment ID provided
           Session::put('error', 'Razorpay payment ID not provided');
           return redirect()->back();
       }
   }  


}
