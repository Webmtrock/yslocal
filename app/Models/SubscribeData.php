<?php

// app/Models/FormData.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscribeData extends Model
{
    protected $table = 'newsletter'; // Define the table name explicitly
    
    protected $fillable = ['email']; // Define fillable fields
}