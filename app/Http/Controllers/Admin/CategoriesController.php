<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Helper\Helper;
use Illuminate\Support\Facades\Session;


class CategoriesController extends Controller
{
    
  public function index()
    {  
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {   

        return view('admin.categories.create');
    }

    public function store(Request $request)
    {  
         
         $request->validate([
            // 'title' => 'required|string|max:255|unique:categories,title,'.$request->id,
            'title' => 'required | string | unique:categories,title,'.$request->id,
            ]);
        $imagePath = config('app.category-image');
        $imagePaththumb = config('app.category-image-thumbnail');

        $data = Category::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'title' => $request->title,
                'slug' => $request->slug,
                'status' => $request->status,
                'category_image' => $request->hasfile('category_image') ? Helper::storeImage($request->file('category_image'), $imagePath, $request->category_imageOld) : (isset($request->category_imageOld) ? $request->category_imageOld : ''),
                'category_image_thumbnail' => $request->hasfile('category_image_thumbnail') ? Helper::storeImage($request->file('category_image_thumbnail'), $imagePaththumb, $request->category_image_thumbnailOld) : (isset($request->category_image_thumbnailOld) ? $request->category_image_thumbnailOld : ''),

            ]
        );
        if ($data) {
            return redirect()->route('categories.index')->with('success', 'created successfully.');
    
        } else {
            return redirect()->back()->with('error', 'Something went wrong, please try again.');
        }
    }
    public function edit($id)
    {  
        $data['data'] = Category::findOrFail($id);
        return view('admin.categories.create',$data);
    }


    public function destroy($id)
    {  
        try {
            $data = Category::where('id', $id)->first();
            $result = $data->delete();
            
            if ($result) {
                return redirect()->route('categories.index')->with('success', 'Permission deleted successfully.');
            } else {
                return redirect()->route('categories.index')->with('error', 'Failed to delete permission.');
            }
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Something went wrong, please try again.');
        }
    } 

}
