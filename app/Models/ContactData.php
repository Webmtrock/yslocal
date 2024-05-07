<?php

// app/Models/FormData.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactData extends Model
{
    protected $table = 'contact_form'; // Define the table name explicitly
    
    protected $fillable = ['name','email','number','message','belongs_to']; // Define fillable fields
}