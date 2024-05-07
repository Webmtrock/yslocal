<?php

namespace App\Http\Resources\Expert;

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

class VideoCollection extends ResourceCollection
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
            return [
                'id'                          => $data->id,
                'video_title'                 => $data->video_title,
                'video_thumbnail'             => $data->video_thumbnail,
                'video_thumbnail'             => !empty($data->video_thumbnail) ? url('uploads/'.$data->video_thumbnail) : '',
                'video_path'                  => $data->video_path,
                'category_id'                 => $data->category_id,
                'category_name'               => $category,
                'summary'                     => $data->summary,
                'author_id'                   => $data->author_id,
                'video_link'                  => $data->video_link,
                'status'                      => $data->status ==1 ? "upcoming" : "completed",
                'created_at'                  => $data->created_at->format('M d, Y'),
                

            ];
        });
    }
}