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

class WishlistPrograminsCollection extends ResourceCollection
{  
    public function __construct($resource)
{
    parent::__construct($resource);
}

    public function toArray($request)
    {
        return $this->collection->map(function($getproduct) {
         //return  $getproduct;
          $prograIid = Program ::where('id',$getproduct->id)->pluck('id');


            $prografaq = ProgramFaq ::where('program_id',$getproduct->id)->get();

            $batchIds = ProgramBatch::where('program_id', $getproduct->id)->pluck('id');
            $programSessions = ProgramSession::whereIn('program_batch_id', $batchIds)->get();
            $programSessionsCount = $programSessions->count();
            $ReviewsImages  = ProgramReviewsImages::where('program_id', $getproduct->id)->pluck('file');
            $programId  = ProgramPlan::where('programins_id', $getproduct->id)->pluck('id');
            $programplantypes = ProgramPlanType::whereIn('plan_id', $programId)->get();
            $category_id = explode(',',$getproduct->category_id);
            $category = Category::whereIn('id', $category_id)->pluck('title');
            $expertName = $getproduct->expert ? $getproduct->expert->name : null;
            $created_date = new \DateTime($getproduct->created_at);
            $formatted_date = $created_date->format('l, M d, Y');
            return [
                'id'                          => $getproduct->id,
                'title'                       => $getproduct->title,
                'rating'                      => $getproduct->rating,
                'expert_id'                   => $getproduct->expert_id,
                'category_id'                 => $category_id,
                'category'                    => $category,
                'expert_name'                 => $expertName,
                'whislist'                     => $getproduct->favourite ,
                // 'programming_tovideo'         => !empty($program->programming_tovideo_url) ? url(config('app.programming_tovideo_url').'/'.$program->programming_tovideo_url) : '',
                //'programming_tovideo'         => !empty($getproduct->programming_tovideo_url) ? url(config('app.programming_tovideo_url').'/'.$getproduct->programming_tovideo_url) : '',
                'start_date'                  => $getproduct->start_date,
                'enroll_user'                 => $getproduct->enroll_user,
                'image'                       => !empty($getproduct->image_url) ? url('uploads/'.$getproduct->image_url) : '',
                'programming_tovideo' => !empty($getproduct->programming_tovideo_url) ? url('uploads/videos/' . $getproduct->programming_tovideo_url) : '',

                'program_for'                 => $getproduct->program_for,
                'whatsapp_group_url'          => $getproduct->whatsapp_group_url,
                'intake_from_link'            => $getproduct->intake_from_link,
                'time'                        => $getproduct->created_at->format('h:i:s A'),
                'created_at'                  => $getproduct->created_at->format('M d, Y'),
                'program_description'         => $getproduct->program_description,
                'programSessionsCount'        =>$programSessionsCount,
                // 'programSessions'          => $programSessions,
                'programSessions'             => new programSessionsCollection($programSessions),
                'programplantypes'            => $programplantypes,
                //'Reviews'                   => $ReviewsImages,
                //'prograIid'                   => $prograIid,
                'Reviews'                     => new ReviewsImagesCollection($ReviewsImages),
                'faq'                   =>$prografaq,

            ];
        });
    }
}