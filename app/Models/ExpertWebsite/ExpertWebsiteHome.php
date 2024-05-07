<?php

namespace App\Models\ExpertWebsite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertWebsiteHome extends Model
{ 
    
    protected $fillable = [
        'expert_image',
        'secation_type',
        'expert_title',
        'url',
        'button_name',
        'expert_description',
        'app_store_img',
        'google_img',
        'expert_id',
        'button_2',
        'button_3',
        'button_4',
        'button_5',
        'button_6',
       
    ];
}