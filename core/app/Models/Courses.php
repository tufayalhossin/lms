<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected  $fillable = [
        'title',
        'slug',
        'thumbnail',
        'sort_description',
        'description',
        'user_id',
        'categories_id',
        'subcategories_id',
        'pricetiers_id',
        'user_id',
        'categories_id',
        'subcategories_id',
        'pricetiers_id',
        'students_learn',
        'requirements',
        'intended_learners',
        'language_locale',
        'instructional_level',
        'tags',
        'old_pricetiers_id',
        'promo_video',
        'media_overviews_id',
        'welcome_message',
        'congratulations_message',
        'completion_certificate',
        'completion_certificate_price',
        'publish_schedule',
        'status',
        'message_for_approver',
        'created_by',
        'updated_by',
    ];
    public $timestamps = true;
    public function category(){
        return $this->hasOne('App\Models\Category','id','categories_id');
    }
    public function subcategory(){
        return $this->hasOne('App\Models\Subcategory','id','subcategories_id');
    }
    public function sections(){
        return $this->hasMany('App\Models\CourseSections','course_id','id');
    }
    public function pricetiers(){
        return $this->hasOne('App\User','id','created_by');
    }
    public function getTagsAttribute($value)
    {
        if($value == null)
        {
            return '';
        }
        return explode(',', $value);
    }
    
}
