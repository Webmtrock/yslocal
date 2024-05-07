<?php

namespace App\Http\Controllers\Admin;

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
use App\Models\WebinarSessionResource;
use App\Models\WebinarReviewsImages;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Helper\Helper;
use Illuminate\Support\Facades\Validator;


class WebinarsController extends Controller
{
   public function index()
   { 

    if(auth()->user()->roles->pluck('name')->first() == 'Admin'){
        $wibineruser = WibinerUser ::all();
    }else{
        $wibineruser = WibinerUser ::where('expert_id',auth()->user()->id)->get();
    }
    

      
     return view('admin.webinar.index',compact('wibineruser'));
   }
   public function create()
   {  
    
      $categories = Category::all();
      $experts = Expert ::all();
      $weeks = Week ::all();
      $times = Time ::all();
      return view('admin.webinar.create',  compact('categories','experts','weeks','times'));
   }

   public function store(Request $request)
   {
      
       $imagePath = config('app.webinar_image');
   
       // Check if category_id exists and is an array
       $categoryIds = $request->has('category_id') && is_array($request->input('category_id')) ? implode(',', $request->input('category_id')) : '';
   
       $data = WibinerUser::updateOrCreate(
           [
               'id' => $request->id,
           ],
           [
               'category_id' => $categoryIds,
               'description' => $request->description,
               'overview' => $request->overview,
               'webinar_title' => $request->webinar_title,
               'expert_id' => $request->expert_id,
               'webinar_start_date' => $request->webinar_start_date,
              // 'day' => $request->day,
               'duration' => $request->duration,
               'start_time' => $request->start_time,
               'end_time' => $request->end_time,
               'webinar_price' => $request->webinar_price,
               'webinar_event_type' => $request->webinar_event_type,
               'whatsapp_link' => $request->whatsapp_link,
              // 'meeting_link' => $request->meeting_link,
               'expert_designation' => $request->expert_designation,
               'number_of_enrollments' => $request->number_of_enrollments,
               'status' => $request->status,
            //    'webinar_video' => $request->hasFile('webinar_video') ? Helper::storeVideo($request->file('webinar_video'), $imagePath, $request->webinar_videoOld) : (isset($request->webinar_videoOld) ? $request->webinar_videoOld : ''),
            'webinar_video' => $request->webinar_video ?$request->webinar_video: (isset($request->webinar_videoOld) ? $request->webinar_videoOld : ''),

               'webinar_image' => $request->hasFile('webinar_image') ? Helper::storeImage($request->file('webinar_image'), $imagePath, $request->webinar_imageOld) : (isset($request->webinar_imageOld) ? $request->webinar_imageOld : ''),
           ]
       );
   
       if ($data) {
   
           if ($request->hasFile('image') && $request->hasFile('video')) {
            $images = $request->file('image');
            $videos = $request->file('video');
            
            // Ensure the number of images matches the number of videos
            if (count($images) === count($videos)) {
                foreach ($images as $key => $image) {
                    $imageName = time() . uniqid() . '.' . $image->getClientOriginalExtension();
                    $video = $videos[$key]; // Get the corresponding video
        
                    $videoName = time() . uniqid() . '.' . $video->getClientOriginalExtension();
                    
                    $image->move('uploads', $imageName);
                    $video->move('uploads', $videoName);
                    
                    WebinarReviewsImages::create([
                        'image' => $imageName,
                        'video' => $videoName,
                        'webinar_id' => $data->id,
                    ]);
                }
            } else {
                // Handle error: Images and videos count mismatch
            }
        }
        
       
        
        

   
           if ($request->preview) {
               return redirect()->route('user.workshop', ['id' => $data->id]);
           } else {
            return redirect()->route('webinars.index');
           }
       }
   }



 public function edit($id)
 {  
   
    $data['categories'] = Category::all();
    $data['experts'] = Expert ::all();
    $data['weeks'] = Week ::all();
    $times['times']= Time ::all();
    $data['data'] = WibinerUser::where('id', $id)->first();
    $data['experts'] = Expert::all();
    $data['weeks'] = Week::all();
    $data['times'] = Time::all();
 
     $data['webinarimages'] = WebinarReviewsImages::where('webinar_id', $id)->get();

    $data['webinarvideos'] = WebinarReviewsImages::where('webinar_id', $id)->get();
     return view('admin.webinar.edit',$data);
 }



