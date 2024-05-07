<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Expert;
use App\Models\LandingPage;
use App\Models\LandingPageMetaSection;
use App\Models\WibinerUser;
use App\Helper\Helper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function landingPageList()
     { 
        $data = LandingPage::all();
        return view('admin.landingPage.index', compact('data'));
        
     }
    public function landingPage()
    { 
        return view('admin.landingPage.editLandingPage');
        
    }
    public function updatelandingPage(Request $request)
    { 
       
        // $imagePath = config('app.image');
       
        $data = LandingPage::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'section1_des' => $request->section1_des,
            ]
        );
        if($data)
        {
            return redirect()->route('landingPage-health-List');
        }
        else
        {
            return redirect()->back()->with('error', 'Something went Wrong, Please try again!');
        }
    }
   

    public function landingPageEdit($id)
    {  
        $data['webiners'] = WibinerUser::all();
        
        $data['data'] = LandingPage::where('id', $id)->first();

        $section3 = LandingPageMetaSection::where('meta_key', 'section-3')->where('landing_page_id', $id)->get();
        $section5 = LandingPageMetaSection::where('meta_key', 'section-5')->where('landing_page_id', $id)->get();
        $section7 = LandingPageMetaSection::where('meta_key', 'section-7')->where('landing_page_id', $id)->get();

        return view('admin.landingPage.editLandingPage',compact('section3','section5','section7'),$data);
        
    }
    

    public function updatelandingPage0(Request $request)
    { 
          
       
        $data = LandingPage::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'webinar_id' => $request->webinar_id,
                'button_name' => $request->button_name,
                
            ]
        );
        if($data)
        {
            return redirect()->route('landingPage-health-List')->with('success', 'Landing Page Update Successfully!');
        }
        else
        {
            return redirect()->back()->with('error', 'Something went Wrong, Please try again!');
        }
    }

    public function updatelandingPage2(Request $request)
    { 
        $data = LandingPage::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'section2_session' => $request->section2_session,
            ]
        );
        if($data)
        {
            return redirect()->route('landingPage-health-List')->with('success', 'Landing Page Update Successfully!');
        }
        else
        {
            return redirect()->back()->with('error', 'Something went Wrong, Please try again!');
        }
    }
    
    public function updatelandingPage3(Request $request)
    {
        $data = LandingPage::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'section3_des' => $request->section3_des,
            ]
        );
        if ($data) {
            LandingPageMetaSection::where('landing_page_id',$data->id)->where('meta_key','section-3')->delete();
            foreach ($request->title as $title) {
                LandingPageMetaSection::create([
                    'landing_page_id' => $data->id,
                    'meta_key' => 'section-3',
                    'value' => $title,
                ]);
            }
            
            return redirect()->route('landingPage-health-List')->with('success', 'Landing Page Update Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went Wrong, Please try again!');
        }
    }
    
    public function updatelandingPage4(Request $request)
    { 
        $data = LandingPage::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'section4_title' => $request->section4_title,
                
            ]
        );
        if($data)
        {
            return redirect()->route('landingPage-health-List')->with('success', 'Landing Page Update Successfully!');;
        }
        else
        {
            return redirect()->back()->with('error', 'Something went Wrong, Please try again!');
        }
    }
  
    public function updatelandingPage5(Request $request)
    {   
        $data = LandingPage::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'section5_title' => $request->section5_title,
                'section5_bottom_title' => $request->section5_bottom_title,
                'section5_imgcontent_first' => $request->section5_imgcontent_first,
                'section5_imgcontent_sec' => $request->section5_imgcontent_sec,
            ]
        );
    
        // Handle image uploads
        if ($request->hasFile('section5_image_first')) {
            $image = $request->file('section5_image_first');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads', $imageName); 
            // Assuming you have a field in your database to store the image path, update it here
            $data->section5_image_first = $imageName;
            $data->save();
        }
        if ($request->hasFile('section5_image_sec')) {
            $image = $request->file('section5_image_sec');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads', $imageName); 
            // Assuming you have a field in your database to store the image path, update it here
            $data->section5_image_sec = $imageName;
            $data->save();
        }
    
        // Save meta information
        if ($data) {
            foreach ($request->subtitle as $subtitle) {
                LandingPageMetaSection::create([
                    'landing_page_id' => $data->id,
                    'meta_key' => 'section-5',
                    'value' => $subtitle,
                ]);
            }
            return redirect()->route('landingPage-health-List')->with('success', 'Landing Page Update Successfully!');;
        } else {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    


    public function updatelandingPage6(Request $request)
    {   
        $data = LandingPage::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [   
                'section6_title' => $request->section6_title,
            ]
        );
        if($data)
        {
            return redirect()->route('landingPage-health-List')->with('success', 'Landing Page Update Successfully!');;
        }
        else
        {
            return redirect()->back()->with('error', 'Something went Wrong, Please try again!');
        }
    }
  
    public function updatelandingPage7(Request $request)
    
    {   
        $data = LandingPage::updateOrCreate(
            [
                'id' => $request->id,
            ],
           [
                
                'section7_title' => $request->section7_title,
                'section7_des' => $request->section7_des,
                'section7_note_title' => $request->section7_note_title,
            ]
        );
       // Save meta information
        if ($data) {
            foreach ($request->subtitle as $subtitle) {
                LandingPageMetaSection::create([
                    'landing_page_id' => $data->id,
                    'meta_key' => 'section-7',
                    'value' => $subtitle,
                ]);
            }
        
            return redirect()->route('landingPage-health-List')->with('success', 'Landing Page Update Successfully!');;
        } else {
            return redirect()->back()->with('error', 'Something went Wrong, Please try again!');
        }
}


