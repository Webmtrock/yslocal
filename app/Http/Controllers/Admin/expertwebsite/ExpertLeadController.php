<?php

namespace App\Http\Controllers\Admin\ExpertWebsite;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Expert;
use App\Models\ExpertWebsite\ExpertWebsiteHome;
use App\Models\Category;
use App\Helper\Helper;

class ExpertLeadController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        // dd("asdfg");
        $data = User::whereNotNull('landing_page_id')->get();

        return view('admin.landingPage.landing-page-lead');
    }
    public function create()
    {
        // $expert = Expert::all();
      
        $data['expertwebsitehome'] = ExpertWebsiteHome ::all();

        dd( $data['expertwebsitehome']);
        return view('admin.expertwebsite.home.create',$data);
    }


    public function addSection1(Request $request)
    {  
       
        // $request->validate([
        //     //'expert_title' => 'required',
        // ]);


        //  dd($request->all());
        // $imagePath = config('app.expert_profile');
        if ($request->hasFile('expert_image')) {
            if ($request->file('expert_image')->isValid()) {
             
                $filename = time() . '_' . $request->file('expert_image')->getClientOriginalName();
               
                $path = $request->expert_image->storeAs('public/expert_images', $filename);
    
              
                $expertImage = $path;
            } else {
                return redirect()->back()->with('error', 'The provided file is not valid.');
            }
        } else {
            return redirect()->back()->with('error', 'No file uploaded.');
        }
       
        $data = ExpertWebsiteHome::create([
                'secation_type' => $request->secation_type,
                'expert_image' => $filename,
                //'expert_image' => $request->hasFile('expert_profile') ? Helper::storeImage($request->file('expert_profile'), $imagePath, $expert->expert_profile) : $expert->expert_profile,
                'expert_title' => $request->expert_title,
                'url' => $request->url,
                'button_name' => $request->button_name,
                'expert_description' => $request->expert_description,
                'section_1' => $request->section_1,
                'expert_id' => $request->expert_id,
            ]);
        
      
    
        if ($data) {
            return redirect()->route('home.create')->with('success', 'created successfully.');

        } else {
            return redirect()->back()->with('error', 'Something went wrong, please try again.');
        }
    }
   
}
