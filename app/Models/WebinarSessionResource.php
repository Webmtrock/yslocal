<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebinarSessionResource extends Model
{
    use HasFactory;
    protected $table ="webinar_session_resource";
    protected $fillable = [
        'webinar_session_id',
        'file_path',
        'file_type',
    ];
}
