<?php

namespace App\Http\Resources\Admin;
use App\Models\WibinerUser;
use App\Models\Category;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryWebinerCollection extends ResourceCollection
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
            $latestArticles = WibinerUser::latest()->take(3)->get();
         
            return [
                // 'id'                           => $data->id,
                // 'webinar_title'                => $data->webinar_title,
                // 'category_id'                  => $category_id,
                'category'                     => $category,
                // 'expert_name'                  => $expertName,
                // 'description'                  => $data->description,
                // 'webinar_title'                => $data->webinar_title,
                // 'expert_designation'           => $data->expert_designation,
                // 'webinar_start_date'           => $data->webinar_start_date,
                // 'day'                          => $data->day,
                // 'duration'                     => $data->duration,
                // 'start_time'                   => $data->start_time,
                // 'end_time'                     => $data->end_time,
                // 'webinar_price'                => $data->webinar_price,
                // 'whatsapp_link'                => $data->whatsapp_link,
                // 'webinar_image'              => !empty($data->webinar_image) ? url(config('app.webinar_image').'/'.$data->webinar_image) : '',
                // 'webinar_video'              => !empty($data->webinar_video) ? url(config('app.webinar_image').'/'.$data->webinar_video) : '',
                // 'created_at'                  => $data->created_at->format('M d, Y'),

                
            ];
        });
    }
}