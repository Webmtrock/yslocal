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
use App\Models\LandingPage;
use App\Models\WebinarReviewsImages;
use App\Models\LandingPageMetaSection;

use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Helper\Helper;

class LandingPageFrontController extends Controller
{
    public function landingpage($slug)
    {
        try {
            if(isset($slug)){
           
                $landingPage = LandingPage::where('slug', $slug)->firstOrFail();
               $section_3 =  LandingPageMetaSection::where('landing_page_id',$landingPage->id)->where('meta_key',"section-3")->get();
               $section_5 =  LandingPageMetaSection::where('landing_page_id',$landingPage->id)->where('meta_key',"section-5")->get();
               $section_7 =  LandingPageMetaSection::where('landing_page_id',$landingPage->id)->where('meta_key',"section-7")->get();
               // dd($landingPage->webinar_id);
                $webinar = WibinerUser::with(['expert'])->findOrFail($landingPage->webinar_id);
               
             $webinar_videos = WebinarReviewsImages::where('webinar_id',$landingPage->webinar_id)->get();
                return view("frontend.landingpage", compact('webinar', 'landingPage','webinar_videos','section_3','section_5','section_7'));
            } else {
                return redirect()->back()->with('errors', 'Something went wrong.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
   
   
 
}