<?php

// app/Models/FormData.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    protected $table = 'concern_form'; // Define the table name explicitly
    
    protected $fillable = ['name','email','number','concern','related_to']; // Define fillable fields
}