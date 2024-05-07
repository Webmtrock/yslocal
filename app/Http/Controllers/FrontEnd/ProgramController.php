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
use App\Models\ProgramFaq;
use App\Models\ProgramSession;
use App\Models\ProgramBatch;
use App\Models\Program;
use App\Models\ProgramPlan;
use App\Models\Order;
use App\Models\ProgramReviewsImages;

use App\Models\ProgramPlanType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Helper\Helper;

use Auth;

class ProgramController extends Controller
{
   public function programs(Request $request)
   { 
      $data['category'] = Category::all();
      $data['wibiner'] = WibinerUser::all();
      $query = Program::query();

    if ($request->has('cat')) {
        $categoryIds = $request->input('cat');
       
        $query->where(function ($q) use ($categoryIds) {
            foreach (explode(',', $categoryIds) as $categoryId) {
                $q->orWhereRaw("FIND_IN_SET(?, category_id)", [(int)$categoryId]);
            }
        });

    } else {
        // Retrieve all workshops if no category is selected
        $query->whereNotNull('category_id');
    }

    // $query = $query->where('status',1);
    // $query = $query->orderBy('program_start_date','ASC');
      $today = Carbon::today();
      $query = $query->where('status', 1)
               ->whereDate('program_start_date', '>', $today)
               ->orderBy('program_start_date', 'ASC')
               ->orderBy('id', 'DESC');
               

     $data['programs'] = $query->paginate(10);
        
      $data['activeCategories'] = Category::where('status', '1')->get();
      
         $today = Carbon::today();
     // $data['wibiner'] = WibinerUser::orderBy('webinar_start_date','DESC')->latest()->take(3)->get();
     $data['wibiner'] = WibinerUser::where('status', 1)
               ->whereDate('webinar_start_date', '>', $today)
               ->orderBy('webinar_start_date', 'ASC')
               ->orderBy('id', 'DESC')
               ->get();

      
      
      return view('frontend.programs',$data);
   }


    public function program($id)
   { 
    
      $programs = Program::where('id',$id)->get();
      $programFaq = ProgramFaq::where('program_id',$id)->get();

      
      // dd($allbatchs);

      $userId = null;
      $currentDate = Carbon::now()->toDateString(); // Format: YYYY-MM-DD
            // dd($currentDate);
      $batch = ProgramBatch::where('program_id', $id)->whereDate('batch_end_date', '>', $currentDate)->orderBy('batch_start_date','ASC')
      ->first('id');
     //dd($batch);
      $program_review_images = ProgramReviewsImages::where('program_id',$id)->where('file_type','image')->get();
      $program_review_video = ProgramReviewsImages::where('program_id',$id)->whereIn('file_type',['video','video_link'])->get();
      $programExists = '';

       if(auth()->check()){
        $userId = auth()->user()->id;
        $programExists = Order::where('program_id', $id)->where('user_id', $userId)->first();
       // dd($programExists);
        if($programExists){
            $ProgramSession = ProgramSession::with('SessionResorce')->where('program_batch_id',$programExists->batch_id)->orderBy('id','ASC')->get();
        }else{
            $ProgramSession = ProgramSession::with('SessionResorce')->whereIn('program_batch_id',$batch)->orderBy('id','ASC')->get();
        }
       }else{
        // dd($batch);
        if(!is_null($batch)){
            $ProgramSession = ProgramSession::with('SessionResorce')->whereIn('program_batch_id',$batch)->orderBy('id','ASC')->get();

        }else{
            $ProgramSession = [];
  
            
        }
       } 
      
        
       
        $plan = ProgramPlan::where('programins_id',$id)->get();
        $program = Program::where('expert_id',$id)->get();
        $allbatchs = ProgramBatch::with('getProgramSession')->where('program_id',$id)->get();
    //  dd($program_review_video);
      return view('frontend.program',['programs' => $programs,'allbatchs' => $allbatchs ,'plan'=>$plan ,'program'=>$program, 'programFaq'=>$programFaq ,'ProgramSession'=>$ProgramSession , 'programExists'=>$programExists,'program_review_images'=>$program_review_images,'program_review_video'=>$program_review_video]);
    
    /*
    $programs = Program::where('expert_id',$id)->get();
        $programs = Program::where('expert_id',$id)->get();
        $webinars = WibinerUser::where('expert_id',$id)->get();
        $data['activeCategories'] = Category::where('status', '1')->get();
        
        $expert = Expert::find($id);

        // Check if user was found
        if ($expert) {
            // User found, return a view or other response
            return view('frontend.expert', ['experts' => $expert,'programs' => $programs,'webinars' => $webinars ]);
        } else {
            // User not found, return a 404 response
            return response()->json(['message' => 'User not found'], 404);
        }
      */  
        
   }


 
   public function getPlan(Request $request){
    $planType = ProgramPlanType::where('plan_id',$request->planId)->get();
    $html = '';
    $html .= "<option value=''>Select Plan Type</option>";

    foreach ($planType as $key => $value) {
        if (ctype_digit($value->type_plan)) {
            $html .= "<option value=\"{$value->id}\">{$value->type_plan} Member</option>";
        }else{
            $html .= "<option value=\"" . $value->id . "\">" . $value->type_plan . "</option>";


        }
    }

    return response()->json($html);
}
}
 

