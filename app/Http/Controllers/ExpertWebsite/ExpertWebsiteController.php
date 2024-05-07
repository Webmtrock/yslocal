<?php
namespace App\Http\Controllers\ExpertWebsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Category;
use App\Models\Expert;
use App\Models\WibinerUser;
use App\Models\Articles;
use App\Models\Concerns;

class ExpertWebsiteController extends Controller
{
    public function home()
    {
        $programs = Program::where('is_popular','1')->get();
        $activeCategories = Category::where('status', '1')->get();
        $experts = Expert::all();
        $experts_promoted = Expert::where('is_home_promoted', '1')->get();
        $webinars = WibinerUser::where('is_popular','1')->get();
        $articles = articles::all();
        $concerns = concerns::all();
       
        return view('expertwebsite.home', [
         'programs' => $programs, 
         'activeCategories' => $activeCategories,
         'experts' => $experts,
         'experts_promoted' => $experts_promoted,
         'webinars' => $webinars,
          'articles' => $articles,
         'concerns' => $concerns,

     ]);
    }
    
    public function about()
    {
        $programs = Program::where('is_popular','1')->get();
        $activeCategories = Category::where('status', '1')->get();
        $experts = Expert::all();
        $experts_promoted = Expert::where('is_home_promoted', '1')->get();
        $webinars = WibinerUser::where('is_popular','1')->get();
        $articles = articles::all();
        $concerns = concerns::all();
       
        return view('expertwebsite.about', [
         'programs' => $programs, 
         'activeCategories' => $activeCategories,
         'experts' => $experts,
         'experts_promoted' => $experts_promoted,
         'webinars' => $webinars,
          'articles' => $articles,
         'concerns' => $concerns,

     ]);
    }
     public function privacy()
    {
        $programs = Program::where('is_popular','1')->get();
        $activeCategories = Category::where('status', '1')->get();
        $experts = Expert::all();
        $experts_promoted = Expert::where('is_home_promoted', '1')->get();
        $webinars = WibinerUser::where('is_popular','1')->get();
        $articles = articles::all();
        $concerns = concerns::all();
       
        return view('expertwebsite.privacy', [
         'programs' => $programs, 
         'activeCategories' => $activeCategories,
         'experts' => $experts,
         'experts_promoted' => $experts_promoted,
         'webinars' => $webinars,
          'articles' => $articles,
         'concerns' => $concerns,

     ]);
    }
    
     public function tnc()
    {
        $programs = Program::where('is_popular','1')->get();
        $activeCategories = Category::where('status', '1')->get();
        $experts = Expert::all();
        $experts_promoted = Expert::where('is_home_promoted', '1')->get();
        $webinars = WibinerUser::where('is_popular','1')->get();
        $articles = articles::all();
        $concerns = concerns::all();
       
        return view('expertwebsite.tnc', [
         'programs' => $programs, 
         'activeCategories' => $activeCategories,
         'experts' => $experts,
         'experts_promoted' => $experts_promoted,
         'webinars' => $webinars,
          'articles' => $articles,
         'concerns' => $concerns,

     ]);
    }
    
     public function faq()
    {
        $programs = Program::where('is_popular','1')->get();
        $activeCategories = Category::where('status', '1')->get();
        $experts = Expert::all();
        $experts_promoted = Expert::where('is_home_promoted', '1')->get();
        $webinars = WibinerUser::where('is_popular','1')->get();
        $articles = articles::all();
        $concerns = concerns::all();
       
        return view('expertwebsite.faq', [
         'programs' => $programs, 
         'activeCategories' => $activeCategories,
         'experts' => $experts,
         'experts_promoted' => $experts_promoted,
         'webinars' => $webinars,
          'articles' => $articles,
         'concerns' => $concerns,

     ]);
    }
    
    
    public function bookappointment()
    {
       
        return view('expertwebsite.book-appointment');
    }
    
    
    
    

}
