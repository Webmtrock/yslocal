<?php

namespace App\Http\Resources\Admin;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Str;


class AticlesSingleCollection extends ResourceCollection
{  
    public function __construct($resource)
{
    parent::__construct($resource);
}

    public function toArray($request)
    {  
        
        return $this->collection->map(function($data) {
            $category_id = explode(',',$data->category_id);
            $category = Category::whereIn('id', $category_id)->pluck('title');
            $expertName = $data->expert ? $data->expert->name : null;
             $latestArticles = Article::latest()->take(3)->get();
           
            return [
                'id'                          => $data->id,
                'article_title'               => $data->article_title,
                // 'summary'                     => $data->summary,
                'summary' => $data ? Str::limit($data->summary, 200) : null,
                 'category_id'                 => $category_id,
                 'category'                    => $category,
                'article_slug'                => $data->article_slug,
                'expert_name'                 => $expertName, 
                // 'banner_image'                       => [
                //     'url' => !empty($data->banner_image) ? url('public/uploads/'.$data->banner_image) : '',
                // ],
                'image'                       => !empty($data->banner_image) ? url('public/uploads/'.$data->banner_image) : '',
                'recent_post'                => new RecentPostCollection($latestArticles),
                'article_body'                => $data->article_body,
                //  'article_body' => $data ? Str::limit($data->article_body, 200) : null,
                'created_at'                  => $data->created_at->format('M d, Y'),
            ];
        });
        
    }
}