<?php

namespace App\Http\Resources\Admin;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewsImagesCollection extends ResourceCollection
{  
    public function __construct($resource)
{
    parent::__construct($resource);
}
    public function toArray($request)
    {  
        
        return $this->collection->map(function($ReviewsImages) {

            if (Str::startsWith($ReviewsImages, url('/'))) {
                return ['image' => $ReviewsImages];
            } else {
                return ['image' => !empty($ReviewsImages) ? url('uploads/'.$ReviewsImages) : ''];
            }

            
        });
        
    }
}