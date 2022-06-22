<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected  $fillable = [
        '*',
    ];
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
