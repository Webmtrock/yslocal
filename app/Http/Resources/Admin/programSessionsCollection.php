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
use App\Models\ProgramSessionResource;

class programSessionsCollection extends ResourceCollection
{  
    public function __construct($resource)
{
    parent::__construct($resource);
}

    public function toArray($request)
    {   
        //return $batchIds = ProgramSessionResource::where('program_session_id', $programSessions->id)->pluck('id');

       
        return $this->collection->map(function($data) {
            // return $batchIds = ProgramSessionResource::where('id', $data->id)->pluck('id');
            //  $paths = ProgramSessionResource::where('program_session_id', $data->program_batch_id)->get('file_path');

            // $resource = ProgramSessionResource::where('program_session_id', $data->program_batch_id)->value('file_path')->get();
            $resource = ProgramSessionResource::where('program_session_id', $data->program_batch_id)->get('file_path');
            //    dd($resource);
            
            return [
                'id'                                        => $data->id,
                'program_batch_id'                          =>  $data->program_batch_id,
                'session_recording'                          => $data->session_recording,
                'session_title'                              => $data->session_title,
                'session_time'                               => $data->session_time,
                'session_startdate'                          => $data->session_startdate,
                'session_meetinglink'                        => $data->session_meetinglink,
                'session_description'                        => $data->session_description,
                'session_starttime'                          => $data->session_starttime,
                'session_endtime'                            => $data->session_starttime,
                  'ProgramSessionResource'                     => $resource,
                  'base_url'=>                                 url('uploads/'),
                // 'ProgramSessionResource'                       => !empty($resource) ? url('uploads/'.$resource) : '',
                //'ProgramSessionResource'                     =>$ProgramSessionResource,
                'created_at'                                 => $data->created_at,
                'updated_at'                                 => $data->updated_at,
            
            ];
        });
    }
}