<?php

namespace App\Http\Controllers\Admin\ExpertWebsite;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Expert;
use App\Models\ExpertWebsite\ExpertWebsiteHome;
use App\Models\Category;
use App\Helper\Helper;

class ExpertHomeController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        // $expert = Expert::all();
      
        $datasecation1 = ExpertWebsiteHome ::where('expert_id',auth()->user()->id)->where('secation_type','secation-1')->first();
// dd($data);
        return view('admin.expertwebsite.home.create',compact('datasecation1'));
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
    public function addSection3(Request $request)
    {  
        // dd($request);
        // $request->validate([
        //     //'expert_title' => 'required',
        // ]);


        //  dd($request->all());

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
                'expert_title' => $request->expert_title,
                'url' => $request->url,
                'button_name' => $request->button_name,
                'expert_description' => $request->expert_description,
                'section_3' => $request->section_3,
                'expert_id' => $request->expert_id,
             
            ]);
        
       
  
        if ($data) {
            return redirect()->route('home.create')->with('success', 'created successfully.');

        } else {
            return redirect()->back()->with('error', 'Something went wrong, please try again.');
        }
    }
    public function addSection2(Request $request)
    {  
        // dd($request);
        // $request->validate([
        //     //'expert_title' => 'required',
        // ]);


        //  dd($request->all());
        $data = ExpertWebsiteHome::create([
            'secation_type' => $request->secation_type,
                'expert_image' => $request->title,
                // 'expert_title' => $request->expert_title,
                'url' => $request->url,
                'button_name' => $request->button_name,
                'button_2' => $request->button_2,
                'button_3' => $request->button_3,
                'button_4' => $request->button_4,
                'button_5' => $request->button_5,
                'button_6' => $request->button_6,
                'expert_description' => $request->expert_description,
                'section_2' => $request->section_2,
                'expert_id' => $request->expert_id,
            ]);
        
        //  dd($data);
    
        if ($data) {
            return redirect()->route('home.create')->with('success', 'created successfully.');

        } else {
            return redirect()->back()->with('error', 'Something went wrong, please try again.');
        }
    }



    public function addSection4(Request $request)
    {  
        // dd($request);
        // $request->validate([
        //     //'expert_title' => 'required',
        // ]);


        //  dd($request->all());
        $data = ExpertWebsiteHome::create([
                'secation_type' => $request->secation_type,
              
                'expert_title' => $request->program_title,
                'url' => $request->url,
                'button_name' => $request->button_name,
                'expert_description' => $request->program_description,
                'section_4' => $request->section_4,
                'expert_id' => $request->expert_id,
             
            ]);
        
       
  
        if ($data) {
            return redirect()->route('home.create')->with('success', 'created successfully.');

        } else {
            return redirect()->back()->with('error', 'Something went wrong, please try again.');
        }
    }

    
    public function addSection5(Request $request)
    {  
        // dd($request);
        // $request->validate([
        //     //'expert_title' => 'required',
        // ]);


        //  dd($request->all());
        $data = ExpertWebsiteHome::create([
                'secation_type' => $request->secation_type,
              
                'expert_title' => $request->workshop_title,
                'url' => $request->url,
                'button_name' => $request->button_name,
                'expert_description' => $request->workshop_description,
                'section_5' => $request->section_5,
                'expert_id' => $request->expert_id,
             
            ]);
        
       
  
        if ($data) {
            return redirect()->route('home.create')->with('success', 'created successfully.');

        } else {
            return redirect()->back()->with('error', 'Something went wrong, please try again.');
        }
    }

     
    public function addSection6(Request $request)
    {  
        // dd($request);
        // $request->validate([
        //     //'expert_title' => 'required',
        // ]);


        //  dd($request->all());
        if ($request->hasFile('expert_image')) {
            $image = $request->file('expert_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads', $filename);
        }
        
        $data = ExpertWebsiteHome::create(
           
            [
                'secation_type' => $request->secation_type,
                'expert_image' => $filename,
                'expert_title' => $request->feature_title,
             
              
              
                'section_6' => $request->section_6,
                'expert_id' => $request->expert_id,
             
            ]);
        
       
//   dd($data);
        if ($data) {
            return redirect()->route('home.create')->with('success', 'created successfully.');

        } else {
            return redirect()->back()->with('error', 'Something went wrong, please try again.');
        }
    }


    public function addSection7(Request $request)
    {  
        // dd($request);
        // $request->validate([
        //     //'expert_title' => 'required',
        // ]);


        //  dd($request->all());
       
        if ($request->hasFile('expert_image')) {
                    $image = $request->file('expert_image');
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move('uploads', $filename);
                }
                if ($request->hasFile('google_img')) {
                    $image = $request->file('google_img');
                    $google_img = time() . '.' . $image->getClientOriginalExtension();
                    $image->move('uploads', $google_img);
                }
                if ($request->hasFile('app_store_img')) {
                    $image = $request->file('app_store_img');
                    $app_img = time() . '.' . $image->getClientOriginalExtension();
                    $image->move('uploads', $app_img);
                }
            
        
        $data = ExpertWebsiteHome::create([
            'secation_type' => $request->secation_type,
                'expert_image' =>$filename,
                'expert_title' => $request->call_title,
                'url' => $request->url,
                'button_name' => $request->button_name,
                'expert_description' => $request->call_description,
                'section_7' => $request->section_7,
                'expert_id' => $request->expert_id,
                'google_img'=>$google_img,
                'app_store_img'=>$app_img
            ]);
       
//   dd($data);
        if ($data) {
            return redirect()->route('home.create')->with('success', 'created successfully.');

        } else {
            return redirect()->back()->with('error', 'Something went wrong, please try again.');
        }
    }

    public function addSection8(Request $request)
    {  
        // dd($request);
        // $request->validate([
        //     //'expert_title' => 'required',
        // ]);


        //  dd($request->all());

        if ($request->hasFile('expert_image')) {
            $image = $request->file('expert_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads', $filename);
        }
        if ($request->hasFile('google_img')) {
            $image = $request->file('google_img');
            $google_img = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads', $google_img);
        }
        if ($request->hasFile('app_store_img')) {
            $image = $request->file('app_store_img');
            $app_img = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads', $app_img);
        }
    
        $data = ExpertWebsiteHome::create([
            'secation_type' => $request->secation_type,
                'expert_image' => $filename,
                'expert_title' => $request->call_title,
            
                'expert_description' => $request->description,
                'section_8' => $request->section_8,
                'expert_id' => $request->expert_id,
                'google_img'=>$google_img,
                'app_store_img'=>$app_img
            ]);
       
//   dd($data);
        if ($data) {
            return redirect()->route('home.create')->with('success', 'created successfully.');

        } else {
            return redirect()->back()->with('error', 'Something went wrong, please try again.');
        }
    }
}
