<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAppointment extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'appointment_condition',
        'appointment_date_time',
        'previous_reports',
        'problem_description',
    ];
    
}