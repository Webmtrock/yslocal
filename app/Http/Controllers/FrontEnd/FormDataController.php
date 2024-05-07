<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Expert;
use App\Models\Week;
use App\Models\Time;
use App\Models\WibinerUser;
use App\Models\WibinerSession;
use App\Models\WibinerWillLearn;
use App\Models\WibinerItFor;
use App\Models\Articles;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Helper\Helper;
use App\Models\FormData;
use App\Models\ContactData;
use App\Models\SubscribeData;

class FormDataController extends Controller
{

    public function submitForm(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|numeric',
            'concern'=>'',
            'related_to'=>'',
            // Add validation rules for other fields
        ]);
        
        // Store the data in the database
        FormData::create($validatedData);
        
        // Redirect the user
        return redirect('/programs')->with('success', 'Request submitted successfully!');
    }
    
    
    public function contactForm(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|numeric',
            'message'=>'',
            'belongs_to'=>'',
        ]);
        ContactData::create($validatedData);
        return redirect('/contact-thankyou')->with('success', 'Thank you for contact us!');
    }
    
    
    public function callbackForm(Request $request)
    {
        
        // Validate form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|numeric',
            'message'=>'',
            'belongs_to'=>'',
            // Add validation rules for other fields
        ]);
        //dd($validatedData);
        
        // Store the data in the database
        ContactData::create($validatedData);
        
        // Redirect the user
        $notification = array(
            'message' => 'Thankyou for your request!We will reach you soon.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);;
       // return redirect('/?')->with('success', 'Thank you for Reaching us!');
    }
    
    
    public function subscribeForm(Request $request)
    {
        
        //dd($request);
        // Validate form data
        $validatedData = $request->validate([
            'email' => 'required|email|max:255|unique:newsletter,email',
            // Add validation rules for other fields
        ]);
        //dd($validatedData);
        
        // Store the data in the database
        SubscribeData::create($validatedData);
        $notification = array(
            'message' => 'Thankyou for Subscribe.',
            'alert-type' => 'success'
        );
        // Redirect the user
      //  return redirect('/contact-thankyou')->with($notification);
        return redirect()->back()->with($notification);;
    }
    
    
    
}
