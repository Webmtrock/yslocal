<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WibinerWillLearn extends Model
{
    use HasFactory;
    protected $table = 'wibiner_will_learns';

    protected $fillable = [
        'wibiner_user_id',
        'title'
        
    ];
}
