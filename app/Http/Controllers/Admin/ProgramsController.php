<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Expert;
use App\Models\ProgramPlan;
use App\Models\ProgramPlanType;
use App\Models\ProgramLesson;
use App\Models\ProgramFaq;
use App\Models\ProgramBatch;
use App\Models\Category;
use App\Models\ProgramSession;
use App\Models\ProgramReviewsImages;
use App\Models\ProgramSessionResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class ProgramsController extends Controller
{
 
    public function index()
    {
        
        if(auth()->user()->roles->pluck('name')->first() == 'Admin'){
            $programs = Program::all();
        }else{
            $programs = Program::where('expert_id',auth()->user()->id)->get();

        }
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        $categories = Category::all();
        $experts = Expert::all();
        return view('admin.programs.create', compact('categories', 'experts'));
    }   


    public function saveProgram(Request $request)
    {  
       //  echo "<pre>"; print_r($request->all()); die;
        $rules = [
            'title' => 'required|string|max:255',
            'rating' => 'required',
            'expert_id' => 'required|exists:experts,id',
            'program_for' => 'required|string|max:255',
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id',
            'image_url' => 'image|mimes:jpeg,png,jpg,gif', 
            //'programming_tovideo_url' => 'required|file|mimes:mp4,mov,ogg,qt|max:20000', 
            'enroll_user' => 'required',
            'program_description' => 'required',
           // 'entry_score' => 'required',
            'program_start_date' => 'required',
            'program_video_thumbnail' => 'required',



        ];
        $request->validate($rules);
    
        // Handle image upload
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads', $imageName); 
        }
    
        // Handle video upload
        if ($request->hasFile('programming_tovideo_url')) {
            $video = $request->file('programming_tovideo_url');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $video->move('uploads/videos', $videoName); 
        }
        if ($request->hasFile('program_video_thumbnail')) {
            $videoThumbnail = $request->file('program_video_thumbnail');
            $videoNameThumbnail = time() . '.' . $videoThumbnail->getClientOriginalExtension();
            $videoThumbnail->move('uploads/videos', $videoNameThumbnail); 
        }
    
        $program = new Program;
        $program->title = $request->title;
        $program->rating = $request->rating;
        $program->expert_id = $request->expert_id; 
        $program->program_for = $request->program_for;
        $program->whatsapp_group_url = $request->whatsapp_group_url;
        $program->enroll_user = $request->enroll_user;
        $program->entry_score = $request->entry_score;
        $program->program_start_date = $request->program_start_date;
        $program->program_description = $request->program_description;
        $program->intake_from_link = $request->intake_from_link;
        $program->image_url = $imageName ?? null; // Set to null if image is not uploaded
        $program->programming_tovideo_url = $videoName ?? null; // Set to null if video is not uploaded
        $program->program_video_thumbnail = $videoNameThumbnail ?? null;
    
        // Implode the array of category IDs into a string
        $categoryIds = implode(',', $request->input('category_id'));
        $program->category_id = $categoryIds;
    
        $program->save();
    
        // Handle Add Plans Start
        if ($request->has('add_plans')) {
            $addPlans = $request->input('add_plans');
            $counts = count($addPlans);
            for ($i = 0; $i < $counts; $i++) {
                $programPlan = ProgramPlan::create([
                    'add_plans' => $addPlans[$i],
                    'programins_id' => $program->id,
                ]);
                $lastInsertedId = $programPlan->id;
                if ($request->has('price')) {
                    $prices = $request->input('price');
                    $discounts = $request->input('discount');
                    $typePlans = $request->input('type_plan');
                    // Check if prices array for this plan exists
                    if (isset($prices[$i])) {
                        $count = count($prices[$i]);
                        for ($j = 0; $j < $count; $j++) {
                            ProgramPlanType::create([
                                'price' => $prices[$i][$j],
                                'discount' => $discounts[$i][$j],
                                'type_plan' => ucfirst($typePlans[$i][$j]),
                                'program_id' => $program->id,
                                'plan_id' => $lastInsertedId
                            ]);
                        }
                    }
                }
            }
        }
    
        // Handle Add Faq start
        if ($request->has('answer')) {
            $answer = $request->input('answer');
            $question = $request->input('question');
            $count = count($answer);
            for ($i = 0; $i < $count; $i++) {
                ProgramFaq::create([
                    'answer' =>  $answer[$i]['answer'],
                    'question' => $question[$i]['question'],
                    'program_id' => $program->id,
                ]);
            }
        }
         
        // Add Review Image 
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            if ($images !== null) {
                foreach ($images as $image) {
                    $imageName = time() . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move('uploads', $imageName); 
                    ProgramReviewsImages::create([
                        'file' => $imageName,
                        'file_type' => 'image',
                        'program_id' => $program->id, // Assuming $program is defined elsewhere
                    ]);
                }
            } 
        
        }

        // Add Review Video 
        if ($request->hasFile('video')) {
            $videos = $request->file('video');
            if ($videos !== null) {
                foreach ($videos as $video) {
                    $videoName = time() . uniqid() . '.' . $video->getClientOriginalExtension();
                    $video->move('uploads', $videoName); 
                    ProgramReviewsImages::create([
                        'file' => $videoName,
                        'file_type' => 'video',
                        'program_id' => $program->id, // Assuming $program is defined elsewhere
                    ]);
                }
            } 
        
        }

         // Add Review Video Url
         if ($request->video_url_link) {
            $video_url_link = $request->video_url_link;
            if ($video_url_link !== null) {
                foreach ($video_url_link as $key => $video_url_link) {
                  
                    ProgramReviewsImages::create([
                        'file_type' => 'video_link',
                        'program_id' => $program->id, // Assuming $program is defined elsewhere
                        'video_url_link' => $video_url_link,
                    ]);
                }
            } 
        
        }



    // End Review Image
        $message = 'Program Added successfully';
        return redirect()->route('programs.index')->with('success', $message);
    }
    

    public function updateProgram(Request $request, $id = null)
    {  
         $rules = [
            'title' => 'required|string|max:255',
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id',
            'rating' => 'required',
            'expert_id' => 'required|exists:experts,id',
            'program_for' => 'required|string|max:255',
            'image_url' => 'image|mimes:jpeg,png,jpg,gif', 
           // 'programming_tovideo_url' => 'file|mimes:mp4,mov,ogg,qt|max:20000', 
            'enroll_user' => 'required',
            'program_description' => 'required',
            //'entry_score' => 'required',
            'program_start_date' => 'required',
            //'program_video_thumbnail' => 'required',
        ];
        $request->validate($rules);
        $program = Program::findOrFail($id);
        $program->title = $request->title;
        $program->rating = $request->rating;
        $program->expert_id = $request->expert_id; 
        $program->program_for = $request->program_for;
        $program->whatsapp_group_url = $request->whatsapp_group_url;
        $program->enroll_user = $request->enroll_user;
        $program->entry_score = $request->entry_score;
        $program->program_start_date = $request->program_start_date;
        $program->program_description = $request->program_description;
        $program->intake_from_link = $request->intake_from_link;
        $program->category_id = implode(',', $request->input('category_id'));
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads', $imageName); 
            $program->image_url = $imageName; 
        }
        if ($request->hasFile('programming_tovideo_url')) {
            $video = $request->file('programming_tovideo_url');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $video->move('uploads/videos', $videoName); 
            $program->programming_tovideo_url = $videoName; 
        }
        if ($request->hasFile('program_video_thumbnail')) {
            $videoNameThumbnail = $request->file('program_video_thumbnail');
            $videoThumbnail = time() . '.' . $videoNameThumbnail->getClientOriginalExtension();
            $videoNameThumbnail->move('uploads/videos', $videoThumbnail); 
            $program->program_video_thumbnail = $videoThumbnail; 
        }
        $program->save(); // Changed from $program->update() to $program->save()

        if ($request->has('add_plans')) {
            ProgramPlan::where('programins_id', $id)->delete();
            
            $addPlans = $request->input('add_plans');
            $counts = count($addPlans);
            
            for ($i = 0; $i < $counts; $i++) {
                $programPlan = ProgramPlan::create([
                    'add_plans' => $addPlans[$i],
                    'programins_id' => $program->id,
                ]);
                $lastInsertedId = $programPlan->id;
                
                if ($request->has('price')) {
                    $prices = $request->input('price');
                    $discounts = $request->input('discount');
                    $typePlans = $request->input('type_plan');
                    
                    // Check if prices array for this plan exists
                    if (isset($prices[$i])) {
                        $count = count($prices[$i]);
                        
                        for ($j = 0; $j < $count; $j++) {
                            ProgramPlanType::create([
                                'price' => $prices[$i][$j],
                                'discount' => $discounts[$i][$j],
                                'type_plan' => ucfirst($typePlans[$i][$j]),
                                'program_id' => $program->id,
                                'plan_id' => $lastInsertedId
                            ]);
                        }
                    }
                }
            }
        }
        if ($request->has('answer')) {
            $answer = $request->input('answer');
            $question = $request->input('question');
            ProgramFaq::where('program_id',$id)->delete();
    
            $count = count($answer);
            for ($i = 0; $i < $count; $i++) {
                ProgramFaq::create([
                    'answer' =>  $answer[$i]['answer'],
                    'question' => $question[$i]['question'],
                    'program_id' => $program->id,
                ]);
            }
        }
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            if ($images !== null) {
                foreach ($images as $image) {
                    $imageName = time() . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move('uploads', $imageName); 
                    ProgramReviewsImages::create([
                        'file' => $imageName,
                        'file_type' => 'image',
                        'program_id' => $program->id,
                    ]);
                }
            } 
        }
        // Add Review Video 
        if ($request->hasFile('video')) {
            $videos = $request->file('video');
            if ($videos !== null) {
                foreach ($videos as $key => $video) {
                    $videoName = time() . uniqid() . '.' . $video->getClientOriginalExtension();
                    $video->move('uploads', $videoName); 
                    ProgramReviewsImages::create([
                        'file' => $videoName,
                        'file_type' => 'video',
                        'program_id' => $program->id, // Assuming $program is defined elsewhere
                    ]);
                }
            } 
        
        }
      //  dd($request->video_url_link);
        // Add Review Video Url
        if ($request->video_url_link) {
            $video_url_link = $request->video_url_link;
            ProgramReviewsImages::where('program_id',$program->id)->where('file_type','video_link')->delete();
                foreach ($video_url_link as $key => $video_url) {

                    ProgramReviewsImages::create([
                        'file_type' => 'video_link',
                        'program_id' => $program->id, // Assuming $program is defined elsewhere
                        'file' => $video_url,
                    ]);
                }
        
        }
    $message = 'Program Updated successfully';
    return redirect()->route('programs.index')->with('success', $message);
    }  
    
    
    

    public function edit(Request $request, $id)
    {
       
        $categories = Category::all();
        $experts    = Expert::all();
        $program    = Program::findOrFail($id);
        $plans      = ProgramPlan::with('getProgramPlantype')->where('programins_id',$id)->get();
        $addfaqs    = ProgramFaq::where('program_id',$id)->get();
        $addimages   = ProgramReviewsImages::where('program_id',$id)->where('file_type','image')->get();
        $addvideos   = ProgramReviewsImages::where('program_id',$id)->where('file_type','video')->get();
        $addvideosuRL   = ProgramReviewsImages::where('program_id',$id)->where('file_type','video_link')->get();
    //    dd($addvideosuRL);

    
        return view('admin.programs.update', compact('program', 'experts', 'categories', 'plans','addfaqs','addimages','addvideos','addvideosuRL'));
    }

   
    
    public function store(Request $request)
    {
        return $this->saveProgram($request);
    }

    public function update(Request $request, $id)
    {
   
        return $this->updateProgram($request, $id);
    }
    public function delete($id)
    {
        $planstypes = ProgramPlanType::where('program_id',$id)->delete();
        $addmores   = ProgramSession::where('program_batch_id',$id)->delete();
        $addfaqs    = ProgramFaq::where('program_id',$id)->delete();
        $plans      = ProgramPlan::where('programins_id',$id)->delete();
        $program = Program::findOrFail($id);
        $program->delete();
        return redirect()->route('programs.index')->with('success', 'Program Deleted successfully');
    }

    public function Status($id)
    {
        $program = Program::findOrFail($id);
        if($program->status == '1'){
            $program->status = 0;
        }else{
            $program->status = 1;
        }
        $program->update();
        return redirect()->route('programs.index')->with('success', 'Program status change successfully');
    }
    public function ProgramSessionStatus($id)
    {
        $program = ProgramSession::findOrFail($id);
        if($program->status == '1'){
            $program->status = '0';
        }else{
            $program->status = '1';
        }
        $program->update();
        return redirect()->back()->with('success', 'Program status change successfully');
    }


    public function ProgramSecationList($id){
        try {
            $programName = Program::where('id',$id)->first();
            $batchs = ProgramBatch::with('getProgramSession')->where('program_id',$id)->get();
            //$ProgramSession = ProgramSession::whereIn('program_batch_id',$batch)->get();

            return view('admin.programs.session-list',compact('programName','batchs'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function ProgramSecationAdd($id){
       
        try {
            $programName = Program::where('id',$id)->first();
            $batch = ProgramBatch::where('program_id',$id)->get();
            $programs = Program::where('id','!=', $id)->get();

            return view('admin.programs.session-add',compact('programName','batch','id','programs'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', 'Something went wrong.');

        }
    }

    public function ProgramSecationStore(Request $request){
        try {
            $sessionProgram = new ProgramSession; 
            $sessionProgram->program_batch_id = $request->batch_id;
            $sessionProgram->session_recording = $request->session_recording;
            $sessionProgram->session_title =$request->session_title;
            $sessionProgram->session_time = $request->session_duration;
            $sessionProgram->session_startdate =$request->start_date;
            $sessionProgram->session_meetinglink =$request->meeting_link;
            $sessionProgram->session_description =$request->session_description;
            $sessionProgram->session_starttime =$request->starttime;
            $sessionProgram->save();

            if ($request->hasFile('document')) {
                $images = $request->file('document');
                foreach ($images as $image) {
                    $imageName = time() .uniqid(). '.' . $image->getClientOriginalExtension();
                    $image->move('uploads', $imageName); 
                    ProgramSessionResource::create([
                        'file_path' => $imageName,
                        'file_type' => $request->file_type,
                        'program_session_id' => $sessionProgram->id,
                    ]);
                }
            }
            // $sessions = ProgramSessionResource::where('program_session_id', $request->show_resorce)->get();

            // // Iterate over each retrieved session
            // foreach ($sessions as $session) {
            //     $ProgramSessionResource = new ProgramSessionResource;
            //     $ProgramSessionResource->file_path = $session->file_path;
            //     $ProgramSessionResource->file_type = $session->file_type;
            //     $ProgramSessionResource->program_session_id = $id;
            //     $ProgramSessionResource->save();    
               
            // }
            if ($request->has('action') && $request->action == 'save_continue') {
                return redirect()->back()->with('success', 'Program Session Create Successfully.');
            } else {
                return redirect()->route('programs.session.list',$request->program_id)->with('success', 'Program Session Create Successfully.');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', 'Something went wrong.');

        }
    }


    public function ProgramSecationEdit($id){
        try {
            //dd($id);
            $ProgramSession = ProgramSession::where('id',$id)->first();
            $batch = ProgramBatch::where('id',$ProgramSession->program_batch_id)->first();
            $allBatch = ProgramBatch::where('program_id',$batch->program_id)->get();
            $ProgramSessionResource = ProgramSessionResource::where('program_session_id',$ProgramSession->id)->first();
            $allProgramSessionResource = ProgramSessionResource::where('program_session_id',$ProgramSession->id)->get();

            $programId =$batch->program_id;
            $programs = Program::where('id','!=', $programId)->get();
            return view('admin.programs.session-edit',compact('ProgramSession','allBatch','ProgramSessionResource','allProgramSessionResource','programId','programs'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', 'Something went wrong.');

        }
    }


    public function ProgramSecationUpdate(Request $request,$id){
        try {
           
            $sessionProgram = ProgramSession::find($id); 
            $sessionProgram->program_batch_id = $request->batch_id;
            $sessionProgram->session_recording = $request->session_recording;
            $sessionProgram->session_title =$request->session_title;
            $sessionProgram->session_time = $request->session_duration;
            $sessionProgram->session_startdate =$request->start_date;
            $sessionProgram->session_meetinglink =$request->meeting_link;
            $sessionProgram->session_description =$request->session_description;
            $sessionProgram->session_starttime =$request->starttime;
            $sessionProgram->update();
            
           
            if ($request->hasFile('document')) {
               // ProgramSessionResource::where('program_session_id',$id)->delete();
                $images = $request->file('document');
                foreach ($images as $image) {
                    $imageName = time() .uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move('uploads', $imageName); 
                    ProgramSessionResource::create([
                        'file_path' => $imageName,
                        'file_type' => $request->file_type,
                        'program_session_id' => $id,
                    ]);
                }
            }

            $sessions = ProgramSessionResource::where('program_session_id', $request->show_resorce)->get();

            // Iterate over each retrieved session
            foreach ($sessions as $session) {
                $ProgramSessionResource = new ProgramSessionResource;
                $ProgramSessionResource->file_path = $session->file_path;
                $ProgramSessionResource->file_type = $session->file_type;
                $ProgramSessionResource->program_session_id = $id;
                $ProgramSessionResource->save();    
               
            }
            return redirect()->back()->with('success', 'Program Session Updated Successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', 'Something went wrong.');

        }
    }
    public function ProgramSessionrecording(Request $request,$id)
    {
           
            $sessionProgramrecording = ProgramSession::find($id); 
            $sessionProgramrecording->session_recording = $request->session_recording;
            $sessionProgramrecording->update();
            return redirect()->back()->with('success', 'Program Session Recording Updated Successfully.');
           
           
    }
    public function ProgramSecationdelete($id)
    {
        $ProgramSession = ProgramSession::where('id',$id)->first();
        $ProgramSessionResource   = ProgramSessionResource::where('program_session_id',$ProgramSession->id)->delete();
        $ProgramSession->delete();
        return redirect()->back()->with('success', 'Program Session Deleted successfully');
    }

    public function AppendBatch(Request $request)
    {
        $allBatch = ProgramBatch::where('program_id', $request->option)->get();
        $html = '';
        $html .= "
<option value=''>Select Batch Type</option>";
        foreach ($allBatch as $key => $value) {
            $html .= "
<option value=\"" . $value->id . "\">" . $value->name . "</option>";
        }

        return response()->json(['html' => $html]);
    }

    public function AppendResorce(Request $request)
    {
        $ProgramSession = ProgramSession::where('program_batch_id',$request->option)->get();
        $html = '';
        $html .= "
<option value=''>Select Session to copy resource</option>";
        foreach ($ProgramSession as $key => $value) {
            $html .= "
<option value=\"" . $value->id . "\">" . $value->session_title . "</option>";
        }

        return response()->json(['html' => $html]);
    }

    public function ResorceImageRemove(Request $request)
    {
        $imageId =$request->imageId;
        $ProgramSession = ProgramSessionResource::where('id',$imageId)->delete();
        return response()->json(['sussecc']);
    }
    public function ReviewImageRemove(Request $request)
    {
        $imageId =$request->imageId;
        $ProgramSession = ProgramReviewsImages::where('id',$imageId)->delete();
        return response()->json(['sussecc']);
    }

    public function ProgramRemoveImage(Request $request)
    {
        // Check the request data
        // dd($request->all());
    
        // Retrieve the program session by ID
        $programSession = Program::findOrFail($request->imageId);
    
        // Determine the type of file to remove and update accordingly
        if ($request->type === 'image_url') {
            $programSession->image_url = "";
        } elseif ($request->type === 'video_url') {
            $programSession->programming_tovideo_url = "";
        } else {
            $programSession->program_video_thumbnail = "";
        }
    
        // Save the changes
        $programSession->save();
    
        // Return a JSON response indicating success
        return response()->json(['success']);
    }
   

    
    

    
    
}