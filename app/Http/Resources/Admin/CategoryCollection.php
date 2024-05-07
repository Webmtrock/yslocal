<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{  
    public function __construct($resource)
{
    parent::__construct($resource);
}

    public function toArray($request)
    {
        return $this->collection->map(function($data) {
            return [
                'id'             => $data->id,
                'name'           => $data->title,
                'status'         => $data->status,
                // 'category_image' => $data->category_image,
                'category_image'              => !empty($data->category_image) ? url(config('app.category_image').'/'.$data->category_image) : '',
                'category_image_thumbnail'              => !empty($data->category_image_thumbnail) ? url(config('app.thumbnail_category_image').'/'.$data->category_image_thumbnail) : '',
                //'category_image_thumbnail' => $data->category_image_thumbnail,
                
            ];
        });
    }
}