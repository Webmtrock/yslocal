<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Expert;
use App\Models\Category;
use App\Helper\Helper;
class ExpertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expert = Expert::all();
        return view('admin.expert.index', compact('expert'));
    //    return view('expert.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('admin.expert.create');
    // }
    public function create()
    {
         $categories = Category::all();
        return view('admin.expert.create',compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     public function store(Request $request)
{
    $validatedData = $request->validate([
        'expert_category_id' => 'required|array',
        'name' => 'required|string|max:255',
        'expert_designation' => 'required',
        'expert_experience' => 'required',
        'expert_qualification' => 'required',
        'expert_language' => 'required',
        'expert_description' => 'required',   
        'participant_enrolled' => 'nullable',   
        'patients_treated' => 'nullable',   
        'year_of_experiance' => 'nullable',   
        'expert_profile' => 'nullable|image', 
        'status' => 'required',
        //'profile_video'=>'required',
        'expert_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ]);
//  dd($validatedData);
    
    $imagePath = config('app.expert_profile');
    $categoryIds = implode(',', $request->input('expert_category_id')); // corrected variable name
    $expert = Expert::create([
        'expert_category_id' => $categoryIds,
        'name' => $validatedData['name'],
        'expert_designation' => $validatedData['expert_designation'],
        'expert_experience' => $validatedData['expert_experience'],
        'expert_qualification' => $validatedData['expert_qualification'],
        'expert_language' => $validatedData['expert_language'],
        'expert_description' => $validatedData['expert_description'],
        'participant_enrolled' => $validatedData['participant_enrolled'],
        'patients_treated' => $validatedData['patients_treated'],
        'year_of_experiance' => $validatedData['year_of_experiance'],
        'status'              =>$validatedData['status'],
        'expert_profile' => $request->hasFile('expert_profile') ? Helper::storeImage($request->file('expert_profile'), $imagePath, $request->expert_profileOld) : (isset($request->expert_profileOld) ? $request->expert_profileOld : ''),
        'expert_thumbnail' => $request->hasFile('expert_thumbnail') ? Helper::storeImage($request->file('expert_thumbnail'), $imagePath, $request->expert_thumbnailOld) : (isset($request->expert_thumbnailOld) ? $request->expert_thumbnailOld : ''),
    //    'profile_video' => $validatedData['profile_video'],
       'profile_video' => $request->profile_video,

    ]);
    return redirect()->route('expert.index')->with('success', 'Expert created successfully');
}

    public function edit($id)
    {    
         $expert = Expert::where('id',$id)->first();
        $categories = Category::all();
        return view('admin.expert.edit', compact('expert', 'categories'));
        // return view('admin.expert.edit',['expert' =>$expert]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function update(Request $request, $id)
{
    // Validate the form
    $validatedData = $request->validate([
        'expert_category_id' => 'required|array',
        'name' => 'required|string|max:255',
        'expert_designation' => 'required',
        'expert_experience' => 'required',
        'expert_qualification' => 'required',
        'expert_language' => 'required',
        'expert_description' => 'required',
        'participant_enrolled' => 'nullable',   
        'patients_treated' => 'nullable',   
        'year_of_experiance' => 'nullable', // corrected field name
        'expert_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', // removed redundant 'nullable'
        'status' => 'required',
      //  'video_link'=>'required',
        'expert_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    $expert = Expert::find($id);

    if (!$expert) {
        return redirect()->route('expert.index')->with('error', 'Expert not found');
    }

    $imagePath = config('app.expert_profile');
    $categoryIds = implode(',', $request->input('expert_category_id'));

    $expert->update([
        'expert_category_id' => $categoryIds,
        'name' => $validatedData['name'],
        'expert_designation' => $validatedData['expert_designation'],
        'expert_experience' => $validatedData['expert_experience'],
        'expert_qualification' => $validatedData['expert_qualification'],
        'expert_language' => $validatedData['expert_language'],
        'expert_description' => $validatedData['expert_description'],
        'participant_enrolled' => $validatedData['participant_enrolled'],
        'patients_treated' => $validatedData['patients_treated'],
        'year_of_experiance' => $validatedData['year_of_experiance'],
        'status' => $validatedData['status'],
        'expert_profile' => $request->hasFile('expert_profile') ? Helper::storeImage($request->file('expert_profile'), $imagePath, $expert->expert_profile) : $expert->expert_profile,
        'profile_video' => isset(request()->video_link)?request()->video_link:'',
        'expert_thumbnail' => $request->hasFile('expert_thumbnail') ? Helper::storeImage($request->file('expert_thumbnail'), $imagePath, $expert->expert_thumbnail) : $expert->expert_thumbnail,

    ]);

    return redirect()->route('expert.index')->with('success', 'Expert updated successfully');
}

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//     public function delete($id)
//     {
//         $expert = Expert::findOrFail($id);
//         $expert->delete();
//         return redirect()->route('expert.index')->with('success', 'User Deleted successfully');
// }
public function destroy($id)
{
    $expert = Expert::find($id);
    if (!$expert) {
        return redirect()->route('expert.index')->with('error', 'Expert not found');
    }
    $expert->delete();

    // Redirect to the index page with a success message
    return redirect()->route('expert.index')->with('success', 'Expert deleted successfully');
}

}