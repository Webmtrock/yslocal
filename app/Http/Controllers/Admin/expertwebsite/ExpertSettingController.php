<?php

namespace App\Http\Controllers\Admin\expertwebsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;


class ExpertSettingController extends Controller
{

    public function expertthemesetting()
    {
        
        return view("admin.expertwebsite.theme-setting.theme-setting");
    
    }
    
    public function expertthemesettingstore(Request $request)
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

}
