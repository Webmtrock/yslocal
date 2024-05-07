<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Category;
class ProgramCategoryCollection extends ResourceCollection
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


            return [
                // 'id'                          => $data->id,
                // 'title'                       => $data->title,
                // 'rating'                      => $data->rating,
                // 'expert_id'                   => $data->expert_id,
                // 'category_id'                 => $category_id,
                'category'                    => $category,
                // 'expert_name'                 =>  $expertName,
                // 'programming_tovideo'         => $data->programming_tovideo_url,
                // 'enroll_user'                 => $data->enroll_user,
                // // 'image'                    => $data->image_url,
                // 'image'                       => !empty($data->image_url) ? url('uploads/'.$data->image_url) : '',
                // 'program_for'                 => $data->program_for,
                // 'whatsapp_group_url'          => $data->whatsapp_group_url,
                // 'intake_from_link'            => $data->intake_from_link,
                // 'time' => $data->created_at->format('h:i:s A'),
                // 'created_at'                  => $data->created_at->format('M d, Y'),
            ];
        });
    }
}