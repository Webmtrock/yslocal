<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPlanType extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan_id',
        'program_id',
        'type_plan',
        'discount',
        'price'
    ];
}
