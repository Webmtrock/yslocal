<?php

namespace App\Http\Resources\Admin;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PatientCollection extends ResourceCollection
{  
    public function __construct($resource)
{
    parent::__construct($resource);
}

    public function toArray($request)
    {  
        
        return $this->collection->map(function($patients) {
    
            $userDetail = User::where('id',$patients->user_id)->get();
            return [
                'id'                          => $patients->id,
                'user_id'                     => $patients->user_id,
                'userDetail'                  => $userDetail,
                'webinar_id'                  => $patients->webinar_id,
                'program_id'                  => $patients->program_id,
                'batch_id'                    => $patients->batch_id,
                'couponcode'                  => $patients->couponcode,
                'planduration'                => $patients->planduration,
                'amount'                      => $patients->amount,
                'amount_paid'                 => $patients->amount_paid,
                'type'                        => $patients->type,
                'currency'                    => $patients->currency,
                'receipt'                     => $patients->receipt,
                'created_at'                  => $patients->created_at->format('M d, Y'),
            ];
        });
    }
}