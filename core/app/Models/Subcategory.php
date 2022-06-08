<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory,SoftDeletes;
    protected  $fillable = [
        'name',
        'slug',
        'photo',
        'file_name',
        'category_id',
        'status',
        'created_at',
        'updated_at',
        'description',
        'deleted_at'
    ];
    public $timestamps = true;
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
}