    public function update(Request $request)
    {   
   
        $imagePath = config('app.webinar_image');
        
        $categoryIds = $request->has('category_id') && is_array($request->input('category_id')) ? implode(',', $request->input('category_id')) : '';
        $data = WibinerUser::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'category_id' => $categoryIds,
                'description' => $request->description,
                'overview' => $request->overview,
                'webinar_title' => $request->webinar_title,
                'expert_id' => $request->expert_id,
                'webinar_start_date' => $request->webinar_start_date,
                //'day' => $request->day,
                'duration' => $request->duration,
                'start_time' => $request->start_time,
                'end_time'   => $request->end_time,
                'webinar_price' => $request->webinar_price,
                'webinar_event_type' => $request->webinar_event_type,
                'whatsapp_link' => $request->whatsapp_link,
              //  'meeting_link' => $request->meeting_link,
                'expert_designation' => $request->expert_designation,
                'number_of_enrollments' => $request->number_of_enrollments,
                'status' => $request->status,
                // 'webinar_video' => $request->hasFile('webinar_video') ? Helper::storeVideo($request->file('webinar_video'), $imagePath, $request->webinar_videoOld) : (isset($request->webinar_videoOld) ? $request->webinar_videoOld : ''),
                'webinar_video' => $request->webinar_video ?$request->webinar_video: (isset($request->webinar_videoOld) ? $request->webinar_videoOld : ''),

                'webinar_image' => $request->hasfile('webinar_image') ? Helper::storeImage($request->file('webinar_image'), $imagePath, $request->webinar_imageOld) : (isset($request->webinar_imageOld) ? $request->webinar_imageOld : ''),
            ]
        );

        // if (isset($request->heading) && is_array($request->heading) && isset($request->definition) && is_array($request->definition)) {
        //     $heading = $request->heading;
        //     $definition = $request->definition;
        //     WibinerSession::where('wibiner_user_id', $data->id)->delete();
        
        //     $count = count($heading);
        //     for ($i = 0; $i < $count; $i++) {
        //         WibinerSession::create([
        //             'heading' =>  $heading[$i]['heading'],
        //             'definition' => $definition[$i]['definition'],
        //             'wibiner_user_id' => $data->id,
        //         ]);
        //     }
        // }
        
        // if (isset($request->title) && is_array($request->title)) {
        //     $title = $request->title;
        //     WibinerWillLearn::where('wibiner_user_id', $data->id)->delete();

        //     $count = count($title);
        //     for ($i = 0; $i < $count; $i++) {
        //         WibinerWillLearn::create([
        //             'title' =>  $title[$i]['title'],
        //             'wibiner_user_id' => $data->id,
        //         ]);
        //     }
        // }

        // if (isset($request->who_title) && is_array($request->who_title)) {
        //     $who_title = $request->who_title;
        //     WibinerItFor::where('wibiner_user_id', $data->id)->delete();

        //     $count = count($who_title);
        //     for ($i = 0; $i < $count; $i++) {
        //         WibinerItFor::create([
        //             'who_title' =>  $who_title[$i]['who_title'],
        //             'wibiner_user_id' => $data->id,
        //         ]);
        //     }
        // }

       // Update existing images
       if ($request->has('existing_images')) {
        $existingImages = $request->existing_images;
        foreach ($existingImages as $key => $imageData) {
            if ($request->hasFile("existing_images.{$key}.image")) {
                $image = $request->file("existing_images.{$key}.image");
                $imageName = time() . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads', $imageName);
                // Update existing image record in database
                $existingImage = WebinarReviewsImages::findOrFail($imageData['id']);
                $existingImage->image = $imageName;
                $existingImage->save();
            }
        }
        }
    
    

        // Add new images
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $imageName = time() . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads', $imageName);
                WebinarReviewsImages::create([
                    'image' => $imageName,
                    'webinar_id' => $data->id, 
                ]);
            }
        }


        // Update existing videos
        if ($request->has('existing_videos')) {
            $existingVideos = $request->existing_videos;
            foreach ($existingVideos as $key => $videoData) {
                if ($request->hasFile("existing_videos.{$key}.video")) {
                    $video = $request->file("existing_videos.{$key}.video");
                    $videoName = time() . uniqid() . '.' . $video->getClientOriginalExtension();
                    $video->move('uploads', $videoName);
                    // Update existing video record in the database
                    $existingVideo = WebinarReviewsImages::findOrFail($videoData['id']);
                    $existingVideo->video = $videoName;
                    $existingVideo->save();
                }
            }
        }
        // Add new videos
        if ($request->hasFile('video')) {
            $videos = $request->file('video');
            foreach ($videos as $video) {
                $videoName = time() . uniqid() . '.' . $video->getClientOriginalExtension();
                $video->move('uploads', $videoName);
                WebinarReviewsImages::create([
                    'video' => $videoName,
                    'webinar_id' => $data->id,
                ]);
            }
        }



        if ($request->preview) {
            return redirect()->route('user.workshop', ['id' => $data->id]);
        } else {
            return redirect()->route('webinars.index');
        }
    }

    public function WebinarReviewImageRemove(Request $request)
    {
    
        $imageId =$request->imageId;
        $Webinarimages = WebinarReviewsImages::where('id',$imageId)->delete();
        return response()->json(['sussecc']);
    }

    public function WebinarReviewVideoRemove(Request $request)
    {
        $videoId =$request->videoId;
        $Webinarimages = WebinarReviewsImages::where('id',$videoId)->delete();
        return response()->json(['sussecc']);
    }

    public function WebinarSessionrecording(Request $request,$id)
    {
            
            $WebinarSessionrecording = WibinerUser::find($id); 
            $WebinarSessionrecording->webinar_session_recording = $request->webinar_session_recording;
            $WebinarSessionrecording->update();
            return redirect()->back()->with('success', 'Webinar Session Recording Updated Successfully.');
            
            
    }
    public function destroy($id)
    {
        try {
            $data = WibinerUser::findOrFail($id); 
            $data->delete();
            return Redirect::back()->with('success', 'Webinar User deleted successfully.');
            // return redirect()->route('admin.webinar.index')->with('success', 'Role deleted successfully.');
        } catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'message'  => "Something went wrong, please try again!",
                'error_msg' => $e->getMessage(),
            ], 400);
        }
    }

    public function WebinarSessionList($id)
    {
        try {
            $webinar = WibinerUser::where('id',$id)->first();
            $data = WibinerSession::where('webinar_id',$webinar->id)->get();
            return view('admin.webinar.session-list',compact('data','webinar','id'));
            
        } catch(\Exception $e) {
            return redirect()->to($e->getMessage());
        }
    }


    public function WebinarSessionAdd($id)
    {
        try {
            $weeks = Week ::all();
            return view('admin.webinar.session-add',compact('id','weeks'));
        } catch(\Exception $e) {
            return redirect()->to($e->getMessage());
        }
    }


    public function WebinarSessionStore(Request $request)
    {
        try {
            $data = new WibinerSession;
            $data->webinar_id = $request->id;
            $data->webinar_start_date = $request->webinar_start_date;
            $data->day = $request->day;
            $data->start_time = $request->start_time;
            $data->end_time = $request->end_time;
            $data->meeting_link = $request->meeting_link;
            $data->recording_link = $request->recording_link;
            $data->save();
            if ($request->hasFile('document')) {
                $images = $request->file('document');
                foreach ($images as $image) {
                    $imageName = time() .uniqid(). '.' . $image->getClientOriginalExtension();
                    $image->move('uploads', $imageName); 
                    WebinarSessionResource::create([
                        'file_path' => $imageName,
                        'file_type' => $request->file_type,
                        'webinar_session_id' => $data->id,
                    ]);
                }
            }
            return redirect()->route('webinar.session_list',$request->id)->with('success','Event Session Add Successfully!');
        } catch(\Exception $e) {
            return redirect()->to($e->getMessage());
        }
    }


    public function WebinarSessionEdit(Request $request,$id)
    {
        try {
            $data = WibinerSession::where('id',$id)->first();
            $weeks = Week ::all();
            $WebinarSessionResource = WebinarSessionResource::where('webinar_session_id', $data->id)->first();
            $allWebinarSessionResource = WebinarSessionResource::where('webinar_session_id', $data->id)->get();

            return view('admin.webinar.session-edit',compact('data','weeks','WebinarSessionResource','allWebinarSessionResource'));
        } catch(\Exception $e) {
            return redirect()->to($e->getMessage());
        }
    }

    public function WebinarSessionUpdate(Request $request,$id)
    {
        try {
            $data = WibinerSession::findOrFail($id);
            $data->webinar_id = $request->webinar_id;
            $data->webinar_start_date = $request->webinar_start_date;
            $data->day = $request->day;
            $data->start_time = $request->start_time;
            $data->end_time = $request->end_time;
            $data->meeting_link = $request->meeting_link;
            $data->recording_link = $request->recording_link;
            $data->update();
            if ($request->hasFile('document')) {
                WebinarSessionResource::where('webinar_session_id',$id)->delete();
                 $images = $request->file('document');
                 foreach ($images as $image) {
                     $imageName = time() .uniqid() . '.' . $image->getClientOriginalExtension();
                     $image->move('uploads', $imageName); 
                     WebinarSessionResource::create([
                         'file_path' => $imageName,
                         'file_type' => $request->file_type,
                         'webinar_session_id' => $id,
                     ]);
                 }
             }
 
             $sessions = WebinarSessionResource::where('webinar_session_id')->get();
 
             // Iterate over each retrieved session
             foreach ($sessions as $session) {
                 $WebinarSessionResource = new WebinarSessionResource;
                 $WebinarSessionResource->file_path = $session->file_path;
                 $WebinarSessionResource->file_type = $session->file_type;
                 $WebinarSessionResource->webinar_session_id = $id;
                 $WebinarSessionResource->save();    
                
             }
            return redirect()->route('webinar.session_list',$request->webinar_id)->with('success','Event Session Update Successfully!');

        } catch(\Exception $e) {
            dd($e);
            return redirect()->to($e->getMessage());
        }
    }

    public function WebinarSessionDelete($id)
    {
        try {
            $data = WibinerSession::findOrFail($id); 
            $data->delete();
            return Redirect::back()->with('success', 'Event Session deleted successfully.');
        } catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'message'  => "Something went wrong, please try again!",
                'error_msg' => $e->getMessage(),
            ], 400);
        }
    }

}
 

