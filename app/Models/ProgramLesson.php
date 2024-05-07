<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramLesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_id',
        'session_title',
        'session_duration',
        'session_description'
    ];
}
