<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Concerns;
use App\Models\Category;
use App\Models\Expert;
use Illuminate\Support\Facades\Storage;



class ConcernController extends Controller
{

   

    public function index()
    { 
        $categories = Category::all();
       $concerns = Concerns::where('is_draft', 0)->get();
        //  $articles = Article::all();
        return view('admin.concerns.index',compact('concerns'));
    }

    public function show()
    {

        $concerns = Concerns::where('is_draft', 1)->get();

        return view('admin.concerns.draftConcern', ['concerns' => $concerns]);
    }

    public function create()
    { 
        $experts = Expert::all();
        $categories = Category::all();
        return view('admin.concerns.create' ,  compact('categories' ,'experts'));
        
    }

   
    
    public function store(Request $request)
    {
        $request->validate([
            'article_title' => 'required|string|max:255',
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id',
            'article_slug' => 'required|string|max:255|unique:articles,article_slug',
            'meta_tag' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'summary' => 'required|string',
            'article_body' => 'nullable|string',
        ]);
        $bannerImage = $request->file('banner_image');
        $bannerImageName = time() . '_' . $bannerImage->getClientOriginalName();
        $bannerImage->move(public_path('uploads'), $bannerImageName);

        $isDraft = $request->has('save_as_draft') ? 1 : 0;
    
        
        $concern = new Concerns;
        $concern->article_title = $request->input('article_title');
                
        // Implode the array of category IDs into a string
        $categoryIds = implode(',', $request->input('category_id'));
        $concern->category_id = $categoryIds;
        
        $concern->expert_id = $request->input('expert_id');
        $concern->article_slug = $request->input('article_slug');
        $concern->meta_tag = $request->input('meta_tag');
        $concern->meta_description = $request->input('meta_description');
        $concern->banner_image = $bannerImageName; 
        $concern->summary = $request->input('summary');
        $concern->article_body = $request->input('article_body');
        $concern->is_draft = $isDraft; 
    
        $concern->save();
    
        return redirect()->route('concern.index')->with('success', 'Concern created successfully');
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'article_title' => 'required|string|max:255',
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id',
            'article_slug' => 'required|string|max:255|unique:articles,article_slug,' . $id,
            'meta_tag' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'summary' => 'required|string',
            'article_body' => 'nullable|string',
        ]);
    
        $concern = Concerns::findOrFail($id);
    
        // Handle banner image upload
        if ($request->hasFile('banner_image')) {
            $bannerImage = $request->file('banner_image');
            $bannerImageName = time() . '_' . $bannerImage->getClientOriginalName();
            $bannerImage->move(public_path('uploads'), $bannerImageName);
            $concern->banner_image = $bannerImageName;
        }
    
        // Update concern data
        $concern->article_title = $request->input('article_title');
        $concern->category_id = implode(',', $request->input('category_id'));
        $concern->expert_id = $request->input('expert_id');
        $concern->article_slug = $request->input('article_slug');
        $concern->meta_tag = $request->input('meta_tag');
        $concern->meta_description = $request->input('meta_description');
        $concern->summary = $request->input('summary');
        $concern->article_body = $request->input('article_body');
        $concern->is_draft = $request->has('save_as_draft') ? 1 : 0;
    
        $concern->save();
    
        return redirect()->route('concern.index')->with('success', 'Concern updated successfully');
    }
    
    public function edit($id)
    {
        $concern = Concerns::findOrFail($id);
        $categories = Category::all();
        $experts = Expert::all();

        return view('admin.concerns.create', compact('concern', 'categories', 'experts'));
    }
   

    // public function scopeDrafted($query)
    // {
    //     return $query->where('is_draft', 1);
    // }


    
    public function destroy($id)
{

     $concern = Concerns::find($id);
     
    if (!$concern) {
        return redirect()->route('concern.index')->with('error', 'Concern not found');
    }
    $concern->delete();

    return redirect()->route('concern.index')->with('success', 'Concern deleted successfully');
}


}
