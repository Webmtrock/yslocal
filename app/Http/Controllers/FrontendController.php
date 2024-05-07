<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Category;
use App\Models\Expert;
use App\Models\WibinerUser;
use App\Models\Articles;
use App\Models\Concerns;
use App\Models\Setting; 
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function home()
    {
         // $programs = Program::orderBy('created_at', 'desc')->take(3)->get();
          
        $today = Carbon::today();
        $programs = Program::where('status', 1)
            ->whereDate('program_start_date', '>', $today)
            ->orderBy('program_start_date', 'ASC')
            ->orderBy('id', 'DESC')
            ->take(3)
            ->get();

        
        
        // dd( $programs);
        
        
        $activeCategories = Category::where('status', '1')->get();
        $experts = Expert::all();
        $experts_promoted = Expert::where('is_home_promoted', '1')->get();
       
    //   $webinars = WibinerUser::
    //     orderBy('created_at', 'ASC') 
    //     ->take(3)
    //     ->get();
        
        $webinars = WibinerUser::where('status', 1)
               ->whereDate('webinar_start_date', '>', $today)
               ->orderBy('webinar_start_date', 'ASC')
               ->orderBy('id', 'DESC')
               ->take(3)
               ->get();
        
        $articles = articles::all();
        $concerns = concerns::all();
        $settings = Setting::all()->pluck('value', 'key')->toArray(); 
       
        return view('frontend.home', [
         'programs' => $programs, 
         'activeCategories' => $activeCategories,
         'experts' => $experts,
         'experts_promoted' => $experts_promoted,
         'webinars' => $webinars,
          'articles' => $articles,
         'concerns' => $concerns,
         'settings' => $settings,


     ]);
    }
    

}
