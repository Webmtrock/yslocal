<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramReviewsImages extends Model
{
    use HasFactory;
    protected $table = "program_reviews";
    protected $fillable = [
        'program_id',
        'file',
        'file_type',
        'video_url_link',

    ];
   

}


