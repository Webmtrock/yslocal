<?php

namespace App\Http\Resources\Admin;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ConcernsHomeCollection extends ResourceCollection
{  
    public function __construct($resource)
{
    parent::__construct($resource);
}

    public function toArray($request)
    {  
        
        return $this->collection->map(function($data) {
            $latestArticles = Article::latest()->take(3)->get();
            return [
                'id'                          => $data->id,
                'article_title'               => $data->article_title,
                'image'                       => !empty($data->banner_image) ? url('public/uploads/'.$data->banner_image) : '',
                'created_at'                  => $data->created_at->format('M d, Y'),
            ];
        });
    }
}