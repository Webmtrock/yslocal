<?php

namespace App\Http\Resources\Admin;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OurOfferingsCollection extends ResourceCollection
{  
    public function __construct($resource)
{
    parent::__construct($resource);
}

    public function toArray($request)
    {  
        
        return $this->collection->map(function($data) {
       
            
            return [
                'id'                          => $data->id,
                'our_offerings_program_image' => url(config('app.logo') . '/' . $siteSetting['our_offerings_program_image']),
                'our_offerings_program_name' =>  $siteSetting['our_offerings_program_name'],   
                'our_offerings_workshop_image' => url(config('app.logo') . '/' . $siteSetting['our_offerings_workshop_image']),
                'our_offerings_workshop_name' =>  $siteSetting['our_offerings_workshop_name'],
                'our_offerings_healthpedia_image' => url(config('app.logo') . '/' . $siteSetting['our_offerings_healthpedia_image']),
                'our_offerings_healthpedia_name' => $siteSetting['our_offerings_healthpedia_name'],
                'our_offerings_consultation_image' => url(config('app.logo') . '/' . $siteSetting['our_offerings_consultation_image']),
                'our_offerings_consultation_name' => $siteSetting['our_offerings_consultation_name'], 
                'created_at'                  => $data->created_at->format('M d, Y'),
            ];
        });
    }
}