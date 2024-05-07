<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramFaq extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_id',
        'question',
        'answer',
    ];
}
