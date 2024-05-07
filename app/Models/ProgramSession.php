<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSession extends Model
{
    use HasFactory;
    protected $table="program_sessions";
    protected $fillable = [
        'program_batch_id',
        'session_recording',
        'session_title',
        'session_time',
        'session_startdate',
        'session_meetinglink',
        'session_description',
        'session_starttime',
        'status',
    ];

    public function batchName()
    {
       return $this->hasOne(ProgramBatch::class, 'id', 'program_batch_id');

    }

    public function SessionResorce()
    {
       return $this->hasMany(ProgramSessionResource::class, 'program_session_id', 'id');

    }
}
