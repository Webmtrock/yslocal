<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramBatch extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'program_batchs';

    protected $fillable = [
        'name',
        'batch_start_date',
        'batch_end_date',
        'program_id'
    ];

    protected $dates = ['deleted_at']; // Ensure 'deleted_at' is treated as a date field

    // Other model code...
    public function getProgramSession()
    {
        return $this->hasMany(ProgramSession::class, 'program_batch_id', 'id')->orderBy('id', 'ASC');

    }
}
