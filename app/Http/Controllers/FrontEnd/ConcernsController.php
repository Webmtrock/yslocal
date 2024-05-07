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
use App\Models\Concerns;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Helper\Helper;

class ConcernsController extends Controller
{
   public function concerns()
   { 
    $data['activeCategories'] = Category::where('status', '1')->get();
    $data['concerns'] = Concerns::all();
    return view("frontend.concerns",$data);

   }
   public function concerndetail($id)
   { 

    $data['experts'] = Expert::all();
    $data['activeCategories'] = Category::where('status', '1')->take(10)->get();
    $data['recent'] = Concerns::all();
    $data['concerns'] = Concerns::where('article_slug',$id)->get();
    return view("frontend.concerndetail",$data);

   }
   
 
}