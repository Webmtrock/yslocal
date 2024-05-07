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
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Setting::getAllSettingData();
        return view('admin.site-setting.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->validate([
            'admin_mail' => 'required | email',
            // Add other validations as needed
        ]);
        
        $imagePath = config('app.logo');

        $data[] = [
            'logo_1' => $request->hasfile('logo_1') ? Helper::storeImage($request->file('logo_1'),$imagePath) : (isset($request->logo_1_old) ? $request->logo_1_old : ''),
            'logo_2' => $request->hasfile('logo_2') ? Helper::storeImage($request->file('logo_2'),$imagePath) : (isset($request->logo_2_old) ? $request->logo_2_old : ''),
            'admin_mail' => $request->admin_mail,
        ];

        foreach ($data[0] as $key => $value) {
            Setting::updateOrCreate(
                [
                    'key' => $key,
                ],
                [
                    'value' => $value,
                ]
            );
        }
        return redirect()->back();
    }
 

    public function paymentstore(Request $request)
    { 
        $request->validate([
            'razorpay_live_key_id' => 'required',
            'razorpay_live_secret_id' => 'required',
            'razorpay_test_key_id' => 'required',
            'razorpay_test_secret_id' => 'required',
            'razorpay_active_inactive_status' => 'required',
        ]);
        
        $data[] = [
            'razorpay_live_key_id' => $request->razorpay_live_key_id,
            'razorpay_live_secret_id' => $request->razorpay_live_secret_id,
            'razorpay_test_key_id' => $request->razorpay_test_key_id,
            'razorpay_test_secret_id' => $request->razorpay_test_secret_id,
            'razorpay_active_inactive_status' => $request->razorpay_active_inactive_status,
        ];

        foreach ($data[0] as $key => $value) {
            Setting::updateOrCreate(
                [
                    'key' => $key,
                ],
                [
                    'value' => $value,
                ]
            );
        }
        return redirect()->back();
    }
    
    public function emailstore(Request $request)
    { 
        $request->validate([
            'mail_mailer' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_from_name' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_encryption' => 'required',
            'mail_from_address' => 'required',
        ]);
        
        $hashedPassword = Hash::make($request->mail_password);
    
        $data = [
            'mail_mailer' => $request->mail_mailer,
            'mail_host' => $request->mail_host,
            'mail_port' => $request->mail_port,
            'mail_from_name' => $request->mail_from_name,
            'mail_username' => $request->mail_username,
            'mail_password' => $hashedPassword, 
            'mail_encryption' => $request->mail_encryption,
            'mail_from_address' => $request->mail_from_address,
        ];
    
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                [
                    'key' => $key,
                ],
                [
                    'value' => $value,
                ]
            );
        }
        return redirect()->back();
    }


    public function topheaderstore(Request $request)
    { 
        $request->validate([
            'top_header_text' => 'required',
            'top_header_button_text' => 'required',
            'top_header_button_link' => 'required',
        ]);
        
        $data = [
            'top_header_text' => $request->top_header_text,
            'top_header_button_text' => $request->top_header_button_text,
            'top_header_button_link' => $request->top_header_button_link,
        ];
    
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                [
                    'key' => $key,
                ],
                [
                    'value' => $value,
                ]
            );
        }
        return redirect()->back();
    }
  
    public function ourofferingstore(Request $request)
    {   
       
        $request->validate([
            'our_offerings_program_name' => 'required',
            'our_offerings_workshop_name' => 'required',
            'our_offerings_healthpedia_name' => 'required',
            'our_offerings_consultation_name' => 'required',
            'our_offerings_program_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
            'our_offerings_workshop_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'our_offerings_healthpedia_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'our_offerings_consultation_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $data = [
            'our_offerings_program_name' => $request->our_offerings_program_name,
            'our_offerings_workshop_name' => $request->our_offerings_workshop_name,
            'our_offerings_healthpedia_name' => $request->our_offerings_healthpedia_name,
            'our_offerings_consultation_name' => $request->our_offerings_consultation_name,
        ];
    
        // Handle image upload for 'our_offerings_program_image' field
        if ($request->hasFile('our_offerings_program_image')) {
            $image = $request->file('our_offerings_program_image');
            $imageName = 'our_offerings_program_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['our_offerings_program_image'] = $imageName;
        }
    
        // Handle image upload for 'our_offerings_workshop_image' field
        if ($request->hasFile('our_offerings_workshop_image')) {
            $image = $request->file('our_offerings_workshop_image');
            $imageName = 'our_offerings_workshop_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['our_offerings_workshop_image'] = $imageName;
        }
    
        // Handle image upload for 'our_offerings_healthpedia_image' field
        if ($request->hasFile('our_offerings_healthpedia_image')) {
            $image = $request->file('our_offerings_healthpedia_image');
            $imageName = 'our_offerings_healthpedia_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['our_offerings_healthpedia_image'] = $imageName;
        }
    
        // Handle image upload for 'our_offerings_consultation_image' field
        if ($request->hasFile('our_offerings_consultation_image')) {
            $image = $request->file('our_offerings_consultation_image');
            $imageName = 'our_offerings_consultation_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['our_offerings_consultation_image'] = $imageName;
        }
        
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                [
                    'key' => $key,
                ],
                [
                    'value' => $value,
                ]
            );
        }
        return redirect()->back();
    }
    
   
   

   



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
