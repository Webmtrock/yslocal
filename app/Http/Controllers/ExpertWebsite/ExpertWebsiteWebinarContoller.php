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
use App\Models\Program;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Helper\Helper;

class ExpertWebsiteWebinarContoller extends Controller
{
   public function workshops()
   { 
        $data['category'] = Category::all();
        $data['wibiner'] = WibinerUser::all();
        $data['Program'] = Program::latest()->take(3)->get();
              $data['activeCategories'] = Category::where('status', '1')->get();

        return view('expertwebsite.workshops',$data);

   }
   public function workshop($id)
 
     { 
         $data['category'] = Category::all();
     //     $webinarFor = WibinerItFor::all();
         $data['wibiner'] = WibinerUser::where('expert_id',$id)->get();
         $data['webinarSession'] = WibinerSession::where('wibiner_user_id' ,$id)->get();
         $data['webinarLearn'] = WibinerWillLearn::where('wibiner_user_id' ,$id)->get();
         $data['webinarFor'] = WibinerItFor::where('wibiner_user_id' ,$id)->get();
         $data['Program'] = Program::latest()->take(3)->get();
         
         $wibiner = WibinerUser::find($id);
           $userId = null;
        if(auth()->check()) 
         $userId = auth()->user()->id;
         $data['wibinerExists'] = Order::where('webinar_id', $id)->where('user_id', $userId)->exists();

        
         if ($wibiner) {
             return view('expertwebsite.workshop', ['wibiner' => $wibiner] + $data);
         } else {
             return response()->json(['message' => 'User not found'], 404);
         }
     }
     
        
       
}
 

 

