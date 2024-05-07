<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSessionResource extends Model
{
    use HasFactory;
    protected $table ="program_session_resource";
    protected $fillable = [
        'program_session_id',
        'file_path',
        'file_type',
    ];
}
