<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WibinerSession extends Model
{
    use HasFactory;
    protected $table = 'webinar_session';

    protected $fillable = [
        'webinar_id	',
        'webinar_start_date',
        'day',
        'start_time',
        'end_time',
        'meeting_link',
        'recording_link'
    ];
}
