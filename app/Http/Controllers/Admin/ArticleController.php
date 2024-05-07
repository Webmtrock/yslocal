<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPaymentSuccess;

use App\Models\Expert;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       $categories = Category::all();
        if(auth()->user()->roles->pluck('name')->first() == 'Admin'){
            $articles = Article::where('is_draft', 0)->orderBy('created_at', 'desc')->get();
        }else{
            $articles = Article::where('is_draft', 0)->where('expert_id',auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }
       
        //  $articles = Article::all();
        return view('admin.articles.index',compact('articles'));
    }

    public function draftedIndex()
    {
        $articles = Article::where('is_draft', 1)->get();

        return view('admin.articles.draftArticle', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $experts = Expert::all();
        $categories = Category::all();
        return view('admin.articles.create' ,  compact('categories' ,'experts'));
        
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
            //'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_height=1000,min_width=1000,max_height=1500',
            'summary' => 'required|string',
            'article_body' => 'nullable|string',
            'status' => 'nullable|string',
        ]);


        $bannerImage = $request->file('banner_image');
        $bannerImageName = time() . '_' . $bannerImage->getClientOriginalName();
        $bannerImage->move(public_path('uploads'), $bannerImageName);

        $isDraft = $request->has('save_as_draft') ? 1 : 0;
    
        
        $article = new Article;
        $article->article_title = $request->input('article_title');
                
        // Implode the array of category IDs into a string
        $categoryIds = implode(',', $request->input('category_id'));
        $article->category_id = $categoryIds;
        
        $article->expert_id = $request->input('expert_id');
        $article->article_slug = $request->input('article_slug');
        $article->meta_tag = $request->input('meta_tag');
        $article->meta_description = $request->input('meta_description');
        $article->banner_image = $bannerImageName; 
        $article->summary = $request->input('summary');
        $article->status = $request->input('status');
        $article->article_body = $request->input('article_body');
        $article->is_draft = $isDraft; 
    
        $article->save();
        
        $categorieIds = $request->input('category_id');
        foreach ($categorieIds as $key => $value) {
            $user = User::WhereRaw("FIND_IN_SET(?, categories_id)", [(int)$value])->get();
            foreach ($user as $ke => $val) {
                if($val->email){
                    $data = ['from_email' => env('MAIL_FROM_ADDRESS'),
                        'name' => env('MAIL_FROM_NAME'),
                        'subject' => 'Blog',
                        'message' => 'Blog Create Successfully.',
                    ];
                    Mail::to($val->email)->send(new SendPaymentSuccess($data));
                }
            }
           
        }
        
        if ($request->preview) {
            return redirect()->route('user.healthpediadetail', ['id' => $article->article_slug]); 
        } else {
            return redirect()->route('article.index')->with('success', 'Article created successfully');
        }
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
       
       
        $article = Article::findOrFail($id);
    
        // Handle banner image upload
        if ($request->hasFile('banner_image')) {
            $bannerImage = $request->file('banner_image');
            $bannerImageName = time() . '_' . $bannerImage->getClientOriginalName();
            $bannerImage->move(public_path('uploads'), $bannerImageName);
            $article->banner_image = $bannerImageName;
        }
    
        // Update article data
        $article->article_title = $request->input('article_title');
        $article->category_id = implode(',', $request->input('category_id'));
        $article->expert_id = $request->input('expert_id');
        $article->article_slug = $request->input('article_slug');
        $article->meta_tag = $request->input('meta_tag');
        $article->meta_description = $request->input('meta_description');
        $article->summary = $request->input('summary');
        $article->status = $request->input('status');
        $article->article_body = $request->input('article_body');
        $article->is_draft = $request->has('save_as_draft') ? 1 : 0;
    
        $article->save();
        $categorieIds = $request->input('category_id');
        foreach ($categorieIds as $key => $value) {
            $user = User::WhereRaw("FIND_IN_SET(?, categories_id)", [(int)$value])->get();
            foreach ($user as $ke => $val) {
                if($val->email){
                    $data = ['from_email' => env('MAIL_FROM_ADDRESS'),
                        'name' => env('MAIL_FROM_NAME'),
                        'subject' => 'Blog',
                        'message' => 'Blog Create Successfully.',
                    ];
                    Mail::to($val->email)->send(new SendPaymentSuccess($data));
                }
            }
           
        }
       
        
        if ($request->preview) {
            return redirect()->route('user.healthpediadetail', ['id' => $article->article_slug]); 
        } else {
            return redirect()->route('article.index')->with('success', 'Article updated successfully');
        }
    }
    
    public function edit($id)
    {
         $article = Article::findOrFail($id);
        $categories = Category::all();
        $experts = Expert::all();

        return view('admin.articles.create', compact('article', 'categories', 'experts'));
    }
   

    // public function scopeDrafted($query)
    // {
    //     return $query->where('is_draft', 1);
    // }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
{
 
     $article = Article::find($id);
     
    if (!$article) {
        return redirect()->route('article.index')->with('error', 'Article not found');
    }
    $article->delete();

    return redirect()->route('article.index')->with('success', 'Article deleted successfully');
}

    
}