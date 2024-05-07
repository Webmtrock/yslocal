<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
       'title',
       'category_image',
       'slug',
       'status',
       'category_image_thumbnail',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->title);
        });

        static::updating(function ($category) {
            $category->slug = Str::slug($category->title);
        });
    }
    public static function category() {

        return static::orderby('id','desc')->take(5)->get();
    }
 
}
