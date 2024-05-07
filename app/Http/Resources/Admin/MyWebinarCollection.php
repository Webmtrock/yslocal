<?php

namespace App\Http\Resources\Admin;
use App\Models\WibinerUser;
use App\Models\Category;
use App\Models\WibinerSession;
use App\Models\WibinerItFor;
use App\Models\WibinerWillLearn;
use App\Models\Expert;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MyWebinarCollection extends ResourceCollection
{  
    public function __construct($resource)
{
    parent::__construct($resource);
}

    public function toArray($request)
    {  
        
        return $this->collection->map(function($data) {
           
           $webinar = WibinerUser::where('id', $data->webinar_id)->first();
           $category = $webinar ? Category::find($webinar->category_id) : null;
           $expert = $webinar ? Expert::find($webinar->expert_id) : null;
           $expert_profile = $expert ? url(config('app.expert_profile').'/'.$expert->expert_profile) : null;
           
        //    $WibinerSession = WibinerSession::select('heading', 'definition')->where('wibiner_user_id',$data->user_id)->get();
        //    $WibinerItFor = WibinerItFor::select('who_title')->where('wibiner_user_id',$data->user_id)->get();
        //    $WibinerWillLearn = WibinerWillLearn::select('title')->where('wibiner_user_id',$data->user_id)->get();

            return [
                'id'                           => $data->id,
                'webinar_title'                => $webinar ? $webinar->webinar_title : null,
                'webinar_image'                => !empty($webinar->webinar_image) ? url(config('app.webinar_image').'/'.$webinar->webinar_image) : null,
                'webinar_video'                => !empty($webinar->webinar_video) ? url(config('app.webinar_image').'/'.$webinar->webinar_video) : '',
                'category_id'                  => $webinar ? $webinar->category_id : null,
                'category_name'                => $category ? $category->title : null,
                'expert_name'                  => $expert ? $expert->name : null,
                'expert_id'                    => $webinar ? $webinar->expert_id : null,
                'description'                  => $webinar ? $webinar->description : null,
                'expert_designation'           => $webinar ? $webinar->expert_designation : null,
                'webinar_start_date'           => $webinar ? $webinar->webinar_start_date : null,
                'day'                          => $webinar ? $webinar->day : null,
                'duration'                     => $webinar ? $webinar->duration : null,
                'start_time'                   => $webinar ? $webinar->start_time : null,
                'end_time'                     => $webinar ? $webinar->end_time : null,
                'webinar_price'                => $webinar ? $webinar->webinar_price : null,
                'description'                => $webinar ? $webinar->description : null,
                'whatsapp_link'                => $webinar ? $webinar->whatsapp_link : null,
                'is_popular'                   => $webinar ? $webinar->is_popular : null,
                'created_at'                   => $webinar ? $webinar->created_at : null,
                'updated_at'                   => $webinar ? $webinar->updated_at : null,
                'expert_profile'               =>$expert_profile,
                // 'interactive_session'          => $WibinerSession,
                // 'you_learn_in_this_exclusive_session' =>$WibinerWillLearn ,
                // 'Who_is_it_for'                 => $WibinerItFor,
                
                
            ];
        });
    }
}