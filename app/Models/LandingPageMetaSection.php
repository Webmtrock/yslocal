<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPageMetaSection extends Model
{
    use HasFactory;

    protected $table = 'landing_page_meta_section';
    protected $fillable = [
        'landing_page_id',
        'meta_key',
        'value',
    ];
}
