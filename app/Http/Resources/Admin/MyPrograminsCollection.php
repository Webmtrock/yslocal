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
use App\Models\Expert;
use App\Models\Order;
use App\Models\ProgramFaq;
use Illuminate\Support\Str;

class MyPrograminsCollection extends ResourceCollection
{  
    public function __construct($resource)
{
    parent::__construct($resource);
}

    public function toArray($request)
    {
        return $this->collection->map(function($data) {
            
            // dd($data->program_id);
            $program = Program::where('id', $data->program_id)->first();
            $category = $program ? Category::find($program->category_id) : null;
            $expert = $program ? Expert::find($program->expert_id) : null;

            $batchIds = ProgramBatch::where('program_id', $data->program_id)->get('id');
// dd($batchIds);
            $prografaq = ProgramFaq ::where('program_id',$data->id)->get();

            $programSessions = ProgramSession::whereIn('program_batch_id', $batchIds)->get();
            
            // $programSessions = ProgramSession::whereIn('program_batch_id', $batchIds)->get();
// dd($programSessions);
            $programSessionsCount = $programSessions->count();

            $ReviewsImages  = ProgramReviewsImages::where('program_id', $data->id)->pluck('file');

            $programId  = ProgramPlan::where('programins_id', $data->id)->pluck('id');
            
            $programplantypes = ProgramPlanType::whereIn('plan_id', $programId)->get();

            // $parchedplan = ProgramBatch::where('id', $data->batch_id)->get();
            // $parchedplan = ProgramBatch::all();
            // dd($data->program_id);

            $parchedplan = ProgramBatch::where('program_id', $data->program_id)->get(['id','name', 'program_id', 'batch_start_date', 'batch_end_date']);
            // dd($parchedplanss);
            $parchedplanss = ProgramPlan::where('programins_id', $data->program_id)->get();
            // dd($parchedplanss);

            // $programExists = Order::where('program_id', $data->user_id)->first();
            //$ProgramPlan = ProgramPlan ::where('programins_id', $parchedplan->program_id)->pluck('add_plans');
            //  dd($programExists);
            return [
                 'id'                          => $data->id,
                'program_id'                          => $data->program_id,
                // 'parched_plan' => isset($data->program_id) ? true : false,
                'title'                => $program ? $program->title : null,
                'start_date'                  => $program ? $program->start_date : null,
                'rating'                      => $program ? $program->rating : null,
                'expert_id'                   => $program ? $program->expert_id : null,
                'expert_name'                 => $expert ? $expert->name : null,
                'category_id'                 => $program ? $program->category_id : null,
                'category_name'               => $category ? $category->title : null,
                'planduration'                          => $data->planduration,
                'batchname'                          => $parchedplan,
                 'parched_plan'                          => $parchedplanss,
                'category_name'               => $category ? $category->title : null,
                'programming_tovideo'         => !empty($program->programming_tovideo_url) ? url('uploads/videos/' . $program->programming_tovideo_url) : '',
                'enroll_user'                 => $program ? $program->enroll_user : null,
                'image'                       => !empty($program->image_url) ? url('uploads/'.$program->image_url) : '', 
                'program_for'                 => $program ? $program->program_for : null,
                'whatsapp_group_url'          => $program ? $program->whatsapp_group_url : null,
                'intake_from_link'            => $program ? $program->intake_from_link : null,
                'category_id'                 => $program ? $program->category_id : null,
                'status'                      => $program ? $program->status : null,
                // 'program_description'         => $program ? $program->program_description : null,
                'program_description' => $program ? Str::limit($program->program_description, 200) : null,
                'is_popular'                  => $program ? $program->is_popular : null,
                'created_at'                  => $program ? $program->created_at : null,
                'updated_at'                  => $program ? $program->updated_at : null,
                'programSessionsCount'        =>$programSessionsCount,
                //'programSessions'           => $programSessions,
                'programSessions'             => new programSessionsCollection($programSessions),
                'programplantypes'            => $programplantypes,
                'Reviews'                     => new ReviewsImagesCollection($ReviewsImages),
                'faq'                   => $prografaq,

            ];
        });
    }
}