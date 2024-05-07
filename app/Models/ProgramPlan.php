<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'add_plans',
        'programins_id',
    ];


    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function getProgramPlantype()
    {
        return $this->HasMany(ProgramPlanType::class, 'plan_id');
    }

    
}


