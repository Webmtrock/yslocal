<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Expert;
use App\Models\Program;
use App\Models\Week;
use App\Models\Time;
use App\Models\User;
use App\Models\WibinerUser;
use App\Models\WibinerSession;
use App\Models\WibinerWillLearn;
use App\Models\WibinerItFor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Helper\Helper;
use Illuminate\Support\Facades\Hash;

class ExpertsController extends Controller
{
   public function experts(Request $request)
   { 
       $data['category'] = Category::all();

      $query = Expert::query();
       if ($request->has('cat')) {
        $categoryIds = $request->input('cat');
            $query->where(function ($q) use ($categoryIds) {
                foreach (explode(',', $categoryIds) as $categoryId) {
                    $q->orWhereRaw("FIND_IN_SET(?, expert_category_id)", [(int)$categoryId]);
                }
            });
        } else {
            $query->whereNotNull('expert_category_id');
        }
        $query->where('status',1);
        
        $query->orderBy('id','DESC');
        
       $data['expert'] = $query->get();
       
       
       //$data['wibiner'] = WibinerUser::latest()->take(3)->get();
       $today = Carbon::today();
       $data['wibiner'] = WibinerUser::where('status', 1)
               ->whereDate('webinar_start_date', '>', $today)
               ->orderBy('webinar_start_date', 'ASC')
               ->orderBy('id', 'DESC')
               ->get();
       
       
       $data['activeCategories'] = Category::where('status', '1')->get();
       
       return view('frontend.experts',$data);

   }
   
   
   public function expert($id)
    {
        $Program = Program::where('expert_id',$id)->get();
        $webinars = WibinerUser::where('expert_id',$id)->get();
        $data['activeCategories'] = Category::where('status', '1')->get();
        $expert = Expert::find($id);
        // Check if user was found
        if ($expert) {
            // User found, return a view or other response
            return view('frontend.expert', ['experts' => $expert,'programs' => $Program,'webinars' => $webinars ]);
        } else {
            // User not found, return a 404 response
            return response()->json(['message' => 'User not found'], 404);
        }
    }
    
    public function registerExpert()
    {
       //dd(request()->all());
        request()->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'designation'=>'required',
            'experience'=>'required',
            'password' => 'required|min:6',
            'confirm_password'=>'required|same:password',
        ]);
        $user = new User;
        $user->name = request()->name;
        $user->email =  request()->email;
        $user->user_type = 'expert';
        $user->password =  Hash::make(request()->password);
        $user->save();
      
        $expert = new Expert;
        $expert->expert_designation = request()->designation;
        $expert->expert_experience = request()->experience;
        $expert->user_id = $user->id;
        $expert->name = request()->name;
        $expert->save();
            $notificaton = [
                'alert-type'=>'success',
                'message'=>'Expert Register Successfully.'
            ];
        return redirect()->back()->with($notificaton);

    }
   
   
 
}