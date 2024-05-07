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
use App\Models\ProgramFaq;
use App\Models\ProgramSession;
use App\Models\ProgramBatch;
use App\Models\Program;
use App\Models\ProgramPlan;
use App\Models\Order;
use App\Models\ProgramPlanType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Helper\Helper;
use Auth;

class ExpertWebsiteProgramController extends Controller
{
   public function programs()
   { 
      $data['category'] = Category::all();
      $data['wibiner'] = WibinerUser::all();
      
      if( isset($_REQUEST['cat'])) {
          $c = $_REQUEST['cat'];
          $data['programs'] = Program::where('category_id', $c)->get();
        
}else{
     $data['programs'] = Program::all();
}
      
      $data['activeCategories'] = Category::where('status', '1')->get();
      return view('expertwebsite.programs',$data);
        

   }
    public function program($id)
   { 
      $programs = Program::where('id',$id)->get();
      $programFaq = ProgramFaq::where('program_id',$id)->get();

      $batch = ProgramBatch::where('program_id',$id)->pluck('id');
      $ProgramSession = ProgramSession::whereIn('program_batch_id',$batch)->get();

      $plan = ProgramPlan::where('programins_id',$id)->get();
      $program = Program::where('expert_id',$id)->get();
      $userId = null;
        if(auth()->check()) 
            $userId = auth()->user()->id;
            $programExists = Order::where('program_id', $id)->where('user_id', $userId)->exists();
     
           
    
    
    //   if(auth->check())
    //   $userId = auth()->user()->id;
    //   $programExists = Order::where('program_id', $id)->where('user_id', $userId)->exists();

      return view('expertwebsite.program',['programs' => $programs, 'plan'=>$plan ,'program'=>$program, 'programFaq'=>$programFaq ,'ProgramSession'=>$ProgramSession , 'programExists'=>$programExists]);
    
    /*
    $programs = Program::where('expert_id',$id)->get();
        $programs = Program::where('expert_id',$id)->get();
        $webinars = WibinerUser::where('expert_id',$id)->get();
        $data['activeCategories'] = Category::where('status', '1')->get();
        
        $expert = Expert::find($id);

        // Check if user was found
        if ($expert) {
            // User found, return a view or other response
            return view('expertwebsite.expert', ['experts' => $expert,'programs' => $programs,'webinars' => $webinars ]);
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
        $html .= "<option value=\"" . $value->id . "\">" . $value->type_plan . "</option>";
    }

    return response()->json($html);
}
}
 