public function storelandingPage(Request $request)
{ 
   
    // $imagePath = config('app.image');
   
    $data = LandingPage::create(
        [
            'section1_des' => $request->section1_des,
        ]
    );
    if($data)
    {
        return redirect()->route('landingPageEdit',$data->id)->with('success', 'Landing Page Update Successfully!');;
    }
    else
    {
        return redirect()->back()->with('error', 'Something went Wrong, Please try again!');
    }
}




public function storelandingPage0(Request $request)
{ 
      
   
    $data = LandingPage::create(
        [
            'webinar_id' => $request->webinar_id,
            'user_id' => auth()->user()->id,
            'slug'  => rand(100000, 999999),
            'button_name' => $request->button_name,
        ]
    );
    if($data)
    {
        return redirect()->route('landingPageEdit',$data->id)->with('success', 'Landing Page Update Successfully!');;
    }
    else
    {
        return redirect()->back()->with('error', 'Something went Wrong, Please try again!');
    }
}

public function storelandingPage2(Request $request)
{ 
    $data = LandingPage::create(
        [
            'section2_session' => $request->section2_session,
            'user_id' => auth()->user()->id,
        ]
    );
    if($data)
    {
        return redirect()->route('landingPageEdit',$data->id)->with('success', 'Landing Page Update Successfully!');;
    }
    else
    {
        return redirect()->back()->with('error', 'Something went Wrong, Please try again!');
    }
}

public function storelandingPage3(Request $request)
{
    $data = LandingPage::create(
        [
            'section3_des' => $request->section3_des,
            'user_id' => auth()->user()->id,
        ]
    );

    // Save meta information
    if ($data) {
        foreach ($request->title as $title) {
            LandingPageMetaSection::create([
                'landing_page_id' => $data->id,
                'user_id' => auth()->user()->id,
                'meta_key' => 'section-3',
                'value' => $title,
            ]);
        }
        
        return redirect()->route('landingPageEdit',$data->id)->with('success', 'Landing Page Update Successfully!');;
    } else {
        return redirect()->back()->with('error', 'Something went Wrong, Please try again!');
    }
}

public function storelandingPage4(Request $request)
{ 
    
    $data = LandingPage::create(
        [
            'section4_title' => $request->section4_title,
            'user_id' => auth()->user()->id,
            
        ]
    );
    if($data)
    {
        return redirect()->route('landingPageEdit',$data->id)->with('success', 'Landing Page Update Successfully!');;
    }
    else
    {
        return redirect()->back()->with('error', 'Something went Wrong, Please try again!');
    }
}

public function storelandingPage5(Request $request)
{   
    $data = LandingPage::create(
        [
            'section5_title' => $request->section5_title,
            'user_id' => auth()->user()->id,
            'section5_bottom_title' => $request->section5_bottom_title,
            'section5_imgcontent_first' => $request->section5_imgcontent_first,
            'section5_imgcontent_sec' => $request->section5_imgcontent_sec,
        ]
    );

    // Handle image uploads
    if ($request->hasFile('section5_image_first')) {
        $image = $request->file('section5_image_first');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('uploads', $imageName); 
        // Assuming you have a field in your database to store the image path, update it here
        $data->section5_image_first = $imageName;
        $data->save();
    }
    if ($request->hasFile('section5_image_sec')) {
        $image = $request->file('section5_image_sec');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('uploads', $imageName); 
        // Assuming you have a field in your database to store the image path, update it here
        $data->section5_image_sec = $imageName;
        $data->save();
    }

    // Save meta information
    if ($data) {
        foreach ($request->subtitle as $subtitle) {
            LandingPageMetaSection::create([
                'landing_page_id' => $data->id,
                'meta_key' => 'section-5',
                'value' => $subtitle,
            ]);
        }
        return redirect()->route('landingPageEdit',$data->id)->with('success', 'Landing Page Update Successfully!');;
    } else {
        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }
}



public function storelandingPage6(Request $request)
{   
    $data = LandingPage::create(
        [   
            'section6_title' => $request->section6_title,
            'user_id' => auth()->user()->id,
        ]
    );
    if($data)
    {
        return redirect()->route('landingPageEdit',$data->id)->with('success', 'Landing Page Update Successfully!');;
    }
    else
    {
        return redirect()->back()->with('error', 'Something went Wrong, Please try again!');
    }
}

public function storelandingPage7(Request $request)

{   
    $data = LandingPage::create(
        [
            
            'section7_title' => $request->section7_title,
            'user_id' => auth()->user()->id,
            'section7_des' => $request->section7_des,
            'section7_note_title' => $request->section7_note_title,
        ]
    );
   // Save meta information
   if ($data) {
    foreach ($request->subtitle as $subtitle) {
        LandingPageMetaSection::create([
            'landing_page_id' => $data->id,
            'meta_key' => 'section-7',
            'value' => $subtitle,
        ]);
    }
    
    return redirect()->route('landingPageEdit',$data->id)->with('success', 'Landing Page Update Successfully!');;
} else {
    return redirect()->back()->with('error', 'Something went Wrong, Please try again!');
}


}

public function landingPagecreate(Request $request)
{   
    $data['webiners'] = WibinerUser::all();
    return view('admin.landingPage.createLandingPage',$data);  

}



}