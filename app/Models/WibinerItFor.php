<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WibinerItFor extends Model
{
    use HasFactory;
    protected $table = 'wibiner_it_fors';

    protected $fillable = [
        'wibiner_user_id',
        'who_title'
        
    ];
}
