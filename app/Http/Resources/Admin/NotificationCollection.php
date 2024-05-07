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

class NotificationCollection extends ResourceCollection
{  
    public function __construct($resource)
{
    parent::__construct($resource);
}

    public function toArray($request)
    {
        return $this->collection->map(function($data) {
            return [
                'id'                => $data->id,
                'title'             => $data->title ?? '',
                'body'              => $data->body ?? '',
                'notification_type' => $data->notification_type ?? '',
                'seen'              => $data->seen ?? '',
                'time'              => $data->created_at->format('l, d F Y h:i A'),
            ];
        });
    }
}