<?php

namespace App\Http\Controllers\ExpertWebsite;

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

class ExpertWebsiteHealthpediaController extends Controller
{
   public function healthpedia()
   { 
    $data['activeCategories'] = Category::where('status', '1')->get();
    $data['articles'] = Articles::all();
    return view("expertwebsite.healthpedia",$data);

   }
   public function healthpediadetail($id)
   { 

    $data['experts'] = Expert::all();
    $data['activeCategories'] = Category::where('status', '1')->take(10)->get();
    $data['recent'] = Articles::all();
    $data['articles'] = Articles::where('article_slug',$id)->get();
    return view("expertwebsite.healthpediadetail",$data);

   }
   
 
}