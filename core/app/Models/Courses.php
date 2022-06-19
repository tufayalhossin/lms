<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    public function category(){
        return $this->hasOne('App\Models\Category','id','categories_id');
    }
    public function subcategory(){
        return $this->hasOne('App\Models\subcategory','id','subcategories_id');
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
