<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDetail extends Model
{
    use HasFactory;

    protected $table = 'patient_details';

    protected $fillable = [
        'order_id','name','email','phone','age','gender','street_name','district','pin_code','sate','country'
    ];

    public function getProgramSession()
    {
       return $this->hasMany(ProgramSession::class, 'program_batch_id', 'id');

    }
}
