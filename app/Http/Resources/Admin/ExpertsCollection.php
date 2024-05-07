<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Program;
use App\Models\WibinerUser;

class ExpertsCollection extends ResourceCollection
{  
    public function __construct($resource)
{
    parent::__construct($resource);
}

    public function toArray($request)
    {  
        return $this->collection->map(function($data) {

            $categoryTitle = $data->category ? $data->category->title : null;
            $UpComingProgram = Program::where('expert_id', $data->id)->latest()->get();
            $UpComingWebinerUser = WibinerUser::where('expert_id', $data->id)->latest()->get();


            return [
                'id'                          => $data->id,
                'category'                    => $categoryTitle,
                'name'                        => $data->name,
                'expert_designation'          => $data->expert_designation,
                'whislist'                     => $data->favourite ,
                'expert_experience'           => $data->expert_experience,
                'expert_qualification'        => $data->expert_qualification,
                'expert_language'             => $data->expert_language,
                'expert_description'          => $data->expert_description,
                'expert_profile'              => !empty($data->expert_profile) ? url(config('app.expert_profile').'/'.$data->expert_profile) : '',
                'expert_video'                => !empty($data->profile_video) ? url(config('app.expert_profile').'/'.$data->profile_video) : '',
                'created_at'                  => $data->created_at->format('M d, Y'),
                'UpComing_Program '          =>  new PrograminsCollection($UpComingProgram),
                'UpComingWebinerUser '       =>  new WebinarCollection($UpComingWebinerUser),
                 
            ];
        });
    }
}