<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    
    protected  $fillable = [
        'name',
        'slug',
        'photo',
        'file_name',
        'description',
        'status',
        'created_at',
        'updated_at'
    ];

    public function subcategory(){
        return $this->hasMany('App\Models\Subcategory','category_id','id');
    }
}
