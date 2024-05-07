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
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Helper\Helper;

class HealthpediaController extends Controller
{
   public function healthpedia(Request $request)
   {
    
       $data['activeCategories'] = Category::where('status', '1')->get();
       $query = Article::query();
   
   if ($request->has('cat')) {
      $categoryIds = $request->input('cat');
      $query->whereRaw("FIND_IN_SET('$categoryIds', category_id)");
  }
   
  if ($request->has('q')) {
   $searchQuery = $request->input('q');
   $query->where(function ($query) use ($searchQuery) {
       $query->whereHas('category', function ($categoryQuery) use ($searchQuery) {
           $categoryQuery->where('title', 'like', '%' . $searchQuery . '%');
       });
       // Add more search conditions if needed
   });
}
$query->where('status','Published');
        $query->orderBy('id','DESC');
       // Paginate the results
       $data['articles'] = $query->paginate(10);
   
       return view("frontend.healthpedia", $data);
   }
   
   public function healthpediadetail($id)
   { 

    $data['experts'] = Expert::all();
    $data['activeCategories'] = Category::where('status', '1')->take(10)->get();
    $data['recent'] = Articles::all();
    $data['articles'] = Articles::where('article_slug',$id)->get();
    if(isset($_REQUEST['cat'])) {
      $categoryId = $_REQUEST['cat'];
      $data['articles'] = Articles::where('category_id', $categoryId)->paginate(10);
  }
    return view("frontend.healthpediadetail",$data);

   }
   
 
}