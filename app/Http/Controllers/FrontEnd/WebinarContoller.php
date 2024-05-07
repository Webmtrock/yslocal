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
use App\Models\Program;
use App\Models\Order;
use App\Models\WebinarReviewsImages;

use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Helper\Helper;

class WebinarContoller extends Controller
{
    public function workshops(Request $request)
    {
        $data['category'] = Category::all();
        $query = WibinerUser::query();
        
        if ($request->has('cat')) {
            $categoryIds = $request->input('cat');
            $query->where(function ($q) use ($categoryIds) {
                foreach (explode(',', $categoryIds) as $categoryId) {
                    $q->orWhereRaw("FIND_IN_SET(?, category_id)", [(int)$categoryId]);
                }
            });
        } else {
            $query->whereNotNull('category_id');
        }
        
        // $query = $query->where('status',1);
        // $query = $query->orderBy('webinar_start_date','ASC');
        // $query->orderBy('id','DESC');
      $today = Carbon::today();
      $query = $query->where('status', 1)
               ->whereDate('webinar_start_date', '>', $today)
               ->orderBy('webinar_start_date', 'ASC')
               ->orderBy('id', 'DESC');

    //  dd($query);
        $data['wibiner'] = $query->paginate(10);
        
        // $data['Program'] = Program::orderBy('program_start_date','DESC')->latest()->take(3)->get();
        $data['Program'] = Program::where('status', 1)
               ->whereDate('program_start_date', '>', $today)
               ->orderBy('program_start_date', 'ASC')
               ->orderBy('id', 'DESC')
               ->get();

        
        // dd( $data['Program']);
        $data['activeCategories'] = Category::where('status', '1')->get();
    
    
        return view('frontend.workshops', $data);
    }

    
   public function workshop($id)
   {    
       
         $data['category'] = Category::all();
         $data['wibiner'] = WibinerUser::where('expert_id',$id)->get();
         $webinar_review =  WebinarReviewsImages::where('webinar_id',$id)->get();
         $data['webinarSession'] = WibinerSession::where('webinar_id' ,$id)->get();
         $data['webinarLearn'] = WibinerWillLearn::where('wibiner_user_id' ,$id)->get();
         $data['webinarFor'] = WibinerItFor::where('wibiner_user_id' ,$id)->get();
         $data['Program'] = Program::latest()->take(3)->get();
         $wibiner = WibinerUser::find($id);
           $userId = null;
        if(auth()->check()) 
         $userId = auth()->user()->id;
         $data['wibinerExists'] = Order::where('webinar_id', $id)->where('user_id', $userId)->exists();
         if ($wibiner) {
             return view('frontend.workshop', ['wibiner' => $wibiner,'webinar_review'=>$webinar_review] + $data);
         } else {
             return response()->json(['message' => 'User not found'], 404);
         }
     }
     
}
 

 

