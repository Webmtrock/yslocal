<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebinarReviewsImages extends Model
{
    use HasFactory;
    protected $table = "webinar_reviews";
    protected $fillable = [
        'webinar_id',
        'image',
        'video',

    ];
    public function getImageAttribute($value)
    { 
        return url('uploads/'.$value);
    }

}


