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

class validateProgramPurchaseCollection extends ResourceCollection
{  
    public function __construct($resource)
{
    parent::__construct($resource);
}

    public function toArray($request)
    {
        return $this->collection->map(function($data) {
            
            $parchedplan = ProgramBatch::where('id', $data->batch_id)->get(['id','name', 'program_id', 'batch_start_date', 'batch_end_date']);
       
            // $batchIds = ProgramBatch::where('id', $data->batch_id)->pluck('id');
            // dd($parchedplan);
            return [
                 'id'                          => $data->id,
                 'program_id'                   => $data->program_id,
                'parchedplan'                   => $parchedplan,
            ];
        });
    }
}