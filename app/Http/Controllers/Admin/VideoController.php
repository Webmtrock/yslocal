<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Expert;
use App\Models\Category;

use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
  
    public function index()
    {  
       
       
        if(auth()->user()->roles->pluck('name')->first() == 'Admin'){
            $video = Video::with('categories')->get();
        }else{
            $video = Video::with('categories')->where('author_id',auth()->user()->id)->get();
        }
        // dd($video[0]->categories->title); exit;
        return view('admin.videos.index', compact('video'));
    }
    public function create(){
        $experts = Expert::all();
        $categories = Category::all();
        return view ('admin.videos.create',compact('experts','categories'));
    }
   
    public function store(Request $request)
    {
        
       if(empty($request->video_link) && empty($request->add_video)){
        $rules = [
            'video_thumbnail' => 'required|image|max:2048', 
            'add_video' => 'required|mimes:mp4,mov,avi|max:20480', 
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id',
            'video_title' => 'required',
            'summary' => 'required',
            'status' => 'required',
          //  'video_link' => 'required',
            'author_id' => 'required|exists:experts,id',
        ];
       }elseif(!empty($request->video_link)){
        $rules = [
            'video_thumbnail' => 'required|image|max:2048', 
           // 'add_video' => 'required|mimes:mp4,mov,avi|max:20480', 
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id',
            'video_title' => 'required',
            'summary' => 'required',
            'status' => 'required',
          //  'video_link' => 'required',
            'author_id' => 'required|exists:experts,id',
        ];
       }elseif(!empty($request->add_video)){
        $rules = [
            'video_thumbnail' => 'required|image|max:2048', 
            'add_video' => 'nullable|mimes:mp4,mov,avi|max:20480', 
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id',
            'video_title' => 'required',
            'summary' => 'required',
            'status' => 'required',
          //  'video_link' => 'required',
            'author_id' => 'required|exists:experts,id',
        ];
       }
        // Validation rules
     
    
        // Custom error messages
        $messages = [
            'video_thumbnail.required' => 'Video thumbnail is required.',
            'video_thumbnail.image' => 'Video thumbnail must be an image file.',
            'video_thumbnail.max' => 'Video thumbnail cannot be larger than 2MB.',
            'add_video.required' => 'Please select video or enter video link.',
            'add_video.mimes' => 'Invalid video file format. Supported formats: mp4, mov, avi.',
            'add_video.max' => 'Video file size cannot be larger than 20MB.',
            'category_id.required' => 'Please select a video category.',
            'category_id.exists' => 'Selected video category does not exist.',
            'video_title.required' => 'Video title is required.',
            'author_id.required' => 'Please select a video author.',
            'author_id.exists' => 'Selected video author does not exist.',
            'summary.required' => 'summary is required.',
            'status.required' => 'status is required.',
            'video_link.required' => 'video link is required.',
        ];
    
        $validatedData = $request->validate($rules, $messages);
        $thumbnailPath = '';
        $videoPath = '';
    
        if ($request->hasFile('video_thumbnail')) {
            $thumbnail = $request->file('video_thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move('uploads/videothumbnail', $thumbnailName);
            $thumbnailPath = $thumbnailName;
        }
    
        if ($request->hasFile('add_video')) {
            $video = $request->file('add_video');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $video->move('uploads/videos', $videoName);
            $videoPath = $videoName;
        }

        $video = new Video();
        $video->video_thumbnail = $thumbnailPath;
        $video->add_video = $videoPath;
        $video->category_id = $request->input('category_id');
        $video->video_title = $request->input('video_title');
        $video->author_id = $request->input('author_id');
        $video->summary = $request->input('summary');
        $video->status = $request->input('status');
        $video->video_link = $request->input('video_link');
          // Implode the array of category IDs into a string
          $categoryIds = implode(',', $request->input('category_id'));
          $video->category_id = $categoryIds;
        $video->save();
    
        return redirect()->route('video.index')->with('success', 'Video added successfully.');
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $rules = [
            'video_thumbnail' => 'sometimes|nullable|image|max:2048', // Allow update or keep existing thumbnail
            'add_video' => 'sometimes|nullable|mimes:mp4,mov,avi|max:20480', // Allow update or keep existing video
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id',
            'video_title' => 'required',
            'author_id' => 'required|exists:experts,id',
            'summary' => 'required',
            'status' => 'required',
           // 'video_link' => 'required',
        ];
     
        $messages = [
            'category_id.required' => 'Please select a video category.',
            'category_id.exists' => 'Selected video category does not exist.',
            'video_title.required' => 'Video title is required.',
            'author_id.required' => 'Please select a video author.',
            'author_id.exists' => 'Selected video author does not exist.',
            'summary.required' => 'summary is required.',
            'status.required' => 'status is required.',
            'video_link.required' => 'video link is required.',
        ];
    
        $validatedData = $request->validate($rules, $messages);
        
        if ($request->hasFile('video_thumbnail')) {
            $thumbnail = $request->file('video_thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move('uploads/videothumbnail', $thumbnailName);
            $video->video_thumbnail = $thumbnailName;
        }
    
      
        if ($request->hasFile('add_video')) {
            $videoFile = $request->file('add_video');
            $videoName = time() . '.' . $videoFile->getClientOriginalExtension();
            $videoFile->move('uploads/videos', $videoName);
            $video->add_video = $videoName;
        }
    
       
        $video->category_id = $request->input('category_id');
        $video->video_title = $request->input('video_title');
        $video->author_id = $request->input('author_id');
        $video->status = $request->input('status');
        $video->summary = $request->input('summary');
        $video->video_link = $request->input('video_link');
         // Handling multiple categories
         $video->category_id = implode(',', $request->input('category_id'));
        
       
        $video->save();
    
        return redirect()->route('video.index')->with('success', 'Video updated successfully.');
    }
    
    public function edit($id){
        
        $video = Video::findOrFail($id);
        $experts = Expert::all();
        $categories = Category::all();
        return view('admin.videos.create', compact('video', 'experts', 'categories'));
    }
    
   
    public function destroy($id)
    {
    
         $video = Video::find($id);
         
        if (!$video) {
            return redirect()->route('video.index')->with('error', 'video not found');
        }
        $video->delete();
    
        return redirect()->route('video.index')->with('success', 'Video deleted successfully');
    }
    
    }
    
