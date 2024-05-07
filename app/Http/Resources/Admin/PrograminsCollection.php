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
use App\Models\Order;
use App\Models\Wishlist;
use Auth;
use DB;
use Illuminate\Support\Str;

class PrograminsCollection extends ResourceCollection
{  
    public function __construct($resource)
{
    parent::__construct($resource);
}

    public function toArray($request)
    {
        return $this->collection->map(function($data) {
        
            $prograIid = Program ::where('id',$data->id)->pluck('id');

            $prografaq = ProgramFaq ::where('program_id',$data->id)->get();

            $batchIds = ProgramBatch::where('program_id', $data->id)->pluck('id');
            
            $batchname = ProgramBatch::where('program_id', $data->id)->get(['id','name', 'program_id', 'batch_start_date', 'batch_end_date']);

            $programSessions = ProgramSession::whereIn('program_batch_id', $batchIds)->get();
            // dd($programSessions);
            $programSessionsCount = $programSessions->count();

            $ReviewsImages = ProgramReviewsImages::where('program_id', $data->id)->whereIn('file_type', ['image'])->pluck('file');

            $Reviewsvideo = ProgramReviewsImages::where('program_id', $data->id)->whereIn('file_type', ['video'])->pluck('file');
                      
            $programIds = ProgramPlan::where('programins_id', $data->id)->get(['id','add_plans']);

//             $programId = Order::where('program_id', $data->id)->get();
// dd($programId);
            // $programId = isset($programId) ? 'true' : 'false';
           

            $programId  = ProgramPlan::where('programins_id', $data->id)->pluck('id');
            $programplantypes = ProgramPlanType::whereIn('plan_id', $programId)->get();
            $category_id = explode(',',$data->category_id);
            $category = Category::whereIn('id', $category_id)->pluck('title');
            $expertName = $data->expert ? $data->expert->name : null;
            $created_date = new \DateTime($data->created_at);
            $formatted_date = $created_date->format('l, M d, Y');
            return [
                'id'                          => $data->id,
                'title'                       => $data->title,
                'rating'                      => $data->rating,
                'expert_id'                   => $data->expert_id,
                
                'category_id'                 => $category_id,
                'category'                    => $category,
                'expert_name'                 => $expertName,
                 'whislist'        => $data->favourite,
                // 'programming_tovideo'         => !empty($program->programming_tovideo_url) ? url(config('app.programming_tovideo_url').'/'.$program->programming_tovideo_url) : '',
                //'programming_tovideo'         => !empty($data->programming_tovideo_url) ? url(config('app.programming_tovideo_url').'/'.$data->programming_tovideo_url) : '',
                'start_date'                  => $data->start_date,
                'enroll_user'                 => $data->enroll_user,
                'image'                       => !empty($data->image_url) ? url('uploads/'.$data->image_url) : '',
                'programming_tovideo' => !empty($data->programming_tovideo_url) ? url('uploads/videos/' . $data->programming_tovideo_url) : '',

                'program_for'                 => $data->program_for,
                'whatsapp_group_url'          => $data->whatsapp_group_url,
                'intake_from_link'            => $data->intake_from_link,
                'time'                        => $data->created_at->format('h:i:s A'),
                'created_at'                  => $data->created_at->format('M d, Y'),
               // 'program_description'         => $data->program_description,
               'program_description' => $data ? Str::limit($data->program_description, 200) : null,
                // 'program_description' = Str::limit($data->program_description, 200),
                'programSessionsCount'        =>$programSessionsCount,
                 'batchname'          =>  $batchname,
                'programSessions'             => new programSessionsCollection($programSessions),
                'programtype'                   =>$programIds,
                'programplantypes'            => $programplantypes,
                //'Reviews'                   => $ReviewsImages,
                //'prograIid'                   => $prograIid,
                'ReviewsImage'                     => new ReviewsImagesCollection($ReviewsImages),
                'Reviewsvideo'                     => new ReviewsImagesCollection($Reviewsvideo),
                'faq'                   =>$prografaq,

            ];
        });
    }
}