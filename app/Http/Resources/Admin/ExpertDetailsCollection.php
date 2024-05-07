<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Category;
use App\Models\ProgramBatch;
use App\Models\ProgramSession;
use App\Models\ProgramPlan;
use App\Models\ProgramPlanType;
use App\Models\ProgramReviewsImages;
use App\Models\Program;
use App\Models\ProgramFaq;
use App\Models\Wishlist;
use Auth;
use DB;

class ExpertDetailsCollection extends ResourceCollection
{  
    public function __construct($resource)
{
    parent::__construct($resource);
}

    public function toArray($request)
    {
        return $this->collection->map(function($data) {
        //    return $expertName = $data->expert_id ? $data->expert->name : null;
        //    $expertName = $data->expert ? $data->expert->name : null;
        // $ReviewsImages  = ProgramReviewsImages::where('program_id', $data->id)->pluck('image');
            return [
                'id'                          => $data->id,
                'expert_title'                => $data->expert_title,
               // 'expert_image'                => $data->expert_image,
               'expert_id'                => $data->expert_id,
            //    'expert_name'                =>  $expertName,
                'image'                       => !empty($data->expert_image) ? url('uploads/'.$data->expert_image) : '',
                'url'                         => $data->url,
                'button_name'                 => $data->button_name,
                'expert_description'          => $data->expert_description,
                'expert_description'          => $data->expert_description,
                // 'review'                      =>$ReviewsImages ,
                

            ];
        });
    }
}