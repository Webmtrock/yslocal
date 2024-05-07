<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'webinar_id',
        // 'url0',
        // 'button_name0',
        // 'slug',
        // 'image',
        // 'user_id',
        // 'webinar_id',
        // 'title',
        // 'url',
        // 'button_name',
        // 'description',
        // 'section2_image',
        // 'title2',
        // 'url_2',
        // 'button_name_2',
        // 'start_date',
        // 'start_time',
        // 'session_time',
        // 'language',
        // 'section3_image',
        // 'title3',
        // 'description3',
        // 'pre_diabetes',
        // 'hypertension',
        // 'diabetes',
        // 'high_cholesterol',
        // 'fatty_liver',
        // 'hypothyroidism',
        // 'weight_issues',
        // 'pcod_pcos',
        // 'description4',
        // 'title5',
        // 'section_5_image1',
        // 'section_5_image2',
        // 'section_5_image3',
        // 'section_5_image4',
   
        'user_id',
        'webinar_id',
        'slug',
        'button_url',
        'button_name',
        'section1_des',
        'section2_session',
        'section2_title',
        'section3_des',
        'section4_title',
        'section5_title',
        'section5_bottom_title',
        'section5_image_first',
        'section5_image_sec',
        'section5_imgcontent_first',
        'section5_imgcontent_sec',
        'section6_title',
        'section7_title',
         'section7_des',
        'section7_note_title',



    ];
    public function webinar()
    {
        return $this->belongsTo(WibinerUser::class, 'webinar_id');
    }
}
    