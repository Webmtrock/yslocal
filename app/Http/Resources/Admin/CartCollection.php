<?php

namespace App\Http\Resources\Admin;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CartCollection extends ResourceCollection
{  
    public function __construct($resource)
{
    parent::__construct($resource);
}

    public function toArray($request)
    {  
        
        return $this->collection->map(function($data) {
           
            return [
                'id'                         =>$data->id,
                // 'user_id'                         =>$data->user_id,
                // 'webinar_id'                         =>$data->webinar_id,
                // 'program_id'                 =>$data->program_id,
                // 'planduration'                 =>$data->planduration,
                'amount_paid'                 =>$data->amount_paid,
                // 'type'                 =>$data->type,
                'created_at'                 =>$data->created_at->format('M d, Y'),
            ];
        });
    }
}