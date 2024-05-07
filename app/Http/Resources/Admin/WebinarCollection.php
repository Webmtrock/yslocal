<?php

namespace App\Http\Resources\Admin;
use App\Models\WibinerUser;
use App\Models\Category;
use App\Models\WibinerSession;
use App\Models\WibinerItFor;
use App\Models\WibinerWillLearn;
use App\Models\ProgramReviewsImages;
use App\Models\WebinarReviewsImages;
use Illuminate\Http\Resources\Json\ResourceCollection;

class WebinarCollection extends ResourceCollection
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

            // $WibinerSession = WibinerSession::select('heading', 'definition')->where('wibiner_user_id',$data->id)->get();
            // $WibinerItFor = WibinerItFor::select('who_title')->where('wibiner_user_id',$data->id)->get();
            // $WibinerWillLearn = WibinerWillLearn::select('title')->where('wibiner_user_id',$data->id)->get();
            $ReviewsImages  = WebinarReviewsImages::where('webinar_id', $data->id)->pluck('image');
           // $Reviewsvideo  = WebinarReviewsImages::where('webinar_id', $data->id)->pluck('video');
            // $ReviewsImages = WebinarReviewsImages::select('image', 'video')
            //       ->where('webinar_id', $data->id)
            //       ->get();

             $expertName = $data->expert ? $data->expert->name : null;
             $expert_profile = $data->expert ? url(config('app.expert_profile').'/'.$data->expert->expert_profile) : null; 
             $latestArticles = WibinerUser::latest()->take(3)->get();
            return [
                'id'                           => $data->id,
                'webinar_title'                => $data->webinar_title,
                'category_id'                  => $category_id,
                'category'                     => $category,
                'expert_name'                  => $expertName,
                'description'                  => $data->description,
                'webinar_title'                => $data->webinar_title,
                'expert_designation'           => $data->expert_designation,
                'webinar_start_date'           => $data->webinar_start_date,
                'whislist'                     => $data->favourite,
                'day'                          => $data->day,
                'duration'                     => $data->duration,
                'start_time'                   => $data->start_time,
                'end_time'                     => $data->end_time,
                'webinar_price'                => $data->webinar_price,
                'whatsapp_link'                => $data->whatsapp_link,
                'expert_profile'               => $expert_profile,
                // 'interactive_session'          => $WibinerSession,
                // 'you_learn_in_this_exclusive_session' =>$WibinerWillLearn ,
                // 'Who_is_it_for'                 => $WibinerItFor,
                'webinar_image'                => !empty($data->webinar_image) ? url(config('app.webinar_image').'/'.$data->webinar_image) : '',
                'webinar_video'                => !empty($data->webinar_video) ? url(config('app.webinar_image').'/'.$data->webinar_video) : '',
                'created_at'                   => $data->created_at->format('M d, Y'),
                'reviews'                   =>$ReviewsImages,
                //'reviewsvideo'                   =>$Reviewsvideo,
                
            ];
        });
    }
}