<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'amount_paid',
        'landing_page_id',
        'user_id',
        'parent_id',
        'batch_id',
        'program_id',
    
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
  
    public function webinar()
    {
        return $this->belongsTo(WibinerUser::class,'webinar_id');
    }
    public function program()
    {
        return $this->belongsTo(Program::class,'program_id');
    }
    public function getPatient()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // Details Parent Deelesh Sain
    public function getPatientDeltai()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }
}
